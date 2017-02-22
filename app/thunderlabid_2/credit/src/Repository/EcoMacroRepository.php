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
use Thunderlabid\Credit\Model\EcoMacro as EcoMacroModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Credit\Valueobject\Credit as CreditVO;

////////////
// Entity //
////////////
use Thunderlabid\Credit\Entity\Interfaces\IEntity;
use Thunderlabid\Credit\Entity\EcoMacro;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository EcoMacro
 *
 * Digunakan untuk EcoMacro aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class EcoMacroRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data EcoMacro dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = EcoMacroModel::skip($skip)
								->take($take)
								->orderBy('created_at')
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data EcoMacro berdasarkan id dari database
	*
	* @param string $id
	* @return EcoMacro $eco_macro
	*/
	public static function findById($id)
	{
		$data = EcoMacroModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data Collateral berdasarkan pencarian id nasabah
	*
	* @param string $id, $take, string $skip
	* @return array of object
	*/
	public static function FindByCreditID($id)
	{
		$data = EcoMacroModel::where('credit.id', $id)->orderBy('created_at', 'desc')
					->first();

		if($data)
		{
			return Static::toEntity($data);
		}
		return Static::toEntity(new EcoMacroModel);
	}

	/**
	* Menyimpan data EcoMacro ke database
	*
	* @param IEntity $eco_macro_entity
	* @return boolean
	*/
	public static function store(IEntity $eco_macro_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$eco_macro_entity instanceOf EcoMacro)
		{
			throw new Exception("Parameter 1 must be a EcoMacro Entity", 1);
		}

		$is_new_eco_macro	= false;

		////////////////////////////
		//   Create EcoMacro  //
		////////////////////////////
		$eco_macro_model 					= EcoMacroModel::findornew($eco_macro_entity->id);
		if (!$eco_macro_model->id)
		{
			$is_new_eco_macro = true;
		}

		//credit
		$eco_macro_model->credit 			= ['id' => $eco_macro_entity->credit->id];

		$eco_macro_model->_id 				= $eco_macro_entity->id;
		$eco_macro_model->competition 		= (string)$eco_macro_entity->competition;
		$eco_macro_model->prospect 			= (string)$eco_macro_entity->prospect;
		$eco_macro_model->turn_over 		= (string)$eco_macro_entity->turn_over;
		$eco_macro_model->risk 				= (string)$eco_macro_entity->risk;
		$eco_macro_model->experience 		= (string)$eco_macro_entity->experience;
		$eco_macro_model->daily_customer 	= (string)$eco_macro_entity->daily_customer;
		$eco_macro_model->others 			= (array)$eco_macro_entity->others;

		///////////////////////
		// Store EcoMacro //
		///////////////////////
		try {
			$eco_macro_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data EcoMacro dari database
	*
	* @param IEntity $eco_macro_entity
	* @return boolean
	*/
	public static function delete(IEntity $eco_macro_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($eco_macro_entity->id)
		{
			$eco_macro_model = EcoMacroModel::findorfail($eco_macro_entity->id);
		}

		#delete EcoMacro
		$eco_macro_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $eco_macro_model
	* @return EcoMacro $entity
	*/
	public static function toEntity(Model $eco_macro_model)
	{
		////////////////////
		//  EcoMacro  //
		////////////////////
		//credit
		$credit 			= new CreditVO($eco_macro_model->credit['id']);

		//EcoMacro
		$eco_macro_entity	= new EcoMacro($eco_macro_model->_id, 
												$credit,
												$eco_macro_model->competition,
												$eco_macro_model->prospect,
												$eco_macro_model->turn_over,
												$eco_macro_model->experience,
												$eco_macro_model->risk,
												$eco_macro_model->daily_customer,
												$eco_macro_model->others
								);

		/////////////////////////
		// Return EcoMacro //
		/////////////////////////
		return $eco_macro_entity;
	}
}