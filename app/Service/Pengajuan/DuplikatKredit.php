<?php

namespace App\Service\Pengajuan;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\JaminanKendaraan;
use App\Domain\Pengajuan\Models\JaminanTanahBangunan;
use App\Domain\Pengajuan\Models\RiwayatKredit;

use App\Domain\Survei\Models\JaminanKendaraan as SJaminanKendaraan;
use App\Domain\Survei\Models\JaminanTanahBangunan as SJaminanTanahBangunan;
use App\Domain\Survei\Models\Kepribadian;
use App\Domain\Survei\Models\Nasabah;
use App\Domain\Survei\Models\AsetUsaha;
use App\Domain\Survei\Models\AsetKendaraan;
use App\Domain\Survei\Models\AsetTanahBangunan;
use App\Domain\Survei\Models\Rekening;
use App\Domain\Survei\Models\Keuangan;

use Exception, DB, TAuth, Carbon\Carbon, Validator;

class DuplikatKredit
{
	protected $id;
	protected $pengajuan;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($id)
	{
		$this->active_office 	= TAuth::activeOffice();
		$this->logged_user 		= TAuth::loggedUser();

		$this->id     			= $id;
		$this->pengajuan 		= Pengajuan::id($id)->where('akses_koperasi_id', $this->active_office['koperasi']['id'])->with(['debitur', 'jaminan_kendaraan', 'jaminan_kendaraan.survei_jaminan_kendaraan', 'jaminan_tanah_bangunan', 'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan', 'survei_kepribadian', 'survei_nasabah', 'survei_aset_usaha', 'survei_aset_kendaraan', 'survei_aset_tanah_bangunan', 'survei_rekening', 'survei_keuangan'])->firstorfail()->toArray();
	}

