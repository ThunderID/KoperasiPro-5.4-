<?php

namespace Thunderlabid\Registry\Model;

/**
 * Used for AddressBook Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Model\Observers\AddressBookObserver;
use Thunderlabid\Registry\Model\Traits\LinkedListTrait;

/**
 * Model AddressBook
 *
 * Digunakan untuk menyimpan data alamat.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class AddressBook extends BaseModel
{
	use LinkedListTrait;

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'address_books';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'houses'				,
											'offices'				,

											'street'				,
											'city'					,
											'province'				,
											'country'				,
											'latitude'				,
											'longitude'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'houses.*.id'			=> 'max:255',
											'houses.*.name'			=> 'max:255',
											'offices.*.id'			=> 'max:255',
											'offices.*.name'		=> 'max:255',

											'street'				=> 'required|max:255',
											'city'					=> 'max:255',
											'province'				=> 'max:255',
											'country'				=> 'max:255',
											'latitude'				=> 'max:255',
											'longitude'				=> 'max:255',
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
 
        AddressBook::observe(new AddressBookObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
