<?php

namespace App\Infrastructure\Traits\Legalities;

use Exception;

/**
 * Trait Nik
 *
 * Disesuaikan dengan policy, hanya menerima nik jawa timur
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
trait NIKTrait {

 	/**
	 * parse & check nik
	 * @param string $value 
	 * @return string $value 
	 */
	public function formatNikFrom($value)
	{
		list($pp,$kk, $cc, $hhbbtt, $rrrr) 	= array_map('trim', explode('-', $value));

		if(!str_is($pp, '35'))
		{
			throw new Exception("Jawa Timur", 1);
		}

		return $value;
	}

	/**
	 * reformat nik dari db
	 * @param string $value 
	 * @return string $value 
	 */
	public function formatNikTo($value)
	{
		return $value;
	}
}