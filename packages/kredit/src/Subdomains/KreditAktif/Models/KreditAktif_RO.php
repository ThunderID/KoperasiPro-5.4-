<?php

namespace TKredit\KreditAktif\Models;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\UbiquitousLibraries\Currencies\IDRTrait;
use TKredit\UbiquitousLibraries\Datetimes\TanggalTrait;

use TKredit\Infrastructures\Models\BaseModel;

use Validator, Exception;

/**
 * Model KreditAktif_RO
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage KreditAktif
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class KreditAktif_RO extends BaseModel
{
	use GuidTrait;

	use IDRTrait;
	use TanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'kredit_aktif';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'nomor_kredit'			,
											'nomor_dokumen_kredit'	,
											'pengajuan_kredit'		,
											'status'				,
											'tanggal'				,
											'nama_kreditur'			,
											'ro_koperasi_id'		,
											'ro_mobile_model_id'	,
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
											'status'				=> 'in:survei,pengajuan,menunggu_persetujuan,menunggu_realisasi,terealisasi,tolak',
											'tanggal'				=> 'date_format:"Y-m-d"',
											'nama_kreditur'			=> 'max:255',
											'ro_koperasi_id'		=> 'max:255',
											'ro_mobile_model_id'	=> 'max:255',
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
	public function cabang()
	{
		return $this->belongsTo('TImmigration\Models\Koperasi_RO', 'ro_koperasi_id');
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

	protected function setTanggalAttribute($value)
	{
		$this->attributes['tanggal']			= $this->formatDateFrom($value);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	protected function getIdAttribute($value)
	{
		return $this->attributes['nomor_dokumen_kredit'];
	}

	protected function getPengajuanKreditAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	protected function getTanggalAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	protected function getKrediturAttribute($value)
	{
		return ['nama' => $this->nama_kreditur];
	}

	protected function getNomorKreditAttribute($value)
	{
		if($value == 0)
		{
			return '';
		}

		return $value;
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
		if(is_array($value))
		{
			return $query->whereIn('nomor_dokumen_kredit', $value);
		}

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

	public function scopeKoperasi($query, $value)
	{
		if(is_array($value))
		{
			return $query->whereIn('ro_koperasi_id', $value);
		}

		return $query->where('ro_koperasi_id', $value);
	}

	public function scopeKreditur($query, $value)
	{
		return $query->where('nama_kreditur', 'like', '%'.$value.'%');
	}
}
