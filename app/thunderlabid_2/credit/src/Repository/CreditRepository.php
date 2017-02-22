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
use Thunderlabid\Credit\Model\Credit as CreditModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Credit\Valueobject\Owner as OwnerVO;
use Thunderlabid\Credit\Valueobject\Collateral as CollateralVO;
use Thunderlabid\Credit\Valueobject\Author as AuthorVO;
use Thunderlabid\Credit\Valueobject\Status as StatusVO;
use Thunderlabid\Credit\Valueobject\Office as OfficeVO;

////////////
// Entity //
////////////
use Thunderlabid\Credit\Entity\Interfaces\IEntity;
use Thunderlabid\Credit\Entity\Credit;

///////////
// Event //
///////////
use Thunderlabid\Credit\Event\CreditDraftingEvent;
use Thunderlabid\Credit\Event\CreditAnalizingEvent;
use Thunderlabid\Credit\Event\CreditProposingEvent;
use Thunderlabid\Credit\Event\CreditAcceptedEvent;
use Thunderlabid\Credit\Event\CreditDeclinedEvent;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository Credit
 *
 * Digunakan untuk Credit aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class CreditRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data Credit dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = CreditModel::skip($skip)
								->take($take)
								->orderBy('creditor.name')
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data Credit berdasarkan id dari database
	*
	* @param string $id
	* @return Credit $credit
	*/
	public static function findById($id)
	{
		$data = CreditModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data Credit berdasarkan pencarian nama nasabah dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = CreditModel::where('creditor.name', 'like', str_replace('*', '%', $name))
					->orderBy('creditor.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menampilkan data Credit berdasarkan pencarian status dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByStatus($status, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = new CreditModel;

		if(is_array($status))
		{
			$data 	= $data->whereIn('status', $status);
		}
		else
		{
			$data 	= $data->where('status', $status);
		}

		$data = $data->skip($skip)
					->take($take)
					->orderBy('creditor.name')
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}


	/**
	* Menampilkan data Credit berdasarkan pencarian status dari database
	*
	* @param string $status, $officeid, $take, string $skip
	* @return array of object
	*/
	public static function findByStatusInOffice($status, $officeid, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = new CreditModel;

		if(is_array($status))
		{
			$data 	= $data->whereIn('status', $status);
		}
		else
		{
			$data 	= $data->where('status', $status);
		}

		$data = $data->where('office.id', $officeid)
					->skip($skip)
					->take($take)
					->orderBy('creditor.name')
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menampilkan data Credit berdasarkan pencarian nama nasabah dan status dari database
	*
	* @param string $status, $name, $take, string $skip
	* @return array of object
	*/
	public static function findByStatusAndName($status, $name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = CreditModel::where('creditor.name', 'like', '%'.$name.'%')
					->where('status', $status)
					->orderBy('creditor.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}


	/**
	* Menampilkan data Credit berdasarkan pencarian nama nasabah dan status dari database
	*
	* @param string $status, $officeid, $name, $take, string $skip
	* @return array of object
	*/
	public static function findByStatusInOfficeAndName($status, $officeid, $name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = CreditModel::where('creditor.name', 'like', '%'.$name.'%')
					->where('office.id', $officeid)
					->where('status', $status)
					->orderBy('creditor.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menyimpan data Credit ke database
	*
	* @param IEntity $credit_entity
	* @return boolean
	*/
	public static function store(IEntity $credit_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$credit_entity instanceOf Credit)
		{
			throw new Exception("Parameter 1 must be a Credit Entity", 1);
		}

		$is_new_credit	= false;

		//////////////////////
		//   Create Credit  //
		//////////////////////
		$credit_model 					= CreditModel::findornew($credit_entity->id);
		if (!$credit_model->id)
		{
			$is_new_credit = true;
		}

		//creditor
		$credit_model->creditor 		= ['id' => $credit_entity->creditor->id, 'name' => $credit_entity->creditor->name];

		//warrantor
		$credit_model->warrantor 		= ['id' => $credit_entity->warrantor->id, 'name' => $credit_entity->warrantor->name];

		//office
		$credit_model->office 			= ['id' => $credit_entity->office->id, 'name' => $credit_entity->office->name];

		$credit_model->_id 					= $credit_entity->id;
		$credit_model->credit_amount 		= (string)$credit_entity->credit_amount;
		$credit_model->installment_capacity	= (string)$credit_entity->installment_capacity;
		$credit_model->period 				= (string)$credit_entity->period;
		$credit_model->purpose 				= (string)$credit_entity->purpose;
		$credit_model->status 				= $credit_entity->status;

		////////////////
		//  Statuses  //
		////////////////
		$statuses					= [];
		foreach ($credit_entity->statuses as $status) 
		{
			$author 				= ['id' => $status->author->id, 'name' => $status->author->name, 'role' => $status->author->role];
			$statuses[]				= [
					'status'		=> $status->status,
					'description'	=> $status->description,
					'date'			=> $status->date->format('Y-m-d'),
					'author'		=> $author
			];
		}
										
		$credit_model->statuses		= $statuses;


		///////////////////
		//  Collaterals  //
		///////////////////
		$collaterals					= [];
		foreach ($credit_entity->collaterals as $collateral) 
		{
			$collaterals[]				= [
					'type'				=> $collateral->type,
					'legal'				=> $collateral->legal,
					'ownership_status'	=> $collateral->ownership_status
			];
		}
										
		$credit_model->collaterals		= $collaterals;

		//here is function to raise event based on policy changed
		self::raiseEvent($credit_entity, $is_new_credit);

		///////////////////////
		// Store Credit //
		///////////////////////
		try {
			$credit_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data Credit dari database
	*
	* @param IEntity $credit_entity
	* @return boolean
	*/
	public static function delete(IEntity $credit_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($credit_entity->id)
		{
			$credit_model = CreditModel::findorfail($credit_entity->id);
		}

		#delete Credit
		$credit_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $credit_model
	* @return Credit $entity
	*/
	public static function toEntity(Model $credit_model)
	{
		///////////////
		//  Credit   //
		///////////////

		//creditor
		$creditor 			= new OwnerVO($credit_model->creditor['id'], $credit_model->creditor['name']);

		//warrantor
		$warrantor 			= new OwnerVO($credit_model->warrantor['id'], $credit_model->warrantor['name']);

		//Collaterals
		$collaterals 		= [];
		foreach ((array)$credit_model->collaterals as $collateral)
		{
			$collaterals[]	= new CollateralVO($collateral['type'], 
									$collateral['legal'], 
									$collateral['ownership_status']
						);
		}

		//Statuses
		$statuses 			= [];
		foreach ((array)$credit_model->statuses as $status)
		{
			$author 		= new AuthorVO($status['author']['id'],$status['author']['name'],$status['author']['role']);

			$statuses[]		= new StatusVO($status['status'], 
										$status['description'], 
										$status['date'],
										$author
							);
		}

		//office
		$office				= new OfficeVO($credit_model->office['id'], 
										$credit_model->office['name']
							);

		//Credit
		$credit_entity	= new Credit($credit_model->_id, 
									$creditor,
									$credit_model->credit_amount,
									$credit_model->installment_capacity,
									$credit_model->period,
									$credit_model->purpose,
									$warrantor,
									$collaterals,
									$statuses,
									$office,
									$credit_model->status
						);

		////////////////////////
		// Return Credit //
		////////////////////////
		return $credit_entity;
	}

	private static function raiseEvent($credit_entity, $is_new_credit)
	{
		//check apakah ada data baru
		if($is_new_credit)
		{
			event(new CreditDraftingEvent($credit_entity));

			return true;
		}

		//jika data lama adakah perubahan status
		switch($credit_entity->status)
		{
			case 'analizing':
				event(new CreditAnalizingEvent($credit_entity));
				break;
			case 'proposing':
				event(new CreditProposingEvent($credit_entity));
				break;
			case 'accepted':
				event(new CreditAcceptedEvent($credit_entity));
				break;
			case 'declined':
				event(new CreditDeclinedEvent($credit_entity));
				break;
			default :
				event(new CreditDraftingEvent($credit_entity));
				break;
		}

		return true;
	}
}