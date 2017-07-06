<?php

namespace App\Domain\Survei\Models;

use App\Infrastructure\Models\BaseModel;
use App\Infrastructure\Traits\GuidTrait;
use App\Infrastructure\Traits\AlamatTrait;
use App\Infrastructure\Traits\SurveiTrait;

use App\Infrastructure\Traits\IDRTrait;
use App\Infrastructure\Traits\TanggalTrait;

use Validator, Exception;

/**
 * Model AsetUsaha
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
class AsetUsaha extends BaseModel
{
	use GuidTrait;
	use AlamatTrait;
	use SurveiTrait;

	use IDRTrait;
	use TanggalTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 's_aset_u';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'						,
											'petugas_id'				,
											'pengajuan_id'				,
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
											'alamat'					,
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
											// 'id', 
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];
	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	protected function getTanggalBerdiriAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	protected function getNilaiAsetAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	protected function getAlamatAttribute($value)
	{
		return $this->formatAlamatTo($value);
	}


	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	protected function setTanggalBerdiriAttribute($value)
	{
		$this->attributes['tanggal_berdiri']	= $this->formatDateFrom($value);
	}

	protected function setNilaiAsetAttribute($value)
	{
		$this->attributes['nilai_aset']			= $this->formatMoneyFrom($value);
	}

	protected function setAlamatAttribute($value)
	{
		$this->attributes['alamat']	= $this->formatAlamatFrom($value);
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
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
