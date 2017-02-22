<?php

namespace Thunderlabid\Credit\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Credit\Valueobject\Credit as CreditVO;

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
 * Entity Credit
 *
 * Digunakan untuk menyimpan data Credit.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class EcoMacro implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param array $credit
	 * @param string $competition
	 * @param string $prospect
	 * @param string $turn_over
	 * @param string $experience
	 * @param string $risk
	 * @param numeric $daily_customer
	 * @param array $others
	 */

	public function __construct($id = null, $credit = [], $competition = null, $prospect = null, $turn_over = null, $experience = null, $risk = null, $daily_customer = 0, $others = [])
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
		$this->attributes['competition'] 		= $competition;
		$this->attributes['prospect'] 			= $prospect;
		$this->attributes['turn_over'] 			= $turn_over;
		$this->attributes['experience'] 		= $experience;
		$this->attributes['risk'] 				= $risk;
		$this->attributes['daily_customer'] 	= $daily_customer;

		#credit
		if ($credit instanceOf CreditVO)
		{
			$this->attributes['credit'] 	= $credit;
		}

		#others
		if (isset($others[0]))
		{
			foreach ($others as $other)
			{
				$this->addOther($other);
			}
		}
		elseif(!empty($others))
		{
			$this->addOther($others);
		}

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
	}

	/**
	 * [addOther description]
	 * @param string		$other [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addOther(string $other)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current EcoMacro is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('others', $this->attributes) && is_array($this->attributes['others']))
		{
			foreach ($this->attributes['others'] as $key => $value)
			{
				if (str_is($value, $other))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['others'] = [];
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
			$this->attributes['others'][] = $other;
			return true;
		}
	}

	/**
	 * [removeOther description]
	 * @param  string 	$other [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeOther(string $other)
	{
		$isInList 			= false;

		//////////////////////////////
		// Remove matching EcoMacro //
		//////////////////////////////
		foreach ($this->attributes['others'] as $key => $value)
		{
			if (str_is($value, $other))
			{
				$isInList 	= true;
				unset($this->attributes['others'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove other. Not found");
			return false;
		}
	}
}