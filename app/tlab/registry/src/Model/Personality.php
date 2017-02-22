<?php

namespace Thunderlabid\Registry\Model;

/**
 * Used for Personality Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Model\Observers\PersonalityObserver;
use Thunderlabid\Registry\Model\Traits\LinkedListTrait;
use Thunderlabid\Registry\Model\Scopes\LinkedListScope;

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
	protected $collection			= 'personalities';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'owner'					,
											'residence'				,
											'workplace'				,
											'character'				,
											'lifestyle'				,
											'notes'					,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'owner.id'				=> 'required|max:255',
											'owner.name'			=> 'required|max:255',

											'residence.acquinted'	=> 'in:dikenal,kurang_dikenal,tidak_dikenal',
											'workplace.acquinted'	=> 'in:dikenal,kurang_dikenal,tidak_dikenal',
											'character'				=> 'in:baik,cukup_baik,tidak_baik',
											'lifestyle'				=> 'in:sederhana,mewah',
											'notes.*.description'	=> 'required|max:255',
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

}
