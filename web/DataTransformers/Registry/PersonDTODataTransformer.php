<?php

namespace Thunderlabid\Application\DataTransformers\Registry;

use Thunderlabid\Application\DataTransformers\Interfaces\IDataTransformer;

/**
 * Interface class untuk Services Application
 *
 * Digunakan untuk scaffold dari data transformer lain.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class PersonDTODataTransformer implements IDataTransformer
{ 
	/**
	 * Constructor
	 * 
	 * rarely used since change DTO to model kinda work of other 
	 * 
	 * @param array $person
	 * @return true
	 */
	public function write($person)
	{
		return true;
	}

	/**
	 * Constructor
	 * 
	 * Convert entity to DTO 
	 * 
	 * @param Thunderlabid\Immigration\Entities\Person $person
	 * @return array $person
	 */
	public function read($person)
	{
		//parse kepribadian
		$kepribadian 			= [
									'lingkungan_tinggal'	=> $person->kepribadian->lingkungan_tinggal,
									'lingkungan_pekerjaan'	=> $person->kepribadian->lingkungan_pekerjaan,
									'karakter'				=> $person->kepribadian->karakter,
									'pola_hidup'			=> $person->kepribadian->pola_hidup,
									'keterangan'			=> $person->kepribadian->keterangan,
		];

		//parse keuangan
		$keuangan 				= [
									'pendapatan'			=> $person->keuangan->pendapatan,
									'pengeluaran'			=> $person->keuangan->pengeluaran,
		];

		//parse aset
		$aset 					= [
									'rumah'					=> $person->aset->rumah,
									'kendaraan'				=> $person->aset->kendaraan,
									'usaha'					=> $person->aset->usaha,
		];

		return ['id' 					=> $person->id, 
				'nik' 					=> $person->nik, 
				'nama' 					=> $person->nama, 
				'tempat_lahir' 			=> $person->tempat_lahir, 
				'tanggal_lahir' 		=> $person->tanggal_lahir, 
				'jenis_kelamin' 		=> $person->jenis_kelamin, 
				'agama' 				=> $person->agama, 
				'pendidikan_terakhir'	=> $person->pendidikan_terakhir, 
				'status_perkawinan' 	=> $person->status_perkawinan, 
				'kewarganegaraan' 		=> $person->kewarganegaraan, 
				'alamat' 				=> $person->alamat, 
				'kontak' 				=> $person->kontak, 
				'relasi' 				=> $person->relasi, 
				'pekerjaan' 			=> $person->pekerjaan, 
				'kepribadian' 			=> $kepribadian,
				'keuangan' 				=> $keuangan, 
				'aset' 					=> $aset 
				];
	}
}