<?php

namespace App\Domain\Survei\Models;

use App\Infrastructure\Models\BaseModel;
use App\Infrastructure\Traits\GuidTrait;
use App\Infrastructure\Traits\SurveiTrait;

use Validator, Exception;


/**
 * Model Kepribadian
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Survei
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Kepribadian extends BaseModel
{
	use GuidTrait;
	use SurveiTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'survei_kepribadian';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'pengajuan_id'			,
											'petugas_id'			,
											'nama_referens'			,
											'telepon_referens'		,
											'hubungan'				,
											'uraian'				,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'nama_referens'			=> 'max:255',
											'telepon_referens'		=> 'max:255',
											'hubungan'				=> 'max:255',
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
											// 'id', 
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];
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
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
