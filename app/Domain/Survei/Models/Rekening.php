<?php

namespace App\Domain\Survei\Models;

use App\Infrastructure\Models\BaseModel;
use App\Infrastructure\Traits\GuidTrait;

use Validator, Exception;

use App\Infrastructure\Traits\IDRTrait;
use App\Infrastructure\Traits\TanggalTrait;

/**
 * Model Rekening
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
class Rekening extends BaseModel
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
											'id'				,
											'petugas_id'		,
											'pengajuan_id'		,
											'rekening'			,
											'nomor_rekening'	,
											'tanggal_awal'		,
											'tanggal_akhir'		,
											'saldo_awal'		,
											'saldo_akhir'		,
											'uraian'			,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'tanggal_awal'		=> 'date_format:"Y-m-d"',
											'tanggal_akhir'		=> 'date_format:"Y-m-d"',
											'saldo_awal'		=> 'numeric',
											'saldo_akhir'		=> 'numeric',
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

	public function getTanggalAwalAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	public function getTanggalAkhirAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	public function getSaldoAwalAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	public function getSaldoAkhirAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	public function setTanggalAwalAttribute($value)
	{
		$this->attributes['tanggal_awal']		= $this->formatDateFrom($value);
	}

	public function setTanggalAkhirAttribute($value)
	{
		$this->attributes['tanggal_akhir']		= $this->formatDateFrom($value);
	}

	public function setSaldoAwalAttribute($value)
	{
		$this->attributes['saldo_awal']			= $this->formatMoneyFrom($value);
	}

	public function setSaldoAkhirAttribute($value)
	{
		$this->attributes['saldo_akhir']		= $this->formatMoneyFrom($value);
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
}
