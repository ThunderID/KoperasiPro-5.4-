<?php

namespace App\Service\Helpers\ACL;

use Illuminate\Support\Str;

use Exception, Validator, TAuth, Storage;
use Carbon\Carbon;

class KewenanganKredit
{
	public static function statusLists()
	{
		$current_user 	= TAuth::activeOffice();

		switch (strtolower($current_user['role'])) 
		{
			case 'komisaris':
				return ['pengajuan', 'survei', 'menunggu_persetujuan', 'menunggu_realisasi', 'terealisasi', 'tolak'];
				break;
			case 'pimpinan':
				return ['pengajuan', 'survei', 'menunggu_persetujuan', 'menunggu_realisasi', 'terealisasi', 'tolak'];
				break;
			case 'kabag kredit': case 'kabag marketing': case 'kabag kolektor': case 'kabag operasional': case 'admin kredit' :
				return ['pengajuan', 'survei', 'menunggu_persetujuan', 'menunggu_realisasi', 'terealisasi', 'tolak'];
				break;
			case 'analis kredit':
				return ['pengajuan', 'survei'];
				break;
			case 'marketing': case 'kolektor': case 'bagian umum' :
				return ['pengajuan'];
				break;
			case 'accounting dan tabungan': case 'teller':
				return ['menunggu_realisasi', 'terealisasi'];
				break;
			case 'admin angsuran':
				return ['terealisasi'];
				break;
			default:
				throw new Exception("Forbidden", 1);
				break;
		}
	}
}
