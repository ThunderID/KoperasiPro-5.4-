<?php

namespace Thunderlabid\Billing\Models;

use Thunderlabid\Billing\Models\Traits\Policies\IDRTrait;

/**
 * Model TagihanDetail
 *
 * Digunakan untuk menyimpan data TagihanDetail.
 * Ketentuan : 
 *
 * @package    Thunderlabid
 * @subpackage Billing
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class TagihanDetail extends BaseModel
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'tagihan_detail';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'id'					,
											'tagihan_id'			,
											'deskripsi'				,
											'jumlah'				,
											'diskon'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'tagihan_id'			=> 'max:255',
											'deskripsi'				=> 'max:255',
											'jumlah'				=> 'numeric',
											'diskon'				=> 'numeric',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];
	
	/**
	 * hidden data
	 *
	 * @var array
	 */
	protected $hidden				= 	[
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];

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
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
