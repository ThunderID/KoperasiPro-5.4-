<?php

namespace TKredit\Pengajuan\Models;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\Infrastructures\Models\BaseModel;

use Validator, Exception;

/**
 * Model PengajuanMobile_RO
 *
 * Digunakan untuk menyimpan data PengajuanMobile
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Pengajuan
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class PengajuanMobile_RO extends BaseModel
{
	use GuidTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'pengajuan_mobile';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'				,
											'mobile_id'			,
											'mobile_model'		,
											'kredit_id'			,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'mobile_id'			=> 'max:255',
											'mobile_model'		=> 'max:255',
											'kredit_id'			=> 'max:255',
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
											'id', 
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
		return $this->belongsto('TKredit\Pengajuan\Models\Pengajuan');
	}

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
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
