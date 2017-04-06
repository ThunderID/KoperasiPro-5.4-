<?php

namespace TKredit\Survei\Services;

use TKredit\Survei\Models\Survei;
use TKredit\Survei\Models\Rekening_A as Value;

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

	public static function bankyangsama($nomor_dokumen_kredit, $rekening_id)
	{

		try
		{
			//1. Hapus survey
			$survei 		= Survei::where('nomor_dokumen_kredit', $nomor_dokumen_kredit)->get(['id']);

			if(count($survei) > 0)
			{
				DB::beginTransaction();

				$value 			= Value::id($rekening_id)->first();

				$all_reks 		= Value::where('nama_bank', $value['nama_bank'])->where('atas_nama', $value['atas_nama'])->whereIn('survei_id', $survei)->get();

				foreach ($all_reks as $delete_o) 
				{
					$delete_o->survei->delete();
					$delete_o->delete();
				}
	
				DB::commit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();

			throw $e;
		}

		return true;
	}
}
