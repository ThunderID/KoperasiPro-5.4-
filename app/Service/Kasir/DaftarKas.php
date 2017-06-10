<?php

namespace App\Service\Kasir;

///////////////
//   Models  //
///////////////
use App\Domain\Kasir\Models\HeaderTransaksi as Model;

use Hash, Exception, Session, TAuth, Carbon\Carbon;

/**
 * Class Services Application
 *
 * Meyimpan visa dari user tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class DaftarKas
{
	public $per_page 	= 15;
	public $page 		= 1;

	public function __construct()
	{
		$this->model 		= new Model;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return array $data
	 */
	public function get($queries = [])
	{
		$model 		= $this->queries($queries);

		//2. pagination
		if(isset($queries['per_page']))
		{
			$queries['take']	= $queries['per_page'];
			$this->per_page 	= $queries['per_page'];
		}
		else
		{
			$queries['take']	= 15;
		}

		if(isset($queries['page']))
		{
			$queries['skip']	= (($queries['page'] - 1) * $queries['take']);
			$this->page 		= $queries['page'];
		}
		else
		{
			$queries['skip']	= 0;
		}
		
		$model  				= $model->skip($queries['skip'])->take($queries['take'])->with(['details', 'orang'])->get()->toArray();

		return 	$model;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return array $data
	 */
	public function detailed($id)
	{
		$model 		= $this->queries([]);
		$model 		= $model->id($id)->with(['details', 'orang'])->first();

		return $model->toArray();
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
	public static function statuses()
	{
		return ['semua status' => null, 'pending' => 'pending', 'lunas' => 'lunas'];
	}
	
	/**
	 * this function mean keep executing
	 * @param numeric $page
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public static function statusLists($role)
	{
		return ['pending', 'lunas'];
	}

	private function queries($queries)
	{
		$active_office 			= TAuth::activeOffice();

		$model 					= $this->model;

		//1.allow status
		if(isset($queries['status']))
		{
			if(is_array($queries['status']))
			{
				foreach ($queries['status'] as $key => $value) 
				{
					if(!in_array($value, $this->statusLists($active_office['role'])))
					{
						throw new Exception("Forbidden", 1);
						
					}				
				}
			}
			elseif(!in_array($queries['status'], $this->statusLists($active_office['role'])))
			{
				throw new Exception("Forbidden", 1);
				
			}
		}
		else
		{
			$queries['status']	= $this->statusLists($active_office['role']);
		}

		$model  				= $model->status($queries['status']);

		//2.allow kantor
		$model  				= $model->koperasi($active_office['koperasi']['id']);

		//3.allow nomor_kredit
		if(isset($queries['nomor_kredit']))
		{
			$model  			= $model->nomorkredit($queries['nomor_kredit']);
		}

		//4.cari realisasi
		if(isset($queries['menunggu_realisasi']))
		{
			$model  			= $model->wherenotnull('referensi_id')->where('referensi_id', '<>', 0)->Where('tipe', 'bukti_kas_keluar')->where('status', 'pending')->with(['referensi']);
		}

		//5.sort klien
		if(isset($queries['urutkan']))
		{
			foreach ($queries['urutkan'] as $key => $value) 
			{
				switch (strtolower($key)) 
				{
					case 'tanggal_pembuatan':
						$model  			= $model->orderby('created_at', $value);
						break;
					case 'tanggal_sunting':
						$model  			= $model->orderby('updated_at', $value);
						break;
					default:
						$model  			= $model->orderby('updated_at', 'desc');
						break;
				}
			}
		}
		else
		{
			$model  			= $model->orderby('updated_at', 'desc');
		}

		return $model;
	} 
}
