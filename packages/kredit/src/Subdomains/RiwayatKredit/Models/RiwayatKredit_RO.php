<?php

namespace TKredit\RiwayatKredit\Models;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\UbiquitousLibraries\Datetimes\TanggalTrait;

use TKredit\Infrastructures\Models\BaseModel;

use Validator, Exception;

/**
 * Model RiwayatKredit_RO
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage RiwayatKredit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class RiwayatKredit_RO extends BaseModel
{
	use GuidTrait;

	use TanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'riwayat_kredit';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'nomor_kredit'			,
											'nomor_dokumen_kredit'	,
											'status'				,
											'tanggal'				,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'nomor_kredit'			=> 'max:255',
											'nomor_dokumen_kredit'	=> 'max:255',
											'pengajuan_kredit'		=> 'numeric',
											'status'				=> 'in:survei,pengajuan,menunggu_persetujuan,menunggu_realisasi,terealisasi',
											'tanggal'				=> 'date_format:"Y-m-d"',
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
											// 'nomor_dokumen_kredit', 
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];

	protected $appends 				= ['kreditur'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	protected function setTanggalAttribute($value)
	{
		$this->attributes['tanggal']			= $this->formatDateFrom($value);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	protected function getTanggalAttribute($value)
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
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	public function scopeNomorDokumenKredit($query, $value)
	{
		return $query->where('nomor_dokumen_kredit', $value);
	}

	public function scopeStatus($query, $value)
	{
		if(is_array($value))
		{
			return $query->whereIn('status', $value);
		}

		return $query->where('status', $value);
	}
}
