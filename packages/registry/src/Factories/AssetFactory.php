<?php

namespace Thunderlabid\Registry\Factories;

use Thunderlabid\Registry\Factories\Interfaces\IFactory;

use Thunderlabid\Registry\Valueobjects\Asset;

/**
 * Class untuk Factories Asset
 *
 * Digunakan untuk membuat Entity Asset baru.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class AssetFactory implements IFactory
{
	/**
	 * construct create valueobject baru
	 * @param array $data
	 * @return Asset $aset
	 */
	public static function build($rumah, $kendaraan, $usaha)
	{
		$aset 			= 	new Asset($rumah,
									$kendaraan,
									$usaha
							);

		return $aset;
	}
}
