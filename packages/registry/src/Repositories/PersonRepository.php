<?php

namespace Thunderlabid\Registry\Repositories;

///////////////////////
// Interface & Trait //
///////////////////////
use Thunderlabid\Registry\Repositories\Interfaces\IRepository;
use Thunderlabid\Registry\Repositories\Traits\IRepositoryTrait;

////////////
// Entity //
////////////
use Thunderlabid\Registry\Entities\Interfaces\IEntity;
use Thunderlabid\Registry\Entities\Registry;

////////////////////
// Specifications //
////////////////////
use Thunderlabid\Registry\Repositories\Specifications\Interfaces\ISpecification;

//////////////////
// Transformers //
//////////////////
use Thunderlabid\Registry\Infrastructures\Transformers\PersonTransformer as Transformer;
use Thunderlabid\Registry\Infrastructures\Transformers\MacroTransformer;
use Thunderlabid\Registry\Infrastructures\Transformers\AssetTransformer;
use Thunderlabid\Registry\Infrastructures\Transformers\FinanceTransformer;
use Thunderlabid\Registry\Infrastructures\Transformers\PersonalityTransformer;

///////////
// Model //
///////////
use Thunderlabid\Registry\Infrastructures\Models\Person as Model;
use Thunderlabid\Registry\Infrastructures\Models\Personality;
use Thunderlabid\Registry\Infrastructures\Models\Finance;
use Thunderlabid\Registry\Infrastructures\Models\Asset;
use Thunderlabid\Registry\Infrastructures\Models\Macro;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobjects\Personality as PersonalityVO;
use Thunderlabid\Registry\Valueobjects\Finance as FinanceVO;
use Thunderlabid\Registry\Valueobjects\Asset as AssetVO;
use Thunderlabid\Registry\Valueobjects\Macro as MacroVO;

///////////////
// Utilities //
///////////////
use Ramsey\Uuid\Uuid;
use Exception;
use DB;

/**
 * Repository Registry
 *
 * Digunakan untuk Registry aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 */
class PersonRepository implements IRepository 
{ 
	use IRepositoryTrait;
	
	public function __construct()
	{
		$this->transformer 		= new Transformer;
		$this->model 			= new Model;
	}

	/**
	 * Query collection
	 * @param  [ISpecification[]] $specifications
	 * @return  [array] $entities
	 */
	public function query($specifications = [])
	{
		///////////////////////////////////////////////////////
		// Check if specifications is type of ISpecification //
		///////////////////////////////////////////////////////
		foreach ($specifications as $specification)
		{
			if (!$specification instanceOf ISpecification)
			{
				throw new InvalidArgumentException('Parameter 1 is not instance of ISpecification');
			}
		}
		
		//////////////////////////////
		// Apply each specification //
		//////////////////////////////
		$model = $this->model->newInstance();
		foreach ($specifications as $specification)
		{
			$model = $specification->apply($model);
		}

		$entities = [];
		$data 		= $model->get();
		foreach ($data as $x)
		{
			//find model 
			//kepribadian
			$kepribadian 	= new Personality;
			$kepribadian 	= $kepribadian->personid($x->_id)->first();
			$x->kepribadian = $kepribadian;
			
			//keuangan
			$keuangan 		= new Finance;
			$keuangan 		= $keuangan->personid($x->_id)->first();
			$x->keuangan 	= $keuangan;
			
			//aset
			$aset 			= new Asset;
			$aset 			= $aset->personid($x->_id)->first();
			$x->aset 		= $aset;

			//makro
			$makro 			= new Macro;
			$makro 			= $makro->personid($x->_id)->first();
			$x->makro 		= $makro;

			$entities[] 	= $this->transformer->toEntity($x);
		}
		return $entities;
	}


	/**
	* Menampilkan semua data Registry dari database
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
	 * Add entity to collection or update entity in collections
	 * @param  [IEntity] $entity 
	 */
	public function store($entity)
	{
		$model = $this->model->newInstance();

		try {

			///////////////////////
			// Begin Transaction //
			///////////////////////
			// DB::beginTransaction();

			/////////////////////////
			// Convert to Eloquent //
			/////////////////////////
			$model = $this->transformer->toEloquent($entity);


			///////////////////
			// Save Eloquent //
			///////////////////
			$model->save();

			//////////////////////
			// Save kepribadian //
			//////////////////////
			if($entity->kepribadian instanceOf PersonalityVO)
			{
				$kepribadian_model 	= new PersonalityTransformer;
				$kepribadian_model 	= $kepribadian_model->toEloquent($entity);

				$kepribadian_model->save();
			}

			///////////////////
			// Save Keuangan //
			///////////////////
			if($entity->keuangan instanceOf FinanceVO)
			{
				$keuangan_model 	= new FinanceTransformer;
				$keuangan_model 	= $keuangan_model->toEloquent($entity);

				$keuangan_model->save();
			}

			///////////////
			// Save Aset //
			///////////////
			if($entity->aset instanceOf AssetVO)
			{
				$aset_model 		= new AssetTransformer;
				$aset_model 		= $aset_model->toEloquent($entity);

				$aset_model->save();
			}

			///////////////
			// Save Macro //
			///////////////
			if($entity->makro instanceOf MacroVO)
			{
				$macro_model 		= new MacroTransformer;
				$macro_model 		= $macro_model->toEloquent($entity);

				$macro_model->save();
			}

			//////////////////
			// Raise Events //
			//////////////////
			$entity->raiseEvent();

			////////////
			// Commit //
			////////////
			// DB::commit();

		} catch (Exception $e) {

			//////////////
			// Rollback //
			//////////////
			DB::rollback();

			///////////////
			// Exception //
			///////////////
			throw $e;
		}

		return $this->transformer->toEntity($model);
	}

	/**
	* Menghapus data Registry dari database
	*
	* @param IEntity $registry_entity
	* @return boolean
	*/
	public function remove($registry_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($registry_entity->id)
		{
			$registry_model = Model::findorfail($registry_entity->id);
		}

		#delete Registry
		$registry_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

}