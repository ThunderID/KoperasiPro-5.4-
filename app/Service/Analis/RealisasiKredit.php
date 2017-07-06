<?php

namespace App\Service\Analis;

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
class RealisasiKredit
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

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('realisasi_kredit', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					$koperasi_id[]	= $value['akses_koperasi_id'];
				}
			}
		}

		$koperasi_id 		= array_unique($koperasi_id);

		$bkk 				= $this->model->status('pending')->where('tipe', 'bukti_kas_keluar')->wherenotnull('pengajuan_id')->Where('pengajuan_id', '<>', 0)->with(['orang', 'referensi'])->get()->toArray();

		return $bkk;
	}
}
