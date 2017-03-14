<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\EventRaiserTrait;

use Thunderlabid\Credit\Models\Traits\Policies\NIKTrait;
use Thunderlabid\Credit\Models\Traits\Policies\TanggalTrait;

use Thunderlabid\Credit\Exceptions\DuplicateException;

use Validator, Exception;

/**
 * Model orang
 *
 * Digunakan untuk menyimpan data orang.
 * Ketentuan : 
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Orang extends BaseModel
{
	use GuidTrait;
	use EventRaiserTrait;

	use NIKTrait;
	use TanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'credit_orang';

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
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'is_ektp'				=> 'boolean',
											'nik'					=> 'max:255',
											'nama'					=> 'required|max:255',
											'tanggal_lahir'			=> 'date_format:"Y-m-d"',
											'jenis_kelamin'			=> 'in:laki-laki,perempuan',
											'status_perkawinan'		=> 'in:kawin,belum_kawin,cerai,cerai_mati',
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
		//1. Check duplikat nik
		$exists_person 						= Orang::where('nik', $value)->notid($this->id)->first();

		if($exists_person)
		{
			throw new DuplicateException("NIK", 1);
		}

		$this->attributes['nik']			= $this->formatNIKFrom($value);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	protected function getTanggalLahirAttribute($value)
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
	
	/**
	 * fungsi simpan relasi orang
	 *
	 * @param array $value 
	 * @return Orang $orang 
	 */	
	public function tambahRelasi($value)
	{
		//1. simpan orang
		$relasi			= new Relasi_A;
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
	public function tambahTelepon($value)
	{
		//1. simpan telepon
		$telepon			= new Telepon_A;
		$telepon->tambahTelepon($this, $value);

		//2. it's a must to return value
		return $this;
	}
	
	/**
	 * fungsi simpan pekerjaan orang
	 *
	 * @param array $value 
	 * @return Orang $orang 
	 */	
	public function tambahPekerjaan($value)
	{
		//1. simpan pekerjaan
		$pekerjaan			= new Pekerjaan_A;
		$pekerjaan->tambahPekerjaan($this, $value);

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
		$alamat				= new AlamatRumah_A;
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
