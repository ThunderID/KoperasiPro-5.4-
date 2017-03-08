<?php

namespace Thunderlabid\Credit\Factories;

use Thunderlabid\Credit\Factories\Interfaces\IFactory;

use Thunderlabid\Credit\Valueobjects\JaminanKendaraan;

/**
 * Class untuk Factories JaminanKendaraan
 *
 * Digunakan untuk membuat Entity JaminanKendaraan baru.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class JaminanKendaraanFactory implements IFactory
{
	/**
	 * construct create valueobject baru
	 * @param array $data
	 * @return JaminanKendaraan $jaminan_kendaraan
	 */
	public static function build($jaminan_kendaraan)
	{
		$jaminan_kendaraan 	= 	new JaminanKendaraan($jaminan_kendaraan);

		return $jaminan_kendaraan;
	}
}
