<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\AggregateTrait;
use Thunderlabid\Credit\Models\Traits\EventRaiserTrait;

use Validator, Exception;

/**
 * Model LegalitasKendaraan_A
 *
 * Digunakan untuk menyimpan data legal kendaraan.
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class LegalitasKendaraan_A extends BaseModel
{
	use GuidTrait;
	use AggregateTrait;
	use EventRaiserTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'legalitas_kendaraan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'				,
											'tipe'				,
											'merk'				,
											'tahun'				,
											'nomor_bpkb'		,
											'atas_nama'			,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'tipe'				=> 'required|in:roda_2,roda_4,roda_6',
											'merk'				=> 'required|in:honda,yamaha,suzuki,kawasaki,mitsubishi,toyota,nissan,kia,daihatsu,isuzu',
											'tahun'				=> 'required|max:4|min:4',
											'nomor_bpkb'		=> 'required',
											'atas_nama'			=> 'required'
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
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * set kendaraaan sebagai jaminan
	 * 
	 * @param Jaminan_A $jaminan
	 * @param array $value
	 * @return LegalitasKendaraan_A $model
	 */
	public function setJaminan(Jaminan_A $jaminan, $value)
	{
		//1. simpan legalitas kendaraan
		$this->attributes['tipe'] 				= $value['tipe'];
		$this->attributes['merk'] 				= $value['merk'];
		$this->attributes['tahun'] 				= $value['tahun'];
		$this->attributes['nomor_bpkb'] 		= $value['nomor_bpkb'];
		$this->attributes['atas_nama'] 			= $value['atas_nama'];
		
		$this->save();

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
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * pencarian berdasarkan nomor bpkb
	 *
	 * @param string $variable
	 * @return LegalitasKendaraan_A $model
	 */
	public function scopeNomorBPKB($model, $variable)
	{
		return $model->where('nomor_bpkb', $variable);
	}
}
