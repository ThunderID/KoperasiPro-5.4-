<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\AggregateTrait;

use Validator, Exception;

/**
 * Model telepon
 *
 * Digunakan untuk menyimpan data telepon Orang 
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Telepon_A extends BaseModel
{
	use GuidTrait;
	use AggregateTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'credit_telepon';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'credit_orang_id'		,
											'nomor'					,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'credit_orang_id'		=> 'max:255',
											'nomor'					=> 'max:255',
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

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	/**
	 * transform created at as tanggal
	 *
	 * @return d/m/Y $value
	 */	
	protected function getTanggalAttribute()
	{
		return $this->formatDateTo($this->created_at);
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
	 * set telepon Orang
	 * 
	 * @param Orang $orang
	 * @param array $value
	 * @return Telepon_A $model
	 */
	public function SetTelepon(Orang $orang, $value)
	{
		//1. simpan value
		$this->attributes['nomor'] 				= $value['nomor'];
		$this->attributes['credit_orang_id'] 	= $orang->id;

		$this->save();

		return $this;
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
