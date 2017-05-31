<?php

namespace App\Domain\Kasir\Models;

use App\Infrastructure\Models\BaseModel;

use Validator, Exception;

/**
 * Model HeaderTransaksi
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class HeaderTransaksi extends BaseModel
{
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

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

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
}
