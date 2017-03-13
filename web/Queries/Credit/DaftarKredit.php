<?php

namespace Thunderlabid\Application\Queries\Credit;

///////////////
//   Models  //
///////////////
use Thunderlabid\Credit\Models\Kredit as Model;

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
	public function read($queries = [])
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
		$model  				= $model->status($queries['status']);
		
		//2.allow koperasi
		$queries['koperasi_id']	= TAuth::activeOffice()['koperasi']['id'];
		$model  				= $model->koperasi($queries['koperasi_id']);

		//3. pagination
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
		
		$model  				= $model->skip($queries['skip'])->take($queries['take'])->with(['kreditur'])->get();

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
		$current_user 	= TAuth::activeOffice();
		switch (strtolower($current_user['role'])) 
		{
			case 'pimpinan':
				return ['pengajuan', 'survei', 'realisasi', 'tolak'];
				break;
			case 'marketing':
				return ['pengajuan'];
				break;
			case 'surveyor':
				return ['pengajuan', 'survei'];
				break;
			
			default:
				throw new Exception("Forbidden", 1);
				break;
		}
	}
}
