<?php

namespace Thunderlabid\Credit\Model;

/**
 * Used for Credit Models
 * 
 * @author cmooy
 */
use Thunderlabid\Credit\Model\Observers\CreditObserver;
use Thunderlabid\Credit\Model\Traits\LinkedListTrait;

/**
 * Model Credit
 *
 * Digunakan untuk menyimpan data alamat.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Credit extends BaseModel
{
	use LinkedListTrait;

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'credits';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'creditor'				,
											'credit_amount'			,
											'installment_capacity'	,
											'period'				,
											'purpose'				,
											'status'				,
											'warrantor'				,
											'collaterals'			,
											'statuses'				,
											'office'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'creditor.id'					=> 'required|max:255',
											'creditor.name'					=> 'max:255',
											
											'warrantor.id'					=> 'required|max:255',
											'warrantor.name'				=> 'max:255',

											'credit_amount'					=> 'numeric',
											'installment_capacity'			=> 'numeric',
											'period'						=> 'numeric',
											'purpose'						=> 'max:255',
											'status'						=> 'max:255',

											'statuses.*.status'				=> 'required|max:255',
											'statuses.*.description'		=> 'required|max:255',
											'statuses.*.date'				=> 'required|date_format:"Y-m-d"',
											'statuses.*.author.id'			=> 'required|max:255',
											'statuses.*.author.name'		=> 'required|max:255',
											'statuses.*.author.role'		=> 'required|max:255',
											
											'collaterals.*.type'			=> 'required|max:255',
											'collaterals.*.legal'			=> 'max:255',
											'collaterals.*.ownership_status'=> 'max:255',

											'office.id'						=> 'required|max:255',
											'office.name'					=> 'max:255',
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
 
        Credit::observe(new CreditObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
