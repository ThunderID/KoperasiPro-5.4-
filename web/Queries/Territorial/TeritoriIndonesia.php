<?php

namespace Thunderlabid\Application\Queries\Territorial;

///////////////
//   Models  //
///////////////
use Thunderlabid\Territorial\Models\Negara_RO as Model;
use Thunderlabid\Territorial\Models\Provinsi_RO;
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

		//2. pagination
		if(isset($queries['per_page']))
		{
			$queries['take']	= $queries['per_page'];
		}
		else
		{
			$queries['take']	= 15;
		}

		if(isset($queries['page']))
		{
			$queries['skip']	= ($queries['page'] * $queries['take']);
		}
		else
		{
			$queries['skip']	= 0;
		}
		
		$model  				= $model->skip($queries['skip'])->take($queries['take'])->get();

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

		//1.check model provinsi
		if(isset($queries['provinsi']))
		{
			$model 				= new Provinsi_RO;
			$model 				= $model->id($queries['provinsi'])->with(['regensi']);
		}

		//2.check model regensi
		if(isset($queries['regensi']))
		{
			$model 				= new Regensi_RO;
			$model 				= $model->id($queries['regensi'])->with(['distrik']);
		}
		
		//3.check model distrik
		if(isset($queries['distrik']))
		{
			$model 				= new Distrik_RO;
			$model 				= $model->id($queries['distrik'])->with(['desa']);
		}

		//4.check model desa
		if(isset($queries['desa']))
		{
			$model 				= new Desa_RO;
			$model 				= $model->id($queries['desa']);
		}

		//5.check model negara
		if($model instanceOf Model)
		{
			$model 				= $model->id('ID')->with(['provinsi']);
		}
		
		return $model;
	} 
}
