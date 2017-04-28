<?php

namespace TKredit\Survei\Models;

use TKredit\Infrastructures\Models\BaseModel;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\UbiquitousLibraries\Currencies\IDRTrait;
use TKredit\UbiquitousLibraries\Datetimes\TanggalTrait;

use Validator, Exception;

/**
 * Model Rekening_A
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Survei
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Rekening_A extends BaseModel
{
	use GuidTrait;

	use IDRTrait;
	use TanggalTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'survei_rekening';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'			,
											'survei_id'		,
											'nama_bank'		,
											'atas_nama'		,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'nama_bank'		=> 'max:255',
											'atas_nama'		=> 'max:255',
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
	protected $appends 				= 	[
											'saldo_awal',
											'saldo_akhir',
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
	 * relationship details
	 *
	 * @return Kredit $model
	 */	
 	public function details()
	{
		return $this->hasMany('TKredit\Survei\Models\RekeningDetail_A', 'rekening_id')->orderby('tanggal', 'asc');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	public function getSaldoAwalAttribute($value)
	{
		$saldo_akhir 	= "Rp 0";
		if($this->details()->count())
		{
			$saldo_akhir 	= $this->details[0]['saldo'];
		}

		return $saldo_akhir;
	}

	public function getSaldoAkhirAttribute($value)
	{
		$saldo_akhir 	= "Rp 0";
		if($this->details()->count())
		{
			$saldo_akhir 	= $this->details[($this->details()->count() - 1)]['saldo'];
		}

		return $saldo_akhir;
	}


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

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
