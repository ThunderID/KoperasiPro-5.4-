<?php

namespace Thunderlabid\Immigration\Models;

/**
 * Used for Pengguna Models
 * 
 * @author cmooy
 */
use Thunderlabid\Immigration\Models\Observers\IDObserver;
use Thunderlabid\Immigration\Models\Observers\EventObserver;
use Thunderlabid\Immigration\Models\Observers\PenggunaObserver;

// use Thunderlabid\Immigration\Models\Traits\HistoricalDataTrait;
use Thunderlabid\Immigration\Models\Traits\GuidTrait;

use Thunderlabid\Immigration\Exceptions\DuplicateException;
use Thunderlabid\Immigration\Exceptions\IndirectModificationException;
use Hash, Validator, Exception;

/**
 * Model Pengguna
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Pengguna extends BaseModel
{
	// use HistoricalDataTrait;
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
											// 'visas'					,
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
											// 'visas.*.id'			=> 'required|max:255',
											// 'visas.*.koperasi.id'	=> 'required|max:255',
											// 'visas.*.koperasi.nama'	=> 'required|max:255',
											// 'visas.*.role'			=> 'required|max:255',
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
		return $this->hasMany('Thunderlabid\Immigration\Models\Visa_A', 'immigration_pengguna_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	protected function setPasswordAttribute($value)
	{
		if(Hash::needsRehash($value))
		{
			$value 					= Hash::make($value);
		}

        $this->attributes['password'] = $value;
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
		//1b. Validating if visa not saved yet
		$exists_visa		= Visa_A::where('immigration_pengguna_id', $this->id)->where('immigration_ro_koperasi_id', $visa['koperasi']['id'])->first();
		if($exists_visa)
		{
			throw new DuplicateException("visa", 1);
		}

		//2. grant visa
		$visas				= array_merge($this->visas->toArray(), [$visa]);

		//3. simpan visa
		//3a. simpan koperasi
		$koperasi			= new Koperasi_RO;
		$koperasi_ro		= $koperasi->findornew($visa['koperasi']['id']);
		$koperasi_ro->fill([
			'id' 	=> $visa['koperasi']['id'],
			'nama' 	=> $visa['koperasi']['nama'],
		]);

		if(!$koperasi_ro->save())
		{
			throw new Exception($koperasi_ro->getError(), 1);
		}

		//3b. simpan visa
		$visa_ag		= new Visa_A;
		$visa_ag		= $visa_ag->findornew($visa['id']);
		$visa_ag->fill([
			'role'							=> $visa['role'],
			'immigration_ro_koperasi_id'	=> $koperasi_ro->id,
			'immigration_pengguna_id'		=> $this->id
		]);

		if(!$visa_ag->save())
		{
			throw new Exception($visa_ag->getError(), 1);
		}

		//4. fire event
		$this->addEvent(new \Thunderlabid\Immigration\Events\Jobs\FireEventVisaGranted($this->toArray()));

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

        Pengguna::observe(new IDObserver());
        Pengguna::observe(new EventObserver());
        Pengguna::observe(new PenggunaObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	public function scopeEmail($model, $variable)
	{
		return $model->where('email', $variable);
	}
}
