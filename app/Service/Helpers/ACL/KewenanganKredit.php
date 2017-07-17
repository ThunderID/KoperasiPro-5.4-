<?php

namespace App\Service\Helpers\ACL;

use Illuminate\Support\Str;

use Exception, Validator, TAuth, Storage;
use Carbon\Carbon;

class KewenanganKredit
{
	public static function template_scopes()
	{
		return [
			'komisaris'					=> ['atur_akses', 'pengajuan_baru', 'survei', 'analis', 'setujui', 'tolak', 'realisasi', 'angsuran', 'lunas'],
			'pimpinan'					=> ['atur_akses', 'pengajuan_baru', 'survei', 'analis', 'setujui', 'tolak', 'realisasi', 'angsuran', 'lunas'],
			'kabag_kredit'				=> ['pengajuan_baru', 'survei', 'analis', 'realisasi', 'angsuran', 'lunas'],
			'kabag_marketing'			=> ['pengajuan_baru', 'lunas'],
			'kabag_kolektor'			=> ['angsuran'],
			'kabag_operasional'			=> ['atur_akses', 'pengajuan_baru', 'survei', 'analis', 'realisasi', 'angsuran', 'lunas'],
			'analis_kredit'				=> ['survei', 'analis'],
			'marketing'					=> ['pengajuan_baru', 'lunas'],
			'kolektor'					=> ['angsuran'],
			'accounting_dan_tabungan'	=> ['angsuran', 'lunas'],
			'admin_kredit'				=> ['pengajuan_baru', 'survei', 'analis', 'realisasi', 'angsuran', 'lunas'],
			'admin_angsuran'			=> ['angsuran', 'lunas'],
			'admin_collect'				=> ['angsuran', 'lunas'],
			'teller'					=> ['realisasi', 'angsuran', 'lunas'],
			'bagian_umum'				=> ['atur_akses'],
		];
	}

	public static function lists()
	{
		return [
			'komisaris' 				=> 'Komisaris',
			'pimpinan' 					=> 'Pimpinan',
			'kabag_kredit' 				=> 'Kabag Kredit',
			'kabag_marketing' 			=> 'Kabag Marketing',
			'kabag_kolektor' 			=> 'Kabag Kolektor',
			'kabag_operasional' 		=> 'Kabag Operasional',
			'analis_kredit' 			=> 'Analis Kredit',
			'marketing' 				=> 'Marketing',
			'kolektor' 					=> 'Kolektor',
			'accounting_dan_tabungan' 	=> 'Accounting dan Tabungan',
			'admin_kredit' 				=> 'Admin Kredit',
			'admin_angsuran' 			=> 'Admin Angsuran',
			'admin_collect' 			=> 'Admin Collect',
			'teller' 					=> 'Teller',
			'bagian_umum' 				=> 'Bagian Umum',
		];
	}

	public static function roles()
	{
		return array_keys(self::template_scopes());
	}

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
				return ['pengajuan', 'survei', 'menunggu_persetujuan', 'lunas'];
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
