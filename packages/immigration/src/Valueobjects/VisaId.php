<?php

namespace Thunderlabid\Immigration\Valueobjects;


use Thunderlabid\Immigration\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Immigration\Valueobjects\Traits\IValueObjectTrait;
use Exception;

use Ramsey\Uuid\Uuid;

/**
 * Class untuk visaid
 *
 * Hanya digunakan untuk kebutuhan visaid.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 */
class VisaId implements IValueObject 
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
	public function equals($visaId)
	{
		return $this->id() === $visaId->id();
	}
	
	/**
	* Magic function convert to string
	* @return string $value
	*/
	function __toString()
	{
		return (string) $this->value;
	}
}
