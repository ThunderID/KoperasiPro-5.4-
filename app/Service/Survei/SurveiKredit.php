<?php

namespace App\Service\Survei;

use App\Domain\Pengajuan\Models\Pengajuan;

use App\Domain\Pengajuan\Models\JaminanKendaraan as PengajuanJaminanKendaraan;
use App\Domain\Pengajuan\Models\JaminanTanahBangunan as PengajuanJaminanTanahBangunan;

use App\Domain\Survei\Models\AsetKendaraan;
use App\Domain\Survei\Models\AsetTanahBangunan;
use App\Domain\Survei\Models\AsetUsaha;
use App\Domain\Survei\Models\JaminanKendaraan;
use App\Domain\Survei\Models\JaminanTanahBangunan;
use App\Domain\Survei\Models\Kepribadian;
use App\Domain\Survei\Models\Keuangan;
use App\Domain\Survei\Models\Nasabah;
use App\Domain\Survei\Models\Rekening;
use App\Domain\Survei\Models\FotoJaminan;

use Exception, DB, TAuth, Carbon\Carbon;

class SurveiKredit
{
	protected $pengajuan_id;
	protected $aset_kendaraan;
	protected $aset_tanah_bangunan;
	protected $aset_usaha;
	protected $jaminan_kendaraan;
	protected $jaminan_tanah_bangunan;
	protected $kepribadian;
	protected $keuangan;
	protected $nasabah;
	protected $rekening;

	protected $loggedUser;
	protected $activeOffice;
	protected $pengajuan;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($pengajuan_id)
	{
		$this->pengajuan_id		= $pengajuan_id;
	
		$this->activeOffice 	= TAuth::activeOffice();
		$this->loggedUser 		= TAuth::loggedUser();

		$this->pengajuan 		= Pengajuan::id($this->pengajuan_id)->where('akses_koperasi_id', $this->activeOffice['koperasi']['id'])->status('survei')->firstorfail();
	}

	public function tambahAsetKendaraan($tipe, $nomor_bpkb, $id = null, $uraian = null)
	{
		$this->aset_kendaraan[]	= [
			'tipe'			=> $tipe,
			'nomor_bpkb'	=> $nomor_bpkb,
			'uraian'		=> $uraian,
			'id'			=> $id,
		];

		return $this;
	}

	public function tambahAsetTanahBangunan($nomor_sertifikat, $tipe, $luas, $alamat, $id = null, $uraian = null)
	{
		$this->aset_tanah_bangunan[]	= [
			'nomor_sertifikat'	=> $nomor_sertifikat,
			'tipe'				=> $tipe,
			'luas'				=> $luas,
			'alamat'			=> $alamat,
			'uraian'			=> $uraian,
			'id'				=> $id,
		];

		return $this;
	}

	public function tambahAsetUsaha($bidang_usaha, $nama_usaha, $tanggal_berdiri, $status, $status_tempat_usaha, $luas_tempat_usaha, $jumlah_karyawan, $nilai_aset, $perputaran_stok, $jumlah_konsumen_perbulan, $jumlah_saingan_perkota, $alamat, $id = null, $uraian = null)
	{
		$this->aset_usaha[]	= [
			'bidang_usaha'				=> $bidang_usaha,
			'nama_usaha'				=> $nama_usaha,
			'tanggal_berdiri'			=> $tanggal_berdiri,
			'status'					=> $status,
			'status_tempat_usaha'		=> $status_tempat_usaha,
			'luas_tempat_usaha'			=> $luas_tempat_usaha,
			'jumlah_karyawan'			=> $jumlah_karyawan,
			'nilai_aset'				=> $nilai_aset,
			'perputaran_stok'			=> $perputaran_stok,
			'jumlah_konsumen_perbulan'	=> $jumlah_konsumen_perbulan,
			'jumlah_saingan_perkota'	=> $jumlah_saingan_perkota,
			'alamat'					=> $alamat,
			'uraian'					=> $uraian,
			'id'						=> $id,
		];

		return $this;
	}

