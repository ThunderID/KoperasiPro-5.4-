<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\AggregateTrait;

use Validator, Exception;

/**
 * Model AlamatRumah_A
 *
 * Digunakan untuk menyimpan data alamat Orang.
 * Ketentuan : 
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class AlamatRumah_A extends BaseModel
{
	use GuidTrait;
	use AggregateTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'credit_alamat_rumah';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'				,
											'credit_orang_id'	,
											'credit_alamat_id'	,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'credit_orang_id'	=> 'required|max:255',
											'credit_alamat_id'	=> 'required|max:255',
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

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * menambahkan alamat rumah
	 * 
	 * @param Orang $orang
	 * @param array $value
	 * @return AlamatRumah_A $model
	 */
	public function tambahAlamatRumah(Orang $orang, $value)
	{
		//1. simpan alamat
		//1a. simpan alamat rumah
		$alamat			= new Alamat_A;

		$alamat 		= $alamat->fill($value);
		$alamat->save();

		//1b. simpan alamat
		$this->attributes['credit_orang_id']	= $orang->id;
		$this->attributes['credit_alamat_id']	= $alamat->id;

		$this->save();

		//3. it's a must to return value
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
}
