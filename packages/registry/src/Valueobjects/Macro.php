<?php

namespace Thunderlabid\Registry\Valueobjects;

use Thunderlabid\Registry\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobjects\Traits\IValueObjectTrait;
use Exception;

class Macro implements IValueObject { 

	use IValueObjectTrait;

	/**
	 * @param [string] $persaingan_usaha   		[persaingan_usaha of the person]
	 * @param [string] $prospek_usaha			[prospek_usaha of the person]
	 * @param [string] $perputaran_usaha 		[perputaran_usaha of the person]
	 * @param [string] $pengalaman_usaha   		[pengalaman_usaha of the person]
	 * @param [string] $resiko_usaha   			[resiko_usaha of the person]
	 * @param [numeric]$jumlah_pelanggan_harian	[jumlah_pelanggan_harian of the person]
	 * @param [string] $keterangan				[keterangan of the person]
	 */
	public function __construct($persaingan_usaha, $prospek_usaha, $perputaran_usaha, $pengalaman_usaha, $resiko_usaha, $jumlah_pelanggan_harian, $keterangan)
	{
		$this->attributes['persaingan_usaha']			= $persaingan_usaha;
		$this->attributes['prospek_usaha']				= $prospek_usaha;
		$this->attributes['perputaran_usaha']			= $perputaran_usaha;
		$this->attributes['pengalaman_usaha']			= $pengalaman_usaha;
		$this->attributes['resiko_usaha']				= $resiko_usaha;
		$this->attributes['jumlah_pelanggan_harian']	= $jumlah_pelanggan_harian;
		$this->attributes['keterangan']					= $keterangan;
	}

	public function equals($macro)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$macro instanceOf Macro)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->attributes['persaingan_usaha']	 		=== $macro->persaingan_usaha) && 
				($this->attributes['prospek_usaha']				=== $macro->prospek_usaha) && 
				($this->attributes['perputaran_usaha']			=== $macro->perputaran_usaha) && 
				($this->attributes['pengalaman_usaha']	 		=== $macro->pengalaman_usaha) && 
				($this->attributes['resiko_usaha']	 			=== $macro->resiko_usaha) && 
				($this->attributes['jumlah_pelanggan_harian']	=== $macro->jumlah_pelanggan_harian) && 
				($this->attributes['keterangan']	 			=== $macro->keterangan)
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
