<?php

namespace App\Service\Pengajuan;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\RiwayatKredit;

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

	public function toSurvei($catatan = null)
	{
		$this->status 	= 'survei';
		$this->uraian 	= $catatan;

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