<?php

namespace Thunderlabid\Immigration\Valueobjects;

use Thunderlabid\Immigration\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Immigration\Valueobjects\Traits\IValueObjectTrait;
use Exception;

use Ramsey\Uuid\Uuid;

/**
 * Class untuk userid
 *
 * Hanya digunakan untuk kebutuhan userid.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 */
class UserId implements IValueObject 
{ 
	use IValueObjectTrait;

	private $id;

	/**
	* Construct user id 
	* @param string $id
	*/
	public function __construct($id = null)
	{
		$this->id = $id ?: Uuid::uuid4()->toString();
	}

	/**
	* Contract function implement
	* @return boolean
	*/
	public function equals($userId)
	{
		return $this->id() === $userId->id();
	}
	
	/**
	* Magic function convert to string
	* @return string
	*/
	function __toString()
	{
		return (string) $this->value;
	}
}
