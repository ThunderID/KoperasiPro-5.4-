<?php

namespace App\Service\Helpers\ACL;

use Illuminate\Support\Str;

use Exception, Validator, TAuth, Storage;
use Carbon\Carbon;

class KewenanganKredit
{
	public static function statusLists($role)
	{
		switch (strtolower($role)) 
		{
			case 'komisaris':
				return ['pengajuan', 'survei', 'menunggu_persetujuan', 'menunggu_realisasi', 'realisasi', 'tolak', 'lunas'];
				break;
			case 'pimpinan':
				return ['pengajuan', 'survei', 'menunggu_persetujuan', 'menunggu_realisasi', 'realisasi', 'tolak', 'lunas'];
				break;
			case 'kabag kredit': case 'kabag marketing': case 'kabag kolektor': case 'kabag operasional': case 'admin kredit' :
				return ['pengajuan', 'survei', 'menunggu_persetujuan', 'menunggu_realisasi', 'realisasi', 'tolak', 'lunas'];
				break;
			case 'analis kredit':
				return ['pengajuan', 'survei', 'lunas'];
				break;
			case 'marketing': case 'kolektor': case 'bagian umum' :
				return ['pengajuan', 'lunas'];
				break;
			case 'accounting dan tabungan': case 'teller':
				return ['menunggu_realisasi', 'realisasi', 'lunas'];
				break;
			case 'admin angsuran':
				return ['realisasi', 'lunas'];
				break;
			default:
				throw new Exception("Forbidden", 1);
				break;
		}
	}
}
