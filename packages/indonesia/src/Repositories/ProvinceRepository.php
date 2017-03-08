<?php

namespace Thunderlabid\Indonesia\Repositories;

///////////////////////
// Interface & Trait //
///////////////////////
use Thunderlabid\Indonesia\Repositories\Interfaces\IRepository;
use Thunderlabid\Indonesia\Repositories\Traits\IRepositoryTrait;

////////////
// Entity //
////////////
use Thunderlabid\Indonesia\Entities\Interfaces\IEntity;
use Thunderlabid\Indonesia\Entities\Province;

////////////////////
// Specifications //
////////////////////
use Thunderlabid\Indonesia\Repositories\Specifications\Interfaces\ISpecification;

//////////////////
// Transformers //
//////////////////
use Thunderlabid\Indonesia\Infrastructures\Transformers\ProvinceTransformer as Transformer;

///////////
// Model //
///////////
use Thunderlabid\Indonesia\Infrastructures\Models\Province as Model;

///////////////
// Utilities //
///////////////
use Ramsey\Uuid\Uuid;
use Exception;
use DB;

/**
 * Repository Province
 *
 * Digunakan untuk Province aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Indonesia
 */
class ProvinceRepository implements IRepository 
{ 
	use IRepositoryTrait;
	
	public function __construct()
	{
		$this->transformer 		= new Transformer;
		$this->model 			= new Model;
	}


	/**
	* Menampilkan semua data Province dari database
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
	* Menghapus data Province dari database
	*
	* @param IEntity $province_entity
	* @return boolean
	*/
	public function remove($province_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($province_entity->id)
		{
			$province_model = Model::findorfail($province_entity->id);
		}

		#delete Province
		$province_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

}