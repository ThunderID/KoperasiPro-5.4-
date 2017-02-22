<?php

namespace Thunderlabid\Credit\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Credit\Valueobject\Credit as CreditVO;
use Thunderlabid\Credit\Valueobject\CollateralLand;
use Thunderlabid\Credit\Valueobject\CollateralVehicle;
use Thunderlabid\Credit\Valueobject\CollateralBuilding;

/////////////
// Entity  //
/////////////
use Thunderlabid\Credit\Entity\Interfaces\IEntity;
use Thunderlabid\Credit\Entity\Traits\IEntityTrait;

////////////////////
// Aggregate root //
////////////////////
use Thunderlabid\Credit\Entity\Interfaces\IAggregateRoot;
use Thunderlabid\Credit\Entity\Traits\IAggregateRootTrait;

//////////////
// Utilitis //
//////////////
use Exception, Validator;
use \Illuminate\Support\Collection;
use Carbon\Carbon;

/**
 * Entity Collateral
 *
 * Digunakan untuk menyimpan data Collateral.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Collateral implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param string $credit 
	 * @param array $lands
	 * @param array $buildings
	 * @param array $vehicles
	 */
	public function __construct($id = null, $credit = null, $lands =[], $buildings = [], $vehicles = [])
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

		#credit
		if ($credit instanceOf CreditVO)
		{
			$this->addCredit($credit);
		}

		#lands
		if (isset($lands[0]))
		{
			foreach ($lands as $land_array)
			{
				$this->addLand($land_array);
			}
		}
		elseif(!empty($lands))
		{
			$this->addLand($lands);
		}
		else
		{
			$this->attributes['lands']	= [];
		}

		#buildings
		if (isset($buildings[0]))
		{
			foreach ($buildings as $building_array)
			{
				$this->addBuilding($building_array);
			}
		}
		elseif(!empty($buildings))
		{
			$this->addBuilding($buildings);
		}
		else
		{
			$this->attributes['buildings']	= [];
		}

		#vehicles
		if (isset($vehicles[0]))
		{
			foreach ($vehicles as $vehicles_array)
			{
				$this->addVehicle($vehicles_array);
			}
		}
		elseif(!empty($vehicles))
		{
			$this->addVehicle($vehicles);
		}
		else
		{
			$this->attributes['vehicles']	= [];
		}

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
	}

	/**
	 * [addCredit description]
	 * @param CreditVO $credit 	[description]
	 * @return [boolean]    [true if success, exception if fail]
	 */
	public function addCredit(CreditVO $credit)
	{
		$this->attributes['credit'] 	= $credit;

		return true;
	}

	/**
	 * [removeCredit description]
	 * @param  CreditVO $credit [description]
	 * @return [boolean]    [true if success, exception if fail]
	 */
	public function removeCredit(CreditVO $credit)
	{
		unset($this->attributes['credit']);

		return false;
	}

	/**
	 * [addLand description]
	 * @param CollateralLand	$land [description]
	 * @return [boolean]		[true if success, exception if fail]
	 */
	public function addLand(CollateralLand $land)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Collateral is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('lands', $this->attributes) && is_array($this->attributes['lands']))
		{
			foreach ($this->attributes['lands'] as $key => $value)
			{
				if ($value->equals($land))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['lands'] = [];
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
			$this->attributes['lands'][] = $land;
			return true;
		}
	}

	/**
	 * [removeLand description]
	 * @param  CollateralLand 		$land [description]
	 * @return [boolean]			[true if success, exception if fail]
	 */
	public function removeLand(CollateralLand $land)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching land //
		/////////////////////////////
		foreach ($this->attributes['lands'] as $key => $value)
		{
			if ($value->equals($land))
			{
				$isInList = true;
				unset($this->attributes['lands'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove lands. Not found");
			return false;
		}
	}

	/**
	 * [addBuilding description]
	 * @param CollateralBuilding	$building [description]
	 * @return [boolean]			[true if success, exception if fail]
	 */
	public function addBuilding(CollateralBuilding $building)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Collateral is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('buildings', $this->attributes) && is_array($this->attributes['buildings']))
		{
			foreach ($this->attributes['buildings'] as $key => $value)
			{
				if ($value->equals($building))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['buildings'] = [];
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
			$this->attributes['buildings'][] = $building;
			return true;
		}
	}

	/**
	 * [removeBuilding description]
	 * @param  CollateralBuilding	$buildings [description]
	 * @return [boolean]			[true if success, exception if fail]
	 */
	public function removeBuilding(CollateralBuilding $building)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching buildings //
		/////////////////////////////
		foreach ($this->attributes['buildings'] as $key => $value)
		{
			if ($value->equals($building))
			{
				$isInList = true;
				unset($this->attributes['buildings'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove buildings. Not found");
			return false;
		}
	}

	/**
	 * [addVehicle description]
	 * @param CollateralVehicle	$vehicle [description]
	 * @return [boolean]		[true if success, exception if fail]
	 */
	public function addVehicle(CollateralVehicle $vehicle)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Collateral is already in the list //
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
	 * [removeVehicle description]
	 * @param  CollateralVehicle	$vehicle [description]
	 * @return [boolean]			[true if success, exception if fail]
	 */
	public function removeVehicle(CollateralVehicle $vehicle)
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
			throw new Exception("Fail to remove vehicle. Not found");
			return false;
		}
	}
}