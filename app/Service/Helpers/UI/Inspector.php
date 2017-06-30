<?php

namespace App\Service\Helpers\UI;

/**
 * Kelas Navbar
 *
 * Digunakan generate Navbar berdasarkan policy.
 *
 * @author     Budi P <budi@thunderlab.id>
 */
class Inspector 
{
	/**
	 * Membuat object asset baru dari data array
	 *
	 * @return array $nav
	 */
	public static function checkOffice($visas, $office)
	{
		$role = '';

		foreach ($visas as $key => $value) 
		{
			if ($value['akses_koperasi_id']==$office['koperasi']['id']) 
			{
				$role = $value['role'];
			}
		}

		return $role;
	}
}