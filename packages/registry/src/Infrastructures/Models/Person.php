<?php

namespace Thunderlabid\Registry\Infrastructures\Models;

/**
 * Used for Registry Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Infrastructures\Models\Observers\PersonObserver;
use Thunderlabid\Registry\Infrastructures\Models\Traits\LinkedListTrait;
use Thunderlabid\Registry\Infrastructures\Models\Scopes\LinkedListScope;

/**
 * Model Registry
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Person extends BaseModel
{
	use LinkedListTrait;
	
	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'pre_live_person';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'nik'					,
											'nama'					,
											'tempat_lahir'			,
											'tanggal_lahir'			,
											'jenis_kelamin'			,
											'agama'					,
											'pendidikan_terakhir'	,
											'status_perkawinan'		,
											'kewarganegaraan'		,
											'alamat'				,
											'kontak'				,
											'relasi'				,
											'pekerjaan'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'nik'					=> 'required|max:255',
											'nama'					=> 'required|max:255',
											'tempat_lahir'			=> 'required|max:255',
											'tanggal_lahir'			=> 'required|date_format:"Y-m-d"',
											'jenis_kelamin'			=> 'required|max:255',
											'agama'					=> 'required|max:255',
											'pendidikan_terakhir'	=> 'required|max:255',
											'status_perkawinan'		=> 'required|max:255',
											'kewarganegaraan'		=> 'required|max:255',
											
											'alamat.*.jalan'		=> 'required|max:255',
											'alamat.*.kota'			=> 'required|max:255',
											'alamat.*.provinsi'		=> 'required|max:255',
											'alamat.*.negara'		=> 'required|max:255',
											'alamat.*.kode_pos'		=> 'required|max:255',

											'kontak.*.telepon'		=> 'required|max:255',

											'relasi.*.id'			=> 'required|max:255',
											'relasi.*.nama'			=> 'required|max:255',
											'relasi.*.hubungan'		=> 'required|max:255',
											
											'pekerjaan.*.jenis'		=> 'required|max:255',
											'pekerjaan.*.jabatan'	=> 'required|max:255',
											'pekerjaan.*.sejak'		=> 'required|date_format:"Y-m-d"',
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
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();

        Person::observe(new PersonObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
