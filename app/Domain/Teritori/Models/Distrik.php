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
class Distrik extends BaseModel
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'territorial_distrik';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'territorial_regensi_id',
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
	 * relationship desa
	 *
	 * @return Distrik $model
	 */	
 	public function desa()
	{
		return $this->hasMany('App\Domain\Teritori\Models\Desa', 'territorial_regensi_id', 'id');
	}

	/**
	 * relationship regensi
	 *
	 * @return Distrik $model
	 */	
 	public function regensi()
	{
		return $this->belongsto('App\Domain\Teritori\Models\Regensi', 'territorial_regensi_id', 'id');
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
