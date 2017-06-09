<?php

namespace TQueries\Navigation;

/**
 * Kelas Navbar
 *
 * Digunakan generate Navbar berdasarkan policy.
 *
 * @author     Budi P <budi@thunderlab.id>
 */
class NavbarService 
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
				// 'dashboard' => 	[
				// 					'route' => route('dashboard.index'),
				// 					'sub'	=> []
				// 				],
				'kredit'	=>	[
									'route' => null,
									'sub'	=> 	[
													'pengajuan_baru' 	=> route('credit.create'),
													'data_kredit' 		=> route('credit.index'),
												]				
								],
				'kasir'		=> 	[
									'route' => null,
									'sub'	=> 	[
													'realisasi_kredit'		=> route('kasir.realisasi.kredit'),
													'kas'				=> route('kasir.kas.index'),
													'tambah_kas_masuk'		=> route('kasir.kas.create', ['status' => 'masuk']),
													'tambah_kas_keluar'		=> route('kasir.kas.create', ['status' => 'keluar']),
													'bayar_angsuran'		=> route('kasir.kas.index'),
												]
								],
				'pengaturan'=> 	[
									'route' => null,
									'sub'	=> 	[
													'buka_baru'			=> route('koperasi.create'),
													'koperasi'			=> route('koperasi.index'),
													'pengguna'			=> route('pengguna.index'),
												]
								],
			];
	}
}