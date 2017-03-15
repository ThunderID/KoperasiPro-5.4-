<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\AggregateTrait;

use Validator, Exception;

/**
 * Model Relasi_A
 *
 * Digunakan untuk menyimpan data relasi Orang.
 * Ketentuan : 
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Relasi_A extends BaseModel
{
	use GuidTrait;
	use AggregateTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'relasi';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'				,
											'orang_id'			,
											'nama'				,
											'alamat'			,
											'telepon'			,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'orang_id'			=> 'required|max:255',
											'relasi_id'			=> 'required|max:255',
											'nama'				=> 'required|max:255',
											'alamat'			=> 'max:255',
											'telepon'			=> 'max:255',
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
	 * menambahkan relasi orang
	 * 
	 * @param Orang $orang
	 * @param array $value
	 * @return Relasi_A $model
	 */
	public function tambahRelasi(Orang $orang, $value)
	{
		//1. simpan relasi
		//1a. simpan  orang
		$relasi 		= Orang::nik($value['nik'])->first();
		if(!$relasi)
		{
			$relasi	= new Orang;
		}

		$relasi 		= $relasi->fill($value);
		$relasi->save();

		//1b. simpan relasi
		$this->attributes['relasi_id']			= $relasi->id;
		$this->attributes['nama']				= $value['nama'];
		$this->attributes['alamat']				= $value['alamat'];
		$this->attributes['telepon']			= $value['telepon'];

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
