<?php

namespace Thunderlabid\Immigration\Repositories;

///////////////////////
// Interface & Trait //
///////////////////////
use Thunderlabid\Immigration\Repositories\Interfaces\IRepository;
use Thunderlabid\Immigration\Repositories\Traits\IRepositoryTrait;

////////////
// Entity //
////////////
use Thunderlabid\Immigration\Entities\Interfaces\IEntity;
use Thunderlabid\Immigration\Entities\User;

////////////////////
// Specifications //
////////////////////
use Thunderlabid\Immigration\Repositories\Specifications\Interfaces\ISpecification;

//////////////////
// Transformers //
//////////////////
use Thunderlabid\Immigration\Infrastructures\Transformers\UserTransformer as Transformer;

///////////
// Model //
///////////
use Thunderlabid\Immigration\Infrastructures\Models\User as Model;

///////////////
// Utilities //
///////////////
use Ramsey\Uuid\Uuid;
use Exception;
use DB;

/**
 * Repository User
 *
 * Digunakan untuk User aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 */
class UserRepository implements IRepository 
{ 
	use IRepositoryTrait;
	
	public function __construct()
	{
		$this->transformer 		= new Transformer;
		$this->model 			= new Model;
	}


	/**
	* Menampilkan semua data User dari database
	*
	* @param array $specifications
	* @return Model $model
	* @throws Exception $message
	*/
	public function count($specifications = [])
	{
		///////////////////////////////////////////////////////
		// Check if specifications is type of ISpecification //
		///////////////////////////////////////////////////////
		foreach ($specifications as $specification)
		{
			if (!$specification instanceOf ISpecification)
			{
				throw new Exception(json_encode(['Parameter 1 is not instance of ISpecification']), 1);
			}
		}

		//////////////////////////////
		// Apply each specification //
		//////////////////////////////

		$model = new Model;
		$model = $model->newInstance();
		foreach ($specifications as $specification)
		{
			$model = $specification->apply($model);			
		}

		return $model->count();
	}

	/**
	* Menghapus data User dari database
	*
	* @param IEntity $user_entity
	* @return boolean
	*/
	public function remove($user_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($user_entity->id)
		{
			$user_model = Model::findorfail($user_entity->id);
		}

		#delete User
		$user_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

}