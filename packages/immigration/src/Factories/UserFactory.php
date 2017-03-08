<?php

namespace Thunderlabid\Immigration\Factories;

use Thunderlabid\Immigration\Factories\Interfaces\IFactory;

use Thunderlabid\Immigration\Entities\User;
use Thunderlabid\Immigration\Valueobjects\UserId;


/**
 * Class untuk Factories User
 *
 * Digunakan untuk membuat Entity user baru.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class UserFactory implements IFactory
{
	/**
	 * construct create entity baru
	 * @param array $data
	 * @return User $user
	 */
	public static function build($id, $email, $password, $name, $visas)
	{
		$user 	= 	new User(
						$id,
						$email,
						$password,
						$name,
						$visas
					);

		return $user;
	}
}
