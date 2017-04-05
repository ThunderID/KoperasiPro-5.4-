<?php

namespace TKredit\Survei\Services;

use TKredit\Survei\Models\Survei;
use TKredit\Survei\Models\Alamat_A;
use TKredit\Survei\Models\JaminanKendaraan_A as Value;

use DB, Exception;

/**
 * Service SurveiJaminanKendaraan
 *
 * Digunakan untuk menyimpan data alamat
 * Ketentuan : 
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 *
 * @package    TKredit
 * @subpackage Survei
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class HapusSurveiJaminanKendaraan
{
	protected $value;
	protected $survei;

	function __construct($survei, $value)
	{
		$this->value 				= $value;
		$this->survei 				= $survei;
	}

	public function handle()
	{
		DB::beginTransaction();

		try
		{
			//1. Hapus survey
			$value 				= Value::findorfail($this->value['id']);
			$alamat 			= Alamat_A::findorfail($value->alamat_id);
			$survei 			= Survei::findorfail($value->survei_id);
			
			$alamat->delete();
			$survei->delete();
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
