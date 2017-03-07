<?php

namespace Thunderlabid\Immigration\Repositories;

use Thunderlabid\Immigration\Repositories\Interfaces\IRepository;
use Thunderlabid\Immigration\Repositories\Traits\IRepositoryTrait;

use Thunderlabid\Immigration\Infrastructures\Models\Channel;
use Thunderlabid\Immigration\Infrastructures\Transformers\ChannelTransformer;

use Thunderlabid\Immigration\Events\ChannelDeleted;

use Exception;
use DB;

class ChannelRepository implements IRepository
{
	use IRepositoryTrait;

	public function __construct()
	{
		$this->model 		= new Channel;
		$this->transformer 	= new ChannelTransformer;
	}

	/**
	 * Remove entity in collections
	 * @param  [IEntity] $entity 
	 */
	public function remove($entity)
	{
		if ($entity->id)
		{
			try {
				//////////////////
				// Begin Atomic //
				//////////////////
				DB::beginTransaction();

				////////////
				// Delete //
				////////////
				$this->model->newInstance()->where('id', '=', $entity->id)->delete();

				//////////////////
				// Raise Events //
				//////////////////
				$this->addEvent(new ChannelDeleted($entity));
				$this->raiseEvent();

				////////////
				// Commit //
				////////////
				DB::commit();
			} catch (Exception $e) {
				throw $e;				
			}
		}
		else
		{
			///////////////
			// Exception //
			///////////////
			throw new Exception('Channel not found');
		}
	}
}
