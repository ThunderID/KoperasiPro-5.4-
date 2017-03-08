<?php

namespace Thunderlabid\Registry\Valueobjects;


use Thunderlabid\Registry\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobjects\Traits\IValueObjectTrait;
use Exception, Validator;

class Finance implements IValueObject { 

	use IValueObjectTrait;

	/**
	 * @param [string] $pendapatan   	[pendapatan of the person]
	 * @param [string] $pengeluaran		[pengeluaran of the person]
	 */
	public function __construct($pendapatan, $pengeluaran)
	{
		$validator 	= Validator::make($pendapatan, ['penghasilan_gaji' => 'numeric', 'penghasilan_non_gaji' => 'numeric', 'penghasilan_lain' => 'numeric', 'sumber_penghasilan_lain' => 'string']);

		if(empty($pendapatan['penghasilan_gaji']))
		{
			$pendapatan['penghasilan_gaji'] = 0;
		}
		if(empty($pendapatan['penghasilan_non_gaji']))
		{
			$pendapatan['penghasilan_non_gaji'] = 0;
		}
		if(empty($pendapatan['penghasilan_lain']))
		{
			$pendapatan['penghasilan_lain'] = 0;
		}

		// if ($validator->fails())
		// {
		// 	throw new Exception($validator->messages(), 1);
		// }

		$validator 	= Validator::make($pengeluaran, ['biaya_rumah_tangga' => 'numeric', 'biaya_pendidikan' => 'numeric', 'biaya_telepon' => 'numeric', 'biaya_pdam' => 'numeric', 'biaya_listrik' => 'numeric', 'biaya_produksi' => 'numeric', 'pengeluaran_lain' => 'numeric']);
		if(empty($pengeluaran['biaya_rumah_tangga']))
		{
			$pengeluaran['biaya_rumah_tangga'] = 0;
		}
		if(empty($pengeluaran['biaya_pendidikan']))
		{
			$pengeluaran['biaya_pendidikan'] = 0;
		}
		if(empty($pengeluaran['biaya_telepon']))
		{
			$pengeluaran['biaya_telepon'] = 0;
		}
		if(empty($pengeluaran['biaya_pdam']))
		{
			$pengeluaran['biaya_pdam'] = 0;
		}
		if(empty($pengeluaran['biaya_listrik']))
		{
			$pengeluaran['biaya_listrik'] = 0;
		}
		if(empty($pengeluaran['biaya_produksi']))
		{
			$pengeluaran['biaya_produksi'] = 0;
		}
		if(empty($pengeluaran['pengeluaran_lain']))
		{
			$pengeluaran['pengeluaran_lain'] = 0;
		}
		
		// if ($validator->fails())
		// {
		// 	throw new Exception($validator->messages(), 1);
		// }

		$this->attributes['pendapatan']								= $pendapatan;
		$this->attributes['pendapatan']['penghasilan_gaji']			= new IDR($pendapatan['penghasilan_gaji']);
		$this->attributes['pendapatan']['penghasilan_non_gaji']		= new IDR($pendapatan['penghasilan_non_gaji']);
		$this->attributes['pendapatan']['penghasilan_lain']			= new IDR($pendapatan['penghasilan_lain']);
		$this->attributes['pengeluaran']							= $pengeluaran;
		$this->attributes['pengeluaran']['biaya_rumah_tangga']		= new IDR($pengeluaran['biaya_rumah_tangga']);
		$this->attributes['pengeluaran']['biaya_pendidikan']		= new IDR($pengeluaran['biaya_pendidikan']);
		$this->attributes['pengeluaran']['biaya_telepon']			= new IDR($pengeluaran['biaya_telepon']);
		$this->attributes['pengeluaran']['biaya_pdam']				= new IDR($pengeluaran['biaya_pdam']);
		$this->attributes['pengeluaran']['biaya_listrik']			= new IDR($pengeluaran['biaya_listrik']);
		$this->attributes['pengeluaran']['biaya_produksi']			= new IDR($pengeluaran['biaya_produksi']);
		$this->attributes['pengeluaran']['pengeluaran_lain']		= new IDR($pengeluaran['pengeluaran_lain']);
	}

	public function equals($finance)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$finance instanceOf Finance)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->attributes['pendapatan']	 	=== $finance->pendapatan) && 
				($this->attributes['pengeluaran']		=== $finance->pengeluaran)
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
