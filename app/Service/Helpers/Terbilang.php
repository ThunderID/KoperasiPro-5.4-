<?php

namespace App\Service\Helpers;

use Carbon\Carbon;
use App\Infrastructure\Traits\IDRTrait;

/**
 * Kelas Navbar
 *
 * Digunakan generate Navbar berdasarkan policy.
 *
 * @author     Chelsy M <chelsy@thunderlab.id>
 */
class Terbilang 
{
	use IDRTrait;

	public static function dariRupiah($rupiah)
	{
		$nominal 		= new Terbilang;
		$nominal 		= $nominal->formatMoneyFrom($rupiah);

		return ucwords(self::terbilang($nominal)).' Rupiah ';
	}

	private static function terbilang($x)
	{
		$x 		= $x*1;
		
		$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		if ($x < 12)
		return " " . $abil[$x];
		elseif ($x < 20)
		return self::terbilang($x - 10) . " belas";
		elseif ($x < 100)
		return self::terbilang($x / 10) . " puluh" . self::terbilang($x % 10);
		elseif ($x < 200)
		return " seratus" . self::terbilang($x - 100);
		elseif ($x < 1000)
		return self::terbilang($x / 100) . " ratus" . self::terbilang($x % 100);
		elseif ($x < 2000)
		return " seribu" . self::terbilang($x - 1000);
		elseif ($x < 1000000)
		return self::terbilang($x / 1000) . " ribu" . self::terbilang($x % 1000);
		elseif ($x < 1000000000)
		return self::terbilang($x / 1000000) . " juta" . self::terbilang($x % 1000000);
	}
}