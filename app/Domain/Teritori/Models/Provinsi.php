<?php

namespace App\Domain\Teritori\Models;

use App\Infrastructure\Models\BaseModel;

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
class Provinsi extends BaseModel
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'territorial_provinsi';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'territorial_negara_id'	,
											'nama'					,
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
	 * relationship regensi
	 *
	 * @return Provinsi_RO $model
	 */	
 	public function regensi()
	{
		return $this->hasMany('App\Domain\Teritori\Models\Regensi', 'territorial_provinsi_id', 'id');
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
