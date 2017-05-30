<?php

namespace App\Infrastructure\Traits;

use Carbon\Carbon;

/**
 * Trait tanggal
 *
 * Digunakan untuk reformat tanggal sesuai kontrak
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.od>
 */
trait TanggalTrait {

 	/**
	 * parse input tanggal
	 * @param d/m/Y $value 
	 * @return Y-m-d $value 
	 */
	public function formatDateFrom($value)
	{
		return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
	}

	/**
	 * parse output tanggal
	 * @param Y-m-d $value 
	 * @return d/m/Y $value 
	 */
	public function formatDateTo($value)
	{
		return $value->toDateTime()->format('d/m/Y');
		return Carbon::parse($value)->format('d/m/Y');
	}

	/**
	 * parse output tanggal
	 * @param Y-m-d $value 
	 * @return d/m/Y $value 
	 */
	public function formatCarbonDateTo($value)
	{
		// return $value->toDateTime()->format('d/m/Y');
		return Carbon::parse($value)->format('d/m/Y');
	}
}