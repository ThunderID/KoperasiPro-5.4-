<?php

namespace Thunderlabid\Immigration\Models;

use Thunderlabid\Immigration\Models\Traits\GuidTrait;

use Thunderlabid\Immigration\Exceptions\DuplicateException;

use Hash, Validator, Exception;

/**
 * Model PandoraBox
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class PandoraBox extends BaseModel
{
	use GuidTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'immigration_pandora_box';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'key'					,
											'secret'				,
											'jenis'					,
											'versi'					,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'key'					=> 'required',
											'secret'				=> 'min:6',
											'jenis'					=> 'in:mobile',
											'versi'					=> 'max:255',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	protected function setKeyAttribute($value)
	{
		$exists 					= PandoraBox::key($value)->notid($this->id)->first();
		if($exists)
		{
			throw new DuplicateException("key", 1);
		}

		$this->attributes['key'] 	= $value;
	}

	protected function setSecretAttribute($value)
	{
		if(Hash::needsRehash($value))
		{
			$value 					= Hash::make($value);
		}

        $this->attributes['secret'] = $value;
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

	public function scopeKey($model, $variable)
	{
		return $model->where('key', $variable);
	}
}
