<?php

namespace App\Service\Pengajuan;

use App\Domain\HR\Models\Orang;
use App\Domain\Akses\Models\Mobile;
use App\Domain\Akses\Models\Koperasi;
use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\JaminanKendaraan;
use App\Domain\Pengajuan\Models\JaminanTanahBangunan;
use App\Domain\Pengajuan\Models\RiwayatKredit;

use Exception, DB, TAuth, Carbon\Carbon;

class PengajuanKredit
{
	protected $debitur;
	protected $jenis_kredit;
	protected $jangka_waktu;
	protected $pengajuan_kredit;
	protected $tanggal_pengajuan;
	protected $mobile;
	protected $spesimen_ttd;
	protected $foto_ktp;
	protected $lokasi;
	protected $referensi;
	protected $jaminan_kendaraan;
	protected $jaminan_tanah_bangunan;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($jenis_kredit, $jangka_waktu, $pengajuan_kredit, $tanggal_pengajuan, $mobile = [], $spesimen_ttd = null, $foto_ktp = null, $lokasi = null, $referensi = null)
	{
		$this->jenis_kredit     	= $jenis_kredit;
		$this->jangka_waktu     	= $jangka_waktu;
		$this->pengajuan_kredit     = $pengajuan_kredit;
		$this->tanggal_pengajuan	= $tanggal_pengajuan;
		$this->mobile				= $mobile;
		$this->spesimen_ttd			= $spesimen_ttd;
		$this->foto_ktp				= $foto_ktp;
		$this->lokasi				= $lokasi;
	}

	public function tambahJaminanKendaraan($tipe, $merk, $tahun, $nomor_bpkb, $atas_nama)
	{
		if(count($this->jaminan_kendaraan) > 2)
		{
			throw new Exception("Maksimal Jaminan Kendaraan = 2", 1);
		}
		$this->jaminan_kendaraan[]	= [
			'tipe'			=> $tipe,
			'merk'			=> $merk,
			'tahun'			=> $tahun,
			'nomor_bpkb'	=> $nomor_bpkb,
			'atas_nama'		=> $atas_nama,
		];

		return $this;
	}

	public function tambahJaminanTanahBangunan($tipe, $jenis_sertifikat, $nomor_sertifikat, $masa_berlaku_sertifikat, $atas_nama, $alamat, $luas_bangunan, $luas_tanah)
	{
		if(count($this->jaminan_tanah_bangunan) > 3)
		{
			throw new Exception("Maksimal Jaminan Tanah & Bangunan = 3", 1);
		}

		$this->jaminan_tanah_bangunan[]	= [
			'tipe'						=> $tipe,
			'jenis_sertifikat'			=> $jenis_sertifikat,
			'nomor_sertifikat'			=> $nomor_sertifikat,
			'masa_berlaku_sertifikat'	=> $masa_berlaku_sertifikat,
			'atas_nama'					=> $atas_nama,
			'luas_bangunan'				=> $luas_bangunan,
			'luas_tanah'				=> $luas_tanah,
			'alamat'					=> $alamat,
		];
		return $this;
	}

