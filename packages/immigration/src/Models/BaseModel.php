<?php 

namespace Thunderlabid\Immigration\Models;

use Illuminate\Database\Eloquent\Model;
use Thunderlabid\Immigration\Models\Traits\EventRaiserTrait;

use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator, Exception;

/**
 * Model Person
 *
 * Abstract class for mongo models Models
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
abstract class BaseModel extends Model 
{
	/**
	 * use soft event raiser trait
	 *
	 */
	use EventRaiserTrait;

	/**
	 * use soft delete trait
	 *
	 */
	use SoftDeletes;

	protected $keyType 	= 'string';

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
			return 	$query->whereIn('id', $variable);
		}

		if(is_null($variable))
		{
			return $query;
		}

		return 	$query->where('id', $variable);
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
			return 	$query->whereNotIn('id', $variable);
		}

		if(is_null($variable))
		{
			return $query;
		}

		return 	$query->where('id', '<>', $variable);
	}
}