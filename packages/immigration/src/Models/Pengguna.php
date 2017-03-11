<?php

namespace Thunderlabid\Immigration\Models;

/**
 * Used for Pengguna Models
 * 
 * @author cmooy
 */
use Thunderlabid\Immigration\Models\Observers\EventObserver;
use Thunderlabid\Immigration\Models\Observers\PenggunaObserver;

use Thunderlabid\Immigration\Models\Traits\LinkedListTrait;

use Thunderlabid\Immigration\Exceptions\IndirectModificationException;

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
	use LinkedListTrait;
	
	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'pre_live_user';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'email'					,
											'password'				,
											'nama'					,
											'visas'					,
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
											'visas.*.id'			=> 'required|max:255',
											'visas.*.koperasi.id'	=> 'required|max:255',
											'visas.*.koperasi.nama'	=> 'required|max:255',
											'visas.*.role'			=> 'required|max:255',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	protected function setVisasAttribute($value)
	{
		throw new IndirectModificationException('Tidak dapat mengubah visa tanpa melalui prosedur', 1);
	}
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	public function grantVisa($visa)
	{
		//1. validating visa
		//2. grant visa
		$visas 						= array_merge($this->visas, [$visa]);
		$this->attributes['visas'] 	= $visas;

		//3. fire event
		$this->addEvent(new \Thunderlabid\Immigration\Events\Jobs\FireEventVisaGranted($this->toArray()));
	}

	public function removeVisa($koperasi_id)
	{
		//1. check visa
		$visas 						= collect($this->visas);
		$removed 					= $visas->where('koperasi.id', $koperasi_id);

		foreach ($removed as $key => $value) 
		{
			unset($visas[$key]);
		}

		//2. grant visa
		$this->attributes['visas'] 	= $visas;

		//3. fire event
	}

	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();

        Pengguna::observe(new EventObserver());
        // Pengguna::observe(new PenggunaObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	public function scopeEmail($model, $variable)
	{
		return $model->where('email', $variable);
	}
}
