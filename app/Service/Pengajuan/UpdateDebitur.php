<?php

namespace App\Service\Pengajuan;

use App\Domain\HR\Models\Orang;
use App\Domain\HR\Models\Relasi;

use Exception, DB, TAuth, Carbon\Carbon;

class UpdateDebitur
{
	protected $id;

	protected $orang;
	
	protected $relasi;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($id)
	{
		$this->id     				= $id;
	
		$this->orang				= Orang::id($id)->first();
	}

	public function tembahRelasi($hubungan, $nik, $nama, $tanggal_lahir, $jenis_kelamin, $status_perkawinan, $telepon, $pekerjaan, $penghasilan_bersih, $is_ektp = true, $alamat = [], $id = null)
	{
		$this->relasi[] 	= [
			'hubungan'			=> $hubungan,
			'nik'				=> $nik,
			'nama'				=> $nama,
			'tanggal_lahir'		=> $tanggal_lahir,
			'jenis_kelamin'		=> $jenis_kelamin,
			'status_perkawinan'	=> $status_perkawinan,
			'telepon'			=> $telepon,
			'pekerjaan'			=> $pekerjaan,
			'penghasilan_bersih'=> $penghasilan_bersih,
			'is_ektp'			=> $is_ektp,
			'alamat'			=> $alamat,
			'id'				=> $id,
		];
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

			//1. simpan relasi
			foreach ($this->relasi as $key => $value) 
			{
				$orang		= Orang::where('id', $value['id'])->first();
				
				if(!$orang)
				{
					$orang 	= new Orang;
				}

				$orang->fill([
						'is_ektp'				=> $value['is_ektp'],
						'nik'					=> $value['nik'],
						'nama'					=> $value['nama'],
						'tanggal_lahir'			=> $value['tanggal_lahir'],
						'jenis_kelamin'			=> $value['jenis_kelamin'],
						'status_perkawinan'		=> $value['status_perkawinan'],
						// 'email'					=> $value['email'],
						// 'password'				=> $value['password'],
						'telepon'				=> $value['telepon'],
						'pekerjaan'				=> $value['pekerjaan'],
						'penghasilan_bersih'	=> $value['penghasilan_bersih'],
						'alamat'				=> $value['alamat'],
					]);
			
				$orang['attributes'] 		= array_filter($orang['attributes']);

				$orang->save();

				$relasi 			= Relasi::where('orang_id', $this->orang->id)->where('relasi_id', $orang->id)->first();
				if(!$relasi)
				{
					$relasi 		= new Relasi;
				}
				$relasi->orang_id 	= $this->orang->id;
				$relasi->relasi_id 	= $orang->id;
				$relasi->hubungan 	= $value['hubungan'];

				$relasi->save();
			}
		}
		catch(Exception $e)
		{
			// DB::rollback();
			throw $e;
		}
	}
}