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
			case 'marketing':
				return ['pengajuan'];
				break;
			case 'surveyor':
				return ['pengajuan', 'survei'];
				break;
			case 'kasir':
				return ['menunggu_realisasi', 'terealisasi'];
				break;
			default:
				throw new Exception("Forbidden", 1);
				break;
		}
	}
}