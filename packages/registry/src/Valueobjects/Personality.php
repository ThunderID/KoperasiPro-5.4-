<?php

namespace Thunderlabid\Registry\Valueobjects;

use Thunderlabid\Registry\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobjects\Traits\IValueObjectTrait;
use Exception;

class Personality implements IValueObject { 

	use IValueObjectTrait;

	/**
	 * @param [string] $lingkungan_tinggal   	[lingkungan_tinggal of the person]
	 * @param [string] $lingkungan_pekerjaan	[lingkungan_pekerjaan of the person]
	 * @param [string] $karakter 				[karakter of the person]
	 * @param [string] $pola_hidup   			[pola_hidup of the person]
	 * @param [string] $keterangan   			[pola_hidup of the person]
	 */
	public function __construct($lingkungan_tinggal, $lingkungan_pekerjaan, $karakter, $pola_hidup, $keterangan)
	{
		$this->attributes['lingkungan_tinggal']		= $lingkungan_tinggal;
		$this->attributes['lingkungan_pekerjaan']	= $lingkungan_pekerjaan;
		$this->attributes['karakter']				= $karakter;
		$this->attributes['pola_hidup']				= $pola_hidup;
		$this->attributes['keterangan']				= $keterangan;
	}

	public function equals($personality)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$personality instanceOf Personality)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->attributes['lingkungan_tinggal']	 	=== $personality->lingkungan_tinggal) && 
				($this->attributes['lingkungan_pekerjaan']		=== $personality->lingkungan_pekerjaan) && 
				($this->attributes['karakter']					=== $personality->karakter) && 
				($this->attributes['pola_hidup']	 			=== $personality->pola_hidup) && 
				($this->attributes['keterangan']	 			=== $personality->keterangan)
			)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
