<?php

namespace Thunderlabid\Credit\Infrastructures\Models;

/**
 * Used for Credit Models
 * 
 * @author cmooy
 */
use Thunderlabid\Credit\Infrastructures\Models\Observers\CreditObserver;
use Thunderlabid\Credit\Infrastructures\Models\Traits\LinkedListTrait;
use Thunderlabid\Credit\Infrastructures\Models\Scopes\LinkedListScope;

/**
 * Model Credit
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Credit extends BaseModel
{
	use LinkedListTrait;
	
	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'pre_live_credits';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'pengajuan_kredit'		,
											'kemampuan_angsur'		,
											'jangka_waktu'			,
											'tujuan_kredit'			,
											'kreditur'				,
											'koperasi'				,
											'penjamin'				,
											'status'				,
											'riwayat_status'		,
											'jaminan'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'pengajuan_kredit'				=> 'required|numeric',
											'kemampuan_angsur'				=> 'required|numeric',
											'jangka_waktu'					=> 'required|numeric',
											'tujuan_kredit'					=> 'required|max:255',
											'kreditur.id'					=> 'required|max:255',
											'kreditur.nama'					=> 'required|max:255',
											'koperasi.id'					=> 'required|max:255',
											'koperasi.nama'					=> 'required|max:255',
											'penjamin.id'					=> 'max:255',
											'penjamin.nama'					=> 'max:255',
											'penjamin.hubungan'				=> 'max:255',
											'status'						=> 'required|max:255',
											'riwayat_status.*.status'		=> 'required|max:255',
											'riwayat_status.*.tanggal'		=> 'required|max:255',
											'riwayat_status.*.petugas.id'	=> 'required|max:255',
											'riwayat_status.*.petugas.nama'	=> 'required|max:255',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

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

        Credit::observe(new CreditObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * scope search based on status (pk)
	 *
	 * @param string or array of status
	 */	
	public function scopeStatus($query, $variable)
	{
		if(is_array($variable))
		{
			return 	$query->whereIn('status', $variable);
		}

		if(is_null($variable))
		{
			return $query;
		}

		return 	$query->where('status', $variable);
	}

	/**
	 * scope search based on koperasi id (pk)
	 *
	 * @param string or array of koperasi id
	 */	
	public function scopeKoperasiID($query, $variable)
	{
		return 	$query->where('koperasi.id', $variable);
	}

	/**
	 * scope search based on nama kreditur
	 *
	 * @param string or array of nama kreditur
	 */	
	public function scopeNamaKreditur($query, $variable)
	{
		return 	$query->where('kreditur.nama', 'like', '%'.$variable.'%');
	}
}
