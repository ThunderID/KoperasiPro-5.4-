<?php

namespace Thunderlabid\Registry\Model;

/**
 * Used for Finance Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Model\Observers\FinanceObserver;
use Thunderlabid\Registry\Model\Traits\LinkedListTrait;

/**
 * Model Finance
 *
 * Digunakan untuk menyimpan data alamat.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Finance extends BaseModel
{
	use LinkedListTrait;

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'finances';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'owner'				,
											'incomes'			,
											'expenses'			,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'owner.id'					=> 'required|max:255',
											'owner.name'				=> 'max:255',
											
											'incomes.*.description'		=> 'max:255',
											'incomes.*.amount'			=> 'numeric',

											'expenses.*.description'	=> 'max:255',
											'expenses.*.amount'			=> 'numeric',
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
 
        Finance::observe(new FinanceObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
