<?php

namespace Thunderlabid\Credit\Models;

/**
 * Used for Kredit Models
 * 
 * @author cmooy
 */
use Thunderlabid\Credit\Models\Observers\IDObserver;
use Thunderlabid\Credit\Models\Observers\EventObserver;
use Thunderlabid\Credit\Models\Observers\KreditObserver;

// use Thunderlabid\Credit\Models\Traits\HistoricalDataTrait;
use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\Policies\IDRTrait;
use Thunderlabid\Credit\Models\Traits\Policies\TanggalTrait;
use Thunderlabid\Credit\Models\Traits\Policies\NomorKreditTrait;

use Thunderlabid\Credit\Exceptions\CurrencyException;
use Thunderlabid\Credit\Exceptions\DuplicateException;
use Thunderlabid\Credit\Exceptions\IndirectModificationException;
use Validator, Exception;

/**
 * Model Kredit
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Kredit extends BaseModel
{
	// use HistoricalDataTrait;
	use IDRTrait;
	use GuidTrait;
	use TanggalTrait;
	use NomorKreditTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'credit_kredit';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'jenis_kredit'			,
											'nomor_kredit'			,
											'pengajuan_kredit'		,
											'jangka_waktu'			,
											'status'				,
											'credit_kreditur_id'	,
											'credit_ro_koperasi_id'	,
											'credit_mobile_id'		,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'jenis_kredit'			=> 'max:255',
											'nomor_kredit'			=> 'max:255',
											'pengajuan_kredit'		=> 'numeric',
											'jangka_waktu'			=> 'numeric',
											'status'				=> 'max:255',
											'credit_kreditur_id'	=> 'max:255',
											'credit_ro_koperasi_id'	=> 'max:255',
											'credit_mobile_id'		=> 'max:255',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];
	
	/**
	 * hidden data
	 *
	 * @var array
	 */
	protected $hidden				= 	[
											'created_at', 
											'updated_at', 
											'deleted_at', 
											'credit_kreditur_id', 
											'credit_ro_koperasi_id', 
											'credit_mobile_id'
										];

	/**
	 * data mutator
	 *
	 * @var array
	 */
    protected $appends 				= ['tanggal_pengajuan'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	public function kreditur()
	{
		return $this->belongsTo('Thunderlabid\Credit\Models\Orang', 'credit_kreditur_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	protected function setStatusAttribute($value)
	{
		throw new IndirectModificationException('status', 1);
	}
	
	protected function setPengajuanKreditAttribute($value)
	{
		$this->attributes['pengajuan_kredit']	= $this->formatMoneyFrom($value);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	protected function getPengajuanKreditAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	protected function getTanggalPengajuanAttribute()
	{
		return $this->formatDateTo($this->created_at);
	}

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/
	public function SetKreditur($value)
	{
		//1. Store kredit
		$kreditur 			= Orang::nik($value['nik'])->first();
		
		if(!$kreditur)
		{
			$kreditur 		= new Orang;
		}

		$kreditur->fill($value);
		$kreditur->save();

		$this->attributes['credit_kreditur_id']	= $kreditur->id;

		return $this;
	}

	public function SetKoperasi($value)
	{
		//1. Store kredit
		$koperasi 			= Koperasi_RO::findornew($value['id']);
		$koperasi->fill($value);
		$koperasi->save();

		$this->attributes['credit_ro_koperasi_id']	= $koperasi->id;

		return $this;
	}

	public function SetStatus($value)
	{
		//1. validating value
		//1a. Validating if value contain valid variable
		$rules 			= [
			'status'		=> 'required|max:255',
			'petugas.id'	=> 'required|max:255',
			'petugas.nama'	=> 'required|max:255',
			'petugas.role'	=> 'required|max:255',
		];

		$validator			= Validator::make($value, $rules);
		if(!$validator->passes())
		{
			throw new Exception($validator->messages()->toJson(), 1);
		}

		//3. simpan status
		//3a. simpan petugas
		$petugas			= new Petugas_RO;
		$petugas_ro			= $petugas->findornew($value['petugas']['id']);
		$petugas_ro->fill([
			'id' 	=> $value['petugas']['id'],
			'nama' 	=> $value['petugas']['nama'],
			'role' 	=> $value['petugas']['role'],
		]);

		$petugas_ro->save();

		//3b. simpan value
		$status_ag		= new Status_A;
		$status_ag->fill([
			'status'				=> $value['status'],
			'credit_ro_petugas_id'	=> $petugas_ro->id,
			'credit_kredit_id'		=> $this->id
		]);

		$status_ag->save();

		//4. set this status
		$this->attributes['status']		= $value['status'];

		//5. fire event
		$this->addEvent(new \Thunderlabid\Immigration\Events\Jobs\FireEventVisaGranted($this->toArray()));


		//it's a must to return value
		return $this;
	}

	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();

        Kredit::observe(new IDObserver());
        Kredit::observe(new EventObserver());
        Kredit::observe(new KreditObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	public function scopeStatus($model, $variable)
	{
		if(is_array($variable))
		{
			return $model->whereIn('status', $variable);
		}

		return $model->where('status', $variable);
	}

	public function scopeKoperasi($model, $variable)
	{
		return $model->where('credit_ro_koperasi_id', $variable);
	}
}
