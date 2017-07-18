<?php

namespace App\Service\Pengajuan;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\RiwayatKredit;

use App\Domain\Kasir\Models\HeaderTransaksi;
use App\Domain\Kasir\Models\DetailTransaksi;

use App\Domain\Survei\Models\Nasabah;

use Exception, DB, TAuth, Carbon\Carbon, Validator;

use App\Infrastructure\Traits\IDRTrait;

use App\Infrastructure\Traits\KewenanganTrait;

class UpdateStatusKredit
{
	use IDRTrait;
	use KewenanganTrait;

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
		$this->active_office 		= TAuth::activeOffice();

		$this->id     				= $id;
		$this->pengajuan 			= Pengajuan::id($id)->where('akses_koperasi_id', $this->active_office['koperasi']['id'])->with(['debitur', 'jaminan_kendaraan', 'jaminan_tanah_bangunan'])->firstorfail();
	}

	public function toSurvei($note = null)
	{
		$this->legal('survei');

		//catatan dokumen
		$catatan['surveyor'][]	= $note;

		$this->status 			= 'survei';

		//0a. validate there is agunan
		if(!$this->pengajuan->jaminan_tanah_bangunan->count() && !$this->pengajuan->jaminan_kendaraan->count())
		{
			throw new Exception("Belum ada jaminan", 1);
		}

		//0b. validasi data debitur
		$rules 		= [
			// 'is_ektp'				=> 'boolean',
			'nik'					=> 'required|max:255',
			'nama'					=> 'required|max:255',
			'tanggal_lahir'			=> 'required|date_format:"d/m/Y"|min:today',
			'jenis_kelamin'			=> 'required|in:laki-laki,perempuan',
			'status_perkawinan'		=> 'required|in:kawin,belum_kawin,cerai,cerai_mati',
			'cif'					=> 'required|max:255',
			'telepon'				=> 'required|max:255',
			'pekerjaan'				=> 'required|max:255',
			'penghasilan_bersih'	=> 'required',
			'alamat'				=> 'required',
		];

		$validating 		= Validator::make($this->pengajuan->debitur->toArray(), $rules);

		if(!$validating->passes())
		{
			throw new Exception($validating->messages()->toJson(), 1);
		}

		//0c. check data KK
		if(!$this->pengajuan->debitur->relasi->count())
		{
			throw new Exception("Belum ada data keluarga", 1);
		}

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
						$catatan['jaminan'][]	= 'Jaminan tanah & bangunan dengan nomor Sertifikat "'.$value['nomor_sertifikat'].'" pernah dipakai sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];

						$nasabah['jaminan_terdahulu']	= 'sama';
					}
				}

				//1b. check jaminan tanah bangunan pernah dipakai jaminan orang lain
				$check_j_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('survei_aset_tanah_bangunan', function($q)use($value){$q->where('nomor_sertifikat', $value['nomor_sertifikat']);})->with(['debitur'])->get();

				if(count($check_j_t_b))
				{
					foreach ($check_j_t_b as $key2 => $value2) 
					{
						$catatan['jaminan'][]	= 'Jaminan tanah & bangunan dengan nomor Sertifikat "'.$value['nomor_sertifikat'].'" pernah didaftarkan sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
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
						$catatan['jaminan'][]	= 'Jaminan tanah & bangunan dengan nomor BPKB "'.$value['nomor_bpkb'].'" pernah dipakai sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];

						$nasabah['jaminan_terdahulu']	= 'sama';
					}
				}

				//2b. check jaminan kendaraan pernah dipakai jaminan orang lain
				$check_j_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('survei_aset_kendaraan', function($q)use($value){$q->where('nomor_bpkb', $value['nomor_bpkb']);})->with(['debitur'])->get();

				if(count($check_j_t_b))
				{
					foreach ($check_j_t_b as $key2 => $value2) 
					{
						$catatan['jaminan'][]	= 'Jaminan tanah & bangunan dengan nomor BPKB "'.$value['nomor_bpkb'].'" pernah didaftarkan sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
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

		$this->uraian 	= $catatan;

		return $this;
	}

	public function toMenungguPersetujuan($note = null)
	{
		$this->legal('menunggu_persetujuan', $this->formatMoneyFrom($this->pengajuan->pengajuan_kredit));
		
		$catatan['surveyor'][]	= $note;

		//0a1. check suku bunga 
		if(is_null($this->pengajuan->suku_bunga))
		{
			throw new Exception("Suku Bunga belum di set", 1);
		}

		//0a. check kelengkapan survei
		foreach ((array)$this->pengajuan->jaminan_kendaraan->toArray() as $key => $value) 
		{
			if(!$this->pengajuan->jaminan_kendaraan[$key]->survei_jaminan_kendaraan->count())
			{
				throw new Exception("Belum ada survei jaminan kendaraan dengan nomor BPKB ".$value['nomor_bpkb'], 1);
			}
		}

		//0b. check kelengkapan survei
		foreach ((array)$this->pengajuan->jaminan_tanah_bangunan->toArray() as $key => $value) 
		{
			if(!$this->pengajuan->jaminan_tanah_bangunan[$key]->survei_jaminan_tanah_bangunan->count())
			{
				throw new Exception("Belum ada survei jaminan sertifikat dengan nomor Sertifikat ".$value['nomor_sertifikat'], 1);
			}
		}

		//0c. check kelengkapan survei
		if(!count($this->pengajuan->survei_aset_kendaraan) && !count($this->pengajuan->survei_aset_kendaraan) && !count($this->pengajuan->survei_aset_kendaraan))
		{
			throw new Exception("Belum ada survei aset", 1);
		}

		//0d. check kelengkapan survei
		if(!count($this->pengajuan->survei_kepribadian))
		{
			throw new Exception("Belum ada survei kepribadian", 1);
		}

		//0e. check kelengkapan survei
		if(!count($this->pengajuan->survei_keuangan))
		{
			throw new Exception("Belum ada survei keuangan", 1);
		}

		//0f. check kelengkapan survei
		if(!count($this->pengajuan->survei_rekening))
		{
			throw new Exception("Belum ada survei rekening", 1);
		}

		foreach ((array)$this->pengajuan->survei_aset_tanah_bangunan->toArray() as $key => $value) 
		{
			//1a. check aset tanah bangunan pernah dipakai jaminan
			$check_a_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('jaminan_tanah_bangunan', function($q)use($value){$q->where('nomor_sertifikat', $value['nomor_sertifikat']);})->with(['debitur'])->get();

			if(count($check_a_t_b))
			{
				foreach ($check_a_t_b as $key2 => $value2) 
				{
					$catatan['aset'][]	= 'Aset tanah & bangunan dengan nomor Sertifikat "'.$value['nomor_sertifikat'].'" pernah dipakai sebagai jaminan kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
				}
			}

			//1b. check aset tanah bangunan pernah dipakai aset orang lain
			$check_a_t_b 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('survei_aset_tanah_bangunan', function($q)use($value){$q->where('nomor_sertifikat', $value['nomor_sertifikat']);})->with(['debitur'])->get();

			if(count($check_a_t_b))
			{
				foreach ($check_a_t_b as $key2 => $value2) 
				{
					$catatan['aset'][]	= 'Aset tanah & bangunan dengan nomor Sertifikat "'.$value['nomor_sertifikat'].'" pernah didaftarkan sebagai aset kredit atas nama '.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
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
					$catatan['aset'][]	= 'Aset kendaraan dengan nomor BPKB "'.$value['nomor_bpkb'].'" pernah dipakai sebagai jaminan di kredit atas nama'.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
				}
			}

			//2b. check aset kendaraan pernah dipakai aset orang lain
			$check_a_k 	= Pengajuan::notid($this->pengajuan['id'])->whereHas('survei_aset_kendaraan', function($q)use($value){$q->where('nomor_bpkb', $value['nomor_bpkb']);})->with(['debitur'])->get();

			if(count($check_a_k))
			{
				foreach ($check_a_k as $key2 => $value2) 
				{
					$catatan['aset'][]	= 'Aset kendaraan dengan nomor BPKB "'.$value['nomor_bpkb'].'" pernah didaftarkan sebagai aset di kredit atas nama'.$value2['debitur']['nama'].' dengan nomor pengajuan '.$value2['id'];
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
				$catatan['rekening'][]	= 'Survei ke-'.($key+1).' rekening '.$value['rekening'].' ('.$value['nomor_rekening'].') milik debitur '.' bertambah sebesar '.$this->formatMoneyTo(abs($pb)).' dalam rentang waktu '.$value['selisih_hari'].' hari ';
			}
			elseif($pb==0)
			{
				$catatan['rekening'][]	= 'Survei ke-'.($key+1).' rekening '.$value['rekening'].' ('.$value['nomor_rekening'].') milik debitur '.' tidak mengalami perubahan dalam rentang waktu '.$value['selisih_hari'].' hari ';
			}
			else
			{
				$catatan['rekening'][]	= 'Survei ke-'.($key+1).' rekening '.$value['rekening'].' ('.$value['nomor_rekening'].') milik debitur '.' berkurang sebesar '.$this->formatMoneyTo(abs($pb)).' dalam rentang waktu '.$value['selisih_hari'].' hari ';
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
		$this->uraian 	= $catatan;

		return $this;
	}

	public function toMenungguRealisasi($note = null)
	{
		$this->legal('menunggu_realisasi');
	
		$catatan['surveyor'][]	= $note;
	
		//1. buat bukti relasasi
		$attributes 		= [
			'orang_id'			=> $this->pengajuan->orang_id,
			'pengajuan_id'		=> $this->pengajuan->id,
			// 'nomor_transaksi'	=> $this->generateNomorTransaksi($this->pengajuan->id),
			'tipe'				=> 'bukti_kas_keluar',
			'status'			=> 'pending',
			'tanggal_dikeluarkan'	=> Carbon::now()->format('d/m/Y'),
			'tanggal_jatuh_tempo'	=> Carbon::now()->addMonths(1)->format('d/m/Y'),
			'koperasi_id'			=> $this->pengajuan->akses_koperasi_id,
		];

		$attr_detail 		= [
			'item'					=> 'Pencairan Kredit '.$this->pengajuan->nomor_kredit,
			'deskripsi'				=> 'Pencairan Kredit '.$this->pengajuan->nomor_kredit,
			'kuantitas'				=> 1,
			'harga_satuan'			=> $this->pengajuan->pengajuan_kredit,
			'diskon_satuan'			=> 'Rp 0',
		];

		$transaksi 				= HeaderTransaksi::where('pengajuan_id', $this->pengajuan->id)->first();
		if(!$transaksi)
		{
			$transaksi 			= new HeaderTransaksi;
		}
		$transaksi->fill($attributes);
		$transaksi->save();

		$detail_transaksi 		= DetailTransaksi::where('header_transaksi_id', $transaksi->id)->first();
		if(!$detail_transaksi)
		{
			$detail_transaksi 	= new DetailTransaksi;
		}
		$detail_transaksi->fill($attr_detail);
		$detail_transaksi->header_transaksi_id 	= $transaksi->id;
		$detail_transaksi->save();

		$this->pengajuan->nomor_kredit 	= $this->generateNomorKredit($this->pengajuan->id);

		$this->status 	= 'menunggu_realisasi';
		$this->uraian 	= $catatan;

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
		$this->legal('realisasi');

		$catatan['surveyor'][]	= $note;
		
		$transaksi 		= HeaderTransaksi::where('pengajuan_id', $this->pengajuan->id)->firstorfail();
		$transaksi->nomor_transaksi 	= $this->generateNomorTransaksi($this->pengajuan->nomor_kredit);
		$transaksi->save();

		$this->status 	= 'realisasi';
		$this->uraian 	= $catatan;

		return $this;
	}

	public function toTolak($note = null)
	{
		$this->legal('tolak');
		$catatan['surveyor'][]	= $note;
		
		$this->status 	= 'tolak';
		$this->uraian 	= $catatan;

		return $this;
	}

	public function toLunas($note = null)
	{
		$this->legal('lunas');
		$catatan['surveyor'][]	= $note;
		
		$this->status 	= 'lunas';
		$this->uraian 	= $catatan;

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