<?php

namespace App\Infrastructure\Traits;

use Carbon\Carbon;

/**
 * Trait waktu
 *
 * Digunakan untuk reformat tanggal sesuai kontrak
 *
 * @package    Thunderlabid
 * @subpackage TJadwal
 * @author     C Mooy <chelsy@thunderlab.od>
 */
trait WaktuTrait {

 	/**
	 * parse input tanggal
	 * @param d/m/Y $value 
	 * @return Y-m-d $value 
	 */
	public function formatDateTimeFrom($value)
	{
		return Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i:s');
	}

	/**
	 * parse output tanggal
	 * @param Y-m-d $value 
	 * @return d/m/Y $value 
	 */
	public function formatDateTimeTo($value)
	{
		return Carbon::parse($value)->format('d/m/Y H:i');
		return $value->toDateTime()->format('d/m/Y H:i');
	}
}