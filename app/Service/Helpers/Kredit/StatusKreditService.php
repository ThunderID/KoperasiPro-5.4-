<?php

namespace App\Service\Helpers\Kredit;

/**
 * Kelas Jenis Kredit
 *
 * Digunakan generate UI Options.
 *
 * @author     Budi P <budi@thunderlab.id>
 */
class StatusKreditService
{
	/**
	 * Membuat object asset baru dari data array
	 *
	 * @return array $nav
	 */
	public function get()
	{
		return 	[
					'pengajuan'				=> 'Pengajuan',
					'survei'				=> 'Survei',
					'menunggu_persetujuan'	=> 'Menunggu Persetujuan',
					'tolak'					=> 'Ditolak',
					'menunggu_realisasi'	=> 'Disetujui',
					'realisasi'				=> 'Kredit Aktif',
					'lunas'					=> 'Lunas',
				];
	}
}