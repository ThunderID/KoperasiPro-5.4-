<?php

namespace TKredit\Pengajuan\Services;

use TKredit\Pengajuan\Models\Alamat_A;
use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Pengajuan\Models\JaminanTanahBangunan_A as Value;

use DB, Exception;

/**
 * Service PengajuanJaminanTanahBangunan
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
class HapusPengajuanJaminanTanahBangunan
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
			if($this->pengajuan instanceOf Pengajuan)
			{
				$pengajuan 			= $this->pengajuan;
			}
			else
			{
				$pengajuan 			= Pengajuan::findorfail($this->pengajuan['id']);
			}

			$value 					= Value::findorfail($this->value['id']);
			$alamat 				= Alamat_A::findorfail($value->alamat_id);
			$alamat->delete();
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
