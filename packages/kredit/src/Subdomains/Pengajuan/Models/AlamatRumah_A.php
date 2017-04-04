<?php

namespace TKredit\Pengajuan\Models;

use TKredit\Infrastructures\Guid\GuidTrait;

use TKredit\Infrastructures\Models\BaseModel;

use Validator, Exception;

/**
 * Model AlamatRumah_A
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Pengajuan
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class AlamatRumah_A extends BaseModel
{
	use GuidTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'pengajuan_alamat_rumah';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'				,
											'orang_id'			,
											'alamat_id'			,
											'tipe'				,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'tipe'				=> 'max:255',
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

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

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
		$this->attributes['orang_id']			= $orang->id;
		$this->attributes['alamat_id']			= $alamat->id;
		$this->attributes['tipe']				= $value['tipe'];

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
