<?php

namespace App\Domain\Pengajuan\Models;

use App\Infrastructure\Models\BaseModel;

use Validator, Exception;

/**
 * Model DokumenCeklist
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class DokumenCeklist extends BaseModel
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'dokumen_ceklist';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'pengajuan_kredit_id'	,
											'kode_dokumen'			,
											'title'					,
											'is_added'				,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
										
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
	protected $hidden				= 	[
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];


	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	/**
	 * relationship kredit
	 *
	 * @return Kredit $model
	 */	
 	public function kredit()
	{
		return $this->belongsTo('App\Domain\Pengajuan\Models\Pengajuan', 'pengajuan_kredit_id');
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
