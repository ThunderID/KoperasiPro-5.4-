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
class SimpanSurveiJaminanKendaraan
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
			//1. simpan survey
			$survei 			= new Survei;
			$survei 			= $survei->fill($this->survei);
			$survei 			= $survei->setPetugas($this->survei);
			$survei->save();

			$alamat 			= new Alamat_A;
 			$alamat->fill($this->value['alamat']);
			$alamat->save();
			
			if(isset($this->value['id']) && empty($this->value['id']) && is_null($this->value['id']))
			{
				$value 			= Value::findorfail($this->value['id']);
			}
			else
			{
				$value 			= new Value;
			}
			
			$value 				= $value->fill($this->value);
			$value->survei_id 	= $survei->id;
			$value->alamat_id 	= $alamat->id;

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
