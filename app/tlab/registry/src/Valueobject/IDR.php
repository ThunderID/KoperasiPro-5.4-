<?php

namespace Thunderlabid\Registry\Valueobject;


use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception;

class IDR implements IValueObject { 

	use IValueObjectTrait;

	private $value;

	/**
	* Construct idr 
	* @param string $value
	*/
	function __construct($value)
	{
		$this->value 		= $value;

		if(empty($this->value) || is_null($this->value))
		{
			$this->value 	= 0;
		}
	}

	/**
	* konversi nilai ke USD 
	* @param double $kurs
	*/
	public function konversiKeUSD($kurs)
	{
		$this->value 	= $this->value/$kurs;
		
		return $this->value;
	}

	/**
	* menampilkan nilai IDR 
	* @return string
	*/
	public function IDR()
	{
		$this->value 	= number_format($this->value, 0, ',', '.');
		
		return 'IDR '.$this->value;
	}

	/**
	* Contract function implement
	* @return boolean
	*/
	public function equals($value)
	{
		return true;
	}
	
	/**
	* Magic function convert to string
	* @return string
	*/
	function __toString()
	{
		return (string) $this->value;
	}
	
	/**
	* Magic function convert to string
	* @return string
	*/
	function getValue()
	{
		return $this->value;
	}
}
