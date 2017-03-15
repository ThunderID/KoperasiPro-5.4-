<?php

namespace Thunderlabid\Territorial\Models;

/**
 * Model Koperasi
 *
 * Digunakan untuk menyimpan data Koperasi konteks kredit.
 * 	- bisa berubah kapanpun darimanapun (konteks bebas)
 * 	- tidak memuat event trait
 *
 * @package    Thunderlabid
 * @subpackage Territorial
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Regensi_RO extends BaseModel
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'territorial_regensi';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'						,
											'territorial_provinsi_id'	,
											'nama'						,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'nama'					=> 'required',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/**
	 * data hidden
	 *
	 * @var array
	 */
    protected $hidden				= ['created_at', 'updated_at', 'deleted_at'];
    
	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	/**
	 * relationship distrik
	 *
	 * @return Regensi_RO $model
	 */	
 	public function distrik()
	{
		return $this->hasMany('Thunderlabid\Territorial\Models\Distrik_RO', 'territorial_regensi_id', 'id');
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
