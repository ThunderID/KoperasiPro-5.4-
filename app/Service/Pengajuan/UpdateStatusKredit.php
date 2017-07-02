<?php

namespace App\Service\Pengajuan;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\RiwayatKredit;

use App\Domain\Survei\Models\Nasabah;

use Exception, DB, TAuth, Carbon\Carbon;

class UpdateStatusKredit
{
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
		$this->pengajuan 			= Pengajuan::id($id)->where('akses_koperasi_id', TAuth::activeOffice()['koperasi']['id'])->firstorfail();
	}

	public function toSurvei($note = null)
	{
		$catatan['surveyor']	= $note;

		$this->status 	= 'survei';

		//1. check status nasabah
		if($this->pengajuan->debitur->kredit->count())
		{
			$nasabah['status'] 			= 'lama';

			foreach ($this->pengajuan->debitur->kredit as $key => $value) 
			{
				if($value['id'] != $this->pengajuan->id)
				{
					foreach ((array) $value->jaminan_kendaraan as $key2 => $value2) 
					{
						foreach ((array)$this->pengajuan->jaminan_kendaraan as $key3 => $value3) 
						{
							if($value2['nomor_bpkb'] == $value3['nomor_bpkb'])
							{
								$catatan['jaminan'][]	= 'BPKB '.$value3['nomor_bpkb'].' Pernah dipakai di kredit nomor '.$value['nomor_perjanjian_kredit'];
							}
						}
					}

					foreach ((array) $value->jaminan_tanah_bangunan as $key2 => $value2) 
					{
						foreach ((array)$this->pengajuan->jaminan_tanah_bangunan as $key3 => $value3) 
						{
							if($value2['nomor_sertifikat'] == $value3['nomor_sertifikat'])
							{
								$catatan['jaminan'][]	= strtoupper($value['jenis_sertifikat']).' '.$value3['nomor_sertifikat'].' Pernah dipakai di kredit nomor '.$value['nomor_perjanjian_kredit'];
							}
						}
					}
				}
			}

			if(isset($catatan['jaminan']) && count($catatan['jaminan']) == (count($this->pengajuan->jaminan_kendaraan) + count($this->pengajuan->jaminan_tanah_bangunan)))
			{
				$nasabah['jaminan_terdahulu']	= 'sama';
				$nasabah['uraian']				= $catatan['jaminan'];
			}
			else
			{
				$nasabah['jaminan_terdahulu']	= 'tidak_sama';
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

	public function toMenungguPersetujuan($catatan = null)
	{
		$this->status 	= 'menunggu_persetujuan';
		$this->uraian 	= $catatan;

		return $this;
	}

	public function toMenungguRealisasi($catatan = null)
	{
		$this->status 	= 'menunggu_realisasi';
		$this->uraian 	= $catatan;

		return $this;
	}

	public function toRealisasi($catatan = null)
	{
		$this->status 	= 'realisasi';
		$this->uraian 	= $catatan;

		return $this;
	}

	public function toTolak($catatan = null)
	{
		$this->status 	= 'tolak';
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