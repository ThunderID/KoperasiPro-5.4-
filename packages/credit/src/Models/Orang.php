<?php

namespace Thunderlabid\Credit\Models;

/**
 * Used for Orang Models
 * 
 * @author cmooy
 */
use Thunderlabid\Credit\Models\Observers\IDObserver;
use Thunderlabid\Credit\Models\Observers\EventObserver;
use Thunderlabid\Credit\Models\Observers\OrangObserver;

// use Thunderlabid\Credit\Models\Traits\HistoricalDataTrait;
use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\Policies\NIKTrait;
use Thunderlabid\Credit\Models\Traits\Policies\TanggalTrait;

use Thunderlabid\Credit\Exceptions\DuplicateException;
use Thunderlabid\Credit\Exceptions\IndirectModificationException;

use Validator, Exception;

/**
 * Model Orang
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Orang extends BaseModel
{
	// use HistoricalDataTrait;
	use NIKTrait;
	use GuidTrait;
	use TanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'credit_orang';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'is_ektp'				,
											'nik'					,
											'nama'					,
											'tanggal_lahir'			,
											'jenis_kelamin'			,
											'status_perkawinan'		,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'is_ektp'				=> 'boolean',
											'nik'					=> 'max:255',
											'nama'					=> 'required|max:255',
											'tanggal_lahir'			=> 'date_format:"Y-m-d"',
											'jenis_kelamin'			=> 'in:laki-laki,perempuan',
											'status_perkawinan'		=> 'in:kawin,belum_kawin,cerai,cerai_mati',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];
	protected $hidden				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	protected function setTanggalLahirAttribute($value)
	{
		$this->attributes['tanggal_lahir']	= $this->formatDateFrom($value);
	}

	protected function setNikAttribute($value)
	{
		//1. Check duplikat nik
		$exists_person 				= Orang::where('nik', $value)->notid($this->id)->first();

		if($exists_person)
		{
			throw new DuplicateException("NIK", 1);
			
		}

		$this->attributes['nik']	= $this->formatNIKFrom($value);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	protected function getTanggalLahirAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();

        Orang::observe(new IDObserver());
        Orang::observe(new EventObserver());
        Orang::observe(new OrangObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	public function scopeNama($model, $variable)
	{
		return $model->where('nama', $variable);
	}

	public function scopeNik($model, $variable)
	{
		return $model->where('nik', $variable);
	}
}
