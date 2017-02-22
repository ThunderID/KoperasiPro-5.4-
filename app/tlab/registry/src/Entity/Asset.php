<?php

namespace Thunderlabid\Registry\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Owner;
use Thunderlabid\Registry\Valueobject\AssetHouse as AssetHouseVO;
use Thunderlabid\Registry\Valueobject\AssetVehicle as AssetVehicleVO;
use Thunderlabid\Registry\Valueobject\AssetCompany as AssetCompanyVO;
use Thunderlabid\Registry\Valueobject\IDR;

/////////////
// Entity  //
/////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\Traits\IEntityTrait;

////////////////////
// Aggregate root //
////////////////////
use Thunderlabid\Registry\Entity\Interfaces\IAggregateRoot;
use Thunderlabid\Registry\Entity\Traits\IAggregateRootTrait;

//////////////
// Utilitis //
//////////////
use Exception, Validator;
use \Illuminate\Support\Collection;
use Carbon\Carbon;

/**
 * Entity Asset
 *
 * Digunakan untuk menyimpan data Asset.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Asset implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param string $owner 
	 * @param array $house
	 * @param array $vehicle
	 * @param array $company
	 */
	public function __construct($id = null, $owner = null, $house =[], $vehicle = [], $company = [])
	{
		if (!$id)
		{
			$this->attributes['id'] = $this->guid();
		}
		else
		{
			$this->attributes['id'] = $id;
		}

		////////////////////
		// Set attributes //
		////////////////////

		#owner
		if ($owner instanceOf Owner)
		{
			$this->attributes['owner'] 	= $owner;
		}

		#house
		if (isset($house[0]))
		{
			foreach ($house as $house_array)
			{
				$this->addHouses($house_array);
			}
		}
		elseif(!empty($house))
		{
			$this->addHouses($house);
		}
		else
		{
			$this->attributes['houses']	= [];
		}

		#vehicle
		if (isset($vehicle[0]))
		{
			foreach ($vehicle as $vehicle_array)
			{
				$this->addVehicles($vehicle_array);
			}
		}
		elseif(!empty($vehicle))
		{
			$this->addVehicles($vehicle);
		}
		else
		{
			$this->attributes['vehicles']	= [];
		}

		#company
		if (isset($company[0]))
		{
			foreach ($company as $company_array)
			{
				$this->addCompanies($company_array);
			}
		}
		elseif(!empty($company))
		{
			$this->addCompanies($company);
		}
		else
		{
			$this->attributes['companies']	= [];
		}

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
	}

	/**
	 * [addHouses description]
	 * @param AssetHouseVO	$house [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addHouses(AssetHouseVO $house)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Asset is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('houses', $this->attributes) && is_array($this->attributes['houses']))
		{
			foreach ($this->attributes['houses'] as $key => $value)
			{
				if ($value->equals($house))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['houses'] = [];
			$isInList = false;
		}

		////////////////////////////////////////////////////
		// If not in list then add, otherwise return fail //
		////////////////////////////////////////////////////
		if ($isInList)
		{
			return false;
		}
		else
		{
			$this->attributes['houses'][] = $house;
			return true;
		}
	}

	/**
	 * [removeHouses description]
	 * @param  AssetHouseVO 		$house [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeHouses(AssetHouseVO $house)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching house //
		/////////////////////////////
		foreach ($this->attributes['houses'] as $key => $value)
		{
			if ($value->equals($house))
			{
				$isInList = true;
				unset($this->attributes['houses'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove House. Not found");
			return false;
		}
	}

	/**
	 * [addVehicles description]
	 * @param AssetVehicleVO	$vehicle [description]
	 * @return [boolean]		[true if success, exception if fail]
	 */
	public function addVehicles(AssetVehicleVO $vehicle)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Asset is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('vehicles', $this->attributes) && is_array($this->attributes['vehicles']))
		{
			foreach ($this->attributes['vehicles'] as $key => $value)
			{
				if ($value->equals($vehicle))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['vehicles'] = [];
			$isInList = false;
		}

		////////////////////////////////////////////////////
		// If not in list then add, otherwise return fail //
		////////////////////////////////////////////////////
		if ($isInList)
		{
			return false;
		}
		else
		{
			$this->attributes['vehicles'][] = $vehicle;
			return true;
		}
	}

	/**
	 * [removeVehicles description]
	 * @param  AssetVehicleVO	$vehicle [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeVehicles(AssetVehicleVO $vehicle)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching vehicle //
		/////////////////////////////
		foreach ($this->attributes['vehicles'] as $key => $value)
		{
			if ($value->equals($vehicle))
			{
				$isInList = true;
				unset($this->attributes['vehicles'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove Vehicle. Not found");
			return false;
		}
	}

	/**
	 * [addCompanies description]
	 * @param AssetCompanyVO	$company [description]
	 * @return [boolean]		[true if success, exception if fail]
	 */
	public function addCompanies(AssetCompanyVO $company)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Asset is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('companies', $this->attributes) && is_array($this->attributes['companies']))
		{
			foreach ($this->attributes['companies'] as $key => $value)
			{
				if ($value->equals($company))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['companies'] = [];
			$isInList = false;
		}

		////////////////////////////////////////////////////
		// If not in list then add, otherwise return fail //
		////////////////////////////////////////////////////
		if ($isInList)
		{
			return false;
		}
		else
		{
			$this->attributes['companies'][] = $company;
			return true;
		}
	}

	/**
	 * [removeCompanies description]
	 * @param  AssetCompanyVO	$company [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeCompanies(AssetCompanyVO $company)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching company //
		/////////////////////////////
		foreach ($this->attributes['companies'] as $key => $value)
		{
			if ($value->equals($company))
			{
				$isInList = true;
				unset($this->attributes['companies'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove company. Not found");
			return false;
		}
	}

	public function netWorth()
	{
		$worth 			= 0;

		foreach ((array)$this->houses as $key => $value) 
		{
			$worth 		= $worth + (int) str_replace(',', '', (string) $value->worth);
		}
		
		foreach ((array)$this->vehicles as $key => $value) 
		{
			$worth 		= $worth + (int) str_replace(',', '', (string) $value->worth);
		}

		foreach ((array)$this->companies as $key => $value) 
		{
			$worth 		= $worth + (int) str_replace(',', '', (string) $value->worth);
		}

		return new IDR($worth);
	}
}