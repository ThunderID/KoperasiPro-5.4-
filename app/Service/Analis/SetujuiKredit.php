<?php

namespace App\Service\Analis;

///////////////
//   Models  //
///////////////
use App\Domain\Pengajuan\Models\Pengajuan as Model;

use Hash, Exception, Session, TAuth, Carbon\Carbon;
use App\Infrastructure\Traits\IDRTrait;

/**
 * Class Services Application
 *
 * Meyimpan visa dari user tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class SetujuiKredit
{
	use IDRTrait;

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
	public function analize($queries = [])
	{
		$user 				= TAuth::loggedUser();
		$koperasi_id 		= [];
		$limit 				= 10000000;

		$should_be_scope 	= ['pengajuan_kredit', 'survei_kredit', 'setujui_kredit', 'realisasi_kredit', 'kas_harian', 'transaksi_harian'];

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('setujui_kredit', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					if(isset($value2['param']) && isset($value2['param']['limit']))
					{
						$koperasi_id[]	= $value['akses_koperasi_id'];
						$limit 			= $this->formatMoneyFrom($value2['param']['limit']);
					}
					else
					{
						$koperasi_id[]	= $value['akses_koperasi_id'];
						$limit 			= null;
					}
				}
			}
		}

		$koperasi_id 		= array_unique($koperasi_id);

		if(!is_null($limit))
		{
			$kredit 			= $this->model->whereIn('akses_koperasi_id', $koperasi_id)->status('menunggu_persetujuan')->where('pengajuan_kredit', '<', $limit)->with(['koperasi'])->get()->toArray();
		}
		else
		{
			$kredit 			= $this->model->whereIn('akses_koperasi_id', $koperasi_id)->status('menunggu_persetujuan')->with(['cabang'])->get()->toArray();
		}

		return $kredit;
	}
}
