<?php

namespace App\Infrastructure\Traits;


use App\Domain\Akses\Models\Koperasi;
use App\Domain\HR\Models\Orang;
use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\JaminanKendaraan;
use App\Domain\Pengajuan\Models\JaminanTanahBangunan;

use Exception, DB, TAuth, Carbon\Carbon;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    TTagihan
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait PengajuanKreditTrait {
 	 	
	protected $debitur;
	protected $jaminan_kendaraan;
	protected $jaminan_tanah_bangunan;

	protected $notes;

	public function tambahJaminanKendaraan($tipe, $merk, $tahun, $nomor_bpkb, $atas_nama, $id = null)
	{
		//limit kendaraan
		if(count($this->jaminan_kendaraan) > 2)
		{
			throw new Exception("Maksimal Jaminan Kendaraan = 2", 1);
		}
		
		//pastikan kendaraan tidak dipakai di kredit aktif lain
		$check_bpkb 		= JaminanKendaraan::where('pengajuan_id', '<>' , $this->pengajuan_id)->where('nomor_bpkb', $nomor_bpkb)->wherehas('pengajuan', function($q){$q->where('status', '<>', 'lunas');})->get();

		if(count($check_bpkb))
		{
			throw new Exception("Jaminan sudah di pakai atas nama ".$check_bpkb[0]->pengajuan->debitur->nama.' dengan nomor pengajuan kredit '.$check_bpkb[0]->pengajuan->id, 1);
		}

		$this->jaminan_kendaraan[]	= [
			'id'			=> $id,
			'tipe'			=> $tipe,
			'merk'			=> $merk,
			'tahun'			=> $tahun,
			'nomor_bpkb'	=> $nomor_bpkb,
			'atas_nama'		=> $atas_nama,
		];

		$check_pemakaian 	= JaminanKendaraan::where('pengajuan_id', '<>' , $this->pengajuan_id)->where('nomor_bpkb', $nomor_bpkb)->wherehas('pengajuan', function($q){$q;})->get();

		foreach ((array)$check_pemakaian as $key => $value) 
		{
			if(!empty($value))
			{
				$this->notes['jaminan_kendaraan'][]	= 'Jaminan Pernah dipakai di kredit pengajuan nomor '.$value->pengajuan->debitur->nama;
			}
		}

		return $this;
	}

	public function tambahJaminanTanahBangunan($tipe, $jenis_sertifikat, $nomor_sertifikat, $masa_berlaku_sertifikat, $atas_nama, $alamat, $luas_bangunan, $luas_tanah, $id = null)
	{
		if(count($this->jaminan_tanah_bangunan) > 3)
		{
			throw new Exception("Maksimal Jaminan Tanah & Bangunan = 3", 1);
		}

		//pastikan kendaraan tidak dipakai di kredit aktif lain
		$check_sertifikat 		= JaminanTanahBangunan::where('pengajuan_id', '<>' , $this->pengajuan_id)->where('nomor_sertifikat', $nomor_sertifikat)->wherehas('pengajuan', function($q){$q->where('status', '<>', 'lunas');})->get();

		if(count($check_sertifikat))
		{
			throw new Exception("Jaminan sudah di pakai atas nama ".$check_sertifikat[0]->pengajuan->debitur->nama.' dengan nomor pengajuan kredit '.$check_sertifikat[0]->pengajuan->id, 1);
		}

		$this->jaminan_tanah_bangunan[]	= [
			'id'						=> $id,
			'tipe'						=> $tipe,
			'jenis_sertifikat'			=> $jenis_sertifikat,
			'nomor_sertifikat'			=> $nomor_sertifikat,
			'masa_berlaku_sertifikat'	=> $masa_berlaku_sertifikat,
			'atas_nama'					=> $atas_nama,
			'luas_bangunan'				=> $luas_bangunan,
			'luas_tanah'				=> $luas_tanah,
			'alamat'					=> $alamat,
		];

		$check_pemakaian 	= JaminanTanahBangunan::where('pengajuan_id', '<>' , $this->pengajuan_id)->where('nomor_sertifikat', $nomor_sertifikat)->wherehas('pengajuan', function($q){$q;})->get();

		foreach ((array)$check_pemakaian as $key => $value) 
		{
			if(!empty($value))
			{
				$this->notes['jaminan_tanah_bangunan'][]	= 'Jaminan Pernah dipakai di kredit pengajuan nomor '.$value->pengajuan->debitur->nama;
			}
		}

		return $this;
	}

	public function setDebitur($nik, $nama, $tanggal_lahir, $jenis_kelamin, $status_perkawinan, $telepon, $pekerjaan, $penghasilan_bersih, $is_ektp = true, $alamat = [])
	{
		$cif 			= $this->generateCIF($nik);

		$this->debitur 	= [
			'nik'				=> $nik,
			'cif'				=> $cif,
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

	private function generateCIF($nik = null)
	{
		$orang			= Orang::where('nik', $nik)->first();
		$activeOffice 	= TAuth::activeOffice()['koperasi'];

		$koperasi 		= Koperasi::id($activeOffice['id'])->with(['kantor_pusat'])->first();
	
		if($orang && !is_null($orang->cif))
		{
			return $orang->cif;
		}

		$first_letter 	= $koperasi['kantor_pusat']['kode'].'.'.$koperasi['kode'].'.'.Carbon::now()->format('md').'.';

		$latest_nasabah = Orang::where('cif', 'like', $first_letter.'%')->orderby('created_at', 'desc')->first();

		if($latest_nasabah)
		{
			$last_letter 	= explode('.', $latest_nasabah['cif']);
			$last_letter 	= ((int)$last_letter[3] * 1) + 1;
		}
		else
		{
			$last_letter 	= 1;
		}

		$last_letter 	= str_pad($last_letter, 4, '0', STR_PAD_LEFT);

		return $first_letter.$last_letter;
	}

	private function simpanJaminanKendaraan($jaminan_kendaraan, $pengajuan_id)
	{
		//4. store jaminan kendaraan
		foreach ((array)$jaminan_kendaraan as $key => $value) 
		{
			$jaminan_k 		= JaminanKendaraan::findornew($value['id']);
			$jaminan_k->fill([
							'tipe'			=> $value['tipe'],
							'merk'			=> $value['merk'],
							'tahun'			=> $value['tahun'],
							'nomor_bpkb'	=> $value['nomor_bpkb'],
							'atas_nama'		=> $value['atas_nama'],
			]);
			$jaminan_k->pengajuan_id 	= $pengajuan_id;
			$jaminan_k->save();
		}
		return true;
	}

	private function simpanJaminanTanahBangunan($jaminan_tanah_bangunan, $pengajuan_id)
	{
		//5. store jaminan tanah bangunan
		foreach ((array)$jaminan_tanah_bangunan as $key => $value) 
		{
			$jaminan_tb 		= JaminanTanahBangunan::findornew($value['id']);
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
			$jaminan_tb['attributes']	= array_filter($jaminan_tb['attributes']);
			$jaminan_tb->pengajuan_id 	= $pengajuan_id;
			$jaminan_tb->save();
		}
		return true;
	}

	private function simpanDebitur(Orang $orang, $debitur)
	{
		if((array)$debitur)
		{
			$orang->fill([
					'is_ektp'				=> $debitur['is_ektp'],
					'cif'					=> $debitur['cif'],
					'nik'					=> $debitur['nik'],
					'nama'					=> $debitur['nama'],
					'tanggal_lahir'			=> $debitur['tanggal_lahir'],
					'jenis_kelamin'			=> $debitur['jenis_kelamin'],
					'status_perkawinan'		=> $debitur['status_perkawinan'],
					// 'email'					=> $debitur['email'],
					// 'password'				=> $debitur['password'],
					'telepon'				=> $debitur['telepon'],
					'pekerjaan'				=> $debitur['pekerjaan'],
					'penghasilan_bersih'	=> $debitur['penghasilan_bersih'],
					'alamat'				=> $debitur['alamat'],
				]);
		}

		$orang['attributes']		= array_filter($orang['attributes']);

		$orang->save();

		return $orang;
	}
}