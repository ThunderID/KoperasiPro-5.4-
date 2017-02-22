<?php

namespace Thunderlabid\Credit\Model;

/**
 * Used for Collateral Models
 * 
 * @author cmooy
 */
use Thunderlabid\Credit\Model\Observers\CollateralObserver;
use Thunderlabid\Credit\Model\Traits\LinkedListTrait;

/**
 * Model Collateral
 *
 * Digunakan untuk menyimpan data jaminan.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Collateral extends BaseModel
{
	use LinkedListTrait;

	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'collaterals';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'credit'		,
											'lands'			,
											'buildings'		,
											'vehicles'		,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
		'credit.id'						=> 'required|max:255',
		
		'lands.*.name'					=> 'required',
		'lands.*.address'				=> 'required',
		'lands.*.certification'			=> 'in:hm,hgb',
		'lands.*.surface_area'			=> 'numeric',
		'lands.*.road'					=> 'in:tanah,batu,aspal',
		'lands.*.road_wide'				=> 'numeric',
		'lands.*.location_by_street'	=> 'in:sama,lebih_rendah,lebih_tinggi',
		'lands.*.environment'			=> 'in:perumahan,perkantoran,kampung,pertokoan,pasar,industri',
		'lands.*.deed'					=> 'boolean',
		'lands.*.lastest_pbb'			=> 'boolean',
		'lands.*.insurance'				=> 'boolean',
		'lands.*.pbb_value'				=> 'numeric',
		'lands.*.liquidation_value'		=> 'numeric',
		'lands.*.assessed'				=> 'numeric',
		'lands.*.land_value'			=> 'numeric',
	
		'buildings.*.name'					=> 'required',
		'buildings.*.address'				=> 'required',
		'buildings.*.certification'			=> 'in:hm,hgb',
		'buildings.*.surface_area'			=> 'numeric',
		'buildings.*.building_area'			=> 'max:255',
		'buildings.*.building_function'		=> 'max:255',
		'buildings.*.building_shape'		=> 'max:255',
		'buildings.*.building_construction'	=> 'max:255',
		'buildings.*.floor'					=> 'max:255',
		'buildings.*.wall'					=> 'max:255',
		'buildings.*.electricity'			=> 'max:255',
		'buildings.*.water'					=> 'max:255',
		'buildings.*.telephone'				=> 'boolean',
		'buildings.*.air_conditioner'		=> 'boolean',
		'buildings.*.others'				=> 'max:255',
		'buildings.*.road'					=> 'in:tanah,batu,aspal',
		'buildings.*.road_wide'				=> 'numeric',
		'buildings.*.location_by_street'	=> 'in:sama,lebih_rendah,lebih_tinggi',
		'buildings.*.environment'			=> 'in:perumahan,perkantoran,kampung,pertokoan,pasar,industri',
		'buildings.*.deed'					=> 'boolean',
		'buildings.*.lastest_pbb'			=> 'boolean',
		'buildings.*.insurance'				=> 'boolean',
		'buildings.*.pbb_value'				=> 'numeric',
		'buildings.*.liquidation_value'		=> 'numeric',
		'buildings.*.land_value'			=> 'numeric',
		'buildings.*.building_value'		=> 'numeric',
		'buildings.*.assessed'				=> 'numeric',

		'vehicles.*.merk'					=> 'required',
		'vehicles.*.type'					=> 'required',
		'vehicles.*.police_number'			=> 'required',
		'vehicles.*.color'					=> 'max:255',
		'vehicles.*.year'					=> 'max:255',
		'vehicles.*.name'					=> 'max:255',
		'vehicles.*.address'				=> 'required',
		'vehicles.*.bpkb_number'			=> 'required|max:255',
		'vehicles.*.machine_number'			=> 'required|max:255',
		'vehicles.*.frame_number'			=> 'required|max:255',
		'vehicles.*.valid_until'			=> 'date_format:"Y-m-d"',
		'vehicles.*.functions'				=> 'max:255',
		'vehicles.*.invoice'				=> 'boolean',
		'vehicles.*.purchase_memo'			=> 'boolean',
		'vehicles.*.memo'					=> 'boolean',
		'vehicles.*.valid_ktp'				=> 'boolean',
		'vehicles.*.physical_condition'		=> 'in:baik,cukup_baik,buruk',
		'vehicles.*.ownership_status'		=> 'in:sendiri,orang_lain_dengan_surat_kuasa',
		'vehicles.*.insurance'				=> 'boolean',
		'vehicles.*.assessed'				=> 'numeric',
		'vehicles.*.market_value'			=> 'numeric',
		'vehicles.*.bank'					=> 'numeric',
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
 
        Collateral::observe(new CollateralObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

}