	public function tambahJaminanKendaraan($tipe, $merk, $warna, $tahun, $nomor_polisi, $nomor_bpkb, $nomor_mesin, $nomor_rangka, $masa_berlaku_stnk = null, $status_kepemilikan, $harga_taksasi, $fungsi_sehari_hari, $atas_nama, $alamat, $id = null, $url_barcode = null, $uraian = null, $foto_jaminan = [])
	{
		$this->jaminan_kendaraan[]	= [
			'tipe'					=> $tipe,
			'merk'					=> $merk,
			'warna'					=> $warna,
			'tahun'					=> $tahun,
			'nomor_polisi'			=> $nomor_polisi,
			'nomor_bpkb'			=> $nomor_bpkb,
			'nomor_mesin'			=> $nomor_mesin,
			'nomor_rangka'			=> $nomor_rangka,
			'masa_berlaku_stnk'		=> $masa_berlaku_stnk,
			'status_kepemilikan'	=> $status_kepemilikan,
			'harga_taksasi'			=> $harga_taksasi,
			'fungsi_sehari_hari'	=> $fungsi_sehari_hari,
			'atas_nama'				=> $atas_nama,
			'url_barcode'			=> $url_barcode,
			'alamat'				=> $alamat,
			'uraian'				=> $uraian,
			'id'					=> $id,
			'foto_jaminan'			=> $foto_jaminan,
		];

		return $this;
	}

	public function tambahJaminanTanahBangunan($tipe, $jenis_sertifikat, $nomor_sertifikat, $masa_berlaku_sertifikat, $atas_nama, $luas_tanah, $jalan, $lebar_jalan, $letak_lokasi_terhadap_jalan, $lingkungan, $nilai_jaminan, $taksasi_tanah, $njop, $listrik, $air, $url_barcode, $alamat, $luas_bangunan = null, $fungsi_bangunan = null, $bentuk_bangunan = null, $konstruksi_bangunan = null, $lantai_bangunan = null, $dinding = null, $taksasi_bangunan = null, $id = null, $uraian = null, $foto_jaminan = [])
	{
		$this->jaminan_tanah_bangunan[]	= [
			'tipe'						=> $tipe,
			'jenis_sertifikat'			=> $jenis_sertifikat,
			'nomor_sertifikat'			=> $nomor_sertifikat,
			'masa_berlaku_sertifikat'	=> $masa_berlaku_sertifikat,
			'atas_nama'					=> $atas_nama,
			'luas_tanah'				=> $luas_tanah,
			'jalan'						=> $jalan,
			'lebar_jalan'				=> $lebar_jalan,
			'letak_lokasi_terhadap_jalan'	=> $letak_lokasi_terhadap_jalan,
			'lingkungan'				=> $lingkungan,
			'nilai_jaminan'				=> $nilai_jaminan,
			'taksasi_tanah'				=> $taksasi_tanah,
			'njop'						=> $njop,
			'listrik'					=> $listrik,
			'air'						=> $air,
			'url_barcode'				=> $url_barcode,
			'alamat'					=> $alamat,
			'luas_bangunan'				=> $luas_bangunan,
			'fungsi_bangunan'			=> $fungsi_bangunan,
			'bentuk_bangunan'			=> $bentuk_bangunan,
			'konstruksi_bangunan'		=> $konstruksi_bangunan,
			'lantai_bangunan'			=> $lantai_bangunan,
			'dinding'					=> $dinding,
			'taksasi_bangunan'			=> $taksasi_bangunan,
			'uraian'					=> $uraian,
			'id'						=> $id,
			'foto_jaminan'				=> $foto_jaminan,
		];

		return $this;
	}

	public function tambahKepribadian($nama_referens, $telepon_referens, $hubungan, $uraian = null, $id = null)
	{
		$this->kepribadian[]	= [
			'nama_referens'		=> $nama_referens,
			'telepon_referens'	=> $telepon_referens,
			'hubungan'			=> $hubungan,
			'uraian'			=> $uraian,
			'id'				=> $id,
		];

		return $this;
	}

