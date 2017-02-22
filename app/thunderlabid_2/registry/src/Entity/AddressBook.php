<?php

namespace Thunderlabid\Registry\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Address;

use Thunderlabid\Registry\Valueobject\Office;
use Thunderlabid\Registry\Valueobject\Owner;

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

/**
 * Entity AddressBook
 *
 * Digunakan data alamat suatu tempat.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class AddressBook implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param array $houses 
	 * @param array $offices 
	 * @param string $address
	 */
	public function __construct($id = null, $houses = [], $offices = [], Address $address)
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
		#houses
		if (isset($houses[0]))
		{
			foreach ($houses as $house_array)
			{
				$this->addHouse($house_array);
			}
		}
		elseif(!empty($houses))
		{
			$this->addHouse($houses);
		}

		#offices
		if (isset($offices[0]))
		{
			foreach ($offices as $office_array)
			{
				$this->addOffice($office_array);
			}
		}
		elseif(!empty($offices))
		{
			$this->addOffice($offices);
		}

		$this->address 				= $address;

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes 	= $this->attributes;
	}

	/**
	 * [addHouse description]
	 * @param Owner $house 	[description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addHouse(Owner $house)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current houses is already in the list //
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
	 * [removeHouse description]
	 * @param  Owner $house 	[description]
	 * @return [boolean]        [true if success, exception if fail]
	 */
	public function removeHouse(Owner $house)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching houses  //
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
			throw new Exception("Fail to remove houses. Not found");
			return false;
		}
	}


	/**
	 * [addOffice description]
	 * @param Office $office 	[description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addOffice(Office $office)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current offices is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('offices', $this->attributes) && is_array($this->attributes['offices']))
		{
			foreach ($this->attributes['offices'] as $key => $value)
			{
				if ($value->equals($office))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['offices'] = [];
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
			$this->attributes['offices'][] = $office;
			return true;
		}
	}

	/**
	 * [removeOffice description]
	 * @param  Office $office 	[description]
	 * @return [boolean]        [true if success, exception if fail]
	 */
	public function removeOffice(Office $office)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching offices  //
		/////////////////////////////
		foreach ($this->attributes['offices'] as $key => $value)
		{
			if ($value->equals($office))
			{
				$isInList = true;
				unset($this->attributes['offices'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove offices. Not found");
			return false;
		}
	}

	/**
	 * construct set attribute address
	 * @param Address $address
	 */
	private function setAddressAttribute(Address $address)
	{
		/////////
		// Set //
		/////////
		$this->attributes['address'] = $address;
	}
}