<?php 

namespace TKredit\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator, Exception;

/**
 * Model Person
 *
 * Abstract class for mongo models Models
 *
 * @package    TKredit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
abstract class BaseModel extends Model 
{
	/**
	 * use soft delete trait
	 *
	 */
	use SoftDeletes;

	protected $keyType 	= 'string';

	public $incrementing = false;

	/* ---------------------------------------------------------------------------- ERRORS ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/
	
	/**
	 * construct function, iniate error
	 *
	 */
	function __construct() 
	{
		parent::__construct();
	}

	/**
	 * boot function inherit eloquent
	 *
	 */
	public static function boot() 
	{
		parent::boot();

		static::saving(function($model)
		{
			if(isset($model['rules']))
			{
				$validator 				= Validator::make($model['attributes'], $model['rules']);

				if(!$validator->passes())
				{
					throw new Exception($validator->messages()->toJson(), 1);
				}

			}
		});
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * scope search based on id (pk)
	 *
	 * @param string or array of id
	 */	
	public function scopeID($query, $variable)
	{
		if(is_array($variable))
		{
			return 	$query->whereIn($this->getTable().'.id', $variable);
		}

		if(is_null($variable))
		{
			return $query;
		}

		return 	$query->where($this->getTable().'.id', $variable);
	}

	/**
	 * scope search based on not id (pk)
	 *
	 * @param string or array of id
	 */	
	public function scopeNotID($query, $variable)
	{
		if(is_array($variable))
		{
			return 	$query->whereNotIn($this->getTable().'.id', $variable);
		}

		if(is_null($variable))
		{
			return $query;
		}

		return 	$query->where($this->getTable().'.id', '<>', $variable);
	}
}