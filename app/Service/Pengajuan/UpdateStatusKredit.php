<?php

namespace App\Service\Pengajuan;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\RiwayatKredit;

use App\Domain\Kasir\Models\HeaderTransaksi;
use App\Domain\Kasir\Models\DetailTransaksi;

use App\Domain\Survei\Models\Nasabah;

use Exception, DB, TAuth, Carbon\Carbon;

use App\Infrastructure\Traits\IDRTrait;

class UpdateStatusKredit
{
	use IDRTrait;

	protected $id;
	protected $pengajuan;
	protected $status;
	protected $catatan;
	protected $uraian;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($id)
	{
		$this->id     				= $id;
		$this->pengajuan 			= Pengajuan::id($id)->where('akses_koperasi_id', TAuth::activeOffice()['koperasi']['id'])->with(['debitur'])->firstorfail();
	}

	public function toSurvei($note = null)
	{
		//0. validasi kelengkapan dokumen
		$catatan['surveyor'][]	= $note;

		$this->status 			= 'survei';

		//1. check status nasabah
		if($this->pengajuan->debitur->kredit->count())
		{
			$nasabah['status'] 				= 'lama';
			$nasabah['jaminan_terdahulu']	= 'tidak_sama';

			foreach ((array)$this->pengajuan->jaminan_tanah_bangunan->toArray() as $key => $value) 
			{
				//1a. check jaminan tanah bangunan pernah dipakai jaminan
				$check_j_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('jaminan_tanah_bangunan', function($q)use($value){$q->where('nomor_sertifikat', $value['nomor_sertifikat']);})->with(['debitur'])->get();

				if(count($check_j_t_b))
				{
					foreach ($check_j_t_b as $key2 => $value2) 
					{
						$catatan['jaminan'][]	= 'Jaminan tanah & bangunan dengan nomor sertifikat '.$value['nomor_sertifikat'].' pernah dipakai sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];

						$nasabah['jaminan_terdahulu']	= 'sama';
					}
				}

				//1b. check jaminan tanah bangunan pernah dipakai jaminan orang lain
				$check_j_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('aset_tanah_bangunan', function($q)use($value){$q->where('nomor_sertifikat', $value['nomor_sertifikat']);})->with(['debitur'])->get();

				if(count($check_j_t_b))
				{
					foreach ($check_j_t_b as $key2 => $value2) 
					{
						$catatan['jaminan'][]	= 'Jaminan tanah & bangunan dengan nomor sertifikat '.$value['nomor_sertifikat'].' pernah didaftarkan sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
					}
				}
				//1c. check jaminan digunakan sebagai tempat tinggal
			}

			foreach ((array)$this->pengajuan->jaminan_kendaraan->toArray() as $key => $value) 
			{
				//2a. check jaminan kendaraan pernah dipakai jaminan
				$check_j_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('jaminan_kendaraan', function($q)use($value){$q->where('nomor_bpkb', $value['nomor_bpkb']);})->with(['debitur'])->get();

				if(count($check_j_t_b))
				{
					foreach ($check_j_t_b as $key2 => $value2) 
					{
						$catatan['jaminan'][]	= 'Jaminan tanah & bangunan dengan nomor bpkb '.$value['nomor_bpkb'].' pernah dipakai sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];

						$nasabah['jaminan_terdahulu']	= 'sama';
					}
				}

				//2b. check jaminan kendaraan pernah dipakai jaminan orang lain
				$check_j_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('aset_tanah_bangunan', function($q)use($value){$q->where('nomor_bpkb', $value['nomor_bpkb']);})->with(['debitur'])->get();

				if(count($check_j_t_b))
				{
					foreach ($check_j_t_b as $key2 => $value2) 
					{
						$catatan['jaminan'][]	= 'Jaminan tanah & bangunan dengan nomor bpkb '.$value['nomor_bpkb'].' pernah didaftarkan sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
					}
				}
			}

			if(isset($catatan['jaminan']))
			{
				$nasabah['uraian']			= json_encode($catatan['jaminan']);
			}

			$nasabah['kredit_terdahulu']	= 'lancar';

			$data_nasabah 					= new Nasabah;
			$data_nasabah->fill($nasabah);
			$data_nasabah->petugas_id 		= TAuth::loggedUser()['id'];
			$data_nasabah->pengajuan_id		= $this->pengajuan->id;

			$data_nasabah->save();
		}
		else
		{
			$this->pengajuan->status 	= 'baru';
		}

		$this->uraian 	= json_encode($catatan);

		return $this;
	}

