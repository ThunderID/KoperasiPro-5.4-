<?php

namespace App\Domain\Akses\Models;

use App\Infrastructure\Models\BaseModel;
use App\Infrastructure\Traits\WaktuTrait;
use App\Infrastructure\Traits\GuidTrait;
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
class Visa extends BaseModel
{
	use WaktuTrait;
	use GuidTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'akses_visa';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'							,
											'role'							,
											'scopes'						,
											'last_logged'					,
											'limit_max'						,
											'akses_koperasi_id'				,
											'orang_id'						,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'role'							=> 'required',
											'akses_koperasi_id'				=> 'required',
											'orang_id'						=> 'required',
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
		return $this->belongsTo('App\Domain\Akses\Models\Koperasi', 'akses_koperasi_id');
	}

	public function petugas()
	{
		return $this->belongsTo('App\Domain\HR\Models\Orang', 'orang_id');
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

	protected function setRoleAttribute($variable)
	{
		$this->attributes['role']	= str_replace(' ', '_', $variable);
	}

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	protected function getScopesAttribute($variable)
	{
		return json_decode($this->attributes['scopes'], true);
	}

	protected function getRoleAttribute($variable)
	{
		return ucwords(str_replace('_', ' ', $this->attributes['role']));
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