	public function semua()
	{
		DB::BeginTransaction();

		//1, copy pengajuan
		$pengajuan 						= new Pengajuan;
		$pengajuan->jenis_kredit 		= $this->pengajuan['jenis_kredit'];
		$pengajuan->pengajuan_kredit 	= $this->pengajuan['pengajuan_kredit'];
		$pengajuan->tanggal_pengajuan 	= $this->pengajuan['tanggal_pengajuan'];
		$pengajuan->jangka_waktu 		= $this->pengajuan['jangka_waktu'];
		$pengajuan->petugas_id 			= $this->pengajuan['petugas_id'];
		$pengajuan->orang_id 			= $this->pengajuan['orang_id'];
		$pengajuan->akses_koperasi_id	= $this->pengajuan['akses_koperasi_id'];
		$pengajuan->hp_id 				= $this->pengajuan['hp_id'];
		$pengajuan->spesimen_ttd		= $this->pengajuan['spesimen_ttd'];
		$pengajuan->foto_ktp 			= $this->pengajuan['foto_ktp'];
		$pengajuan->nomor_kredit		= $this->pengajuan['nomor_kredit'];
		$pengajuan->suku_bunga			= $this->pengajuan['suku_bunga'];
		$pengajuan->status				= 'pengajuan';

		$pengajuan->save();

		//2a. copy jaminan kendaraan
		foreach ((array)$this->pengajuan['jaminan_kendaraan'] as $key => $value) 
		{
			$jaminan_k 					= new JaminanKendaraan;
			$jaminan_k->pengajuan_id 	= $pengajuan->id;
			$jaminan_k->tipe 			= $value['tipe'];
			$jaminan_k->merk 			= $value['merk'];
			$jaminan_k->tahun 			= $value['tahun'];
			$jaminan_k->nomor_bpkb 		= $value['nomor_bpkb'];
			$jaminan_k->atas_nama 		= $value['atas_nama'];
			$jaminan_k->save();

			//2a1. copy survei jaminan kendaraan
			foreach ((array)$value['survei_jaminan_kendaraan'] as $key2 => $value2) 
			{
				$s_jaminan_k 						= new SJaminanKendaraan;
				$s_jaminan_k->petugas_id			= $value2['petugas_id'];
				$s_jaminan_k->jaminan_kendaraan_id	= $jaminan_k->id;
				$s_jaminan_k->tipe					= $value2['tipe'];
				$s_jaminan_k->merk					= $value2['merk'];
				$s_jaminan_k->warna					= $value2['warna'];
				$s_jaminan_k->tahun					= $value2['tahun'];
				$s_jaminan_k->nomor_polisi			= $value2['nomor_polisi'];
				$s_jaminan_k->nomor_bpkb			= $value2['nomor_bpkb'];
				$s_jaminan_k->nomor_mesin			= $value2['nomor_mesin'];
				$s_jaminan_k->nomor_rangka			= $value2['nomor_rangka'];
				$s_jaminan_k->masa_berlaku_stnk		= $value2['masa_berlaku_stnk'];
				$s_jaminan_k->status_kepemilikan	= $value2['status_kepemilikan'];
				$s_jaminan_k->harga_taksasi			= $value2['harga_taksasi'];
				$s_jaminan_k->fungsi_sehari_hari	= $value2['fungsi_sehari_hari'];
				$s_jaminan_k->atas_nama				= $value2['atas_nama'];
				$s_jaminan_k->url_barcode			= $value2['url_barcode'];
				$s_jaminan_k->alamat				= $value2['alamat'];
				$s_jaminan_k->uraian				= $value2['uraian'];
				$s_jaminan_k->save();
			}
		}

		//2b. copy jaminan tanah bangunan
		foreach ((array)$this->pengajuan['jaminan_tanah_bangunan'] as $key => $value) 
		{
			$jaminan_tb 							= new JaminanTanahBangunan;
			$jaminan_tb->pengajuan_id 				= $pengajuan->id;
			$jaminan_tb->tipe 						= $value['tipe'];
			$jaminan_tb->jenis_sertifikat 			= $value['jenis_sertifikat'];
			$jaminan_tb->nomor_sertifikat 			= $value['nomor_sertifikat'];
			$jaminan_tb->masa_berlaku_sertifikat 	= $value['masa_berlaku_sertifikat'];
			$jaminan_tb->atas_nama 					= $value['atas_nama'];
			$jaminan_tb->luas_tanah 				= $value['luas_tanah'];
			$jaminan_tb->luas_bangunan 				= $value['luas_bangunan'];
			$jaminan_tb->alamat 					= $value['alamat'];
			$jaminan_tb->save();
		
			//2b1. copy survei jaminan tanah bangunan
			foreach ((array)$value['survei_jaminan_tanah_bangunan'] as $key2 => $value2) 
			{
				$s_jaminan_tb 								= new SJaminanTanahBangunan;
				$s_jaminan_tb->petugas_id					= $value2['petugas_id'];
				$s_jaminan_tb->jaminan_tanah_bangunan_id	= $jaminan_tb->id;
				$s_jaminan_tb->tipe							= $value2['tipe'];
				$s_jaminan_tb->jenis_sertifikat				= $value2['jenis_sertifikat'];
				$s_jaminan_tb->nomor_sertifikat				= $value2['nomor_sertifikat'];
				$s_jaminan_tb->masa_berlaku_sertifikat		= $value2['masa_berlaku_sertifikat'];
				$s_jaminan_tb->atas_nama					= $value2['atas_nama'];
				$s_jaminan_tb->luas_tanah					= $value2['luas_tanah'];
				$s_jaminan_tb->luas_bangunan				= $value2['luas_bangunan'];
				$s_jaminan_tb->fungsi_bangunan				= $value2['fungsi_bangunan'];
				$s_jaminan_tb->bentuk_bangunan				= $value2['bentuk_bangunan'];
				$s_jaminan_tb->konstruksi_bangunan			= $value2['konstruksi_bangunan'];
				$s_jaminan_tb->lantai_bangunan				= $value2['lantai_bangunan'];
				$s_jaminan_tb->dinding						= $value2['dinding'];
				$s_jaminan_tb->listrik						= $value2['listrik'];
				$s_jaminan_tb->air							= $value2['air'];
				$s_jaminan_tb->jalan						= $value2['jalan'];
				$s_jaminan_tb->lebar_jalan					= $value2['lebar_jalan'];
				$s_jaminan_tb->letak_lokasi_terhadap_jalan	= $value2['letak_lokasi_terhadap_jalan'];
				$s_jaminan_tb->lingkungan					= $value2['lingkungan'];
				$s_jaminan_tb->nilai_jaminan				= $value2['nilai_jaminan'];
				$s_jaminan_tb->taksasi_tanah				= $value2['taksasi_tanah'];
				$s_jaminan_tb->taksasi_bangunan				= $value2['taksasi_bangunan'];
				$s_jaminan_tb->njop							= $value2['njop'];
				$s_jaminan_tb->url_barcode					= $value2['url_barcode'];
				$s_jaminan_tb->alamat						= $value2['alamat'];
				$s_jaminan_tb->uraian						= $value2['uraian'];
				$s_jaminan_tb->save();
			}
		}

		//3. simpan survei kepribadian
		foreach ((array)$this->pengajuan['survei_kepribadian'] as $key => $value) 
		{
			$kepribadian 					= new Kepribadian;
			$kepribadian->pengajuan_id 		= $pengajuan->id;
			$kepribadian->petugas_id 		= $value['petugas_id'];
			$kepribadian->nama_referens 	= $value['nama_referens'];
			$kepribadian->telepon_referens 	= $value['telepon_referens'];
			$kepribadian->hubungan 			= $value['hubungan'];
			$kepribadian->uraian 			= $value['uraian'];
			$kepribadian->save();
		}

		//4. survei nasabah
		if((array)$this->pengajuan['survei_nasabah']) 
		{
			$nasabah 					= new Nasabah;
			$nasabah->petugas_id 		= $this->pengajuan['survei_nasabah']['petugas_id'];
			$nasabah->pengajuan_id 		= $pengajuan->id;
			$nasabah->status 			= $this->pengajuan['survei_nasabah']['status'];
			$nasabah->kredit_terdahulu 	= $this->pengajuan['survei_nasabah']['kredit_terdahulu'];
			$nasabah->jaminan_terdahulu = $this->pengajuan['survei_nasabah']['jaminan_terdahulu'];
			$nasabah->uraian 			= $this->pengajuan['survei_nasabah']['uraian'];
			$nasabah->save();
		}

		//5. survei aset usaha
		foreach ((array)$this->pengajuan['survei_aset_usaha'] as $key => $value) 
		{
			$aset_u 							= new AsetUsaha;
			$aset_u->petugas_id 				= $value['petugas_id'];
			$aset_u->pengajuan_id 				= $pengajuan->id;
			$aset_u->bidang_usaha 				= $value['bidang_usaha'];
			$aset_u->nama_usaha 				= $value['nama_usaha'];
			$aset_u->tanggal_berdiri 			= $value['tanggal_berdiri'];
			$aset_u->status 					= $value['status'];
			$aset_u->status_tempat_usaha 		= $value['status_tempat_usaha'];
			$aset_u->luas_tempat_usaha 			= $value['luas_tempat_usaha'];
			$aset_u->jumlah_karyawan 			= $value['jumlah_karyawan'];
			$aset_u->nilai_aset 				= $value['nilai_aset'];
			$aset_u->perputaran_stok 			= $value['perputaran_stok'];
			$aset_u->jumlah_konsumen_perbulan 	= $value['jumlah_konsumen_perbulan'];
			$aset_u->jumlah_saingan_perkota 	= $value['jumlah_saingan_perkota'];
			$aset_u->uraian 					= $value['uraian'];
			$aset_u->alamat 					= $value['alamat'];
			$aset_u->save();
		}

		//6. survei aset kendaraan
		foreach ((array)$this->pengajuan['survei_aset_kendaraan'] as $key => $value) 
		{
			$aset_k 					= new AsetKendaraan;
			$aset_k->petugas_id 		= $value['petugas_id'];
			$aset_k->pengajuan_id 		= $pengajuan->id;
			$aset_k->tipe 				= $value['tipe'];
			$aset_k->nomor_bpkb 		= $value['nomor_bpkb'];
			$aset_k->uraian 			= $value['uraian'];
			$aset_k->save();
		}

		//7. survei aset tanah bangunan
		foreach ((array)$this->pengajuan['survei_aset_tanah_bangunan'] as $key => $value) 
		{
			$aset_tb 					= new AsetTanahBangunan;
			$aset_tb->petugas_id 		= $value['petugas_id'];
			$aset_tb->pengajuan_id 		= $pengajuan->id;
			$aset_tb->nomor_sertifikat 	= $value['nomor_sertifikat'];
			$aset_tb->tipe 				= $value['tipe'];
			$aset_tb->luas 				= $value['luas'];
			$aset_tb->alamat 			= $value['alamat'];
			$aset_tb->uraian 			= $value['uraian'];
			$aset_tb->save();
		}

		//8. survei rekening
		foreach ((array)$this->pengajuan['survei_rekening'] as $key => $value) 
		{
			$rekening 					= new Rekening;
			$rekening->petugas_id 		= $value['petugas_id'];
			$rekening->pengajuan_id 	= $pengajuan->id;
			$rekening->rekening 		= $value['rekening'];
			$rekening->nomor_rekening 	= $value['nomor_rekening'];
			$rekening->tanggal_awal 	= $value['tanggal_awal'];
			$rekening->tanggal_akhir 	= $value['tanggal_akhir'];
			$rekening->saldo_awal 		= $value['saldo_awal'];
			$rekening->saldo_akhir 		= $value['saldo_akhir'];
			$rekening->uraian 			= $value['uraian'];
			$rekening->save();
		}

		//9. survei_keuangan
		foreach ((array)$this->pengajuan['survei_keuangan'] as $key => $value) 
		{
			$keuangan 								= new Keuangan;
			$keuangan->petugas_id 					= $value['petugas_id'];
			$keuangan->pengajuan_id 				= $pengajuan->id;
			$keuangan->penghasilan_rutin 			= $value['penghasilan_rutin'];
			$keuangan->penghasilan_pasangan 		= $value['penghasilan_pasangan'];
			$keuangan->penghasilan_usaha 			= $value['penghasilan_usaha'];
			$keuangan->penghasilan_lain 			= $value['penghasilan_lain'];
			$keuangan->biaya_rumah_tangga 			= $value['biaya_rumah_tangga'];
			$keuangan->biaya_rutin 					= $value['biaya_rutin'];
			$keuangan->biaya_pendidikan 			= $value['biaya_pendidikan'];
			$keuangan->biaya_angsuran 				= $value['biaya_angsuran'];
			$keuangan->biaya_lain 					= $value['biaya_lain'];
			$keuangan->sumber_penghasilan_utama 	= $value['sumber_penghasilan_utama'];
			$keuangan->jumlah_tanggungan_keluarga 	= $value['jumlah_tanggungan_keluarga'];
			$keuangan->uraian 						= $value['uraian'];
			$keuangan->save();
		}

		//10. update status
		$riwayat 				= new RiwayatKredit;
		$riwayat->status 		= 'pengajuan';
		$riwayat->tanggal 		= Carbon::now()->format('d/m/Y');
		$riwayat->petugas_id 	= $this->logged_user['id'];
		$riwayat->pengajuan_id 	= $pengajuan->id;
		$riwayat->uraian 		= ['surveyor' => ['Duplikasi dari kredit dengan nomor pengajuan '.$this->pengajuan['id']]];
		$riwayat->save();

		DB::commit();

		$new_pengajuan 			= Pengajuan::id($pengajuan->id)->where('akses_koperasi_id', $this->active_office['koperasi']['id'])->with(['debitur', 'jaminan_kendaraan', 'jaminan_kendaraan.survei_jaminan_kendaraan', 'jaminan_tanah_bangunan', 'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan', 'survei_kepribadian', 'survei_nasabah', 'survei_aset_usaha', 'survei_aset_kendaraan', 'survei_aset_tanah_bangunan', 'survei_rekening', 'survei_keuangan'])->firstorfail()->toArray();

		return $new_pengajuan;
	}
}