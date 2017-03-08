<?php

namespace Thunderlabid\Application\DataTransformers\User;

use Thunderlabid\Application\DataTransformers\Interfaces\IDataTransformer;

/**
 * Interface class untuk Services Application
 *
 * Digunakan untuk scaffold dari data transformer lain.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class UserDTODataTransformer implements IDataTransformer
{ 
	/**
	 * Constructor
	 * 
	 * rarely used since change DTO to model kinda work of other 
	 * 
	 * @param array $user
	 * @return true
	 */
	public function write($user)
	{
		return true;
	}

	/**
	 * Constructor
	 * 
	 * Convert entity to DTO 
	 * 
	 * @param Thunderlabid\Immigration\Entities\User $user
	 * @return array $user
	 */
	public function read($user)
	{
		$visas = [];

		foreach ((array)$user->visas as $key => $value) 
		{
			$visas[]	= ['id' => $value->id, 'office' => ['id' => $value->office['id'], 'name' => $value->office['name']], 'role' => $value->role];
		}

		$ordered_visa 	= collect($visas);

		return ['id' => $user->id, 'email' => $user->email, 'name' => $user->name, 'visas' => $ordered_visa->sortBy('office.name')->toArray()];
	}
}
