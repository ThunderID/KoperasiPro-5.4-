<?php

namespace App\Web\Services;

/**
 * Kelas Navbar
 *
 * Digunakan generate Navbar berdasarkan policy.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Navbar 
{
	/**
	 * Membuat object asset baru dari data array
	 *
	 * @return array $nav
	 */
	public static function all()
	{
		return [
				'dashboard' => 	[
									'route' => '#',
									'sub'	=> []
								],
				'Kredit'	=>	[
									'route' => null,
									'sub'	=> 	[
													'Pengajuan Baru' 	=> route('credit.create'),
													'Daftar Kredit' 	=> route('credit.index')
												]				
								],
			]; 
	}
}