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
class SimpanSurveiRekening
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
			if(isset($this->survei['id']) && empty($this->survei['id']) && is_null($this->survei['id']))
			{
				$survei 		= Survei::findorfail($this->survei['id']);
			}
			else
			{
				$survei 		= new Survei;
			}
			$survei 			= $survei->fill($this->survei);
			$survei 			= $survei->setPetugas($this->survei);
			$survei->save();

			if(isset($this->value['id']) && !empty($this->value['id']) && !is_null($this->value['id']))
			{
				$value 			= Value::findorfail($this->value['id']);

				$prev_detail 	= RekeningDetail_A::where('rekening_id', $this->value['id'])->delete();
			}
			else
			{
				$value 			= new Value;
				unset($this->value['id']);
			}

			$value 				= $value->fill(['nama_bank' => $this->value['nama_bank'], 'atas_nama' => $this->value['atas_nama']]);
			$value->survei_id 	= $survei->id;

			//simpan saldo awal
			$saldo_awal 		= new RekeningDetail_A;
			$saldo_awal->fill(['rekening_id' => $value->id, 'saldo' => $this->value['saldo_awal'], 'tanggal' => $this->value['tanggal_awal']]);
			$saldo_awal->save();

			//simpan saldo akhir
			$saldo_akhir 		= new RekeningDetail_A;
			$saldo_akhir->fill(['rekening_id' => $value->id, 'saldo' => $this->value['saldo_akhir'], 'tanggal' => $this->value['tanggal_akhir']]);
			$saldo_akhir->save();

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
