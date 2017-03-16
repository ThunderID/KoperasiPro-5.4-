<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\AggregateTrait;

use Validator, Exception;

/**
 * Model Alamat_A
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Alamat_A extends BaseModel
{
	use GuidTrait;
	use AggregateTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'alamat';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'				,
											'alamat'			,
											'rt'				,
											'rw'				,
											'desa'				,
											'distrik'			,
											'regensi'			,
											'provinsi'			,
											'negara'			,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'alamat'			=> 'max:255',
											'rt'				=> 'max:255',
											'rw'				=> 'max:255',
											'desa'				=> 'max:255',
											'distrik'			=> 'max:255',
											'regensi'			=> 'max:255',
											'provinsi'			=> 'max:255',
											'negara'			=> 'max:255',
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
