<?php
namespace App\Http\Controllers;

use App\Infrastructure\Traits\IDRTrait;

use Input;
/**
 * Class LaporanController
 * Description: digunakan untuk membantu UI untuk mengambil data
 *
 * author: @agilma <https://github.com/agilma>
 */
Class SimulasiController extends Controller
{
	use IDRTrait;

	/**
	 * fungsi get cities
	 * Description: berfungsi untuk mendapatkan city dari id province tertentu
	 */
	public function hitung()
	{
		$jenis_pinjaman				= request()->input('jenis_pinjaman');
		$suku_bunga_pertahun		= request()->input('suku_bunga_pertahun');
		$pokok_pinjaman				= request()->input('pokok_pinjaman');
		$jangka_waktu				= request()->input('jangka_waktu');
		$net_pinjaman				= request()->input('net_pinjaman');

		switch (strtolower($jenis_pinjaman)) 
		{
			case 'pa':
				return response()->json($this->hitung_flat($suku_bunga_pertahun, $pokok_pinjaman, $jangka_waktu, $net_pinjaman));
				break;
			
			default:
				# code...
				break;
		}

		\App::abort(404);
	}

	private function hitung_flat($suku_bunga_pertahun, $pokok_pinjaman = null, $jangka_waktu, $net_pinjaman = null)
	{
		if(!is_null($pokok_pinjaman))
		{
			$pokok 			= $this->formatMoneyFrom($pokok_pinjaman);
		}
		else
		{
			$pokok 			= 0;
		}

		if(!is_null($net_pinjaman))
		{
			$net 			= $this->formatMoneyFrom($net_pinjaman);
		}
		else
		{
			$net 			= 0;
		}
		//untuk sementara net tidak dihitung

		$angsuran_pokok 	= $this->formatMoneyTo($pokok/max(1, $jangka_waktu));
		$angsuran_bunga 	= $this->formatMoneyTo(($pokok * $suku_bunga_pertahun/100)/12);
		$angsuran 			= $this->formatMoneyTo(($pokok/max(1, $jangka_waktu)) + (($pokok * $suku_bunga_pertahun/100)/12));

		$rekon 				= [];

		foreach (range(1, $jangka_waktu) as $key) 
		{
			$rekon['angsuran'][$key] 		= ['angsuran_pokok' => $angsuran_pokok, 'angsuran_bunga' => $angsuran_bunga, 'total_angsuran' => $angsuran];
		}

		return $rekon;
	}
}