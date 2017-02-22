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
use Thunderlabid\Registry\Model\Finance as FinanceModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Owner as OwnerVO;
use Thunderlabid\Registry\Valueobject\Finance as FinanceVO;

////////////
// Entity //
////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\Finance;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository Finance
 *
 * Digunakan untuk Finance aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class FinanceRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data Finance dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = FinanceModel::skip($skip)
								->take($take)
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data Finance berdasarkan id dari database
	*
	* @param string $id
	* @return Finance $finance
	*/
	public static function findById($id)
	{
		$data = FinanceModel::find($id);

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
		$data = FinanceModel::where('owner.id', $id)->orderBy('created_at', 'desc')
					->first();

		if($data)
		{
			return Static::toEntity($data);
		}
		return Static::toEntity(new FinanceModel);
	}

	/**
	* Menampilkan data Finance berdasarkan pencarian nama nasabah dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = FinanceModel::where('owner.name', 'like', str_replace('*', '%', $name))
					->orderBy('owner.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menyimpan data Finance ke database
	*
	* @param IEntity $finance_entity
	* @return boolean
	*/
	public static function store(IEntity $finance_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$finance_entity instanceOf Finance)
		{
			throw new Exception("Parameter 1 must be a Finance Entity", 1);
		}

		//////////////////////
		//  Create Finance  //
		//////////////////////
		$finance_model 					= FinanceModel::findornew($finance_entity->id);
		if (!$finance_model->id)
		{
			$is_new_Finance = true;
		}

		$finance_model->_id				= $finance_entity->id;
		$finance_model->owner 			= ['id' => $finance_entity->owner->id, 'name' => $finance_entity->owner->name];

		///////////////
		//  Incomes  //
		///////////////
		$incomes						= [];
		foreach ($finance_entity->incomes as $income) 
		{
			$incomes[]					= [
					'description'		=> $income->description,
					'amount'			=> (string)$income->amount
			];
		}

		$finance_model->incomes	= $incomes;

		////////////////
		//  Expenses  //
		////////////////
		$expenses						= [];
		foreach ($finance_entity->expenses as $expense) 
		{
			$expenses[]					= [
					'description'		=> $expense->description,
					'amount'			=> (string)$expense->amount
			];
		}

		$finance_model->expenses	= $expenses;

		///////////////////////
		// Store Finance //
		///////////////////////
		try {
			$finance_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data Finance dari database
	*
	* @param IEntity $finance_entity
	* @return boolean
	*/
	public static function delete(IEntity $finance_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($finance_entity->id)
		{
			$finance_model = FinanceModel::findorfail($finance_entity->id);
		}

		#delete Finance
		$finance_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $finance_model
	* @return Finance $entity
	*/
	public static function toEntity(Model $finance_model)
	{
		///////////////
		//   Finance   //
		///////////////

		//Incomes
		$incomes 		= [];
		foreach ((array)$finance_model->incomes as $income)
		{
			$incomes[]	= new FinanceVO($income['description'], 
									$income['amount']
						);
		}

		//Expenses
		$expenses 		= [];
		foreach ((array)$finance_model->expenses as $expense)
		{
			$expenses[]	= new FinanceVO($expense['description'], 
									$expense['amount']
						);
		}

		//owner
		$owner 			= new OwnerVO($finance_model->owner['id'], $finance_model->owner['name']);

		$finance_entity	= new Finance($finance_model->id, 
									$owner,
									$incomes,
									$expenses
						);

		////////////////////////
		// Return Finance //
		////////////////////////
		return $finance_entity;
	}
}