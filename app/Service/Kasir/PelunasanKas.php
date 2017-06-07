<?php

namespace App\Service\Kasir;

use App\Domain\Kasir\Models\HeaderTransaksi as Model;

use Exception, DB, TAuth, Carbon\Carbon;

use TCommands\Kredit\RealisasiKredit;

class PelunasanKas
{
	protected $id;
	protected $model;

	/**
	 * Create a new job instance.
	 *
	 * @param  $pengajuan
	 * @return void
	 */
	public function __construct($id)
	{
		$this->id		= $id;
		$this->model	= new Model;
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
			$active_office	= TAuth::activeOffice();

			$model  		= $this->model->id($this->id)->koperasi($active_office['koperasi']['id'])->first();

			if(!$model)
			{
				throw new Exception("Bukti Tidak Ditemukan", 1);
			}

			DB::BeginTransaction();

			$model->status	= 'lunas';
			$model->save();

			//check if model = bukti kas keluar
			if($model->tipe=='bukti_kas_keluar')
			{
				$kredit 	= new RealisasiKredit($model->referensi_id, '');
				$kredit 	= $kredit->handle();
			}

			DB::commit();

			$detail_kas 						= new DaftarKas;
			$detail_kas 						= $detail_kas->detailed($model->id);

			return $detail_kas;
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			throw $e;
		}
	}
}