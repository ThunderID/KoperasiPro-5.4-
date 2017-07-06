<?php

namespace App\Service\Analis;

///////////////
//   Models  //
///////////////
use App\Domain\Akses\Models\Koperasi as Model;
use App\Domain\Akses\Models\Visa;

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
class CabangKekuranganOrang
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
	public function analize($queries = [], $user)
	{
		$koperasi_id 		= [];

		$should_be_scope 	= ['pengajuan_kredit', 'survei_kredit', 'setujui_kredit', 'realisasi_kredit', 'kas_harian', 'transaksi_harian'];

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('modifikasi_koperasi', $value2['list']) || str_is('atur_akses', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					$koperasi_id[]		= $value['koperasi']['id'];
				}
			}
		}

		$koperasi_id 		= array_unique($koperasi_id);

		$koperasi 			= $this->model->id($koperasi_id)->get()->toArray();

		foreach ($koperasi as $key => $value) 
		{
			$pengguna 		= collect(Visa::where('akses_koperasi_id', $value['id'])->get()->toArray());

			$koperasi[$key]['total_user']		= $pengguna->groupby('immigration_pengguna_id')->count();
			$koperasi[$key]['scopes']			= [];

			foreach ($pengguna as $key2 => $value2) 
			{
				foreach ($value2['scopes'] as $key3 => $value3) 
				{
					if((!str_is('modifikasi_koperasi', $value3['list']) || !str_is('atur_akses', $value3['list'])))
					{
						$koperasi[$key]['scopes'][] 	= $value3['list'];
					}
				}
			}

			$koperasi[$key]['scopes'] 		= array_unique($koperasi[$key]['scopes']);
			$koperasi[$key]['empty_scopes']	= array_diff($should_be_scope, $koperasi[$key]['scopes']);

			if(empty($koperasi[$key]['empty_scopes']))
			{
				unset($koperasi[$key]);
			}
			elseif(count($koperasi[$key]['empty_scopes']) == count($should_be_scope))
			{
				$koperasi[$key]['baru']		= true;
			}
			else
			{
				$koperasi[$key]['baru']		= false;
			}
		}

		return $koperasi;
	}
}
