<?php

namespace Thunderlabid\Billing\Models\Traits\Policies;

use Carbon\Carbon;

/**
 * Trait tanggal
 *
 * Digunakan untuk reformat tanggal sesuai kontrak
 *
 * @package    Thunderlabid
 * @subpackage Billing
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
		return Carbon::parse($value)->format('d/m/Y');
	}
}