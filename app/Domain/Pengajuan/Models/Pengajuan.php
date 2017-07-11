<?php

namespace App\Domain\Pengajuan\Models;

use App\Infrastructure\Models\BaseModel;
use App\Infrastructure\Traits\GuidTrait;

use App\Infrastructure\Traits\IDRTrait;
use App\Infrastructure\Traits\TanggalTrait;

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
class Pengajuan extends BaseModel
{
	use GuidTrait;

	use IDRTrait;
	use TanggalTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'pengajuan_kredit';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'jenis_kredit'			,
											'jangka_waktu'			,
											'pengajuan_kredit'		,
											'tanggal_pengajuan'		,
											'status'				,
											'orang_id'				,
											'petugas_id'			,
											'akses_koperasi_id'		,
											'hp_id'					,
											'spesimen_ttd'			,
											'foto_ktp'				,
											'nomor_kredit'			,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'jenis_kredit'			=> 'in:pa,pt,rumah_delta,lain_lain',
											'pengajuan_kredit'		=> 'required|numeric|min:2500000',
											'tanggal_pengajuan'		=> 'date_format:"Y-m-d"',
											'jangka_waktu'			=> 'numeric|in:6,10,12,18,24,30,36,42,48,54,60',
											'petugas_id'			=> 'max:255',
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
										];

	/**
	 * data mutator
	 *
	 * @var array
	 */
    protected $appends 				= [];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	/**
	 * relationship koperasi
	 *
	 * @return Kredit $model
	 */	
 	public function koperasi()
	{
		return $this->belongsTo('App\Domain\Akses\Models\Koperasi', 'akses_koperasi_id');
	}

	/**
	 * relationship hp
	 *
	 * @return Kredit $model
	 */	
 	public function hp()
	{
		return $this->belongsTo('App\Domain\Akses\Models\Mobile', 'hp_id');
	}

	/**
	 * relationship kreditur
	 *
	 * @return Kredit $model
	 */	
 	public function debitur()
	{
		return $this->belongsTo('App\Domain\HR\Models\Orang', 'orang_id');
	}

	/**
	 * relationship referensi
	 *
	 * @return Kredit $model
	 */	
 	public function marketing()
	{
		return $this->belongsTo('App\Domain\HR\Models\Orang', 'petugas_id');
	}


	/**
	 * relationship jaminan kendaraan
	 *
	 * @return Kredit $model
	 */	
	public function jaminan_kendaraan()
	{
		return $this->hasMany('App\Domain\Pengajuan\Models\JaminanKendaraan', 'pengajuan_id');
	}

	/**
	 * relationship jaminan tanah bangunan
	 *
	 * @return Kredit $model
	 */	
	public function jaminan_tanah_bangunan()
	{
		return $this->hasMany('App\Domain\Pengajuan\Models\JaminanTanahBangunan', 'pengajuan_id');
	}

	public function survei_kepribadian()
	{
		return $this->hasMany('App\Domain\Survei\Models\Kepribadian', 'pengajuan_id');
	}

	public function survei_nasabah()
	{
		return $this->hasone('App\Domain\Survei\Models\Nasabah', 'pengajuan_id');
	}

	public function survei_aset_usaha()
	{
		return $this->hasMany('App\Domain\Survei\Models\AsetUsaha', 'pengajuan_id');
	}

	public function survei_aset_tanah_bangunan()
	{
		return $this->hasMany('App\Domain\Survei\Models\AsetTanahBangunan', 'pengajuan_id');
	}

	public function survei_aset_kendaraan()
	{
		return $this->hasMany('App\Domain\Survei\Models\AsetKendaraan', 'pengajuan_id');
	}

	public function survei_rekening()
	{
		return $this->hasMany('App\Domain\Survei\Models\Rekening', 'pengajuan_id');
	}

	public function survei_keuangan()
	{
		return $this->hasMany('App\Domain\Survei\Models\Keuangan', 'pengajuan_id');
	}

	public function riwayat_status()
	{
		return $this->hasMany('App\Domain\Pengajuan\Models\RiwayatKredit', 'pengajuan_id');
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

	/**
	 * simpan jenis kredit
	 *
	 * @param string $value
	 */	
	protected function setJenisKreditAttribute($value)
	{
		$this->attributes['jenis_kredit']		= strtolower($value);
	}

	public function setTanggalPengajuanAttribute($value)
	{
		$this->attributes['tanggal_pengajuan']	= $this->formatDateFrom($value);
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

	public function getTanggalPengajuanAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * fungsi simpan koperasi
	 *
	 * @param array $value 
	 * @return Kredit $kredit 
	 */	
	public function SetPetugas($value)
	{
		//1. simpan status
		//1a. simpan petugas
		$petugas			= new Petugas_RO;
		$petugas_ro			= $petugas->findornew($value['petugas']['id']);
		$petugas_ro->fill([
			'id' 	=> $value['petugas']['id'],
			'nama' 	=> $value['petugas']['nama'],
			'role' 	=> $value['petugas']['role'],
		]);

		$petugas_ro->save();

		//1b. simpan value
		$this->attributes['ro_petugas_id'] 			= $petugas_ro->id;

		$this->save();

		return $this;
	}


	/**
	 * fungsi simpan spesimen_ttd kredit
	 *
	 * @param string $value 
	 * @return Kredit $kredit 
	 */	
	public function setSpesimenTTD($value)
	{
		//1. simpan spesimen_ttd
		$this->attributes['spesimen_ttd']	= $value;

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

        // Pengajuan::observe(new PengajuanObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * pencarian berdasarkan id koperasi
	 *
	 * @param string $variable
	 * @return Pengajuan $model
	 */
	public function scopeNamaDebitur($model, $variable)
	{
		return $model->whereHas('debitur', function($q)use($variable){return $q->nama($variable);});
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
