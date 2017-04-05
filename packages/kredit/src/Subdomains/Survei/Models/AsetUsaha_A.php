<?php

namespace TKredit\Survei\Models;

use TKredit\Infrastructures\Models\BaseModel;

use TKredit\Survei\Models\Observers\AsetUsaha_AObserver;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\UbiquitousLibraries\Currencies\IDRTrait;
use TKredit\UbiquitousLibraries\Datetimes\TanggalTrait;

use Validator, Exception;

/**
 * Model AsetUsaha_A
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Survei
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class AsetUsaha_A extends BaseModel
{
	use GuidTrait;

	use IDRTrait;
	use TanggalTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'survei_aset_usaha';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'						,
											'survei_id'					,
											'alamat_id'					,
											'bidang_usaha'				,
											'nama_usaha'				,
											'tanggal_berdiri'			,
											'status'					,
											'status_tempat_usaha'		,
											'luas_tempat_usaha'			,
											'jumlah_karyawan'			,
											'nilai_aset'				,
											'perputaran_stok'			,
											'jumlah_konsumen_perbulan'	,
											'jumlah_saingan_perkota'	,
											'uraian'					,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'bidang_usaha'				=> 'max:255',
											'nama_usaha'				=> 'max:255',
											'tanggal_berdiri'			=> 'date_format:"Y-m-d"',
											'status'					=> 'in:milik_sendiri,milik_keluarga,bagi_hasil,lain_lain',
											'status_tempat_usaha'		=> 'in:milik_sendiri,sewa,lain_lain',
											'luas_tempat_usaha'			=> 'numeric',
											'jumlah_karyawan'			=> 'numeric',
											'nilai_aset'				=> 'numeric',
											'perputaran_stok'			=> 'numeric',
											'jumlah_konsumen_perbulan'	=> 'numeric',
											'jumlah_saingan_perkota'	=> 'numeric',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];
	
	/**
	 * data hidden
	 *
	 * @var array
	 */
	protected $hidden				= 	[
											'id', 
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];
	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	
	/**
	 * relationship survei
	 *
	 * @return Kredit $model
	 */	
 	public function survei()
	{
		return $this->belongsTo('TKredit\Survei\Models\Survei', 'survei_id');
	}
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	public function getTanggalBerdiriAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	public function getNilaiAsetAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	public function setTanggalBerdiriAttribute($value)
	{
		$this->attributes['tanggal_berdiri']	= $this->formatDateFrom($value);
	}

	public function setNilaiAsetAttribute($value)
	{
		$this->attributes['nilai_aset']			= $this->formatMoneyFrom($value);
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

        AsetUsaha_A::observe(new AsetUsaha_AObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
