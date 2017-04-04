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
class SimpanPengajuanJaminanTanahBangunan
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
			//1. simpan survey
			if($this->pengajuan instanceOf Pengajuan)
			{
				$pengajuan 			= $this->pengajuan;
			}
			else
			{
				$pengajuan 			= Pengajuan::findorfail($this->pengajuan['id']);
			}

			$alamat 				= new Alamat_A;
			$alamat 				= $alamat->fill($this->value['alamat']);
			$alamat->save();

			unset($this->value['alamat']);
			$value 					= new Value;
			$value 					= $value->fill($this->value);
			$value->pengajuan_id 	= $pengajuan->id;
			$value->alamat_id		= $alamat->id;

			$value->save();

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
