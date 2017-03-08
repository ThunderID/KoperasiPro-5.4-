<?php

namespace Thunderlabid\Registry\Entities;

//////////////////
// Valueobject  //
//////////////////
use Thunderlabid\Registry\Valueobjects\IDR;
use Thunderlabid\Registry\Valueobjects\Asset;
use Thunderlabid\Registry\Valueobjects\Finance;
use Thunderlabid\Registry\Valueobjects\Personality;
use Thunderlabid\Registry\Valueobjects\Macro;

/////////////
// Entity  //
/////////////
use Thunderlabid\Registry\Entities\Interfaces\IEntity;
use Thunderlabid\Registry\Entities\Traits\IEntityTrait;

//////////////
// Utilitis //
//////////////
use Carbon\Carbon;
use Exception, Validator, Hash;
use \Illuminate\Support\Collection;

/**
 * Entity Person
 *
 * Digunakan untuk menyimpan data Registry.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Person implements IEntity 
{ 
	use IEntityTrait;

	public $policies 	= 	[
							];

	/**
	 * Constructor
	 * 
	 * @param string 		$id
	 * @param string 		$nik 
	 * @param string 		$nama
	 * @param string 		$tempat_lahir 
	 * @param string 		$tanggal_lahir 
	 * @param string 		$jenis_kelamin 
	 * @param string 		$agama 
	 * @param string 		$pendidikan_terakhir 
	 * @param string 		$status_perkawinan 
	 * @param string 		$kewarganegaraan 
	 * @param array  		$alamat 
	 * @param array  		$kontak 
	 * @param array  		$relasi 
	 * @param array  		$pekerjaan 
	 * @param Personality  	$kepribadian 
	 * @param Finance  		$keuangan 
	 * @param Asset  		$aset 
	 * @param Macro  		$makro 
	 */
	public function __construct($id, $nik, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $pendidikan_terakhir, $status_perkawinan, $kewarganegaraan, $alamat = [], $kontak = [], $relasi = [], $pekerjaan = [], $kepribadian, $keuangan, $aset, $makro)
	{
		if(!$id)
		{
			$this->attributes['id'] 	= $this->createID();
			$this->nik 					= $nik;
			$this->nama 				= $nama;
			$this->tempat_lahir 		= $tempat_lahir;
			$this->tanggal_lahir 		= $tanggal_lahir;
			$this->jenis_kelamin 		= $jenis_kelamin;
			$this->agama 				= $agama;
			$this->pendidikan_terakhir 	= $pendidikan_terakhir;
			$this->status_perkawinan 	= $status_perkawinan;
			$this->kewarganegaraan 		= $kewarganegaraan;

			$this->attributes['alamat'] = [];

			foreach ((array)$alamat as $key => $value) 
			{
				$this->addAlamat($value);
			}

			$this->attributes['kontak'] = [];

			foreach ((array)$kontak as $key => $value) 
			{
				$this->addKontak($value);
			}

			$this->attributes['relasi'] = [];

			foreach ((array)$relasi as $key => $value) 
			{
				$this->addRelasi($value);
			}

			$this->attributes['pekerjaan'] = [];

			foreach ((array)$pekerjaan as $key => $value) 
			{
				$this->addPekerjaan($value);
			}

			$this->attributes['kepribadian'] = [];
			if ($kepribadian instanceOf Personality)
			{
				$this->attributes['kepribadian']	= $kepribadian;
			}

			$this->attributes['keuangan'] = [];
			if ($keuangan instanceOf Finance)
			{
				$this->attributes['keuangan']		= $keuangan;
			}

			$this->attributes['aset'] = [];
			if ($aset instanceOf Asset)
			{
				$this->attributes['aset']			= $aset;
			}

			$this->attributes['makro'] = [];
			if ($makro instanceOf Macro)
			{
				$this->attributes['makro']			= $makro;
			}
		}
		else
		{
			$this->attributes['id'] 				= $id;
			$this->attributes['nik']				= $nik;
			$this->attributes['nama'] 				= $nama;
			$this->attributes['tempat_lahir'] 		= $tempat_lahir;
			$this->attributes['tanggal_lahir'] 		= $tanggal_lahir;
			$this->attributes['jenis_kelamin']		= $jenis_kelamin;
			$this->attributes['agama']	 			= $agama;
			$this->attributes['pendidikan_terakhir']= $pendidikan_terakhir;
			$this->attributes['status_perkawinan']	= $status_perkawinan;
			$this->attributes['kewarganegaraan']	= $kewarganegaraan;

			$this->attributes['alamat'] = [];

			foreach ((array)$alamat as $key => $value) 
			{
				$this->addAlamat($value);
			}

			$this->attributes['kontak'] = [];

			foreach ((array)$kontak as $key => $value) 
			{
				$this->addKontak($value);
			}

			$this->attributes['relasi'] = [];

			foreach ((array)$relasi as $key => $value) 
			{
				$this->addRelasi($value);
			}

			$this->attributes['pekerjaan'] = [];

			foreach ((array)$pekerjaan as $key => $value) 
			{
				$this->addPekerjaan($value);
			}

			$this->attributes['kepribadian'] = [];
			if ($kepribadian instanceOf Personality)
			{
				$this->attributes['kepribadian']	= $kepribadian;
			}

			$this->attributes['keuangan'] = [];
			if ($keuangan instanceOf Finance)
			{
				$this->attributes['keuangan']		= $keuangan;
			}

			$this->attributes['aset'] = [];
			if ($aset instanceOf Asset)
			{
				$this->attributes['aset']			= $aset;
			}

			$this->attributes['makro'] = [];
			if ($makro instanceOf Macro)
			{
				$this->attributes['makro']			= $makro;
			}
		}
	}

	/**
	 * construct set attribute nik
	 * @param string $nik
	 */
	private function setNIKAttribute($nik)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['nik' => $nik], ['nik' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['nik'] 	= $nik;
	}

	/**
	 * construct set attribute nama
	 * @param string $nama
	 */
	private function setNamaAttribute($nama)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['nama' => $nama], ['nama' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['nama'] 	= $nama;
	}

	/**
	 * construct set attribute tempat_lahir
	 * @param string $tempat_lahir
	 */
	private function setTempatLahirAttribute($tempat_lahir)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['tempat_lahir' => $tempat_lahir], ['tempat_lahir' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['tempat_lahir'] 	= $tempat_lahir;
	}

	/**
	 * construct set attribute tanggal_lahir
	 * @param string $tanggal_lahir
	 */
	private function setTanggalLahirAttribute($tanggal_lahir)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['tanggal_lahir' => $tanggal_lahir], ['tanggal_lahir' => 'date_format:"Y-m-d"']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['tanggal_lahir'] 	= $tanggal_lahir;
	}

	/**
	 * construct set attribute jenis_kelamin
	 * @param string $jenis_kelamin
	 */
	private function setJenisKelaminAttribute($jenis_kelamin)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['jenis_kelamin' => $jenis_kelamin], ['jenis_kelamin' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['jenis_kelamin'] 	= $jenis_kelamin;
	}

	/**
	 * construct set attribute agama
	 * @param string $agama
	 */
	private function setAgamaAttribute($agama)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['agama' => $agama], ['agama' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['agama'] 	= $agama;
	}

	/**
	 * construct set attribute pendidikan_terakhir
	 * @param string $pendidikan_terakhir
	 */
	private function setPendidikanTerakhirAttribute($pendidikan_terakhir)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['pendidikan_terakhir' => $pendidikan_terakhir], ['pendidikan_terakhir' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['pendidikan_terakhir'] 	= $pendidikan_terakhir;
	}

	/**
	 * construct set attribute status_perkawinan
	 * @param string $status_perkawinan
	 */
	private function setStatusPerkawinanAttribute($status_perkawinan)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['status_perkawinan' => $status_perkawinan], ['status_perkawinan' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['status_perkawinan'] 	= $status_perkawinan;
	}

	/**
	 * construct set attribute kewarganegaraan
	 * @param string $kewarganegaraan
	 */
	private function setKewarganegaraanAttribute($kewarganegaraan)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['kewarganegaraan' => $kewarganegaraan], ['kewarganegaraan' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['kewarganegaraan'] 	= $kewarganegaraan;
	}

	/**
	 * [addAlamat description]
	 * @param array $status [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addAlamat($alamat)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make($alamat, ['jalan' => 'required|string', 'kota' => 'required|string', 'provinsi' => 'required|string', 'negara' => 'required|string', 'kode_pos' => 'required|string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['alamat'][] 	= $alamat;
	}

	/**
	 * [addKontak description]
	 * @param array $status [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addKontak($kontak)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make($kontak, ['telepon' => 'required|string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['kontak'][] 	= $kontak;
	}

	/**
	 * [addRelasi description]
	 * @param array $status [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addRelasi($relasi)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make($relasi, ['id' => 'required|string', 'nama' => 'required|string', 'hubungan' => 'required|string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['relasi'][] 	= $relasi;
	}

	/**
	 * [addPekerjaan description]
	 * @param array $status [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addPekerjaan($pekerjaan)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make($pekerjaan, ['jenis' => 'required|string', 'jabatan' => 'string', 'sejak' => 'required|date_format:"Y-m-d"']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['pekerjaan'][] 	= $pekerjaan;
	}

	/**
	 * [changeKepribadian description]
	 * @param Personality $kepribadian [description]
	 */
	public function changeKepribadian(Personality $kepribadian)
	{
		/////////
		// Set //
		/////////
		$this->attributes['kepribadian'] 	= $kepribadian;
	}

	/**
	 * [changeKeuangan description]
	 * @param Finance $keuangan [description]
	 */
	public function changeKeuangan(Finance $keuangan)
	{
		/////////
		// Set //
		/////////
		$this->attributes['keuangan'] 	= $keuangan;
	}

	/**
	 * [changeAset description]
	 * @param Asset $aset [description]
	 */
	public function changeAset(Asset $aset)
	{
		/////////
		// Set //
		/////////
		$this->attributes['aset'] 	= $aset;
	}

	/**
	 * [changeMacro description]
	 * @param Macro $makro [description]
	 */
	public function changeMakro(Macro $makro)
	{
		/////////
		// Set //
		/////////
		$this->attributes['makro'] 	= $makro;
	}
}