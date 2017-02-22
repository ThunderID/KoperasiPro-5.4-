<?php

namespace Thunderlabid\Notification\Model;

/**
 * Used for Notification Models
 * 
 * @author cmooy
 */
use Thunderlabid\Notification\Model\Observers\NotificationObserver;
use Thunderlabid\Notification\Model\Traits\LinkedListTrait;

/**
 * Model Notification
 *
 * Digunakan untuk menyimpan data alamat.
 *
 * @package    Thunderlabid
 * @subpackage Notification
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Notification extends BaseModel
{
	use LinkedListTrait;

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'notifications';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'description'	,
											'when'			,
											'link'			,
											'office'		,
											'labels'		,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'description'	=> 'required|max:255',
											'when'			=> 'date_format:"Y-m-d"',
											
											'link'			=> 'max:255',
											'labels.*'		=> 'required|max:255',

											'office.id'		=> 'required|max:255',
											'office.name'	=> 'max:255',
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
 
        Notification::observe(new NotificationObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
