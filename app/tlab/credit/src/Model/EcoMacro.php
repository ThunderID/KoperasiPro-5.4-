<?php

namespace Thunderlabid\Credit\Model;

/**
 * Used for Credit Models
 * 
 * @author cmooy
 */
use Thunderlabid\Credit\Model\Observers\EcoMacroObserver;
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
class EcoMacro extends BaseModel
{
	use LinkedListTrait;

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'eco_macros';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'description'		,
											'credit'			,
											'competition'		,
											'prospect'			,
											'turn_over'			,
											'experience'		,
											'risk'				,
											'daily_customer'	,
											'others'			,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'credit.id'		=> 'required|max:255',
											'competition'	=> 'in:padat,sedang,biasa',
											'prospect'		=> 'in:padat,sedang,biasa',
											'turn_over'		=> 'in:padat,sedang,lambat',
											'experience'	=> 'required',
											'risk'			=> 'in:bagus,biasa,suram',
											'daily_customer'=> 'numeric',
											'others.*'		=> 'required|max:255',
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
 
        EcoMacro::observe(new EcoMacroObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
