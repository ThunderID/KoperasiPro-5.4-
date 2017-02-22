<?php

namespace Thunderlabid\Credit\Repository;

///////////////////////
// Interface & Trait //
///////////////////////
use Thunderlabid\Credit\Repository\Interfaces\IRepository;
use Thunderlabid\Credit\Repository\Traits\IRepositoryTrait;

///////////
// Model //
///////////
use Jenssegers\Mongodb\Eloquent\Model;
use Thunderlabid\Credit\Model\Collateral as CollateralModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Credit\Valueobject\Owner as OwnerVO;
use Thunderlabid\Credit\Valueobject\Credit as CreditVO;
use Thunderlabid\Credit\Valueobject\Collateral as CollateralVO;
use Thunderlabid\Credit\Valueobject\CollateralLand;
use Thunderlabid\Credit\Valueobject\CollateralVehicle;
use Thunderlabid\Credit\Valueobject\CollateralBuilding;
use Thunderlabid\Credit\Valueobject\CollateralBank;
use Thunderlabid\Credit\Valueobject\CollateralAssess;

////////////
// Entity //
////////////
use Thunderlabid\Credit\Entity\Interfaces\IEntity;
use Thunderlabid\Credit\Entity\Collateral;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository Collateral
 *
 * Digunakan untuk Collateral aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class CollateralRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data Collateral dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = CollateralModel::skip($skip)
								->take($take)
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data Collateral berdasarkan id dari database
	*
	* @param string $id
	* @return Collateral $collateral
	*/
	public static function findById($id)
	{
		$data = CollateralModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data Collateral berdasarkan pencarian id nasabah
	*
	* @param string $id, $take, string $skip
	* @return array of object
	*/
	public static function FindByCreditID($id)
	{
		$data = CollateralModel::where('credit.id', $id)
					->first();

		if($data)
		{
			return Static::toEntity($data);
		}
		return Static::toEntity(new CollateralModel);
	}

	/**
	* Menyimpan data Collateral ke database
	*
	* @param IEntity $collateral_entity
	* @return boolean
	*/
	public static function store(IEntity $collateral_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$collateral_entity instanceOf Collateral)
		{
			throw new Exception("Parameter 1 must be a Collateral Entity", 1);
		}

		//////////////////////
		//  Create Collateral  //
		//////////////////////
		$collateral_model 			= CollateralModel::findornew($collateral_entity->id);
		if (!$collateral_model->id)
		{
			$is_new_Collateral = true;
		}

		$collateral_model->_id		= $collateral_entity->id;
		$collateral_model->credit 	= ['id' => $collateral_entity->credit->id];

		/////////////
		//  Lands  //
		/////////////
		$lands								= [];
		foreach ($collateral_entity->lands as $collateral) 
		{
			$lands[]						= [
					'name'					=> $collateral->name,
					'address'				=> $collateral->address,
					'certification'			=> $collateral->certification,
					'surface_area'			=> $collateral->surface_area,
					'road'					=> $collateral->road,
					'road_wide'				=> $collateral->road_wide,
					'location_by_street'	=> $collateral->location_by_street,
					'environment'			=> $collateral->environment,
					'deed'					=> $collateral->deed,
					'lastest_pbb'			=> $collateral->lastest_pbb,
					'insurance'				=> $collateral->insurance,
					'pbb_value'				=> $collateral->pbb_value,
					'liquidation_value'		=> $collateral->liquidation_value,
					'assessed'				=> $collateral->assessed->assess,
					'land_value'			=> $collateral->assessed->market_value,
			];
		}

		$collateral_model->lands			= $lands;


		/////////////////
		//  Buildings  //
		/////////////////
		$buildings							= [];
		foreach ($collateral_entity->buildings as $building) 
		{
			$buildings[]					= [
					'name'					=> $building->name,
					'address'				=> $building->address,
					'certification'			=> $building->certification,
					'surface_area'			=> $building->surface_area,
					'building_area'			=> $building->building_area,
					'building_function'		=> $building->building_function,
					'building_shape'		=> $building->building_shape,
					'building_construction'	=> $building->building_construction,
					'floor'					=> $building->floor,
					'wall'					=> $building->wall,
					'electricity'			=> $building->electricity,
					'water'					=> $building->water,
					'telephone'				=> $building->telephone,
					'air_conditioner'		=> $building->air_conditioner,
					'others'				=> $building->others,
					'road'					=> $building->road,
					'road_wide'				=> $building->road_wide,
					'location_by_street'	=> $building->location_by_street,
					'environment'			=> $building->environment,
					'deed'					=> $building->deed,
					'lastest_pbb'			=> $building->lastest_pbb,
					'insurance'				=> $building->insurance,
					'pbb_value'				=> $building->pbb_value,
					'liquidation_value'		=> $building->liquidation_value,
					'land_value'			=> $building->land_value,
					'building_value'		=> $building->building_value,
					'assessed'				=> $building->assessed->assess,
			];
		}
		$collateral_model->buildings		= $buildings;

		////////////////
		//  Vehicles  //
		////////////////
		$vehicles							= [];
		foreach ($collateral_entity->vehicles as $vehicle) 
		{
			$vehicles[]						= [
					'merk'					=> $vehicle->merk,
					'type'					=> $vehicle->type,
					'police_number'			=> $vehicle->police_number,
					'color'					=> $vehicle->color,
					'year'					=> $vehicle->year,
					'name'					=> $vehicle->name,
					'address'				=> $vehicle->address,
					'bpkb_number'			=> $vehicle->bpkb_number,
					'machine_number'		=> $vehicle->machine_number,
					'frame_number'			=> $vehicle->frame_number,
					'valid_until'			=> $vehicle->valid_until->format('Y-m-d'),
					'functions'				=> $vehicle->functions,
					'invoice'				=> $vehicle->invoice,
					'purchase_memo'			=> $vehicle->purchase_memo,
					'memo'					=> $vehicle->memo,
					'valid_ktp'				=> $vehicle->valid_ktp,
					'physical_condition'	=> $vehicle->physical_condition,
					'ownership_status'		=> $vehicle->ownership_status,
					'insurance'				=> $vehicle->insurance,
					'assessed'				=> $vehicle->assessed->assess,
					'market_value'			=> $vehicle->assessed->market_value,
					'bank'					=> $vehicle->bank->percentage,
			];
		}

		$collateral_model->vehicles			= $vehicles;

		///////////////////////
		// Store Collateral //
		///////////////////////
		try {
			$collateral_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data Collateral dari database
	*
	* @param IEntity $collateral_entity
	* @return boolean
	*/
	public static function delete(IEntity $collateral_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($collateral_entity->id)
		{
			$collateral_model = CollateralModel::findorfail($collateral_entity->id);
		}

		#delete Collateral
		$collateral_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $collateral_model
	* @return Collateral $entity
	*/
	public static function toEntity(Model $collateral_model)
	{
		////////////////////
		//   Collateral   //
		////////////////////
		//credit
		$credit 			= new CreditVO($collateral_model->credit['id']);

		//lands
		$lands 				= [];
		foreach ((array)$collateral_model->lands as $land)
		{
			$value 			= new CollateralAssess($land['land_value'], $land['assessed']);

			$lands[]		= new CollateralLand($land['name'], 
											$land['address'], 
											$land['certification'],
											$land['surface_area'],
											$land['road'],
											$land['road_wide'],
											$land['location_by_street'],
											$land['environment'],
											$land['deed'],
											$land['lastest_pbb'],
											$land['insurance'],
											$land['pbb_value'],
											$land['liquidation_value'],
											$value
							);
		}

		//buildings
		$buildings 			= [];
		foreach ((array)$collateral_model->buildings as $building)
		{
			$value 			= new CollateralAssess(($building['land_value'] + $building['building_value']), $building['assessed']);

			$buildings[]	= new CollateralBuilding($building['name'], 
											$building['address'], 
											$building['certification'],
											$building['surface_area'],
											$building['building_area'],
											$building['building_function'],
											$building['building_shape'],
											$building['building_construction'],
											$building['floor'],
											$building['wall'],
											$building['electricity'],
											$building['water'],
											$building['telephone'],
											$building['air_conditioner'],
											$building['others'],
											$building['road'],
											$building['road_wide'],
											$building['location_by_street'],
											$building['environment'],
											$building['deed'],
											$building['lastest_pbb'],
											$building['insurance'],
											$building['pbb_value'],
											$building['liquidation_value'],
											$building['land_value'],
											$building['building_value'],
											$value
							);
		}

		//vehicles
		$vehicles 			= [];
		foreach ((array)$collateral_model->vehicles as $vehicle)
		{
			$value 			= new CollateralAssess($vehicle['market_value'], $vehicle['assessed']);
			$bank 			= new CollateralBank($vehicle['market_value'], $vehicle['bank']);

			$vehicles[]		= new CollateralVehicle($vehicle['merk'],
												$vehicle['type'],
												$vehicle['police_number'],
												$vehicle['color'],
												$vehicle['year'],
												$vehicle['name'],
												$vehicle['address'],
												$vehicle['bpkb_number'],
												$vehicle['machine_number'],
												$vehicle['frame_number'],
												$vehicle['valid_until'],
												$vehicle['functions'],
												$vehicle['invoice'],
												$vehicle['purchase_memo'],
												$vehicle['memo'],
												$vehicle['valid_ktp'],
												$vehicle['physical_condition'],
												$vehicle['ownership_status'],
												$vehicle['insurance'],
												$value,
												$bank
							);
		}

		//collateral
		$collateral_entity	= new Collateral($collateral_model->id, 
										$credit,
										$lands,
										$buildings,
										$vehicles
							);

		////////////////////////
		// Return Collateral //
		////////////////////////
		return $collateral_entity;
	}
}
