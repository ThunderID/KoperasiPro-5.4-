<?php

namespace Thunderlabid\Credit\Repositories;

///////////////////////
// Interface & Trait //
///////////////////////
use Thunderlabid\Credit\Repositories\Interfaces\IRepository;
use Thunderlabid\Credit\Repositories\Traits\IRepositoryTrait;

////////////
// Entity //
////////////
use Thunderlabid\Credit\Entities\Interfaces\IEntity;
use Thunderlabid\Credit\Entities\Credit;

////////////////////
// Specifications //
////////////////////
use Thunderlabid\Credit\Repositories\Specifications\Interfaces\ISpecification;

//////////////////
// Transformers //
//////////////////
use Thunderlabid\Credit\Infrastructures\Transformers\CreditTransformer as Transformer;

///////////
// Model //
///////////
use Thunderlabid\Credit\Infrastructures\Models\Credit as Model;

///////////////
// Utilities //
///////////////
use Ramsey\Uuid\Uuid;
use Exception;
use DB;

/**
 * Repository Credit
 *
 * Digunakan untuk Credit aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 */
class CreditRepository implements IRepository 
{ 
	use IRepositoryTrait;
	
	public function __construct()
	{
		$this->transformer 		= new Transformer;
		$this->model 			= new Model;
	}

	/**
	* Menghapus data Credit dari database
	*
	* @param IEntity $credit_entity
	* @return boolean
	*/
	public function remove($credit_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($credit_entity->id)
		{
			$credit_model = Model::findorfail($credit_entity->id);
		}

		#delete Credit
		$credit_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

}