<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Observers\KreditObserver;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\EventRaiserTrait;

use Thunderlabid\Credit\Models\Traits\Policies\IDRTrait;
use Thunderlabid\Credit\Models\Traits\Policies\TanggalTrait;
use Thunderlabid\Credit\Models\Traits\Policies\NomorKreditTrait;
use Thunderlabid\Credit\Models\Traits\Policies\StatusTanggalTrait;

use Thunderlabid\Credit\Exceptions\IndirectModificationException;

use Validator, Exception;

/**
 * Model Kredit
 *
 * Digunakan untuk menyimpan data kredit.
 * Ketentuan : 
 * 	- beberapa bisa direct changes, beberapa harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Kredit extends BaseModel
{
	use GuidTrait;
	use EventRaiserTrait;

	use IDRTrait;
	use TanggalTrait;
	use NomorKreditTrait;

	use StatusTanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'kredit';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'jenis_kredit'			,
											'nomor_kredit'			,
											'pengajuan_kredit'		,
											'jangka_waktu'			,
											'status'				,
											'kreditur_id'	,
											'ro_koperasi_id'	,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'jenis_kredit'			=> 'in:pa,pt,rumah_delta',
											'nomor_kredit'			=> 'max:255',
											'pengajuan_kredit'		=> 'numeric',
											'jangka_waktu'			=> 'numeric|in:6,10,12,18,24,30,36,42,48,54,60',
											'status'				=> 'max:255',
											'kreditur_id'	=> 'max:255',
											'ro_koperasi_id'	=> 'max:255',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];
	
	/**
	 * hidden data
	 *
	 * @var array
	 */
	protected $hidden				= 	[
											'created_at', 
											'updated_at', 
											'deleted_at', 
											'kreditur_id', 
											'ro_koperasi_id', 
										];

	/**
	 * data mutator
	 *
	 * @var array
	 */
    protected $appends 				= ['tanggal_pengajuan'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/**
	 * relationship kreditur
	 *
	 * @return Kredit $model
	 */	
 	public function kreditur()
	{
		return $this->belongsTo('Thunderlabid\Credit\Models\Orang', 'kreditur_id');
	}
	
	/**
	 * relationship riwayat_status
	 *
	 * @return Kredit $model
	 */	
 	public function riwayat_status()
	{
		return $this->hasMany('Thunderlabid\Credit\Models\Status_A', 'kredit_id');
	}


	/**
	 * relationship jaminan kendaraan
	 *
	 * @return Kredit $model
	 */	
	public function jaminan_kendaraan()
	{
		return $this->belongstomany('Thunderlabid\Credit\Models\LegalitasKendaraan_A', 'jaminan', 'kredit_id', 'legalitas_kendaraan_id');
	}

	/**
	 * relationship jaminan tanah bangunan
	 *
	 * @return Kredit $model
	 */	
	public function jaminan_tanah_bangunan()
	{
		return $this->belongstomany('Thunderlabid\Credit\Models\LegalitasTanahBangunan_A', 'jaminan', 'kredit_id', 'legalitas_tanah_bangunan_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	/**
	 * disable direct set status
	 *
	 * @return IndirectModificationException $e
	 */	
	protected function setStatusAttribute($value)
	{
		throw new IndirectModificationException('status', 1);
	}
	
	/**
	 * formatting pengajuan kredit menjadi numeric dengan mata uang rupiah
	 *
	 * @param string $value ["Rp 200.000.000"]
	 */	
	protected function setPengajuanKreditAttribute($value)
	{
		$this->attributes['pengajuan_kredit']	= $this->formatMoneyFrom($value);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/**
	 * formatting pengajuan kredit menjadi mata uang rupiah dari numeric
	 *
	 * @param numeric $value [200000000]
	 * @return string $value ["Rp 200.000.000"]
	 */	
	protected function getPengajuanKreditAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/
	
	/**
	 * fungsi simpan kreditur
	 *
	 * @param array $value 
	 * @return Kredit $kredit 
	 */	
	public function SetKreditur($value)
	{
		//1. Store kredit
		$kreditur 			= Orang::nik($value['nik'])->first();
		
		if(!$kreditur)
		{
			$kreditur 		= new Orang;
		}

		$kreditur 			= $kreditur->fill($value);

		if(isset($value['telepon']))
		{
			$kreditur->setTelepon($value['telepon']);
		}

		if(isset($value['pekerjaan']))
		{
			$kreditur->setPekerjaan($value['pekerjaan']);
		}

		if(isset($value['penghasilan_bersih']))
		{
			$kreditur->setPenghasilanBersih($value['penghasilan_bersih']);
		}

		if(isset($value['foto_ktp']))
		{
			$kreditur->setFotoKTP($value['foto_ktp']);
		}

		$kreditur->save();
		
		$this->attributes['kreditur_id']	= $kreditur->id;

		return $this;
	}
	
	/**
	 * fungsi simpan koperasi
	 *
	 * @param array $value 
	 * @return Kredit $kredit 
	 */	
	public function SetKoperasi($value)
	{
		//1. Store koperasi
		$koperasi 			= Koperasi_RO::findornew($value['id']);
		$koperasi 			= $koperasi->fill($value);
		$koperasi->save();

		$this->attributes['ro_koperasi_id']	= $koperasi->id;

		return $this;
	}
	
	/**
	 * fungsi simpan status terbaru
	 *
	 * @param array $value 
	 * @return Kredit $kredit 
	 */	
	public function SetStatus($value)
	{
		//1. set status
		$status			= new Status_A;
		$status->setStatus($this, $value);

		//2. set this status
		$this->attributes['status']		= $value['status'];

		//3. it's a must to return value
		return $this;
	}
	
	/**
	 * fungsi simpan jaminan kendaraan
	 *
	 * @param array $value 
	 * @return Kredit $kredit 
	 */	
	public function tambahJaminanKendaraan($value)
	{
		//1. simpan jaminan
		$jaminan			= new Jaminan_A;
		$jaminan->tambahJaminanKendaraan($this, $value);

		//2. it's a must to return value
		return $this;
	}
		
	/**
	 * fungsi hapus jaminan kendaraan
	 *
	 * @param array $nomor_bpkb 
	 * @return Kredit $kredit 
	 */	
	public function hapusJaminanKendaraan($nomor_bpkb)
	{
		//1. hapus jaminan
		$jaminan			= new Jaminan_A;
		$jaminan->hapusJaminanKendaraan($this, $nomor_bpkb);

		//2. it's a must to return nomor_bpkb
		return $this;
	}
		
	/**
	 * fungsi hapus jaminan tanah bangunan
	 *
	 * @param array $nomor_sertifikat 
	 * @return Kredit $kredit 
	 */	
	public function hapusJaminanTanahBangunan($nomor_sertifikat)
	{
		//1. hapus jaminan
		$jaminan			= new Jaminan_A;
		$jaminan->hapusJaminanTanahBangunan($this, $nomor_sertifikat);

		//2. it's a must to return nomor_sertifikat
		return $this;
	}


	/**
	 * fungsi simpan jaminan tanah bangunan
	 *
	 * @param array $value 
	 * @return Kredit $kredit 
	 */	
	public function tambahJaminanTanahBangunan($value)
	{
		//1. simpan jaminan
		$jaminan			= new Jaminan_A;
		$jaminan->tambahJaminanTanahBangunan($this, $value);

		//2. it's a must to return value
		return $this;
	}


	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();

        Kredit::observe(new KreditObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * pencarian berdasarkan status kredit
	 *
	 * @param string $variable
	 * @return Kredit $model
	 */
	public function scopeStatus($model, $variable)
	{
		if(is_array($variable))
		{
			return $model->whereIn('kredit.status', $variable);
		}

		return $model->where('kredit.status', $variable);
	}

	/**
	 * pencarian berdasarkan id koperasi
	 *
	 * @param string $variable
	 * @return Kredit $model
	 */
	public function scopeKoperasi($model, $variable)
	{
		return $model->where('ro_koperasi_id', $variable);
	}

	/**
	 * pencarian berdasarkan id koperasi
	 *
	 * @param string $variable
	 * @return Kredit $model
	 */
	public function scopeKreditur($model, $variable)
	{
		return $model->whereHas('kreditur', function($q)use($variable){return $q->nama($variable);});
	}

	/**
	 * pencarian berdasarkan nomor kredit
	 *
	 * @param string $variable
	 * @return Kredit $model
	 */
	public function scopeNomorKredit($model, $variable)
	{
		return $model->where('nomor_kredit', $variable);
	}
}
