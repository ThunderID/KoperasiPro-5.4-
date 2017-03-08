<?php

namespace Thunderlabid\Credit\Entities;

//////////////////
// Valueobject  //
//////////////////
use Thunderlabid\Credit\Valueobjects\IDR;
use Thunderlabid\Credit\Valueobjects\JaminanKendaraan;
use Thunderlabid\Credit\Valueobjects\JaminanTanahBangunan;

/////////////
// Entity  //
/////////////
use Thunderlabid\Credit\Entities\Interfaces\IEntity;
use Thunderlabid\Credit\Entities\Traits\IEntityTrait;

//////////////
// Utilitis //
//////////////
use Carbon\Carbon;
use Exception, Validator, Hash;
use \Illuminate\Support\Collection;

/**
 * Entity Credit
 *
 * Digunakan untuk menyimpan data Credit.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Credit implements IEntity 
{ 
	use IEntityTrait;

	public $policies 	= 	[
							];

	/**
	 * Constructor
	 * 
	 * @param string $nomor_kredit
	 * @param number $pengajuan_kredit 
	 * @param number $kemampuan_angsur
	 * @param number $jangka_waktu 
	 * @param string $tujuan_kredit 
	 * @param array  $kreditur 
	 * @param array  $penjamin 
	 * @param array  $koperasi 
	 * @param string $status 
	 * @param array  $riwayat_status 
	 */
	public function __construct($nomor_kredit, $pengajuan_kredit, $kemampuan_angsur, $jangka_waktu, $tujuan_kredit, $kreditur, $koperasi, $penjamin = [], $status = null, $riwayat_status = [], $jaminan_kendaraan = [], $jaminan_tanah_bangunan = [])
	{
		if(!$nomor_kredit)
		{
			$this->attributes['id'] 			= $this->createID();
			$this->pengajuan_kredit 			= $pengajuan_kredit;
			$this->kemampuan_angsur 			= $kemampuan_angsur;
			$this->jangka_waktu 				= $jangka_waktu;
			$this->tujuan_kredit 				= $tujuan_kredit;
			$this->kreditur 					= $kreditur;
			$this->koperasi 					= $koperasi;
			$this->penjamin 					= $penjamin;

			$this->attributes['riwayat_status'] = [];

			foreach ((array)$riwayat_status as $key => $value) 
			{
				$this->addStatus($value);
			}

			$this->attributes['jaminan'] 		= [];

			foreach ((array)$jaminan_kendaraan as $key => $value) 
			{
				$this->addJaminanKendaraan($value);
			}

			foreach ((array)$jaminan_tanah_bangunan as $key => $value) 
			{
				$this->addJaminanTanahBangunan($value);
			}
		}
		else
		{
			$this->attributes['id'] 				= $nomor_kredit;
			$this->attributes['pengajuan_kredit']	= new IDR($pengajuan_kredit);
			$this->attributes['kemampuan_angsur'] 	= new IDR($kemampuan_angsur);
			$this->attributes['jangka_waktu'] 		= $jangka_waktu;
			$this->attributes['tujuan_kredit'] 		= $tujuan_kredit;
			$this->attributes['kreditur']	 		= $kreditur;
			$this->attributes['koperasi']	 		= $koperasi;
			$this->attributes['penjamin']	 		= $penjamin;

			$this->attributes['riwayat_status'] 	= [];

			foreach ((array)$riwayat_status as $key => $value) 
			{
				$this->addStatus($value);
			}

			$this->attributes['jaminan'] 		= [];

			foreach ((array)$jaminan_kendaraan as $key => $value) 
			{
				$this->addJaminanKendaraan($value);
			}

			foreach ((array)$jaminan_tanah_bangunan as $key => $value) 
			{
				$this->addJaminanTanahBangunan($value);
			}
		}
	}

	/**
	 * mengubah nominal kredit 
	 * @param numeric $pengajuan_kredit
	 * @param numeric $kemampuan_angsur
	 * @param numeric $jangka_waktu
	 */
 	public function changeNominalKredit($pengajuan_kredit, $kemampuan_angsur, $jangka_waktu)
	{
		$this->pengajuan_kredit 	= $pengajuan_kredit;
		$this->kemampuan_angsur 	= $kemampuan_angsur;
		$this->jangka_waktu 		= $jangka_waktu;
	}
	
	/**
	 * construct set attribute pengajuan_kredit
	 * @param string $pengajuan_kredit
	 */
	private function setPengajuanKreditAttribute($pengajuan_kredit)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['pengajuan_kredit' => $pengajuan_kredit], ['pengajuan_kredit' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['pengajuan_kredit'] 	= new IDR($pengajuan_kredit);
	}
	
	/**
	 * construct set attribute kemampuan_angsur
	 * @param string $kemampuan_angsur
	 */
	private function setKemampuanAngsurAttribute($kemampuan_angsur)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['kemampuan_angsur' => $kemampuan_angsur], ['kemampuan_angsur' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['kemampuan_angsur'] 	= new IDR($kemampuan_angsur);
	}
	
	/**
	 * construct set attribute jangka_waktu
	 * @param string $jangka_waktu
	 */
	private function setJangkaWaktuAttribute($jangka_waktu)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['jangka_waktu' => $jangka_waktu], ['jangka_waktu' => 'numeric']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['jangka_waktu'] 	= $jangka_waktu;
	}
	
	/**
	 * construct set attribute tujuan_kredit
	 * @param string $tujuan_kredit
	 */
	private function setTujuanKreditAttribute($tujuan_kredit)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['tujuan_kredit' => $tujuan_kredit], ['tujuan_kredit' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['tujuan_kredit'] 	= $tujuan_kredit;
	}

	/**
	 * construct set attribute kreditur
	 * @param string $kreditur['id']
	 * @param string $kreditur['nama']
	 */
	private function setKrediturAttribute($kreditur)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make($kreditur, ['id' => 'required|string', 'nama' => 'required|string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['kreditur'] 	= $kreditur;
	}

	/**
	 * construct set attribute penjamin
	 * @param string $penjamin['id']
	 * @param string $penjamin['nama']
	 */
	private function setPenjaminAttribute($penjamin)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make($penjamin, ['id' => 'string', 'nama' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['penjamin'] 	= $penjamin;
	}

	/**
	 * construct set attribute koperasi
	 * @param string $koperasi['id']
	 * @param string $koperasi['nama']
	 */
	private function setKoperasiAttribute($koperasi)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make($koperasi, ['id' => 'required|string', 'nama' => 'required|string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['koperasi'] 	= $koperasi;
	}

	/**
	 * [changeStatus description]
	 * @param array $status [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	private function changeStatus($status)
	{
		switch (strtolower($status)) 
		{
			case 'pengajuan':
				$this->attributes['status']	= $status;
				$this->addEvent(new \Thunderlabid\Credit\Jobs\FirePengajuanKreditEvent($this));
				break;
			case 'survei':
				$this->attributes['status']	= $status;
				// $this->addEvent(new \Thunderlabid\Credit\Jobs\FirePengajuanKreditEvent($this));
				break;
			default:
				throw new Exception('Invalid Status', 1);
				break;
		}
	}

	/**
	 * [addStatus description]
	 * @param array $status [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addStatus($status)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make($status, ['status' => 'required|string', 'tanggal' => 'required|date_format:"Y-m-d"', 'petugas.id' => 'required|string', 'petugas.nama' => 'required|string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['riwayat_status'][] 	= $status;
		$this->changeStatus($status['status']);
	}

	/**
	 * [addJaminanKendaraan description]
	 * @param array $jaminan_kendaraan [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addJaminanKendaraan(JaminanKendaraan $jaminan_kendaraan)
	{
		/////////
		// Set //
		/////////
		$this->attributes['jaminan'][] 	= $jaminan_kendaraan;
	}

	/**
	 * [addJaminanTanahBangunan description]
	 * @param array $jaminan_tanah_bangunan [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addJaminanTanahBangunan(JaminanTanahBangunan $jaminan_tanah_bangunan)
	{
		/////////
		// Set //
		/////////
		$this->attributes['jaminan'][] 	= $jaminan_tanah_bangunan;
	}
}