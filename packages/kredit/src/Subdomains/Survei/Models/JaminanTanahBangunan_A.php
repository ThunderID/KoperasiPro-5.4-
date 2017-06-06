<?php

namespace TKredit\Survei\Models;

use TKredit\Infrastructures\Models\BaseModel;

use TKredit\Survei\Models\Observers\JaminanTanahBangunan_AObserver;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\UbiquitousLibraries\Currencies\IDRTrait;

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
 * @subpackage Survei
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class JaminanTanahBangunan_A extends BaseModel
{
	use GuidTrait;

	use IDRTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'survei_jaminan_tanah_bangunan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'						,
											'survei_id'					,
											'alamat_id'					,
											'tipe'						,
											'jenis_sertifikat'			,
											'nomor_sertifikat'			,
											'masa_berlaku_sertifikat'	,
											'atas_nama'					,
											'luas_tanah'				,
											'luas_bangunan'				,
											'fungsi_bangunan'			,
											'bentuk_bangunan'			,
											'konstruksi_bangunan'		,
											'lantai_bangunan'			,
											'dinding'					,
											'listrik'					,
											'air'						,
											'jalan'						,
											'lebar_jalan'				,
											'letak_lokasi_terhadap_jalan'	,
											'lingkungan'				,
											'nilai_jaminan'				,
											'taksasi_tanah'				,
											'taksasi_bangunan'			,
											'njop'						,
											'uraian'					,
											'url_barcode'				,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'survei_id'					=> 'max:255',
											'alamat_id'					=> 'max:255',
											'tipe'						=> 'in:tanah,tanah_bangunan,bangunan,tambak',
											'jenis_sertifikat'			=> 'max:255',
											'nomor_sertifikat'			=> 'max:255',
											'masa_berlaku_sertifikat'	=> 'min:4|max:4',
											'atas_nama'					=> 'max:255',
											'luas_tanah'				=> 'numeric',
											'luas_bangunan'				=> 'numeric',
											'fungsi_bangunan'			=> 'in:rumah,ruko',
											'bentuk_bangunan'			=> 'in:tingkat,tidak_tingkat,lain_lain',
											'konstruksi_bangunan'		=> 'in:permanen,semi_permanen,lain_lain',
											'lantai_bangunan'			=> 'in:tanah,keramik,ubin,tegel,lain_lain',
											'dinding'					=> 'in:bambu,kayu,tembok,lain_lain',
											'listrik'					=> 'in:450_watt,900_watt,1300_watt',
											'air'						=> 'in:sumur,pdam',
											'jalan'						=> 'in:batu,aspal,tanah',
											'lebar_jalan'				=> 'max:255',
											'letak_lokasi_terhadap_jalan'	=> 'in:sama_dengan_jalan,lebih_rendah_dari_jalan,lebih_tinggi_dari_jalan',
											'lingkungan'				=> 'in:perumahan,perkantoran,pasar,pertokoan,industri,kampung,lain_lain',
											'nilai_jaminan'				=> 'numeric',
											'taksasi_tanah'				=> 'numeric',
											'taksasi_bangunan'			=> 'numeric',
											'njop'						=> 'numeric',
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
	 * relationship survei
	 *
	 * @return Kredit $model
	 */	
 	public function survei()
	{
		return $this->belongsTo('TKredit\Survei\Models\Survei', 'survei_id');
	}
	
	/**
	 * relationship alamat
	 *
	 * @return Kredit $model
	 */	
 	public function alamat()
	{
		return $this->belongsTo('TKredit\Survei\Models\Alamat_A', 'alamat_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	public function getNilaiJaminanAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	public function getTaksasiTanahAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	public function getTaksasiBangunanAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	public function getNjopAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	public function setNilaiJaminanAttribute($value)
	{
		$this->attributes['nilai_jaminan']				= $this->formatMoneyFrom($value);
	}

	public function setTaksasiTanahAttribute($value)
	{
		$this->attributes['taksasi_tanah']				= $this->formatMoneyFrom($value);
	}

	public function setTaksasiBangunanAttribute($value)
	{
		$this->attributes['taksasi_bangunan']			= $this->formatMoneyFrom($value);
	}

	public function setNjopAttribute($value)
	{
		$this->attributes['njop']						= $this->formatMoneyFrom($value);
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
		
        JaminanTanahBangunan_A::observe(new JaminanTanahBangunan_AObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	public function scopeNomorSertifikat($query, $value)
	{
		return $query->where('nomor_sertifikat', $value);
	}
}
