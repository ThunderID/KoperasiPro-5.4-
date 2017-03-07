<?php

namespace Thunderlabid\Registry\Factories;

use Thunderlabid\Registry\Factories\Interfaces\IFactory;

use Thunderlabid\Registry\Entities\Person;

use Thunderlabid\Registry\Valueobjects\Personality;
use Thunderlabid\Registry\Valueobjects\Finance;
use Thunderlabid\Registry\Valueobjects\Asset;

/**
 * Class untuk Factories Person
 *
 * Digunakan untuk membuat Entity Person baru.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class PersonFactory implements IFactory
{
	/**
	 * construct create entity baru
	 * @param array $data
	 * @return Person $person
	 */
	public static function build($id, $nik, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $pendidikan_terakhir, $status_perkawinan, $kewarganegaraan, $alamat, $kontak, $relasi, $pekerjaan, $personality = [], $finance = [], $asset = [])
	{

		if(!empty($personality))
		{
			$personality 	= new Personality($personality['lingkungan_tinggal'], $personality['lingkungan_pekerjaan'], $personality['karakter'], $personality['pola_hidup'], $personality['keterangan']);
		}

		if(!empty($finance))
		{
			$finance 		= new Finance($finance['pendapatan'], $finance['pengeluaran']);
		}

		if(!empty($asset))
		{
			$asset 			= new Asset($asset['rumah'], $asset['kendaraan'], $asset['usaha']);
		}

		$person 	= 	new Person(
						$id,
						$nik,
						$nama,
						$tempat_lahir,
						$tanggal_lahir,
						$jenis_kelamin,
						$agama,
						$pendidikan_terakhir,
						$status_perkawinan,
						$kewarganegaraan,
						$alamat,
						$kontak,
						$relasi,
						$pekerjaan,
						$personality,
						$finance,
						$asset
					);

		return $person;
	}
}
