<?php

namespace App\Domain\Survei\Models;

use App\Infrastructure\Models\BaseModel;
use App\Infrastructure\Traits\GuidTrait;
use App\Infrastructure\Traits\SurveiTrait;

use App\Infrastructure\Traits\IDRTrait;
use App\Infrastructure\Traits\TanggalTrait;
use App\Infrastructure\Traits\AlamatTrait;

use Validator, Exception;

/**
 * Model JaminanKendaraan
 *
 * Digunakan untuk menyimpan data jaminan kendaraan
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Survei
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class JaminanKendaraan extends BaseModel
{
	use GuidTrait;
	use SurveiTrait;

	use IDRTrait;
	use TanggalTrait;
	use AlamatTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'survei_jaminan_kendaraan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'						,
											'petugas_id'				,
											'jaminan_kendaraan_id'		,
											'tipe'						,
											'merk'						,
											'warna'						,
											'tahun'						,
											'nomor_polisi'				,
											'nomor_bpkb'				,
											'nomor_mesin'				,
											'nomor_rangka'				,
											'masa_berlaku_stnk'			,
											'status_kepemilikan'		,
											'harga_taksasi'				,
											'fungsi_sehari_hari'		,
											'atas_nama'					,
											'url_barcode'				,
											'alamat'					,
											'uraian'					,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'tipe'						=> 'required|in:roda_2,roda_3,roda_4,roda_6,lain_lain',
											'merk'						=> 'required',
											// 'merk'						=> 'required|in:honda,yamaha,suzuki,kawasaki,mitsubishi,toyota,nissan,kia,daihatsu,isuzu,lain_lain',
											'warna'						=> 'max:255',
											'tahun'						=> 'max:4|min:4',
											'nomor_polisi'				=> 'max:255',
											'nomor_bpkb'				=> 'max:255',
											'nomor_mesin'				=> 'max:255',
											'nomor_rangka'				=> 'max:255',
											'masa_berlaku_stnk'			=> 'date_format:"Y-m-d"',
											'status_kepemilikan'		=> 'max:255',
											'harga_taksasi'				=> 'numeric',
											'fungsi_sehari_hari'		=> 'max:255',
											'atas_nama'					=> 'max:255',
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
	
	/**
	 * relationship survei
	 *
	 * @return Kredit $model
	 */	
 	public function jaminan_kendaraan()
	{
		return $this->belongsTo('App\Domain\Pengajuan\Models\JaminanKendaraan', 'jaminan_kendaraan_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	public function getMasaBerlakuStnkAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	public function getHargaTaksasiAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	public function getAlamatAttribute($value)
	{
		return $this->formatAlamatTo($value);
	}
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	public function setMasaBerlakuStnkAttribute($value)
	{
		if(!is_null($value))
		{
			$this->attributes['masa_berlaku_stnk']	= $this->formatDateFrom($value);
		}
	}

	public function setHargaTaksasiAttribute($value)
	{
		if(!is_null($value))
		{
			$this->attributes['harga_taksasi']		= $this->formatMoneyFrom($value);
		}
	}

	public function setAlamatAttribute($value)
	{
		$this->attributes['alamat']		  	= $this->formatAlamatFrom($value);
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

	public function scopeNomorBPKB($query, $value)
	{
		return $query->where('nomor_bpkb', $value);
	}
}
