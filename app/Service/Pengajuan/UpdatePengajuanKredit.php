<?php

namespace App\Service\Pengajuan;

use App\Domain\HR\Models\Orang;
use App\Domain\Pengajuan\Models\Pengajuan;

use App\Infrastructure\Traits\PengajuanKreditTrait;

class UpdatePengajuanKredit
{
	use PengajuanKreditTrait;

	protected $kredit;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($kredit_id)
	{
		$this->kredit 				= Pengajuan::id($kredit_id)->where('status', 'pengajuan')->firstorfail();
	}

	public function setJangkaWaktu($jangka_waktu)
	{
		$this->kredit->jangka_waktu = $jangka_waktu;
	}

	public function setPengajuanKredit($pengajuan_kredit)
	{
		$this->kredit->pengajuan_kredit 	= $pengajuan_kredit;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function save()
	{
		$this->simpanJaminanKendaraan($this->jaminan_kendaraan, $this->kredit->id);
		$this->simpanJaminanTanahBangunan($this->jaminan_tanah_bangunan, $this->kredit->id);
		
		$orang 						= Orang::findornew($this->kredit->orang_id);
		$debitur 					= $this->simpanDebitur($orang, $this->debitur);

		$this->kredit->orang_id 	= $debitur->id;
		$this->kredit->save();		
	}



}