<?php

namespace Thunderlabid\Credit\Factories;

use Thunderlabid\Credit\Factories\Interfaces\IFactory;

use Thunderlabid\Credit\Entities\Credit;

use Thunderlabid\Credit\Valueobjects\JaminanKendaraan;
use Thunderlabid\Credit\Valueobjects\JaminanTanahBangunan;

/**
 * Class untuk Factories Credit
 *
 * Digunakan untuk membuat Entity Credit baru.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class CreditFactory implements IFactory
{
	/**
	 * construct create entity baru
	 * @param array $data
	 * @return Credit $credit
	 */
	public static function build($nomor_kredit, $pengajuan_kredit, $kemampuan_angsur, $jangka_waktu, $tujuan_kredit, $kreditur, $koperasi, $penjamin = [], $status = null, $riwayat_status = [], $jaminan_kendaraan = [], $jaminan_tanah_bangunan = [])
	{

		$all_jaminan_k 				= [];
		if(!empty($jaminan_kendaraan))
		{
			foreach ($jaminan_kendaraan as $key => $value) 
			{
				$all_jaminan_k[] 	= 	new JaminanKendaraan($value);
			}
		}

		$all_jaminan_tb 				= [];
		if(!empty($jaminan_tanah_bangunan))
		{
			foreach ($jaminan_tanah_bangunan as $key => $value) 
			{
				$all_jaminan_tb[] 	= 	new JaminanTanahBangunan($value);
			}
		}

		$credit 	= 	new Credit(
						$nomor_kredit,
						$pengajuan_kredit,
						$kemampuan_angsur,
						$jangka_waktu,
						$tujuan_kredit,
						$kreditur,
						$koperasi,
						$penjamin,
						$status,
						$riwayat_status,
						$all_jaminan_k,
						$all_jaminan_tb
					);

		return $credit;
	}
}