	public function setKeuangan($penghasilan_rutin, $penghasilan_pasangan, $penghasilan_usaha, $penghasilan_lain, $biaya_rumah_tangga, $biaya_rutin, $biaya_pendidikan, $biaya_angsuran, $biaya_lain, $sumber_penghasilan_utama, $jumlah_tanggungan_keluarga, $id = null, $uraian = null)
	{
		$this->keuangan[]	= [
			'penghasilan_rutin'				=> $penghasilan_rutin,
			'penghasilan_pasangan'			=> $penghasilan_pasangan,
			'penghasilan_usaha'				=> $penghasilan_usaha,
			'penghasilan_lain'				=> $penghasilan_lain,
			'biaya_rumah_tangga'			=> $biaya_rumah_tangga,
			'biaya_rutin'					=> $biaya_rutin,
			'biaya_pendidikan'				=> $biaya_pendidikan,
			'biaya_angsuran'				=> $biaya_angsuran,
			'biaya_lain'					=> $biaya_lain,
			'sumber_penghasilan_utama'		=> $sumber_penghasilan_utama,
			'jumlah_tanggungan_keluarga'	=> $jumlah_tanggungan_keluarga,
			'uraian'						=> $uraian,
			'id'							=> $id,
		];
		return $this;
	}

	public function setNasabah($status, $kredit_terdahulu, $jaminan_terdahulu, $uraian = null)
	{
		$this->nasabah[]		= [
			'status'				=> $status,
			'kredit_terdahulu'		=> $kredit_terdahulu,
			'jaminan_terdahulu'		=> $jaminan_terdahulu,
			'uraian'				=> $uraian,
		];

		return $this;
	}

	public function setRekening($rekening, $nomor_rekening, $tanggal_awal, $tanggal_akhir, $saldo_awal, $saldo_akhir, $id = null, $uraian = null)
	{
		$this->rekening[]		= [
			'rekening'				=> $rekening,
			'nomor_rekening'		=> $nomor_rekening,
			'tanggal_awal'			=> $tanggal_awal,
			'tanggal_akhir'			=> $tanggal_akhir,
			'saldo_awal'			=> $saldo_awal,
			'saldo_akhir'			=> $saldo_akhir,
			'uraian'				=> $uraian,
			'id'					=> $id,
		];

		return $this;
	}

