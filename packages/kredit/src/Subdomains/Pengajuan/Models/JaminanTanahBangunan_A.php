<?php

namespace TKredit\Pengajuan\Models;

use TKredit\Infrastructures\Models\BaseModel;

use TKredit\Infrastructures\Guid\GuidTrait;

use Validator, Exception;

/**
 * Model JaminanTanahBangunan_A
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
class JaminanTanahBangunan_A extends BaseModel
{
	use GuidTrait;

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
											'alamat_id'					,
											'tipe'						,
											'jenis_sertifikat'			,
											'nomor_sertifikat'			,
											'masa_berlaku_sertifikat'	,
											'atas_nama'					,
											'luas_tanah'				,
											'luas_bangunan'				,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'pengajuan_id'				=> 'max:255',
											'alamat_id'					=> 'max:255',
											'tipe'						=> 'in:tanah,tanah_bangunan,tambak',
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
	 * relationship alamat
	 *
	 * @return Kredit $model
	 */	
 	public function alamat()
	{
		return $this->belongsTo('TKredit\Pengajuan\Models\Alamat_A', 'alamat_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

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

	public function scopeNomorSertifikat($query, $value)
	{
		return $query->where('nomor_sertifikat', $value);
	}
}
