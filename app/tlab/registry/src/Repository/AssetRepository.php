<?php

namespace Thunderlabid\Registry\Repository;

///////////////////////
// Interface & Trait //
///////////////////////
use Thunderlabid\Registry\Repository\Interfaces\IRepository;
use Thunderlabid\Registry\Repository\Traits\IRepositoryTrait;

///////////
// Model //
///////////
use Jenssegers\Mongodb\Eloquent\Model;
use Thunderlabid\Registry\Model\Asset as AssetModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Owner as OwnerVO;
use Thunderlabid\Registry\Valueobject\AssetHouse as AssetHouseVO;
use Thunderlabid\Registry\Valueobject\AssetCompany as AssetCompanyVO;
use Thunderlabid\Registry\Valueobject\AssetVehicle as AssetVehicleVO;

////////////
// Entity //
////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\Asset;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository Asset
 *
 * Digunakan untuk Asset aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class AssetRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data Asset dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = AssetModel::skip($skip)
								->take($take)
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data Asset berdasarkan id dari database
	*
	* @param string $id
	* @return Asset $Asset
	*/
	public static function findById($id)
	{
		$data = AssetModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data Finance berdasarkan pencarian id nasabah
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByOwnerID($id)
	{
		$data = AssetModel::where('owner.id', $id)->orderBy('created_at', 'desc')
					->first();

		if($data)
		{
			return Static::toEntity($data);
		}
		return Static::toEntity(new AssetModel);
	}

	/**
	* Menampilkan data Asset berdasarkan pencarian nama nasabah dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = AssetModel::where('owner.name', 'like', str_replace('*', '%', $name))
					->orderBy('owner.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menyimpan data Asset ke database
	*
	* @param IEntity $asset_entity
	* @return boolean
	*/
	public static function store(IEntity $asset_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$asset_entity instanceOf Asset)
		{
			throw new Exception("Parameter 1 must be a Asset Entity", 1);
		}

		/////////////////////
		//  Create Asset  //
		/////////////////////
		$asset_model 					= AssetModel::findornew($asset_entity->id);
		if (!$asset_model->id)
		{
			$is_new_asset = true;
		}

		$asset_model->_id				= $asset_entity->id;
		$asset_model->owner 			= ['id' => $asset_entity->owner->id, 'name' => $asset_entity->owner->name];

		//////////////
		//  Assets  //
		//////////////
		//house
		$houses							= [];
		foreach ($asset_entity->houses as $house) 
		{
			$houses[]					= [
					'ownership_status'	=> $house->ownership_status,
					'since'				=> $house->since->format('Y-m-d'),
					'to'				=> $house->to->format('Y-m-d'),
					'installment'		=> (string)$house->installment,
					'installment_period'=> $house->installment_period,
					'size'				=> $house->size,
					'worth'				=> (string)$house->worth,
			];
		}

		$asset_model->houses	= $houses;

		//vehicle
		$vehicles							= [];
		foreach ($asset_entity->vehicles as $vehicle) 
		{
			$vehicles[]					= [
					'four_wheels'		=> $vehicle->four_wheels,
					'two_wheels'		=> $vehicle->two_wheels,
					'worth'				=> (string)$vehicle->worth,
			];
		}

		$asset_model->vehicles	= $vehicles;

		//company
		$companies							= [];
		foreach ($asset_entity->companies as $company) 
		{
			$companies[]					= [
					'ownership_status'	=> $company->ownership_status,
					'share'				=> $company->share,
					'name'				=> $company->name,
					'area'				=> $company->area,
					'since'				=> $company->since->format('Y-m-d'),
					'worth'				=> (string)$company->worth,
			];
		}
		
		$asset_model->companies	= $companies;

		///////////////////////
		// Store Asset //
		///////////////////////
		try {
			$asset_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data Asset dari database
	*
	* @param IEntity $asset_entity
	* @return boolean
	*/
	public static function delete(IEntity $asset_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($asset_entity->id)
		{
			$asset_model = AssetModel::findorfail($asset_entity->id);
		}

		#delete Asset
		$asset_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $asset_model
	* @return Asset $entity
	*/
	public static function toEntity(Model $asset_model)
	{
		///////////////
		//   Asset   //
		///////////////

		//houses
		$houses 		= [];
		foreach ((array) $asset_model->houses as $house)
		{
			$houses[]	= new AssetHouseVO($house['ownership_status'], 
									$house['since'], 
									$house['to'],
									$house['installment'],
									$house['installment_period'],
									$house['size'],
									$house['worth']
						);
		}

		//companies
		$companies 		= [];
		foreach ((array) $asset_model->companies as $company)
		{
			$companies[]	= new AssetCompanyVO($company['ownership_status'], 
									$company['share'], 
									$company['name'],
									$company['area'],
									$company['since'],
									$company['worth']
						);
		}

		//vehicles
		$vehicles 		= [];
		foreach ((array) $asset_model->vehicles as $vehicle)
		{
			$vehicles[]	= new AssetVehicleVO($vehicle['four_wheels'], 
									$vehicle['two_wheels'], 
									$vehicle['worth']
						);
		}

		//owner
		$owner 			= new OwnerVO($asset_model->owner['id'], $asset_model->owner['name']);

		$asset_entity 	= new Asset($asset_model->_id, 
									$owner,
									$houses,
									$vehicles,
									$companies
						);

		////////////////////////
		// Return Asset //
		////////////////////////
		return $asset_entity;
	}
}