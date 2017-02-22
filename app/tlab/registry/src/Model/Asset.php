<?php

namespace Thunderlabid\Registry\Model;

/**
 * Used for Asset Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Model\Observers\AssetObserver;
use Thunderlabid\Registry\Model\Traits\LinkedListTrait;

/**
 * Model Asset
 *
 * Digunakan untuk menyimpan data alamat.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Asset extends BaseModel
{
	use LinkedListTrait;

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'assets';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'owner'			,
											'assets'		,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'owner.id'						=> 'required|max:255',
											'owner.name'					=> 'max:255',
											
											'houses.*.ownership_status'		=> 'max:255',
											'houses.*.since'				=> 'date_format:"Y-m-d"',
											'houses.*.to'					=> 'date_format:"Y-m-d"',
											'houses.*.installment'			=> 'numeric',
											'houses.*.installment_period'	=> 'numeric',
											'houses.*.size'					=> 'numeric',
											'houses.*.worth'				=> 'numeric',

											'companies.*.ownership_status'	=> 'max:255',
											'companies.*.share'				=> 'numeric',
											'companies.*.name'				=> 'max:255',
											'companies.*.area'				=> 'max:255',
											'companies.*.since'				=> 'date_format:"Y-m-d"',
											'companies.*.worth'				=> 'numeric',

											'vehicles.*.four_wheels'		=> 'numeric',
											'vehicles.*.two_wheels'			=> 'numeric',
											'vehicles.*.worth'				=> 'numeric',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();
 
        Asset::observe(new AssetObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
