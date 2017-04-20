<?php

namespace TKredit\Pengajuan\Models;

use TKredit\Infrastructures\Models\BaseModel;

// use TKredit\Pengajuan\Models\Observers\PengajuanObserver;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\UbiquitousLibraries\Currencies\IDRTrait;
use TKredit\UbiquitousLibraries\Datetimes\TanggalTrait;

/**
 * Model Kredit
 *
 * Digunakan untuk menyimpan data kredit.
 * Ketentuan : 
 * 	- beberapa bisa direct changes, beberapa harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    TKredit
 * @subpackage Pengajuan
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Pengajuan extends BaseModel
{
	use GuidTrait;

	use IDRTrait;
	use TanggalTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'pengajuan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'jenis_kredit'			,
											'pengajuan_kredit'		,
											'jangka_waktu'			,
											'tanggal_pengajuan'		,
											'kreditur_id'			,
											'ro_petugas_id'			,
											'referensi_id'			,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'jenis_kredit'			=> 'in:pa,pt,rumah_delta,lain_lain',
											'pengajuan_kredit'		=> 'required|numeric|min:2500000',
											'tanggal_pengajuan'		=> 'date_format:"Y-m-d"',
											'jangka_waktu'			=> 'numeric|in:6,10,12,18,24,30,36,42,48,54,60',
											'kreditur_id'			=> 'max:255',
											'ro_petugas_id'			=> 'max:255',
											'referensi_id'			=> 'max:255',
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
											'kreditur_id', 
											'ro_petugas_id', 
											'referensi_id', 
										];

	/**
	 * data mutator
	 *
	 * @var array
	 */
    protected $appends 				= [];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/**
	 * relationship kreditur
	 *
	 * @return Kredit $model
	 */	
 	public function kreditur()
	{
		return $this->belongsTo('TKredit\Pengajuan\Models\Orang', 'kreditur_id');
	}


	/**
	 * relationship referensi
	 *
	 * @return Kredit $model
	 */	
 	public function referensi()
	{
		return $this->belongsTo('TKredit\Pengajuan\Models\Petugas_RO', 'referensi_id');
	}


	/**
	 * relationship jaminan kendaraan
	 *
	 * @return Kredit $model
	 */	
	public function jaminan_kendaraan()
	{
		return $this->hasMany('TKredit\Pengajuan\Models\JaminanKendaraan_A');
	}

	/**
	 * relationship jaminan tanah bangunan
	 *
	 * @return Kredit $model
	 */	
	public function jaminan_tanah_bangunan()
	{
		return $this->hasMany('TKredit\Pengajuan\Models\JaminanTanahBangunan_A');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	/**
	 * formatting pengajuan kredit menjadi numeric dengan mata uang rupiah
	 *
	 * @param string $value ["Rp 200.000.000"]
	 */	
	protected function setPengajuanKreditAttribute($value)
	{
		$this->attributes['pengajuan_kredit']	= $this->formatMoneyFrom($value);
	}

	/**
	 * simpan jenis kredit
	 *
	 * @param string $value
	 */	
	protected function setJenisKreditAttribute($value)
	{
		$this->attributes['jenis_kredit']		= strtolower($value);
	}

	public function setTanggalPengajuanAttribute($value)
	{
		$this->attributes['tanggal_pengajuan']	= $this->formatDateFrom($value);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/**
	 * formatting pengajuan kredit menjadi mata uang rupiah dari numeric
	 *
	 * @param numeric $value [200000000]
	 * @return string $value ["Rp 200.000.000"]
	 */	
	protected function getPengajuanKreditAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	public function getTanggalPengajuanAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * fungsi simpan koperasi
	 *
	 * @param array $value 
	 * @return Kredit $kredit 
	 */	
	public function SetPetugas($value)
	{
		//1. simpan status
		//1a. simpan petugas
		$petugas			= new Petugas_RO;
		$petugas_ro			= $petugas->findornew($value['petugas']['id']);
		$petugas_ro->fill([
			'id' 	=> $value['petugas']['id'],
			'nama' 	=> $value['petugas']['nama'],
			'role' 	=> $value['petugas']['role'],
		]);

		$petugas_ro->save();

		//1b. simpan value
		$this->attributes['ro_petugas_id'] 			= $petugas_ro->id;

		$this->save();

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

        // Pengajuan::observe(new PengajuanObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * pencarian berdasarkan id koperasi
	 *
	 * @param string $variable
	 * @return Pengajuan $model
	 */
	public function scopeKreditur($model, $variable)
	{
		return $model->whereHas('kreditur', function($q)use($variable){return $q->nama($variable);});
	}
}
