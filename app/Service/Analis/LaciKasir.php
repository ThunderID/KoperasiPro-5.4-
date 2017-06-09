<?php

namespace App\Service\Analis;

///////////////
//   Models  //
///////////////
use TKredit\KreditAktif\Models\KreditAktif_RO as Model;

use App\Domain\Kasir\Models\DetailTransaksi;
use App\Domain\Kasir\Models\HeaderTransaksi;

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
class LaciKasir
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
	public function pemasukan($queries = [])
	{
		$user 				= TAuth::loggedUser();
		$koperasi_id 		= [];

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('transaksi_harian', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					$koperasi_id[]	= $value['immigration_ro_koperasi_id'];
				}
			}
		}

		$koperasi_id 		= array_unique($koperasi_id);

		$carbon 			= new Carbon;

		$bkm 				= DetailTransaksi::wherehas('header', function($q)use($koperasi_id, $carbon){$q->where('tipe', 'bukti_kas_masuk')->where('status', 'lunas')->koperasi($koperasi_id)->where('tanggal_pelunasan', '>=', $carbon->now()->startofDay()->format('Y-m-d H:i:s'))->where('tanggal_pelunasan', '<=', $carbon->now()->endOfDay()->format('Y-m-d H:i:s'));})->selectraw(\DB::raw('IFNULL(SUM(kuantitas * (harga_satuan - diskon_satuan)), 0) as total'))->first();

		return $this->formatMoneyTo($bkm['total']);
	}


	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return array $data
	 */
	public function list_pemasukan($queries = [])
	{
		$user 				= TAuth::loggedUser();
		$koperasi_id 		= [];

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('transaksi_harian', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					$koperasi_id[]	= $value['immigration_ro_koperasi_id'];
				}
			}
		}

		$koperasi_id 		= array_unique($koperasi_id);

		$bkm 				= HeaderTransaksi::where('tipe', 'bukti_kas_masuk')->where('status', 'lunas')->koperasi($koperasi_id)->where('tanggal_pelunasan', '>=', Carbon::now()->startofDay()->format('Y-m-d H:i:s'))->where('tanggal_pelunasan', '<=', Carbon::now()->endOfDay()->format('Y-m-d H:i:s'))->with(['details'])->get();

		return $bkm;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return array $data
	 */
	public function list_pengeluaran($queries = [])
	{
		$user 				= TAuth::loggedUser();
		$koperasi_id 		= [];

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('transaksi_harian', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					$koperasi_id[]	= $value['immigration_ro_koperasi_id'];
				}
			}
		}

		$koperasi_id 		= array_unique($koperasi_id);

		$bkm 				= HeaderTransaksi::where('tipe', 'bukti_kas_keluar')->where('status', 'lunas')->koperasi($koperasi_id)->where('tanggal_pelunasan', '>=', Carbon::now()->startofDay()->format('Y-m-d H:i:s'))->where('tanggal_pelunasan', '<=', Carbon::now()->endOfDay()->format('Y-m-d H:i:s'))->with(['details'])->get();

		return $bkm;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return array $data
	 */
	public function pengeluaran($queries = [])
	{
		$user 				= TAuth::loggedUser();
		$koperasi_id 		= [];

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('transaksi_harian', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					$koperasi_id[]	= $value['immigration_ro_koperasi_id'];
				}
			}
		}

		$koperasi_id 		= array_unique($koperasi_id);
		$carbon 			= new Carbon;

		$bkk 				= DetailTransaksi::wherehas('header', function($q)use($koperasi_id, $carbon){$q->where('tipe', 'bukti_kas_keluar')->where('status', 'lunas')->koperasi($koperasi_id)->where('tanggal_pelunasan', '>=', $carbon->now()->startofDay()->format('Y-m-d H:i:s'))->where('tanggal_pelunasan', '<=', $carbon->now()->endOfDay()->format('Y-m-d H:i:s'));})->selectraw(\DB::raw('IFNULL(SUM(kuantitas * (harga_satuan - diskon_satuan)), 0) as total'))->first();

		return $this->formatMoneyTo($bkk['total']);
	}
}
