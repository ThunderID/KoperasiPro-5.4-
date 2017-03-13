<?php

namespace Thunderlabid\Credit\Models;

/**
 * Used for Status_A Models
 * 
 * @author cmooy
 */
use Thunderlabid\Credit\Models\Observers\IDObserver;
use Thunderlabid\Credit\Models\Observers\EventObserver;
use Thunderlabid\Credit\Models\Observers\Status_AObserver;

// use Thunderlabid\Credit\Models\Traits\HistoricalDataTrait;
use Thunderlabid\Credit\Models\Traits\GuidTrait;

use Thunderlabid\Credit\Exceptions\DuplicateException;
use Thunderlabid\Credit\Exceptions\IndirectModificationException;
use Validator, Exception;

/**
 * Model Status_A
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Status_A extends BaseModel
{
	// use HistoricalDataTrait;
	use GuidTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'credit_status';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'status'				,
											'credit_kredit_id'		,
											'credit_ro_petugas_id'	,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'status'				=> 'max:255',
											'credit_kredit_id'		=> 'max:255',
											'credit_ro_petugas_id'	=> 'max:255',
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

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();

        Status_A::observe(new IDObserver());
        Status_A::observe(new EventObserver());
        Status_A::observe(new Status_AObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