	public function setSukuBunga($suku_bunga)
	{
		$this->pengajuan->suku_bunga = $suku_bunga;
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
			DB::BeginTransaction();

			//1. simpan aset kendaraan
			foreach ((array)$this->aset_kendaraan as $key => $value) 
			{
				$aset_k 	= AsetKendaraan::where('id', $value['id'])->where('petugas_id', $this->loggedUser['id'])->where('pengajuan_id', $this->pengajuan->id)->first();
				
				if(!$aset_k)
				{
					$aset_k = new AsetKendaraan;
				}

				$aset_k->fill([
						'petugas_id'	=> $this->loggedUser['id'],
						'pengajuan_id'	=> $this->pengajuan_id,
						'tipe'			=> $value['tipe'],
						'nomor_bpkb'	=> $value['nomor_bpkb'],
						'uraian'		=> $value['uraian'],
					]);
				$aset_k->save();
			}

			//2. simpan aset tanah_bangunan
			foreach ((array)$this->aset_tanah_bangunan as $key => $value) 
			{
				$aset_tb 	= AsetTanahBangunan::where('id', $value['id'])->where('petugas_id', $this->loggedUser['id'])->where('pengajuan_id', $this->pengajuan->id)->first();

				if(!$aset_tb)
				{
					$aset_tb = new AsetTanahBangunan;
				}

				$aset_tb->fill([
						'petugas_id'		=> $this->loggedUser['id'],
						'pengajuan_id'		=> $this->pengajuan_id,
						'nomor_sertifikat'	=> $value['nomor_sertifikat'],
						'tipe'				=> $value['tipe'],
						'luas'				=> $value['luas'],
						'alamat'			=> $value['alamat'],
						'uraian'			=> $value['uraian'],
					]);
				$aset_tb->save();
			}

			//3. simpan aset usaha
			foreach ((array)$this->aset_usaha as $key => $value) 
			{
				$aset_u 	= AsetUsaha::where('id', $value['id'])->where('petugas_id', $this->loggedUser['id'])->where('pengajuan_id', $this->pengajuan->id)->first();

				if(!$aset_u)
				{
					$aset_u = new AsetUsaha;
				}

				$aset_u->fill([
						'petugas_id'				=> $this->loggedUser['id'],
						'pengajuan_id'				=> $this->pengajuan_id,
						'bidang_usaha'				=> $value['bidang_usaha'] ,
						'nama_usaha'				=> $value['nama_usaha'] ,
						'tanggal_berdiri'			=> $value['tanggal_berdiri'] ,
						'status'					=> $value['status'] ,
						'status_tempat_usaha'		=> $value['status_tempat_usaha'] ,
						'luas_tempat_usaha'			=> $value['luas_tempat_usaha'] ,
						'jumlah_karyawan'			=> $value['jumlah_karyawan'] ,
						'nilai_aset'				=> $value['nilai_aset'] ,
						'perputaran_stok'			=> $value['perputaran_stok'] ,
						'jumlah_konsumen_perbulan'	=> $value['jumlah_konsumen_perbulan'] ,
						'jumlah_saingan_perkota'	=> $value['jumlah_saingan_perkota'] ,
						'uraian'					=> $value['uraian'] ,
						'alamat'					=> $value['alamat'] ,
					]);
				$aset_u->save();
			}

			//4. simpan jaminan kendaraan
			foreach ((array)$this->jaminan_kendaraan as $key => $value) 
			{
				$jaminan_kendaraan 	= PengajuanJaminanKendaraan::where('nomor_bpkb', $value['nomor_bpkb'])->where('pengajuan_id', $this->pengajuan->id)->first();

				if(!$jaminan_kendaraan)
				{
					$jaminan_kendaraan 	= new PengajuanJaminanKendaraan;
					$jaminan_kendaraan->fill([
						'tipe'				=> $value['tipe'],
						'merk'				=> $value['merk'],
						'tahun'				=> $value['tahun'],
						'nomor_bpkb'		=> $value['nomor_bpkb'],
						'atas_nama'			=> $value['atas_nama'],
						]);
					$jaminan_kendaraan->pengajuan_id 		= $this->pengajuan_id;
					$jaminan_kendaraan->save();
				}

				$jaminan_k 			= JaminanKendaraan::where('id', $value['id'])->where('petugas_id', $this->loggedUser['id'])->where('jaminan_kendaraan_id', $jaminan_kendaraan->id)->first();

				if(!$jaminan_k)
				{
					$jaminan_k 		= new JaminanKendaraan;
				}

				$jaminan_k->fill([
						'petugas_id'				=> $this->loggedUser['id'],
						'jaminan_kendaraan_id'		=> $jaminan_kendaraan->id,
						'tipe'						=> $value['tipe'],
						'merk'						=> $value['merk'],
						'warna'						=> $value['warna'],
						'tahun'						=> $value['tahun'],
						'nomor_polisi'				=> $value['nomor_polisi'],
						'nomor_bpkb'				=> $value['nomor_bpkb'],
						'nomor_mesin'				=> $value['nomor_mesin'],
						'nomor_rangka'				=> $value['nomor_rangka'],
						'masa_berlaku_stnk'			=> $value['masa_berlaku_stnk'],
						'status_kepemilikan'		=> $value['status_kepemilikan'],
						'harga_taksasi'				=> $value['harga_taksasi'],
						'fungsi_sehari_hari'		=> $value['fungsi_sehari_hari'],
						'atas_nama'					=> $value['atas_nama'],
						'url_barcode'				=> $value['url_barcode'],
						'alamat'					=> $value['alamat'],
						'uraian'					=> $value['uraian'],
					]);
				$jaminan_k['attributes']			= array_filter($jaminan_k['attributes']);
				$jaminan_k->save();


				foreach ((array)$value['foto_jaminan'] as $keyf => $valuef) 
				{
					if($keyf==0)
					{
						$delete 					= FotoJaminan::where('jaminan_id', $jaminan_k->id)->where('jaminan_type', get_class($jaminan_k))->delete();
					}

					$foto_jk 						= new FotoJaminan;
					$foto_jk->fill([
						'jaminan_id'				=> $jaminan_k->id,
						'jaminan_type'				=> get_class($jaminan_k),
						'url'						=> $valuef['url'],
						'keterangan'				=> $valuef['keterangan'],
					]);
					$foto_jk->save();
				}
			}

			//5. simpan jaminan tanah bangunan
			foreach ((array)$this->jaminan_tanah_bangunan as $key => $value) 
			{
				$jaminan_tanah_bangunan 	= PengajuanJaminanTanahBangunan::where('nomor_sertifikat', $value['nomor_sertifikat'])->where('pengajuan_id', $this->pengajuan->id)->first();

				if(!$jaminan_tanah_bangunan)
				{
					$jaminan_tanah_bangunan	= new PengajuanJaminanTanahBangunan;
					$jaminan_tanah_bangunan->fill([
							'tipe'						=> $value['tipe'],
							'jenis_sertifikat'			=> $value['jenis_sertifikat'],
							'nomor_sertifikat'			=> $value['nomor_sertifikat'],
							'masa_berlaku_sertifikat'	=> $value['masa_berlaku_sertifikat'],
							'atas_nama'					=> $value['atas_nama'],
							'luas_tanah'				=> $value['luas_tanah'],
							'luas_bangunan'				=> $value['luas_bangunan'],
							'alamat'					=> $value['alamat'],
						]);
					$jaminan_tanah_bangunan->pengajuan_id 		= $this->pengajuan_id;
					$jaminan_tanah_bangunan->save();
				}

				$jaminan_tb 		= JaminanTanahBangunan::where('id', $value['id'])->where('petugas_id', $this->loggedUser['id'])->where('jaminan_tanah_bangunan_id', $jaminan_tanah_bangunan->id)->first();

				if(!$jaminan_tb)
				{
					$jaminan_tb 	= new JaminanTanahBangunan;
				}

				$jaminan_tb->fill([
						'petugas_id'					=> $this->loggedUser['id'],
						'jaminan_tanah_bangunan_id'		=> $jaminan_tanah_bangunan->id,
						'tipe'							=> $value['tipe'],
						'jenis_sertifikat'				=> $value['jenis_sertifikat'],
						'nomor_sertifikat'				=> $value['nomor_sertifikat'],
						'masa_berlaku_sertifikat'		=> $value['masa_berlaku_sertifikat'],
						'atas_nama'						=> $value['atas_nama'],
						'luas_tanah'					=> $value['luas_tanah'],
						'luas_bangunan'					=> $value['luas_bangunan'],
						'fungsi_bangunan'				=> $value['fungsi_bangunan'],
						'bentuk_bangunan'				=> $value['bentuk_bangunan'],
						'konstruksi_bangunan'			=> $value['konstruksi_bangunan'],
						'lantai_bangunan'				=> $value['lantai_bangunan'],
						'dinding'						=> $value['dinding'],
						'listrik'						=> $value['listrik'],
						'air'							=> $value['air'],
						'jalan'							=> $value['jalan'],
						'lebar_jalan'					=> $value['lebar_jalan'],
						'letak_lokasi_terhadap_jalan'	=> $value['letak_lokasi_terhadap_jalan'],
						'lingkungan'					=> $value['lingkungan'],
						'nilai_jaminan'					=> $value['nilai_jaminan'],
						'taksasi_tanah'					=> $value['taksasi_tanah'],
						'taksasi_bangunan'				=> $value['taksasi_bangunan'],
						'njop'							=> $value['njop'],
						'url_barcode'					=> $value['url_barcode'],
						'alamat'						=> $value['alamat'],
						'uraian'						=> $value['uraian'],
					]);
				$jaminan_tb['attributes']			= array_filter($jaminan_tb['attributes']);
				$jaminan_tb->save();


				foreach ((array)$value['foto_jaminan'] as $keytb => $valuetb) 
				{
					if($keytb==0)
					{
						$delete 					= FotoJaminan::where('jaminan_id', $jaminan_tb->id)->where('jaminan_type', get_class($jaminan_tb))->delete();
					}
					
					$foto_jk 						= new FotoJaminan;
					$foto_jk->fill([
						'jaminan_id'				=> $jaminan_tb->id,
						'jaminan_type'				=> get_class($jaminan_tb),
						'url'						=> $valuef['url'],
						'keterangan'				=> $valuef['keterangan'],
					]);
					$foto_jk->save();
				}
			}

			//6. simpan kepribadian
			foreach ((array)$this->kepribadian as $key => $value) 
			{
				$kepribadian 	= Kepribadian::where('id', $value['id'])->where('pengajuan_id', $this->pengajuan->id)->where('petugas_id', $this->loggedUser['id'])->first();

				if(!$kepribadian)
				{
					$kepribadian = new Kepribadian;
				}

				$kepribadian->fill([
					'petugas_id'			=> $this->loggedUser['id'],
					'pengajuan_id'			=> $this->pengajuan_id,
					'nama_referens'			=> $value['nama_referens'],
					'telepon_referens'		=> $value['telepon_referens'],
					'hubungan'				=> $value['hubungan'],
					'uraian'				=> $value['uraian'],
				]);	
				$kepribadian->save();
			}

			//7. simpan keuangan
			foreach ((array)$this->keuangan as $key => $value) 
			{
				$keuangan 		= Keuangan::id($value['id'])->where('pengajuan_id', $this->pengajuan->id)->where('petugas_id', $this->loggedUser['id'])->first();

				if(!$keuangan)
				{
					$keuangan 	= new Keuangan;
				}

				$keuangan->fill([
					'petugas_id'					=> $this->loggedUser['id'],
					'pengajuan_id'					=> $this->pengajuan_id,
					'penghasilan_rutin'				=> $value['penghasilan_rutin'],
					'penghasilan_pasangan'			=> $value['penghasilan_pasangan'],
					'penghasilan_usaha'				=> $value['penghasilan_usaha'],
					'penghasilan_lain'				=> $value['penghasilan_lain'],
					'biaya_rumah_tangga'			=> $value['biaya_rumah_tangga'],
					'biaya_rutin'					=> $value['biaya_rutin'],
					'biaya_pendidikan'				=> $value['biaya_pendidikan'],
					'biaya_angsuran'				=> $value['biaya_angsuran'],
					'biaya_lain'					=> $value['biaya_lain'],
					'sumber_penghasilan_utama'		=> $value['sumber_penghasilan_utama'],
					'jumlah_tanggungan_keluarga'	=> $value['jumlah_tanggungan_keluarga'],
					'uraian'						=> $value['uraian'],
				]);	
				$keuangan->save();
			}

			//8. simpan nasabah
			foreach ((array)$this->nasabah as $key => $value) 
			{
				$nasabah 		= Nasabah::where('pengajuan_id', $this->pengajuan->id)->where('petugas_id', $this->loggedUser['id'])->first();

				if(!$nasabah)
				{
					$nasabah 	= new Nasabah;
				}

				$nasabah->fill([
					'petugas_id'			=> $this->loggedUser['id'],
					'pengajuan_id'			=> $this->pengajuan_id,
					'status'				=> $value['status'],
					'kredit_terdahulu'		=> $value['kredit_terdahulu'],
					'jaminan_terdahulu'		=> $value['jaminan_terdahulu'],
					'uraian'				=> $value['uraian'],
					]);
				$nasabah->save();
			}

			//9. simpan rekening
			foreach ((array)$this->rekening as $key => $value) 
			{
				$rekening 		= Rekening::id($value['id'])->where('pengajuan_id', $this->pengajuan->id)->where('petugas_id', $this->loggedUser['id'])->first();

				if(!$rekening)
				{
					$rekening 	= new Rekening;
				}

				$rekening->fill([
					'petugas_id'		=> $this->loggedUser['id'],
					'pengajuan_id'		=> $this->pengajuan_id,
					'rekening'			=> $value['rekening'],
					'nomor_rekening'	=> $value['nomor_rekening'],
					'tanggal_awal'		=> $value['tanggal_awal'],
					'tanggal_akhir'		=> $value['tanggal_akhir'],
					'saldo_awal'		=> $value['saldo_awal'],
					'saldo_akhir'		=> $value['saldo_akhir'],
					'uraian'			=> $value['uraian'],
					]);
				$rekening->save();	
			}

			$this->pengajuan->save();

			DB::commit();

			return $this->pengajuan->toArray();
		}
		catch(Exception $e)
		{
			DB::rollback();
			throw $e;
		}
	}
}