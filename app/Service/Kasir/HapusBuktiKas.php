<?php

namespace App\Service\Kasir;

use App\Domain\Kasir\Models\HeaderTransaksi as Model;

use Exception, DB, TAuth, Carbon\Carbon;

class HapusBuktiKas
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

			$model 			= $model->delete();

			DB::commit();

			return true;
		}
		catch(Exception $e)
		{
			DB::rollback();

			throw $e;
		}
	}
}