	public function toMenungguPersetujuan($note = null)
	{
		$catatan['surveyor'][]	= $note;

		foreach ((array)$this->pengajuan->survei_aset_tanah_bangunan->toArray() as $key => $value) 
		{
			//1a. check aset tanah bangunan pernah dipakai jaminan
			$check_a_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('jaminan_tanah_bangunan', function($q)use($value){$q->where('nomor_sertifikat', $value['nomor_sertifikat']);})->with(['debitur'])->get();

			if(count($check_a_t_b))
			{
				foreach ($check_a_t_b as $key2 => $value2) 
				{
					$catatan['aset'][]	= 'Aset tanah & bangunan dengan nomor sertifikat '.$value['nomor_sertifikat'].' pernah dipakai sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
				}
			}

			//1b. check aset tanah bangunan pernah dipakai aset orang lain
			$check_a_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('aset_tanah_bangunan', function($q)use($value){$q->where('nomor_sertifikat', $value['nomor_sertifikat']);})->with(['debitur'])->get();

			if(count($check_a_t_b))
			{
				foreach ($check_a_t_b as $key2 => $value2) 
				{
					$catatan['aset'][]	= 'Aset tanah & bangunan dengan nomor sertifikat '.$value['nomor_sertifikat'].' pernah didaftarkan sebagai aset kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
				}
			}
		}

		foreach ((array)$this->pengajuan->survei_aset_kendaraan->toArray() as $key => $value) 
		{
			//2a. check aset kendaraan pernah dipakai jaminan
			$check_a_k 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('jaminan_kendaraan', function($q)use($value){$q->where('nomor_bpkb', $value['nomor_bpkb']);})->with(['debitur'])->get();

			if(count($check_a_k))
			{
				foreach ($check_a_k as $key2 => $value2) 
				{
					$catatan['aset'][]	= 'Aset kendaraan dengan nomor bpkb '.$value['nomor_bpkb'].' pernah dipakai sebagai jaminan di kredit atas nama'.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
				}
			}

			//2b. check aset kendaraan pernah dipakai aset orang lain
			$check_a_k 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('aset_kendaraan', function($q)use($value){$q->where('nomor_bpkb', $value['nomor_bpkb']);})->with(['debitur'])->get();

			if(count($check_a_k))
			{
				foreach ($check_a_k as $key2 => $value2) 
				{
					$catatan['aset'][]	= 'Aset kendaraan dengan nomor bpkb '.$value['nomor_bpkb'].' pernah didaftarkan sebagai aset di kredit atas nama'.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
				}
			}
		}

		//3. penghasilan bersih di survei 
		if($this->pengajuan->debitur->count() && $this->pengajuan->debitur->penghasilan_bersih > 0)
		{
			$pengajuan_pb 	= $this->pengajuan->debitur->penghasilan_bersih;

			foreach ((array)$this->pengajuan->survei_keuangan->toArray() as $key => $value) 
			{
				$pb 		= $this->formatMoneyFrom($value['penghasilan_bersih']);
				if($pengajuan_pb - $pb !=0)
				{
					$catatan['keuangan'][]	= 'Selisih '.$this->formatMoneyTo($pengajuan_pb - $pb).' antara penghasilan bersih saat pengajuan kredit dan survei ke '.($key + 1);
				}
			} 
		}

		//4a. perkembangan saldo rekening
		foreach ((array)$this->pengajuan->survei_rekening->toArray() as $key => $value) 
		{
			$pb 		= $this->formatMoneyFrom($value['selisih_saldo']);

			if($pb > 0)
			{
				$catatan['rekening'][]	= 'Survei '.($key+1).' saldo rekening '.$value['rekening'].'('.$value['nomor_rekening'].') debitur '.' bertambah dalam jangka waktu '.$value['selisih_hari'].' hari ';
			}
			elseif($pb==0)
			{
				$catatan['rekening'][]	= 'Survei '.($key+1).' saldo rekening '.$value['rekening'].'('.$value['nomor_rekening'].') debitur '.' tidak mengalami perubahan jangka waktu '.$value['selisih_hari'].' hari ';
			}
			else
			{
				$catatan['rekening'][]	= 'Survei '.($key+1).' saldo rekening '.$value['rekening'].'('.$value['nomor_rekening'].') debitur '.' berkurang dalam jangka waktu '.$value['selisih_hari'].' hari ';
			}
		}

		//4b. check nomor rekening
		foreach ((array)$this->pengajuan->survei_rekening->toArray() as $key => $value) 
		{
			//check penggunaan nomor rekening
			$check_r 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('survei_rekening', function($q)use($value){$q->where('nomor_rekening', $value['nomor_rekening']);})->with(['debitur'])->get();

			if(count($check_r))
			{
				foreach ($check_r as $key2 => $value2) 
				{
					$catatan['rekening'][]	= 'Rekening dengan nomor rekening '.$value['nomor_rekening'].' pernah di pakai di kredit atas mama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
				}
			}
		}

		//5. check pekerjaan dan jenis angsuran
		switch (strtolower($this->pengajuan->debitur->pekerjaan)) 
		{
			case 'karyawan_swasta': case 'pegawai_negeri': case 'polri':
				if($this->pengajuan->jenis_kredit=='musiman')
				{
					$catatan['debitur'][] 	= 'Jenis kredit musiman tidak cocok untuk debitur dengan pekerjaan '.$this->pengajuan->debitur->pekerjaan;
				}
				break;
		}

		$this->status 	= 'menunggu_persetujuan';
		$this->uraian 	= json_encode($catatan);

		return $this;
	}

