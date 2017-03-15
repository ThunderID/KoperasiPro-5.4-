<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\AggregateTrait;
use Thunderlabid\Credit\Models\Traits\EventRaiserTrait;

use Validator, Exception;

/**
 * Model LegalitasTanahBangunan_A
 *
 * Digunakan untuk menyimpan data legal tanah bangunan.
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class LegalitasTanahBangunan_A extends BaseModel
{
	use GuidTrait;
	use AggregateTrait;
	use EventRaiserTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'legalitas_tanah_bangunan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'						,
											'alamat_id'					,
											'tipe'						,
											'jenis_sertifikat'			,
											'nomor_sertifikat'			,
											'masa_berlaku_sertifikat'	,
											'luas'						,
											'atas_nama'					,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'tipe'						=> 'required|in:tanah,bangunan',
											'jenis_sertifikat'			=> 'required|in:shm,hgb',
											'nomor_sertifikat'			=> 'required|max:255',
											'masa_berlaku_sertifikat'	=> 'required|max:4|min:4',
											'luas'						=> 'required|numeric',
											'atas_nama'					=> 'required|max:255',
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
											'id', 
											'alamat_id',
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	/**
	 * relationship alamat
	 *
	 * @return LegalitasTanahBangunan_A $model
	 */	
	public function alamat()
	{
		return $this->belongsTo('Thunderlabid\Credit\Models\Alamat_A', 'alamat_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
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


	/**
	 * set tanah bangunan sebagai jaminan
	 * 
	 * @param Jaminan_A $jaminan
	 * @param array $value
	 * @return LegalitasTanahBangunan_A $model
	 */
	public function setJaminan(Jaminan_A $jaminan, $value)
	{
		//1. simpan alamat
		$alamat 					= new Alamat_A;
		$alamat 					= $alamat->fill($value['alamat']);
		$alamat->save();

		//2. simpan legalitas tanah bangunan
		$this->attributes['tipe'] 						= $value['tipe'];
		$this->attributes['jenis_sertifikat']			= $value['jenis_sertifikat'];
		$this->attributes['nomor_sertifikat']			= $value['nomor_sertifikat'];
		$this->attributes['masa_berlaku_sertifikat']	= $value['masa_berlaku_sertifikat'];
		$this->attributes['luas'] 						= $value['luas'];
		$this->attributes['atas_nama'] 					= $value['atas_nama'];
		$this->attributes['alamat_id']					= $alamat->id;
		
		$this->save();

		//3. it's a must to return value
		return $this;
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * pencarian berdasarkan nomor sertifikat
	 *
	 * @param string $variable
	 * @return LegalitasTanahBangunan_A $model
	 */
	public function scopeNomorSertifikat($model, $variable)
	{
		return $model->where('nomor_sertifikat', $variable);
	}
}
