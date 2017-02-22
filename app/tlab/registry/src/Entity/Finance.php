<?php

namespace Thunderlabid\Registry\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\IDR;
use Thunderlabid\Registry\Valueobject\Owner;
use Thunderlabid\Registry\Valueobject\Finance as FinanceVO;

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
 * Entity Finance
 *
 * Digunakan untuk menyimpan data Finance.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Finance implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param string $owner 
	 * @param array $finance
	 * @param string $management_skill
	 * @param string $marketing_strategy
	 */
	public function __construct($id = null, $owner = null, $incomes =[], $expenses = [])
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

		#incomes
		if (isset($incomes[0]))
		{
			foreach ($incomes as $income_array)
			{
				$this->addIncome($income_array);
			}
		}
		elseif(!empty($incomes))
		{
			$this->addIncome($incomes);
		}
		else
		{
			$this->attributes['incomes']	= [];
		}

		#expenses
		if (isset($expenses[0]))
		{
			foreach ($expenses as $expense_array)
			{
				$this->addExpense($expense_array);
			}
		}
		elseif(!empty($expenses))
		{
			$this->addExpense($expenses);
		}
		else
		{
			$this->attributes['expenses']	= [];
		}

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
	}

	/**
	 * [addExpense description]
	 * @param FinanceVO		$expense [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addExpense(FinanceVO $expense)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Finance is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('expenses', $this->attributes) && is_array($this->attributes['expenses']))
		{
			foreach ($this->attributes['expenses'] as $key => $value)
			{
				if ($value->equals($expense))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['expenses'] = [];
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
			$this->attributes['expenses'][] = $expense;
			return true;
		}
	}

	/**
	 * [removeExpense description]
	 * @param  FinanceVO 		$expense [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeExpense(FinanceVO $expense)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching Finance //
		/////////////////////////////
		foreach ($this->attributes['expenses'] as $key => $value)
		{
			if ($value->equals($expense))
			{
				$isInList = true;
				unset($this->attributes['expenses'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove expense. Not found");
			return false;
		}
	}

	/**
	 * [addIncome description]
	 * @param FinanceVO		$income [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addIncome(FinanceVO $income)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Finance is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('incomes', $this->attributes) && is_array($this->attributes['incomes']))
		{
			foreach ($this->attributes['incomes'] as $key => $value)
			{
				if ($value->equals($income))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['incomes'] = [];
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
			$this->attributes['incomes'][] = $income;
			return true;
		}
	}

	/**
	 * [removeIncome description]
	 * @param  FinanceVO 		$income [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeIncome(FinanceVO $income)
	{
		$isInList = false;

		/////////////////////////////
		// Remove matching Finance //
		/////////////////////////////
		foreach ($this->attributes['incomes'] as $key => $value)
		{
			if ($value->equals($income))
			{
				$isInList = true;
				unset($this->attributes['incomes'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove income. Not found");
			return false;
		}
	}

	public function netIncome()
	{
		$net 	= 0;

		foreach ($this->incomes as $key => $value) 
		{
			$net 	= $net + (int) str_replace(',', '', (string) $value->amount);
		}

		foreach ($this->expenses as $key => $value) 
		{
			$net 	= $net - (int) str_replace(',', '', (string) $value->amount);
		}

		return new IDR($net);
	}

	public function repaymentCapacity($perc = 50)
	{
		$net 	= (int) str_replace(',', '', (string) $this->netIncome());

		return new IDR($net - ($net*$perc/100));
	}
}