<?php

namespace Thunderlabid\Web\Queries\Credit;

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
		
		$model  				= $model->skip($queries['skip'])->take($queries['take'])->orderby('created_at', 'desc')->with(['kreditur'])->get();

		return 	$model->toArray();
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function detailed($id)
	{
		$model 			= $this->model->id($id)->with(['kreditur', 'kreditur.alamat', 'jaminan_kendaraan', 'jaminan_tanah_bangunan', 'jaminan_tanah_bangunan.alamat', 'riwayat_status'])->first();

		$parsed_credit 	=  $model->toArray();


		switch (strtolower($parsed_credit['status'])) 
		{
			case 'pengajuan':
				$parsed_credit['status_berikutnya']	= 'survei';
				break;
			case 'survei':
				$parsed_credit['status_berikutnya']	= 'realisasi';
				break;
			default:
				$parsed_credit['status_berikutnya']	= '';
				break;
		}

		$prev_index 		= count($parsed_credit['riwayat_status']) - 1;

		if($prev_index >= 1)
		{
			$prev_index 	= $prev_index - 1;
		}

		$parsed_credit['status_sebelumnya']	= $parsed_credit['riwayat_status'][$prev_index]['status'];
		
		return $parsed_credit;
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
		$model  				= $model->status($queries['status']);
		
		//2.allow koperasi
		$queries['koperasi_id']	= [TAuth::activeOffice()['koperasi']['id'], 0];
		$model  				= $model->koperasi($queries['koperasi_id']);

		//3.allow kreditur
		if(isset($queries['kreditur']))
		{
			$model  			= $model->kreditur($queries['kreditur']);
		}
		
		return $model;
	} 
}
