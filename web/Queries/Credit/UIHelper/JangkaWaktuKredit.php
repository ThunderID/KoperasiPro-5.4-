<?php

namespace Thunderlabid\Web\Queries\Credit\UIHelper;

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
					'roda_2'		=> 'Roda 2',
					'roda_4'		=> 'Roda 4',
					'roda_6'		=> 'Roda 6',
				];
	}
}