	public function setDebitur($nik, $nama, $tanggal_lahir, $jenis_kelamin, $status_perkawinan, $telepon, $pekerjaan, $penghasilan_bersih, $is_ektp = true, $alamat = [])
	{
		$this->debitur 	= [
			'nik'				=> $nik,
			'nama'				=> $nama,
			'tanggal_lahir'		=> $tanggal_lahir,
			'jenis_kelamin'		=> $jenis_kelamin,
			'status_perkawinan'	=> $status_perkawinan,
			'telepon'			=> $telepon,
			'pekerjaan'			=> $pekerjaan,
			'penghasilan_bersih'=> $penghasilan_bersih,
			'is_ektp'			=> $is_ektp,
			'alamat'			=> $alamat,
		];
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function save()
	{
		try
		{
			// DB::BeginTransaction();

			//1. simpan orang
			if(!empty($this->debitur))
			{
				$orang		= Orang::where('nik', $this->debitur['nik'])->first();
				
				if(!$orang)
				{
					$orang 	= new Orang;
					$orang->fill([
							'is_ektp'				=> $this->debitur['is_ektp'],
							'nik'					=> $this->debitur['nik'],
							'nama'					=> $this->debitur['nama'],
							'tanggal_lahir'			=> $this->debitur['tanggal_lahir'],
							'jenis_kelamin'			=> $this->debitur['jenis_kelamin'],
							'status_perkawinan'		=> $this->debitur['status_perkawinan'],
							// 'email'					=> $this->debitur['email'],
							// 'password'				=> $this->debitur['password'],
							'telepon'				=> $this->debitur['telepon'],
							'pekerjaan'				=> $this->debitur['pekerjaan'],
							'penghasilan_bersih'	=> $this->debitur['penghasilan_bersih'],
							'alamat'				=> $this->debitur['alamat'],
						]);
					$orang->save();
				}
			}
			elseif((array)$this->mobile)
			{
				$mobile 	= Mobile::where('mobile_id', $this->mobile['id'])->where('mobile_model', $this->mobile['model'])->with(['pemilik'])->first();	

				if(!empty($mobile['pemilik']) && !isset($orang))
				{
					$orang 	= Orang::find($mobile['orang_id']);
				}
			}

			if(!isset($orang))
			{
				$orang 		= new Orang;
				$orang->save();
			}

			$pengajuan 		= new Pengajuan;
			$pengajuan->fill([
				'jenis_kredit'			=> $this->jenis_kredit,
				'jangka_waktu'			=> $this->jangka_waktu,
				'pengajuan_kredit'		=> $this->pengajuan_kredit,
				'tanggal_pengajuan'		=> $this->tanggal_pengajuan,
				'status'				=> 'pengajuan',
				'spesimen_ttd'			=> $this->spesimen_ttd,
				'foto_ktp'				=> $this->foto_ktp,
				'orang_id'				=> $orang->id,
				]);

			//2. simpan mobile
			if((array)$this->mobile)
			{
				$mobile = $mobile->fill(['mobile_id' => $this->mobile['id'], 'mobile_model' => $this->mobile['model']]);
				$mobile->save();

				$pengajuan->hp_id 	= $mobile->id;
			}

			//3. check assign koperasi id
			if(TAuth::isLogged())
			{
				$pengajuan->akses_koperasi_id 	= TAuth::activeOffice()['koperasi']['id'];
			}
			elseif(!is_null($this->lokasi))
			{
				$all_koperasi 			= Koperasi::get();

				foreach ($all_koperasi as $key => $value) 
				{
					$selisih_lat 			= $this->lokasi['latitude'] - $value['latitude'];
					$selisih_lon 			= $this->lokasi['longitude'] - $value['longitude'];

					if($key == 0)
					{
						$lat_ln 						= $selisih_lon + $selisih_lat;
						$pengajuan->akses_koperasi_id	= $value['id'];
					}
					elseif($lat_ln > $selisih_lat+$selisih_lon)
					{
						$lat_ln 						= $selisih_lat + $selisih_lon;
						$pengajuan->akses_koperasi_id	= $value['id'];
					}
				}
			}

			//see petugas
			// if(TAuth::isLogged())
			// {
			// 	$pengajuan->petugas_id 			= TAuth::loggedUser()['id'];
			// }
			if(!is_null($this->referensi))
			{
				$pengajuan->petugas_id 			= $this->referensi['id'];
			}

			//check this and dat
			if(is_null($this->referensi) && isset($mobile))
			{
				$max 	= Pengajuan::where('hp_id', $pengajuan->hp_id)->where('status', 'pengajuan')->count();
				if($max < 3)
				{
					throw new Exception("Pengajuan Max 3", 1);
				}
			}

			$pengajuan->save();

			//4. store jaminan kendaraan
			foreach ((array)$this->jaminan_kendaraan as $key => $value) 
			{
				$jaminan_k 		= new JaminanKendaraan;
				$jaminan_k->fill([
								'tipe'			=> $value['tipe'],
								'merk'			=> $value['merk'],
								'tahun'			=> $value['tahun'],
								'nomor_bpkb'	=> $value['nomor_bpkb'],
								'atas_nama'		=> $value['atas_nama'],
				]);
				$jaminan_k->pengajuan_id 	= $pengajuan->id;
				$jaminan_k->save();
			}

			//5. store jaminan tanah bangunan
			foreach ((array)$this->jaminan_tanah_bangunan as $key => $value) 
			{
				$jaminan_tb 		= new JaminanTanahBangunan;
				$jaminan_tb->fill([
								'tipe'						=> $value['tipe'],
								'jenis_sertifikat'			=> $value['jenis_sertifikat'],
								'nomor_sertifikat'			=> $value['nomor_sertifikat'],
								'masa_berlaku_sertifikat'	=> $value['masa_berlaku_sertifikat'],
								'atas_nama'					=> $value['atas_nama'],
								'luas_tanah'				=> $value['luas_tanah'],
								'luas_bangunan'				=> $value['luas_bangunan'],
								'alamat'					=> $value['alamat'],
				]);
				$jaminan_tb->pengajuan_id 	= $pengajuan->id;
				$jaminan_tb->save();
			}

			//6. update status
			$riwayat 		= new RiwayatKredit;
			$riwayat->fill([
					'status'	=> 'pengajuan',
					'tanggal'	=> Carbon::now()->format('d/m/Y'),
				]);
			$riwayat->petugas_id 	= TAuth::loggedUser()['id'];
			$riwayat->pengajuan_id 	= $pengajuan->id;
			$riwayat->save();

			// DB::commit();

			return $pengajuan->toArray();
		}
		catch(Exception $e)
		{
			// DB::rollback();
			throw $e;
		}
	}
}