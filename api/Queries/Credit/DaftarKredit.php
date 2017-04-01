<?php

namespace Thunderlabid\API\Queries\Credit;

///////////////
//   Models  //
///////////////
use Thunderlabid\Credit\Models\PengajuanMobile_RO as Model;

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
class DaftarKredit
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
		
		$model  				= $model->skip($queries['skip'])->take($queries['take'])->with(['kredit'])->get();

		return 	$model->toArray();
	}
	
	/**
	 * this function mean keep executing
	 * @param numeric $page
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function statusLists()
	{
		return ['pengajuan'];
	}

	private function queries($queries)
	{
		$model 					= $this->model;
		
		//1.allow status
		if(isset($queries['status']))
		{
			if(!in_array($queries['status'], $this->statusLists()))
			{
				throw new Exception("Forbidden", 1);
				
			}
		}
		else
		{
			$queries['status']	= $this->statusLists();
		}

		//2.allow koperasi
		$model  				= $model->where('model', $queries['model'])->whereHas('kredit', function($q)use($queries){return $q->status($queries['status']);});

		return $model;
	} 
}
