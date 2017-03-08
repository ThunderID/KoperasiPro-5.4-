<?php

namespace Thunderlabid\Registry\Valueobjects;


use Thunderlabid\Registry\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobjects\Traits\IValueObjectTrait;
use Exception, Validator;

class Asset implements IValueObject { 

	use IValueObjectTrait;

	/**
	 * @param [string] $rumah   	[rumah of the person]
	 * @param [string] $kendaraan	[kendaraan of the person]
	 * @param [string] $usaha		[usaha of the person]
	 */
	public function __construct($rumah, $kendaraan, $usaha)
	{
		$validator 	= Validator::make($rumah, ['status' => 'string', 'angsuran' => 'numeric', 'tenor_angsuran' => 'numeric', 'masa_sewa' => 'numeric', 'sejak' => 'date_format:"Y-m-d"', 'luas' => 'numeric', 'nilai_rumah' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		$validator 	= Validator::make($kendaraan, ['jumlah_kendaraan_r4' => 'numeric', 'jumlah_kendaraan_r2' => 'numeric', 'nilai_kendaraan' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		$validator 	= Validator::make($usaha, ['nama' => 'string', 'bidang_usaha' => 'string', 'sejak' => 'date_format:"Y-m-d"', 'status_usaha' => 'string', 'saham_usaha' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		$this->attributes['rumah']							= $rumah;
		$this->attributes['rumah']['nilai_rumah']			= new IDR($rumah['nilai_rumah']);
		$this->attributes['kendaraan']						= $kendaraan;
		$this->attributes['kendaraan']['nilai_kendaraan']	= new IDR($kendaraan['nilai_kendaraan']);
		$this->attributes['usaha']							= $usaha;
	}

	public function equals($asset)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$asset instanceOf Asset)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->attributes['rumah']	 		=== $asset->rumah) && 
				($this->attributes['kendaraan']	 	=== $asset->kendaraan) && 
				($this->attributes['usaha']			=== $asset->usaha)
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
