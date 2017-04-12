<?php

namespace TKredit\Pengajuan\Models;

use TKredit\Infrastructures\Models\BaseModel;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\UbiquitousLibraries\Currencies\IDRTrait;
use TKredit\UbiquitousLibraries\Legalities\NIKTrait;
use TKredit\UbiquitousLibraries\Datetimes\TanggalTrait;

/**
 * Model Kredit
 *
 * Digunakan untuk menyimpan data kredit.
 * Ketentuan : 
 * 	- beberapa bisa direct changes, beberapa harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    TKredit
 * @subpackage Pengajuan
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Orang extends BaseModel
{
	use GuidTrait;

	use NIKTrait;
	use IDRTrait;
	use TanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'pengajuan_orang';

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
											// 'telepon'				,
											// 'pekerjaan'				,
											// 'penghasilan_bersih'	,
											// 'foto_ktp'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'is_ektp'				=> 'boolean',
											'nik'					=> 'max:255',
											'nama'					=> 'max:255',
											'tanggal_lahir'			=> 'date_format:"Y-m-d"',
											'jenis_kelamin'			=> 'in:laki-laki,perempuan',
											'status_perkawinan'		=> 'in:kawin,belum_kawin,cerai,cerai_mati',
											// 'penghasilan_bersih'	=> 'numeric',
											// 'foto_ktp'				=> 'max:255',
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
    protected $hidden				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	
	/**
	 * relationship alamat
	 *
	 * @return Orang $model
	 */	
	public function alamat()
	{
		return $this->belongstomany('TKredit\Pengajuan\Models\Alamat_A', 'pengajuan_alamat_rumah', 'orang_id', 'alamat_id')->withPivot('tipe');
	}

	
	/**
	 * relationship relasi
	 *
	 * @return Orang $model
	 */	
	public function relasi()
	{
		return $this->hasMany('TKredit\Pengajuan\Models\Relasi_A', 'orang_id');
	}
	
	/**
	 * relationship kredit
	 *
	 * @return Orang $model
	 */	
	public function kredit()
	{
		return $this->hasMany('TKredit\Pengajuan\Models\Pengajuan', 'kreditur_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	
	/**
	 * set attribute tanggal lahir
	 *
	 * @param d/m/Y $value
	 */
	protected function setTanggalLahirAttribute($value)
	{
		$this->attributes['tanggal_lahir']	= $this->formatDateFrom($value);
	}

	/**
	 * set attribute nik
	 *
	 * @param pp-kk-cc-hhbbtt-rrrr $value
	 */
	protected function setNikAttribute($value)
	{
		// //1. Check duplikat nik
		// $exists_person 						= Orang::where('nik', $value)->notid($this->id)->first();

		// if($exists_person)
		// {
		// 	throw new DuplicateException("NIK", 1);
		// }

		$this->attributes['nik']			= $this->formatNIKFrom($value);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	protected function getTanggalLahirAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	/**
	 * set attribute penghasilan bersih 
	 *
	 * @return string $value ["Rp 2.000.000"]
	 */
	protected function getPenghasilanBersihAttribute($value)
	{
		return $this->formatMoneyTo($value);
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
	
	/**
	 * fungsi simpan relasi orang
	 *
	 * @param array $value 
	 * @return Orang $orang 
	 */	
	public function tambahRelasi($value)
	{
		//1. simpan orang
		if(isset($this->value['id']) && !empty($this->value['id']) && !is_null($this->value['id']))
		{
			$relasi		= Relasi_A::findorfail($this->value['id']);
		}
		else
		{
			$relasi		= new Relasi_A;
		}

		$relasi->tambahRelasi($this, $value);

		//2. it's a must to return value
		return $this;
	}
	
	/**
	 * fungsi simpan telepon orang
	 *
	 * @param array $value 
	 * @return Orang $orang 
	 */	
	public function setTelepon($value)
	{
		//1. simpan telepon
		$this->attributes['telepon']	= $value;

		//2. it's a must to return value
		return $this;
	}
	
	/**
	 * fungsi simpan pekerjaan orang
	 *
	 * @param array $value 
	 * @return Orang $orang 
	 */	
	public function setPekerjaan($value)
	{
		//1. simpan pekerjaan
		$this->attributes['pekerjaan']	= $value;

		//2. it's a must to return value
		return $this;
	}

	/**
	 * set attribute penghasilan bersih 
	 *
	 * @param string $value ["Rp 2.000.000"]
	 */
	public function setPenghasilanBersih($value)
	{
		//1. simpan penghasilan_bersih
		$this->attributes['penghasilan_bersih']	= $this->formatMoneyFrom($value);

		//2. it's a must to return value
		return $this;
	}

	/**
	 * fungsi simpan foto_ktp orang
	 *
	 * @param array $value 
	 * @return Orang $orang 
	 */	
	public function setFotoKTP($value)
	{
		//1. simpan foto_ktp
		$this->attributes['foto_ktp']	= $value;

		//2. it's a must to return value
		return $this;
	}

	/**
	 * fungsi simpan alamat orang
	 *
	 * @param array $value 
	 * @return Orang $orang 
	 */	
	public function tambahAlamatRumah($value)
	{
		//1. simpan alamat
		if(isset($this->value['id']) && !empty($this->value['id']) && !is_null($this->value['id']))
		{
			$alamat		= AlamatRumah_A::findorfail($this->value['id']);
		}
		else
		{
			$alamat		= new AlamatRumah_A;
		}

		$alamat->tambahAlamatRumah($this, $value);

		//2. it's a must to return value
		return $this;
	}
	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
	
	/**
	 * pencarian berdasarkan nama orang (mirip)
	 *
	 * @param string $variable
	 * @return Orang $model
	 */
	public function scopeNama($model, $variable)
	{
		return $model->where('nama', 'like', '%'.$variable.'%');
	}

	/**
	 * pencarian berdasarkan nik orang
	 *
	 * @param string $variable
	 * @return Orang $model
	 */
	public function scopeNik($model, $variable)
	{
		return $model->where('nik', $variable);
	}
}