	public function toMenungguRealisasi($note = null)
	{
		$catatan['surveyor'][]	= $note;
	
		//1. buat bukti relasasi
		$attributes 		= [
			'orang_id'			=> $this->pengajuan->orang_id,
			'pengajuan_id'		=> $this->pengajuan->id,
			// 'nomor_transaksi'	=> $this->generateNomorTransaksi($this->pengajuan->id),
			'tipe'				=> 'transaksi_keluar',
			'status'			=> 'pending',
			'tanggal_dikeluarkan'	=> Carbon::now()->format('d/m/Y'),
			'tanggal_jatuh_tempo'	=> Carbon::addMonths(1)->format('d/m/Y'),
		];

		$attr_detail 		= [
			'item'					=> 'Pencairan Kredit '.$this->pengajuan->nomor_kredit,
			'deskripsi'				=> 'Pencairan Kredit '.$this->pengajuan->nomor_kredit,
			'kuantitas'				=> 1,
			'harga_satuan'			=> $this->pengajuan->pengajuan_kredit,
			'diskon_satuan'			=> 'Rp 0',
		];

		$transaksi 			= HeaderTransaksi::where('pengajuan_id', $this->pengajuan->id)->firstornew();
		$transaksi->fill($attributes);
		$transaksi->save();

		$detail_transaksi 	= DetailTransaksi::where('header_transaksi_id', $transaksi->id)->firstornew();
		$detail_transaksi->fill($attr_detail);
		$detail_transaksi->header_transaksi_id 	= $transaksi->id;
		$detail_transaksi->save();

		$this->pengajuan->nomor_kredit 	= $this->generateNomorKredit($this->pengajuan->id);

		$this->status 	= 'menunggu_realisasi';
		$this->uraian 	= json_encode($catatan);

		return $this;
	}

	private function generateNomorTransaksi($nomor_kredit)
	{
		return Carbon::now()->format('Ymd').'.'.$this->pengajuan->koperasi->kode.'.'.$nomor_kredit;
	}

	private function generateNomorKredit($id)
	{
		$prefix 	= Carbon::now()->format('Ymd').'.'.$this->pengajuan->koperasi->kode.'.';

		$find 		= Pengajuan::where('nomor_kredit', 'like', $prefix.'%')->orderby('created_at')->first();
		
		if($find)
		{
			$suffix 	= explode('.', $find['nomor_kredit']);
			$suffix 	= ((int)$suffix[2] * 1) + 1;
		}
		else
		{
			$suffix 	= 1;
		}

		$suffix 	= str_pad($suffix, 3, '0', STR_PAD_LEFT);

		return $prefix.$suffix;
	}

	public function toRealisasi($note = null)
	{
		$catatan['surveyor'][]	= $note;
		
		$transaksi 		= HeaderTransaksi::where('pengajuan_id', $this->pengajuan->id)->firstorfail();
		$transaksi->nomor_transaksi 	= $this->generateNomorTransaksi($this->pengajuan->nomor_kredit);
		$transaksi->save();

		$this->status 	= 'realisasi';
		$this->uraian 	= json_encode($catatan);

		return $this;
	}

	public function toTolak($note = null)
	{
		$catatan['surveyor'][]	= $note;
		
		$this->status 	= 'tolak';
		$this->uraian 	= json_encode($catatan);

		return $this;
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

			$status_baru	= new RiwayatKredit;

			$status_baru->fill([
					'pengajuan_id'		=> $this->pengajuan->id,
					'petugas_id'		=> TAuth::loggedUser()['id'],
					'status'			=> $this->status,
					'tanggal'			=> Carbon::now()->format('d/m/Y'),
					'uraian'			=> $this->uraian,
				]);

			$status_baru->save();

			$this->pengajuan->status 	= $this->status;
			$this->pengajuan->save();


			// DB::commit();

			return $this->pengajuan->toArray();
		}
		catch(Exception $e)
		{
			// DB::rollback();
			throw $e;
		}
	}
}