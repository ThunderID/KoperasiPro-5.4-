<?php

namespace Thunderlabid\Notification\Repository;

///////////////////////
// Interface & Trait //
///////////////////////
use Thunderlabid\Notification\Repository\Interfaces\IRepository;
use Thunderlabid\Notification\Repository\Traits\IRepositoryTrait;

///////////
// Model //
///////////
use Jenssegers\Mongodb\Eloquent\Model;
use Thunderlabid\Notification\Model\Notification as NotificationModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Notification\Valueobject\Office as OfficeVO;

////////////
// Entity //
////////////
use Thunderlabid\Notification\Entity\Interfaces\IEntity;
use Thunderlabid\Notification\Entity\Notification;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository Notification
 *
 * Digunakan untuk Notification aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Notification
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class NotificationRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data Notification dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = NotificationModel::skip($skip)
								->take($take)
								->orderBy('Notificationor.name')
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data Notification berdasarkan id dari database
	*
	* @param string $id
	* @return Notification $notification
	*/
	public static function findById($id)
	{
		$data = NotificationModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data Notification berdasarkan pencarian nama nasabah dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = NotificationModel::where('Notificationor.name', 'like', str_replace('*', '%', $name))
					->orderBy('Notificationor.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menampilkan data Notification berdasarkan pencarian status dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByStatus($status, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = NotificationModel::where('status', $status)
					->skip($skip)
					->take($take)
					->orderBy('Notificationor.name')
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menampilkan data Notification berdasarkan pencarian nama nasabah dan status dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function findByStatusAndName($status, $name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = NotificationModel::where('Notificationor.name', 'like', '%'.$name.'%')
					->where('status', $status)
					->orderBy('Notificationor.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menyimpan data Notification ke database
	*
	* @param IEntity $notification_entity
	* @return boolean
	*/
	public static function store(IEntity $notification_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$notification_entity instanceOf Notification)
		{
			throw new Exception("Parameter 1 must be a Notification Entity", 1);
		}

		$is_new_Notification	= false;

		////////////////////////////
		//   Create Notification  //
		////////////////////////////
		$notification_model 					= NotificationModel::findornew($notification_entity->id);
		if (!$notification_model->id)
		{
			$is_new_Notification = true;
		}

		//office
		$notification_model->office 			= ['id' => $notification_entity->office->id, 'name' => $notification_entity->office->name];

		$notification_model->_id 				= $notification_entity->id;
		$notification_model->description 		= (string)$notification_entity->description;
		$notification_model->when 				= (string)$notification_entity->when->format('Y-m-d');
		$notification_model->link 				= (string)$notification_entity->link;
		$notification_model->labels 			= (array)$notification_entity->labels;

		///////////////////////
		// Store Notification //
		///////////////////////
		try {
			$notification_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data Notification dari database
	*
	* @param IEntity $notification_entity
	* @return boolean
	*/
	public static function delete(IEntity $notification_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($notification_entity->id)
		{
			$notification_model = NotificationModel::findorfail($notification_entity->id);
		}

		#delete Notification
		$notification_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $notification_model
	* @return Notification $entity
	*/
	public static function toEntity(Model $notification_model)
	{
		////////////////////
		//  Notification  //
		////////////////////
		//Office
		$office 				= new OfficeVO($notification_model->office['id'], $notification_model->office['name']);

		//Notification
		$notification_entity	= new Notification($notification_model->_id, 
												$notification_model->description,
												$notification_model->when,
												$notification_model->link,
												$office,
												$notification_model->labels
								);

		/////////////////////////
		// Return Notification //
		/////////////////////////
		return $notification_entity;
	}
}