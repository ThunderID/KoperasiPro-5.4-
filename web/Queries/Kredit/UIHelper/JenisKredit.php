<?php

namespace TQueries\Kredit\UIHelper;

/**
 * Kelas Jenis Kredit
 *
 * Digunakan generate UI Options.
 *
 * @author     Budi P <budi@thunderlab.id>
 */
class JenisKredit
{
	/**
	 * Membuat object asset baru dari data array
	 *
	 * @return array $nav
	 */
	public function get()
	{
		return 	[
					'pa'			=> 'Angsuran',
					'pt'			=> 'Musiman',
					'rumah_delta'	=> 'Rumah Delta',
					'00000'			=> 'Lainnya',
				];
	}
}