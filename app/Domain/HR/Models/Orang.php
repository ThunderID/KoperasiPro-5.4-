<?php

namespace App\Domain\HR\Models;

use App\Infrastructure\Models\BaseModel;

use App\Infrastructure\Traits\IDRTrait;
use App\Infrastructure\Traits\Legalities\NIKTrait;
use App\Infrastructure\Traits\TanggalTrait;
use App\Infrastructure\Traits\AlamatTrait;

use Exception, Hash;

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
 * @subpackage HR
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Orang extends BaseModel
{
	use NIKTrait;
	use IDRTrait;
	use AlamatTrait;
	use TanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'orang';

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
											'nip'					,
											'cif'					,
											'email'					,
											'password'				,
											'telepon'				,
											'pekerjaan'				,
											'penghasilan_bersih'	,
											'alamat'				,
											'tanggal_masuk'			,
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

	public function visas()
	{
		return $this->hasMany('App\Domain\Akses\Models\Visa', 'orang_id');
	}
	
	public function kredit()
	{
		return $this->hasMany('App\Domain\Pengajuan\Models\Pengajuan', 'orang_id');
	}

	/**
	 * relationship relasi
	 *
	 * @return Orang $model
	 */	
	public function relasi()
	{
		return $this->belongsToMany('App\Domain\HR\Models\Orang', 'relasi_orang', 'orang_id', 'relasi_id')->withPivot('hubungan')->wherenull('relasi_orang.deleted_at');
	}
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	protected function setPasswordAttribute($value)
	{
		if(Hash::needsRehash($value))
		{
			$value 					= Hash::make($value);
		}

		$this->attributes['password'] = $value;
	}

	protected function setEmailAttribute($value)
	{
		$exists 					= Orang::email($value)->notid($this->id)->first();
		if($exists)
		{
			throw new Exception("duplicate mail", 1);
		}

		$this->attributes['email'] 	= $value;
	}

	protected function setAlamatAttribute($value)
	{
		$this->attributes['alamat']	= $this->formatAlamatFrom($value);
	}

	/**
	 * set attribute tanggal lahir
	 *
	 * @param d/m/Y $value
	 */
	protected function setTanggalLahirAttribute($value)
	{
		if(!is_null($value))
		{
			$this->attributes['tanggal_lahir']	= $this->formatDateFrom($value);
		}
		unset($this->attributes['tanggal_lahir']);
	}

	/**
	 * set attribute tanggal lahir
	 *
	 * @param d/m/Y $value
	 */
	protected function setTanggalMasukAttribute($value)
	{
		if(!is_null($value))
		{
			$this->attributes['tanggal_masuk']	= $this->formatDateFrom($value);
		}
	}

	/**
	 * set attribute nik
	 *
	 * @param pp-kk-cc-hhbbtt-rrrr $value
	 */
	protected function setNikAttribute($value)
	{
		if(!is_null($value))
		{
			//1. Check duplikat nik
			$exists_person 						= Orang::where('nik', $value)->notid($this->id)->first();

			if($exists_person)
			{
				throw new Exception("NIK", 1);
			}

			$this->attributes['nik']			= $this->formatNIKFrom($value);
		}
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	protected function getTanggalLahirAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	protected function getAlamatAttribute($value)
	{
		return $this->formatAlamatTo($value);
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

	protected function getTanggalMasukAttribute($value)
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
		if(isset($value['id']) && !empty($value['id']) && !is_null($value['id']))
		{
			$relasi		= Relasi_A::findorfail($value['id']);
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
	public function setPekerjaanAttribute($value)
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
	public function setPenghasilanBersihAttribute($value)
	{
		if(!is_null($value))
		{
			//1. simpan penghasilan_bersih
			$this->attributes['penghasilan_bersih']	= $this->formatMoneyFrom($value);

			//2. it's a must to return value
		}
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

	public function scopeEmail($model, $variable)
	{
		return $model->where('email', $variable);
	}
}
