<?php

namespace Thunderlabid\Registry\Factories;

use Thunderlabid\Registry\Factories\Interfaces\IFactory;

use Thunderlabid\Registry\Valueobjects\Macro;

/**
 * Class untuk Factories Macro
 *
 * Digunakan untuk membuat Entity Macro baru.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class MacroFactory implements IFactory
{
	/**
	 * construct create valueobject baru
	 * @param array $data
	 * @return Macro $macro
	 */
	public static function build($persaingan_usaha, $prospek_usaha, $perputaran_usaha, $pengalaman_usaha, $resiko_usaha, $jumlah_pelanggan_harian, $keterangan)
	{
		$macro 	= 	new Macro($persaingan_usaha,
								$prospek_usaha,
								$perputaran_usaha,
								$pengalaman_usaha,
								$resiko_usaha,
								$jumlah_pelanggan_harian,
								$keterangan
							);

		return $macro;
	}
}
