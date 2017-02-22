<?php

namespace Thunderlabid\Registry\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Work;
use Thunderlabid\Registry\Valueobject\Phone;
use Thunderlabid\Registry\Valueobject\Relative;

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
 * Entity Person
 *
 * Digunakan untuk menyimpan data Person.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Person implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param string $nik 
	 * @param string $name
	 * @param string $place_of_birth
	 * @param string $date_of_birth
	 * @param string $gender
	 * @param string $religion
	 * @param string $highest_education
	 * @param string $marital_status
	 * @param array $phones
	 * @param array $works
	 * @param array $relatives
	 */
	public function __construct($id = null, $nik = null, $name = null, $place_of_birth = null, $date_of_birth = null, $gender = null, $religion = null, $highest_education = null, $marital_status = null, $phones = [], $works = [], $relatives = [])
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
		$this->attributes['name'] 				= $name;
		$this->attributes['place_of_birth'] 	= $place_of_birth;
		$this->attributes['date_of_birth'] 		= Carbon::parse($date_of_birth);
		$this->attributes['gender'] 			= $gender;

		//bisa berubah
		$this->attributes['nik'] 				= $nik;
		$this->attributes['religion'] 			= $religion;
		$this->attributes['highest_education'] 	= $highest_education;
		$this->attributes['marital_status'] 	= $marital_status;

		#phones
		if (isset($phones[0]))
		{
			foreach ($phones as $phone_array)
			{
				$this->addPhone($phone_array);
			}
		}
		elseif(!empty($phones))
		{
			$this->addPhone($phones);
		}
		else
		{
			$this->attributes['phones']		= [];
		}

		#works
		if (isset($works[0]))
		{
			foreach ($works as $work_array)
			{
				$this->addWork($work_array);
			}
		}
		elseif(!empty($works))
		{
			$this->addWork($works);
		}
		else
		{
			$this->attributes['works']		= [];
		}

		#relatives
		if (isset($relatives[0]))
		{
			foreach ($relatives as $relative_array)
			{
				$this->addRelative($relative_array);
			}
		}
		elseif(!empty($relatives))
		{
			$this->addRelative($relatives);
		}
		else
		{
			$this->attributes['relatives']	= [];
		}

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
	}

	/**
	 * mengubah attribute nik
	 * @param string $nik
	 */
 	public function changeNIK($nik)
	{
		$this->nik 	= $nik;
	}

	/**
	 * mengubah attribute religion
	 * @param string $religion
	 */
	public function changeReligion($religion)
	{
		$this->religion = $religion;
	}

	/**
	 * mengubah attribute highest_education
	 * @param string $highest_education
	 */
	public function changeHighestEducation($highest_education)
	{
		$this->highest_education = $highest_education;
	}
	
	/**
	 * mengubah attribute marital_status
	 * @param string $marital_status
	 */
	public function changeMaritalStatus($marital_status)
	{
		$this->marital_status = $marital_status;
	}

	/**
	 * [addphone description]
	 * @param Phone $phones [description]
	 * @return [boolean]       [true if success, exception if fail]
	 */
	public function addPhone(Phone $phone)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current phones is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('phones', $this->attributes) && is_array($this->attributes['phones']))
		{
			foreach ($this->attributes['phones'] as $key => $value)
			{
				if ($value->equals($phone))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['phones'] = [];
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
			$this->attributes['phones'][] = $phone;
			return true;
		}
	}

	/**
	 * [removePhone description]
	 * @param  Phone $phones [description]
	 * @return [boolean]        [true if success, exception if fail]
	 */
	public function removePhone(Phone $phone)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching phones //
		/////////////////////////////
		foreach ($this->attributes['phones'] as $key => $value)
		{
			if ($value->equals($phone))
			{
				$isInList = true;
				unset($this->attributes['phones'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove phones. Not found");
			return false;
		}
	}

	/**
	 * [addWork description]
	 * @param Work $works [description]
	 * @return [boolean]       [true if success, exception if fail]
	 */
	public function addWork(Work $work)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Works is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('works', $this->attributes) && is_array($this->attributes['works']))
		{
			foreach ($this->attributes['works'] as $key => $value)
			{
				if ($value->equals($work))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['works'] = [];
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
			$this->attributes['works'][] = $work;
			return true;
		}
	}

	/**
	 * [removeWork description]
	 * @param  Work $works [description]
	 * @return [boolean]        [true if success, exception if fail]
	 */
	public function removeWork(Work $work)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching Works //
		/////////////////////////////
		foreach ($this->attributes['works'] as $key => $value)
		{
			if ($value->equals($work))
			{
				$isInList = true;
				unset($this->attributes['works'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove Works. Not found");
			return false;
		}
	}

	/**
	 * [addRelative description]
	 * @param Relative $relatives [description]
	 * @return [boolean]       [true if success, exception if fail]
	 */
	public function addRelative(Relative $relative)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Relatives is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('relatives', $this->attributes) && is_array($this->attributes['relatives']))
		{
			foreach ($this->attributes['relatives'] as $key => $value)
			{
				if ($value->equals($relative))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['relatives'] = [];
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
			$this->attributes['relatives'][] = $relative;
			return true;
		}
	}

	/**
	 * [removeRelative description]
	 * @param  Relative $relatives [description]
	 * @return [boolean]        [true if success, exception if fail]
	 */
	public function removeRelative(Relative $relative)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching Relatives //
		/////////////////////////////
		foreach ($this->attributes['relatives'] as $key => $value)
		{
			if ($value->equals($relative))
			{
				$isInList = true;
				unset($this->attributes['relatives'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove Relatives. Not found");
			return false;
		}
	}
}