<?php

namespace App\Service\Helpers\UI;

/**
 * Kelas Navbar
 *
 * Digunakan generate Navbar berdasarkan policy.
 *
 * @author     Budi P <budi@thunderlab.id>
 */
class UserRole 
{
	/**
	 * Membuat object asset baru dari data array
	 *
	 * @return array $nav
	 */
	public static function lists()
	{
		return [
			'pimpinan' => 'Pimpinan',
			'kabag_kredit' => 'Kabag Kredit',
			'kabag_marketing' => 'Kabag Marketing',
			'kabag_kolektor' => 'Kabag Kolektor',
			'kabag_operasional' => 'Kabag Operasional',
			'analis_kredit' => 'Analis Kredit',
			'marketing' => 'Marketing',
			'kolektor' => 'Kolektor',
			'accounting_dan_tabungan' => 'Accounting dan Tabungan',
			'admin_kredit' => 'Admin Kredit',
			'admin_angsuran' => 'Admin Angsuran',
			'admin_collect' => 'Admin Collect',
			'teller' => 'Teller',
			'bagian_umum' => 'Bagian Umum',
		];
	}
}