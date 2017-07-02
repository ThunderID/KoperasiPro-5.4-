<?php

namespace App\Service\Helpers\Kredit;

/**
 * Kelas jangka waktu kredit
 *
 * Digunakan generate UI Options.
 *
 * @author     Budi P <budi@thunderlab.id>
 */
class JangkaWaktuKredit 
{
	/**
	 * Membuat object asset baru dari data array
	 *
	 * @return array $nav
	 */
	public function get()
	{
		return 	[
					'6'		=> '6 Bulan',
					'10'	=> '10 Bulan',
					'12'	=> '12 Bulan',
					'18'	=> '18 Bulan',
					'24'	=> '24 Bulan',
					'30'	=> '30 Bulan',
					'36'	=> '36 Bulan',
					'42'	=> '42 Bulan',
					'48'	=> '48 Bulan',
					'54'	=> '54 Bulan',
					'60'	=> '60 Bulan',
				];
	}
}