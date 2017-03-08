<?php

namespace Thunderlabid\Registry\Valueobjects;


use Thunderlabid\Registry\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobjects\Traits\IValueObjectTrait;
use Exception;

use Ramsey\Uuid\Uuid;

/**
 * Class untuk IDR
 *
 * Hanya digunakan untuk kebutuhan IDR.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 */
class IDR implements IValueObject 
{ 
	use IValueObjectTrait;

	private $amount;

	/**
	* Construct user amount 
	* @param string $amount
	*/
	public function __construct($amount = 0)
	{
		$this->amount 	= $amount;
	}


	/**
	* Contract function implement
	* @return boolean
	*/
	public function equals($idr)
	{
		return $this->amount === $idr->amount;
	}
		
	/**
	* Magic function convert to string
	* @return string $amount
	*/
	function IDR()
	{
		return 'Rp. '. number_format($this->amount);
	}

	/**
	* Magic function convert to string
	* @return string $amount
	*/
	function __toString()
	{
		return (string) $this->amount;
	}
}
