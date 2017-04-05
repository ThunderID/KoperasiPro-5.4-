<?php

namespace TKredit\Pengajuan\Services;

use TKredit\Pengajuan\Models\Relasi_A;
use TKredit\Pengajuan\Models\Alamat_A;
use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Pengajuan\Models\Orang as Value;

use DB, Exception;

/**
 * Service PengajuanKreditur
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Pengajuan
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class HapusPengajuanKreditur
{
	protected $value;
	protected $pengajuan;

	function __construct($pengajuan, $value)
	{
		$this->value 				= $value;
		$this->pengajuan			= $pengajuan;
	}

	public function handle()
	{
		DB::beginTransaction();

		try
		{
			//1. Hapus survey
			if(isset($this->value['relasi']))
			{
				$relasi 			= Relasi_A::findorfail($this->value['relasi']['id']);
				$relasi->delete();
			}

			if(isset($this->value['alamat']))
			{
				$alamat 			= Alamat_A::findorfail($this->value['alamat']['id']);
				$alamat->delete();
			}
			
			$value 					= Value::findorfail($this->value['id']);
			$value->delete();

			DB::commit();
		}
		catch(Exception $e)
		{
			DB::rollback();

			throw $e;
		}

		return true;
	}
}
