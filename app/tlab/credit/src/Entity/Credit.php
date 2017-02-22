<?php

namespace Thunderlabid\Credit\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Credit\Valueobject\IDR;
use Thunderlabid\Credit\Valueobject\Owner;
use Thunderlabid\Credit\Valueobject\Collateral as CollateralVO;
use Thunderlabid\Credit\Valueobject\Status as StatusVO;
use Thunderlabid\Credit\Valueobject\Author as AuthorVO;
use Thunderlabid\Credit\Valueobject\Office as OfficeVO;

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
class Credit implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param array $creditor 
	 * @param numeric $credit_amount
	 * @param numeric $installment_capacity
	 * @param numeric $period
	 * @param string $purpose
	 * @param array $warrantor
	 * @param array $collaterals
	 * @param array $statuses
	 * @param array $office
	 * @param sring $status
	 */
	public function __construct($id = null, $creditor = [], $credit_amount = 0, $installment_capacity = 0, $period = 0, $purpose = null, $warrantor = [], $collaterals = [], $statuses = [], $office = [], $status = 'drafting')
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

		$this->credit_amount 				= new IDR($credit_amount);
		$this->installment_capacity 		= new IDR($installment_capacity);

		$this->attributes['period'] 		= $period;
		$this->attributes['purpose'] 		= $purpose;
		$this->attributes['status'] 		= $status;

		#creditor
		if ($creditor instanceOf Owner)
		{
			$this->attributes['creditor']	= $creditor;
		}

		#warrantor
		if ($warrantor instanceOf Owner)
		{
			$this->attributes['warrantor']	= $warrantor;
		}

		#office
		if ($office instanceOf OfficeVO)
		{
			$this->attributes['office']		= $office;
		}

		#Collaterals
		if (isset($collaterals[0]))
		{
			foreach ($collaterals as $collateral)
			{
				$this->addCollateral($collateral);
			}
		}
		elseif(!empty($collaterals))
		{
			$this->addCollateral($collaterals);
		}

		#Collaterals
		if (isset($statuses[0]))
		{
			foreach ($statuses as $status)
			{
				$this->addStatus($status);
			}
		}
		elseif(!empty($statuses))
		{
			$this->addStatus($statuses);
		}

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
	}

	/**
	 * construct set attribute credit_amount
	 * @param numeric $credit_amount
	 */
	private function setCreditAmountAttribute($credit_amount)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['credit_amount' => (int) (string) $credit_amount], ['credit_amount' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['credit_amount'] = $credit_amount;
	}

	/**
	 * construct set attribute installment_capacity
	 * @param numeric $installment_capacity
	 */
	private function setInstallmentCapacityAttribute($installment_capacity)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['installment_capacity' => (int) (string) $installment_capacity], ['installment_capacity' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['installment_capacity'] = $installment_capacity;
	}

	/**
	 * [addCollateral description]
	 * @param CollateralVO		$collateral [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addCollateral(CollateralVO $collateral)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Credit is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('collaterals', $this->attributes) && is_array($this->attributes['collaterals']))
		{
			foreach ($this->attributes['collaterals'] as $key => $value)
			{
				if ($value->equals($collateral))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['collaterals'] = [];
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
			$this->attributes['collaterals'][] = $collateral;
			return true;
		}
	}

	/**
	 * [removeCollateral description]
	 * @param  CollateralVO 	$collateral [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeCollateral(CollateralVO $collateral)
	{
		$isInList 			= false;

		/////////////////////////////
		// Remove matching Credit //
		/////////////////////////////
		foreach ($this->attributes['collaterals'] as $key => $value)
		{
			if ($value->equals($collateral))
			{
				$isInList 	= true;
				unset($this->attributes['collaterals'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove collateral. Not found");
			return false;
		}
	}

	/**
	 * [addStatus description]
	 * @param StatusVO		$status [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addStatus(StatusVO $status)
	{
		$isInList = false;

		$latest_status 		= $status->status;
		/////////////////////////////////////////////////////
		// Check if current Credit is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('statuses', $this->attributes) && is_array($this->attributes['statuses']))
		{
			foreach ($this->attributes['statuses'] as $key => $value)
			{
				if ($value->equals($status))
				{
					$isInList = true;
				}

				//check latest status 
				if($status->date->format('Y-m-d') < $value->date->format('Y-m-d'))
				{
					$latest_status 	= $value->status;
				}
			}
		}
		else
		{
			$this->attributes['statuses'] = [];
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
			$this->attributes['statuses'][] = $status;
			$this->attributes['status'] 	= $latest_status;
			
			return true;
		}
	}
}