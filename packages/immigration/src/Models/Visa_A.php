<?php

namespace TImmigration\Models;

use App\Infrastructure\Traits\WaktuTrait;

/**
 * Used for Visa Models
 * 
 * @author cmooy
 */
use TImmigration\Models\Traits\Policies\VisaIDTrait;

use Validator, Exception;

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
	use WaktuTrait;
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
											'scopes'						,
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
		return $this->belongsTo('TImmigration\Models\Koperasi_RO', 'immigration_ro_koperasi_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	protected function setScopesAttribute($variable)
	{
		$rules 		= [
			'list'				=> 'required',
			'expired_at'		=> 'date_format:"Y-m-d H:i:s"',
			'params'			=> 'array'
		];

		foreach ($variable as $key => $value) 
		{
			if(isset($value['expired_at']))
			{
				$value['expired_at']= $this->formatDateTimeFrom($value['expired_at']);
			}

			$validator 				= Validator::make($value, $rules);

			if(!$validator->passes())
			{
				throw new Exception($validator->messages()->toJson(), 1);
			}
		}

		$this->attributes['scopes'] = json_encode($variable);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	protected function getScopesAttribute($variable)
	{
		return json_decode($this->attributes['scopes'], true);
	}

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
