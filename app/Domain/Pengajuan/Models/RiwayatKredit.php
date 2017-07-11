<?php

namespace App\Domain\Pengajuan\Models;

use App\Infrastructure\Models\BaseModel;
use App\Infrastructure\Traits\GuidTrait;

use Validator, Exception;

use App\Infrastructure\Traits\TanggalTrait;

/**
 * Model RiwayatKredit
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Pengajuan
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class RiwayatKredit extends BaseModel
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
											'pengajuan_id'			,
											'petugas_id'			,
											'status'				,
											'tanggal'				,
											'uraian'				,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'pengajuan_id'			=> 'max:255',
											'status'				=> 'in:survei,pengajuan,menunggu_persetujuan,menunggu_realisasi,realisasi,tolak,lunas',
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
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	protected function setTanggalAttribute($value)
	{
		$this->attributes['tanggal']		= $this->formatDateFrom($value);
	}

	protected function setUraianAttribute($value)
	{
		$this->attributes['uraian']			= json_encode($value);
	}
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	protected function getTanggalAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	protected function getUraianAttribute($value)
	{
		return json_decode($value, true);
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
