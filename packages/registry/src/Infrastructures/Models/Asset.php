<?php

namespace Thunderlabid\Registry\Infrastructures\Models;

/**
 * Used for Asset Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Infrastructures\Models\Observers\AssetObserver;
use Thunderlabid\Registry\Infrastructures\Models\Traits\LinkedListTrait;
use Thunderlabid\Registry\Infrastructures\Models\Scopes\LinkedListScope;

/**
 * Model Asset
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Asset extends BaseModel
{
	use LinkedListTrait;
	
	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'test_asset_1';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'rumah'			,
											'kendaraan'		,
											'usaha'			,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'rumah.status'			=> 'string',
											'rumah.angsuran'		=> 'numeric',
											'rumah.tenor_angsuran'	=> 'numeric',
											'rumah.masa_sewa'		=> 'numeric',
											'rumah.sejak'			=> 'date_format:"Y-m-d"',
											'rumah.luas'			=> 'numeric',
											'rumah.nilai_rumah'		=> 'numeric',
											
											'kendaraan.jumlah_kendaraan_r4'	=> 'numeric',
											'kendaraan.jumlah_kendaraan_r2'	=> 'numeric',
											'kendaraan.nilai_kendaraan'		=> 'numeric',

											'usaha.nama'			=> 'string',
											'usaha.bidang_usaha'	=> 'string',
											'usaha.sejak'			=> 'date_format:"Y-m-d"',
											'usaha.status_usaha'	=> 'string',
											'usaha.saham_usaha'		=> 'numeric',
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

        Asset::observe(new AssetObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * scope search based on id (pk)
	 *
	 * @param string or array of id
	 */	
	public function scopePersonID($query, $variable)
	{
		if(is_array($variable))
		{
			return 	$query->whereIn('person.id', $variable);
		}

		if(is_null($variable))
		{
			return $query;
		}

		return 	$query->where('person.id', $variable);
	}
}
