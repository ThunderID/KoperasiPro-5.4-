<?php

namespace Thunderlabid\Registry\Factories;

use Thunderlabid\Registry\Factories\Interfaces\IFactory;

use Thunderlabid\Registry\Entities\Person;

use Thunderlabid\Registry\Valueobjects\Personality;
use Thunderlabid\Registry\Valueobjects\Finance;
use Thunderlabid\Registry\Valueobjects\Asset;
use Thunderlabid\Registry\Valueobjects\Macro;

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
	public static function build($id, $nik, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $pendidikan_terakhir, $status_perkawinan, $kewarganegaraan, $alamat, $kontak, $relasi, $pekerjaan, $personality = [], $finance = [], $asset = [], $makro = [])
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

		if(!empty($makro))
		{
			$makro 	= new Macro($makro['persaingan_usaha'], $makro['prospek_usaha'], $makro['perputaran_usaha'], $makro['pengalaman_usaha'], $makro['resiko_usaha'], $makro['jumlah_pelanggan_harian'], $makro['keterangan']);
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
						$asset,
						$makro
					);

		return $person;
	}
}
