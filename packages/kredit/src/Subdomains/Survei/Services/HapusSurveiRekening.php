<?php

namespace TKredit\Survei\Services;

use TKredit\Survei\Models\Survei;
use TKredit\Survei\Models\Rekening_A as Value;
use TKredit\Survei\Models\RekeningDetail_A;

use DB, Exception;

/**
 * Service SurveiRekening
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
class HapusSurveiRekening
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
			$survei 			= Survei::findorfail($value->survei_id);
			
			$detail 			= RekeningDetail_A::where('rekening_id', $this->value['id'])->delete();

			$value->delete();
			$survei->delete();
			
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
