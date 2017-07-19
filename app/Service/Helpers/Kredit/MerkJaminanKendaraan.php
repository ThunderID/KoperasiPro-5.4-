<?php

namespace App\Service\Helpers\Kredit;

/**
 * Kelas Merk Jaminan Kendaraan
 *
 * Digunakan generate UI Options.
 *
 * @author     Budi P <budi@thunderlab.id>
 */
class MerkJaminanKendaraan 
{
	/**
	 * Membuat object asset baru dari data array
	 *
	 * @return array $nav
	 */
	public function get()
	{
		return [
				'roda_2'	=> [
					'kawasaki',
					'yamaha',
					'honda',
					'suzuki',
					'lain_lain',
				],
				'roda_3'	=> [
					'yamaha',
					'lain_lain',
				],
				'roda_4'	=> [
					'daihatsu',
					'isuzu',
					'kia',
					'mitsubishi',
					'nissan',
					'toyota',
					'honda',
					'suzuki',
					'lain_lain',
				],
				'roda_6'	=> [
					'toyota',
					'mitsubishi',
					'suzuki',
					'lain_lain',
				]]
				;

		return [
					'daihatsu'		=> 'Daihatsu',
					'honda'			=> 'Honda',
					'isuzu'			=> 'Isuzu',
					'kawasaki'		=> 'Kawasaki',
					'kia'			=> 'KIA',
					'mitsubishi'	=> 'Mitsubishi',
					'nissan'		=> 'Nissan',
					'suzuki'		=> 'Suzuki',
					'toyota'		=> 'Toyota',
					'yamaha'		=> 'Yamaha',
					'lain_lain'		=> 'Lainnya',
				]; 
	}
}