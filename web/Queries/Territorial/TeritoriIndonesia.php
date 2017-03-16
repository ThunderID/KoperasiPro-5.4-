<?php

namespace Thunderlabid\Application\Queries\Territorial;

///////////////
//   Models  //
///////////////
use Thunderlabid\Territorial\Models\Provinsi_RO as Model;
use Thunderlabid\Territorial\Models\Regensi_RO;
use Thunderlabid\Territorial\Models\Distrik_RO;
use Thunderlabid\Territorial\Models\Desa_RO;

use Hash, Exception, Session, TAuth;

/**
 * Class Services Application
 *
 * Meyimpan visa dari user tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class TeritoriIndonesia
{
	public function __construct()
	{
		$this->model 		= new Model;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function get($queries = [])
	{
		$model 		= $this->queries($queries);
		
		$model		= $model->get();

		return 	$model->toArray();
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function count($queries = [])
	{
		$model 		= $this->queries($queries);
		$model		= $model->count();

		return 	$model;
	}

	private function queries($queries)
	{
		$model 					= $this->model;

		//1.check model regensi
		if(isset($queries['regensi_dari']))
		{
			$model 				= new Regensi_RO;
			$model 				= $model->where('territorial_provinsi_id', $queries['regensi_dari']);
		}

		//2.check model distrik
		if(isset($queries['distrik_dari']))
		{
			$model 				= new Distrik_RO;
			$model 				= $model->where('territorial_regensi_id', $queries['distrik_dari']);
		}

		//3.check model desa
		if(isset($queries['desa_dari']))
		{
			$model 				= new Desa_RO;
			$model 				= $model->where('territorial_distrik_id', $queries['desa_dari']);
		}

		//5.check model negara
		if($model instanceOf Model)
		{
			$model 				= $model->where('territorial_negara_id', 'ID');
		}
		
		return $model;
	} 
}
