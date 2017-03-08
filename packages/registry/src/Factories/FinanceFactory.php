<?php

namespace Thunderlabid\Registry\Factories;

use Thunderlabid\Registry\Factories\Interfaces\IFactory;

use Thunderlabid\Registry\Valueobjects\Finance;

/**
 * Class untuk Factories Finance
 *
 * Digunakan untuk membuat Entity Finance baru.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class FinanceFactory implements IFactory
{
	/**
	 * construct create valueobject baru
	 * @param array $data
	 * @return Finance $finance
	 */
	public static function build($pendapatan, $pengeluaran)
	{
		$finance 		= 	new Finance($pendapatan,
										$pengeluaran
							);

		return $finance;
	}
}
