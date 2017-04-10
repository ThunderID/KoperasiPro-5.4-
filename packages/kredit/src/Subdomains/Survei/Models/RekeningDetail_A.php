<?php

namespace TKredit\Survei\Models;

use TKredit\Infrastructures\Models\BaseModel;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\UbiquitousLibraries\Currencies\IDRTrait;
use TKredit\UbiquitousLibraries\Datetimes\TanggalTrait;

use Validator, Exception;

/**
 * Model RekeningDetail_A
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
class RekeningDetail_A extends BaseModel
{
	use GuidTrait;

	use IDRTrait;
	use TanggalTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'survei_rekening_detail';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'			,
											'rekening_id'	,
											'tanggal'		,
											'saldo'			,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'tanggal'		=> 'date_format:"Y-m-d"',
											'saldo'			=> 'numeric',
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
	
	/**
	 * relationship rekening
	 *
	 * @return Kredit $model
	 */	
 	public function rekening()
	{
		return $this->belongsTo('TKredit\Survei\Models\Rekening_A', 'rekening_id');
	}
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	public function getTanggalAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	public function getSaldoAttribute($value)
	{
		return $this->formatMoneyTo($value);
	}

	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	public function setTanggalAttribute($value)
	{
		$this->attributes['tanggal']		= $this->formatDateFrom($value);
	}

	public function setSaldoAttribute($value)
	{
		$this->attributes['saldo']			= $this->formatMoneyFrom($value);
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
