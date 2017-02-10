<?php

namespace App\Web\Services;

/**
 * Kelas Navbar
 *
 * Digunakan generate Navbar berdasarkan policy.
 *
 * @author     Budi P <budi@thunderlab.id>
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
		// Menu navigation manifests
		// Build your sitemap using this data structure bellow

		// Structure
		/*
			$nav =	[
					$nav_caption	=> 	[
											route 	=> $nav_routing,
											sub 	=> 	[
															$sub_nav_caption => $sub_nav_routing
														]
										]
				]
		*/

		// note: if menu have sub's, route parameter should be assigned with null. this will prevent menu from redirecting rather than showing it's sub's navigation menu.

		return [
				'dashboard' => 	[
									'route' => route('dashboard.index'),
									'sub'	=> []
								],
				'kredit'	=>	[
									'route' => null,
									'sub'	=> 	[
													'daftar_kredit' 	=> route('credit.index'),
													'pengajuan_baru' 	=> route('credit.create'),
												]				
								],
				'registrasi'=>	[
									'route' => null,
									'sub'	=> 	[
													// 'siapapun' 			=> route('person.index'),
													'buku_alamat' 		=> route('address.index')
												]				
								],
			]; 
	}
}