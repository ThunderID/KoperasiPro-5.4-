<?php

namespace App\Infrastructure\Traits;

use Carbon\Carbon;

trait SurveiTrait {

	public $ext_appends 	= ['tanggal_survei'];
	
	public function getTanggalSurveiAttribute($value)
	{
		return Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
	}

	/**
	 * relationship kreditur
	 *
	 * @return Kredit $model
	 */	
 	public function surveyor()
	{
		return $this->belongsTo('App\Domain\HR\Models\Orang', 'petugas_id');
	}
}