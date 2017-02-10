<?php

namespace App\Web\Services;

//Valueobject
use Thunderlabid\Registry\Valueobject\Office as OfficeVO;

/**
 * Kelas Person
 *
 * Digunakan untuk pengajuan Person.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Office 
{
	/**
	 * Menampilkan semua data Person
	 *
	 * @return array $build
	 */
	public static function build($array)
	{
		$data 	= new OfficeVO($array['id'], $array['name']);

		return $data;
	}
}