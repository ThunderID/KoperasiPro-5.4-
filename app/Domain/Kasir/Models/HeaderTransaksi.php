<?php

namespace App\Domain\Kasir\Models;

use App\Infrastructure\Models\BaseModel;

use App\Infrastructure\Traits\TanggalTrait;

use Validator, Exception;

/**
 * Model HeaderTransaksi
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class HeaderTransaksi extends BaseModel
{
	use TanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'header_transaksi';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'orang_id'				,
											'koperasi_id'			,
											'referensi_id'			,
											'nomor_transaksi'		,
											'tipe'					,
											'status'				,
											'tanggal_dikeluarkan'	,
											'tanggal_jatuh_tempo'	,
											'tanggal_pelunasan'		,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
										
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];
	
	/**
	 * data hidden
	 *
	 * @var array
	 */
	protected $hidden				= 	[
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];

	protected $appends				= ['tipe_dokumen'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	/**
	 * relationship orang
	 *
	 * @return Kredit $model
	 */	
 	public function orang()
	{
		return $this->belongsTo('TKredit\Pengajuan\Models\Orang', 'orang_id');
	}
	
	/**
	 * relationship referensi
	 *
	 * @return Kredit $model
	 */	
 	public function referensi()
	{
		return $this->belongsTo('TKredit\KreditAktif\Models\KreditAktif_RO', 'referensi_id', 'nomor_kredit');
	}

	/**
	 * relationship details
	 *
	 * @return Kredit $model
	 */	
 	public function details()
	{
		return $this->hasMany('App\Domain\Kasir\Models\DetailTransaksi', 'header_transaksi_id');
	}

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	/**
	 * formatting tanggal
	 *
	 * @param string $value ["Y-m-d H:i:s"]
	 */	
	protected function setTanggalDikeluarkanAttribute($value)
	{
		$this->attributes['tanggal_dikeluarkan']	= $this->formatDateFrom($value);
	}


	/**
	 * formatting tanggal
	 *
	 * @param string $value ["Y-m-d H:i:s"]
	 */	
	protected function setTanggalJatuhTempoAttribute($value)
	{
		$this->attributes['tanggal_jatuh_tempo']	= $this->formatDateFrom($value);
	}


	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/**
	 * formatting tanggal
	 *
	 * @param string $value ["Y-m-d H:i:s"]
	 * @return string $value ["d/m/Y"]
	 */	
	protected function getTanggalDikeluarkanAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	/**
	 * formatting tanggal
	 *
	 * @param string $value ["Y-m-d H:i:s"]
	 * @return string $value ["d/m/Y"]
	 */	
	protected function getTanggalJatuhTempoAttribute($value)
	{
		return $this->formatDateTo($value);
	}

	protected function getTipeDokumenAttribute($value)
	{
		if(str_is($this->status, 'bukti_kas_keluar'))
		{
			if($this->referensi_id != 0 && !is_null($this->referensi_id))
			{
				return $this->attributes['tipe_dokumen']	= 'nota_realisasi';
			}
			else
			{
				return $this->attributes['tipe_dokumen']	= 'transaksi_keluar';
			}
		}

		return $this->attributes['tipe_dokumen']			= 'transaksi_masuk';
	}
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	public function scopeKoperasi($query, $value)
	{
		if(is_array($value))
		{
			return $query->whereIn('koperasi_id', $value);
		}

		return $query->where('koperasi_id', $value);
	}

	public function scopeStatus($query, $value)
	{
		if(is_array($value))
		{
			return $query->whereIn('status', $value);
		}

		return $query->where('status', $value);
	}

	public function scopeNomorKredit($query, $value)
	{
		if(is_array($value))
		{
			return $query->whereIn('referensi_id', $value);
		}

		return $query->where('referensi_id', $value);
	}

	public function countTotal()
	{
		$total 		= 0;
		foreach ($this->details as $key => $value) 
		{
			$total 	= $total + ($value->kuantitas * ($value->harga_satuan - $value->diskon_satuan));
		}

		return $total;
	}
}
