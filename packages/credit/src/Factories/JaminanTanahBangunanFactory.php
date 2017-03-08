<?php

namespace Thunderlabid\Credit\Factories;

use Thunderlabid\Credit\Factories\Interfaces\IFactory;

use Thunderlabid\Credit\Valueobjects\JaminanTanahBangunan;

/**
 * Class untuk Factories JaminanTanahBangunan
 *
 * Digunakan untuk membuat Entity JaminanTanahBangunan baru.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class JaminanTanahBangunanFactory implements IFactory
{
	/**
	 * construct create valueobject baru
	 * @param array $data
	 * @return JaminanTanahBangunan $jaminan_tanah_bangunan
	 */
	public static function build($jaminan_tanah_bangunan)
	{
		$jaminan_tanah_bangunan 	= 	new JaminanTanahBangunan($jaminan_tanah_bangunan);

		return $jaminan_tanah_bangunan;
	}
}
