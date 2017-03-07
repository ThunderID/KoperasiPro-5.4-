<?php

namespace Thunderlabid\Credit\Factories;

use Thunderlabid\Credit\Factories\Interfaces\IFactory;

use Thunderlabid\Credit\Entities\Credit;

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
	public static function build($nomor_kredit, $pengajuan_kredit, $kemampuan_angsur, $jangka_waktu, $tujuan_kredit, $kreditur, $koperasi, $penjamin = [], $status = null, $riwayat_status = [])
	{
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
						$riwayat_status
					);

		return $credit;
	}
}
