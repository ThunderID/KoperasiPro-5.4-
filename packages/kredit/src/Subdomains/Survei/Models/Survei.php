<?php

namespace TKredit\Survei\Models;

use TKredit\Infrastructures\Models\BaseModel;

// use TKredit\Survei\Models\Observers\SurveiObserver;

use TKredit\Infrastructures\Guid\GuidTrait;

use Validator, Exception, Carbon\Carbon;

/**
 * Model Survei
 *
 * Digunakan untuk menyimpan data survei.
 * Ketentuan : 
 * 	- beberapa bisa direct changes, beberapa harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    TKredit
 * @subpackage Survei
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Survei extends BaseModel
{
	use GuidTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'survei';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'ro_petugas_id'			,
											'nomor_dokumen_kredit'	,
											'tanggal_survei'		,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'ro_petugas_id'			=> 'max:255',
											'nomor_dokumen_kredit'	=> 'required',
											'tanggal_survei'		=> 'date_format:"Y-m-d"',
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
											'ro_petugas_id', 
										];

	/**
	 * data mutator
	 *
	 * @var array
	 */
    protected $appends 				= [];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	public function getTanggalSurveiAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	public function setTanggalSurveiAttribute($value)
	{
		$this->attributes['tanggal_survei']	= $this->formatDateFrom($value);
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

        // Survei::observe(new SurveiObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
	
	public function scopeNomorDokumenKredit($query, $value)
	{
		return $query->where('nomor_dokumen_kredit', $value);
	}
}
