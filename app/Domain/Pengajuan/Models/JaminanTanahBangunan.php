<?php

namespace App\Domain\Pengajuan\Models;

use App\Infrastructure\Models\BaseModel;
use App\Infrastructure\Traits\GuidTrait;
use App\Infrastructure\Traits\AlamatTrait;

use Validator, Exception;

/**
 * Model JaminanTanahBangunan
 *
 * Digunakan untuk menyimpan data jaminan tanah_bangunan
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Pengajuan
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class JaminanTanahBangunan extends BaseModel
{
	use GuidTrait;
	use AlamatTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'pengajuan_jaminan_tanah_bangunan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'id'						,
											'pengajuan_id'				,
											'tipe'						,
											'jenis_sertifikat'			,
											'nomor_sertifikat'			,
											'masa_berlaku_sertifikat'	,
											'atas_nama'					,
											'luas_tanah'				,
											'luas_bangunan'				,
											'alamat'					,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'pengajuan_id'				=> 'max:255',
											'tipe'						=> 'in:tanah,tanah_bangunan,bangunan,tambak',
											'jenis_sertifikat'			=> 'max:255',
											'nomor_sertifikat'			=> 'max:255',
											'masa_berlaku_sertifikat'	=> 'min:4|max:4',
											'atas_nama'					=> 'max:255',
											'luas_tanah'				=> 'numeric',
											'luas_bangunan'				=> 'numeric',
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
	 * relationship jaminan tanah_bangunan
	 *
	 * @return Kredit $model
	 */	
	public function survei_jaminan_tanah_bangunan()
	{
		return $this->hasMany('App\Domain\Survei\Models\JaminanTanahBangunan');
	}

	/**
	 * relationship pengajuan
	 *
	 * @return Kredit $model
	 */	
	public function pengajuan()
	{
		return $this->belongsto('App\Domain\Pengajuan\Models\Pengajuan');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	protected function setAlamatAttribute($value)
	{
		$this->attributes['alamat']	= $this->formatAlamatFrom($value);
	}

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	protected function getAlamatAttribute($value)
	{
		return $this->formatAlamatTo($value);
	}
	
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

	public function scopeNomorSertifikat($query, $value)
	{
		return $query->where('nomor_sertifikat', $value);
	}
}
