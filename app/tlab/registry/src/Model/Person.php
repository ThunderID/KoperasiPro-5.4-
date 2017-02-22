<?php

namespace Thunderlabid\Registry\Model;

/**
 * Used for Person Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Model\Observers\PersonObserver;
use Thunderlabid\Registry\Model\Traits\LinkedListTrait;

/**
 * Model Person
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Person extends BaseModel
{
	use LinkedListTrait;
	
	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'persons';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'nik'					,
											'name'					,
											'place_of_birth'		,
											'date_of_birth'			,
											'gender'				,

											'religion'				,
											'highest_education'		,
											'marital_status'		,
											'phones'				,
											
											'works'					,
											'relatives'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'nik'					=> 'max:255',
											'name'					=> 'required|max:255',
											'place_of_birth'		=> 'max:255',
											'date_of_birth'			=> 'date_format:"Y-m-d"',
											'gender'				=> 'in:male,female',

											'religion'				=> 'max:255',
											'highest_education'		=> 'max:255',
											'marital_status'		=> 'max:255',
											'phones.*.number'		=> 'max:255',

											'works.*.position'		=> 'required|max:255',
											'works.*.area'			=> 'max:255',
											'works.*.since'			=> 'date_format:"Y-m-d"',
											'works.*.office.id'		=> 'max:255',
											'works.*.office.name'	=> 'max:255',

											'relatives.*.relation'	=> 'max:255',
											'relatives.*.id'		=> 'max:255',
											'relatives.*.name'		=> 'max:255',
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
 
        Person::observe(new PersonObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
