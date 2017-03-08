<?php

namespace Thunderlabid\Registry\Infrastructures\Models;

/**
 * Used for Personality Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Infrastructures\Models\Observers\PersonalityObserver;
use Thunderlabid\Registry\Infrastructures\Models\Traits\LinkedListTrait;
use Thunderlabid\Registry\Infrastructures\Models\Scopes\LinkedListScope;

/**
 * Model Personality
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Personality extends BaseModel
{
	use LinkedListTrait;
	
	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'test_personality_1';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'person'				,
											'lingkungan_tinggal'	,
											'lingkungan_pekerjaan'	,
											'karakter'				,
											'pola_hidup'			,
											'keterangan'			,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'person.id'				=> 'required|max:255',
											'lingkungan_tinggal'	=> 'required|max:255',
											'lingkungan_pekerjaan'	=> 'required|max:255',
											'karakter'				=> 'required|max:255',
											'pola_hidup'			=> 'required|max:255',
											'keterangan'			=> 'required|max:255',
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

        Personality::observe(new PersonalityObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * scope search based on id (pk)
	 *
	 * @param string or array of id
	 */	
	public function scopePersonID($query, $variable)
	{
		if(is_array($variable))
		{
			return 	$query->whereIn('person.id', $variable);
		}

		if(is_null($variable))
		{
			return $query;
		}

		return 	$query->where('person.id', $variable);
	}

}
