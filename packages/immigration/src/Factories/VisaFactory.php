<?php

namespace Thunderlabid\Immigration\Factories;

use Thunderlabid\Immigration\Factories\Interfaces\IFactory;

use Thunderlabid\Immigration\Entities\User;
use Thunderlabid\Immigration\Entities\Visa;
use Thunderlabid\Immigration\Valueobjects\VisaId;

/**
 * Class untuk Factories Visa
 *
 * Digunakan untuk membuat Entity Visa baru.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class VisaFactory implements IFactory
{
	/**
	 * construct create entity baru
	 * @param User $user
	 * @param array $data
	 * @return Visa $visa
	 */
	public static function build($id, $user_id, $office_id, $office_name, $role)
	{
		$visa 	= 	new Visa($id,
						$user_id,
						$office_id,
						$office_name,
						$role
					);

		return $visa;
	}
}
