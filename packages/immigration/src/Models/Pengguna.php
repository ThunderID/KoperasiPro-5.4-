<?php

namespace TImmigration\Models;

use TImmigration\Models\Traits\GuidTrait;

use TImmigration\Exceptions\DuplicateException;

use Hash, Validator, Exception;

/**
 * Model Pengguna
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Pengguna extends BaseModel
{
	use GuidTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'immigration_pengguna';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'email'					,
											'password'				,
											'nama'					,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'email'					=> 'required|email',
											'password'				=> 'min:6',
											'nama'					=> 'max:255',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	public function visas()
	{
		return $this->hasMany('TImmigration\Models\Visa_A', 'immigration_pengguna_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	protected function setPasswordAttribute($value)
	{
		if(Hash::needsRehash($value))
		{
			$value 					= Hash::make($value);
		}

		$this->attributes['password'] = $value;
	}

	protected function setEmailAttribute($value)
	{
		$exists 					= Pengguna::email($value)->notid($this->id)->first();
		if($exists)
		{
			throw new DuplicateException("email", 1);
		}

		$this->attributes['email'] 	= $value;
	}
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	public function grantVisa($visa)
	{
		//1. validating visa
		//1a. Validating if visa contain valid variable
		$rules 						= [
			'koperasi.id'	=> 'required|max:255',
			'koperasi.nama'	=> 'required|max:255',
			'role'			=> 'required|max:255',
		];
		$validator			= Validator::make($visa, $rules);
		if(!$validator->passes())
		{
			throw new Exception($validator->messages()->toJson(), 1);
		}

		//3. simpan visa
		//3a. simpan koperasi
		$koperasi			= new Koperasi_RO;
		$koperasi_ro		= $koperasi->findornew($visa['koperasi']['id']);
		$koperasi_ro->fill([
			'id' 	=> $visa['koperasi']['id'],
			'nama' 	=> $visa['koperasi']['nama'],
		]);

		$koperasi_ro->save();

		//3b. simpan visa
		$visa_ag		= Visa_A::where('immigration_pengguna_id', $this->id)->where('immigration_ro_koperasi_id', $visa['koperasi']['id'])->first();
		if(!$visa_ag)
		{
			$visa_ag		= new Visa_A;
		}

		$visa_ag->fill([
			'role'							=> $visa['role'],
			'scopes'						=> $visa['scopes'],
			'immigration_ro_koperasi_id'	=> $koperasi_ro->id,
			'immigration_pengguna_id'		=> $this->id
		]);

		$visa_ag->save();

		//4. fire event
		// $this->addEvent(new \TImmigration\Events\Jobs\FireEventVisaGranted($this->toArray()));

		//it's a must to return value
		return $this;
	}

	public function removeVisa($visa_id)
	{
		//1. check visa
		$visas 						= collect($this->visas->toArray());
		$removed 					= $visas->where('id', $visa_id);

		foreach ((array)$removed as $key => $value) 
		{
			$model 					= Visa_A::findorfail($visa_id);
			$model->delete();
		}

		//3. fire event

		return $this;
	}

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

	public function scopeEmail($model, $variable)
	{
		return $model->where('email', $variable);
	}
}
