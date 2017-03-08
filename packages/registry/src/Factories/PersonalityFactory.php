<?php

namespace Thunderlabid\Registry\Factories;

use Thunderlabid\Registry\Factories\Interfaces\IFactory;

use Thunderlabid\Registry\Valueobjects\Personality;

/**
 * Class untuk Factories Personality
 *
 * Digunakan untuk membuat Entity Personality baru.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class PersonalityFactory implements IFactory
{
	/**
	 * construct create valueobject baru
	 * @param array $data
	 * @return Personality $personality
	 */
	public static function build($lingkungan_tinggal, $lingkungan_pekerjaan, $karakter, $pola_hidup, $keterangan)
	{
		$personality 	= 	new Personality($lingkungan_tinggal,
										$lingkungan_pekerjaan,
										$karakter,
										$pola_hidup,
										$keterangan
							);

		return $personality;
	}
}
