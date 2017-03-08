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
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		$validator 	= Validator::make($pengeluaran, ['biaya_rumah_tangga' => 'numeric', 'biaya_pendidikan' => 'numeric', 'biaya_telepon' => 'numeric', 'biaya_pdam' => 'numeric', 'biaya_listrik' => 'numeric', 'biaya_produksi' => 'numeric', 'pengeluaran_lain' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		$this->attributes['pendapatan']					= $pendapatan;
		$this->attributes['pengeluaran']				= $pengeluaran;
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
