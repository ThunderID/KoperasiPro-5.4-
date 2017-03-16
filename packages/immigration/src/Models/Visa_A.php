<?php

namespace Thunderlabid\Immigration\Models;

/**
 * Used for Visa Models
 * 
 * @author cmooy
 */
use Thunderlabid\Immigration\Models\Traits\Policies\VisaIDTrait;

/**
 * Model Visa
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Visa_A extends BaseModel
{
	use VisaIDTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'immigration_visa';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'							,
											'role'							,
											'immigration_ro_koperasi_id'	,
											'immigration_pengguna_id'		,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'role'							=> 'required',
											'immigration_ro_koperasi_id'	=> 'required',
											'immigration_pengguna_id'		=> 'required',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	public function koperasi()
	{
		return $this->belongsTo('Thunderlabid\Immigration\Models\Koperasi_RO', 'immigration_ro_koperasi_id');
	}

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
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
