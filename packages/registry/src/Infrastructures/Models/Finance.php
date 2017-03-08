<?php

namespace Thunderlabid\Registry\Infrastructures\Models;

/**
 * Used for Finance Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Infrastructures\Models\Observers\FinanceObserver;
use Thunderlabid\Registry\Infrastructures\Models\Traits\LinkedListTrait;
use Thunderlabid\Registry\Infrastructures\Models\Scopes\LinkedListScope;

/**
 * Model Finance
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Finance extends BaseModel
{
	use LinkedListTrait;
	
	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'test_finance_1';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'pendapatan'			,
											'pengeluaran'			,
										];
	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'pendapatan.penghasilan_gaji'			=> 'numeric',
											'pendapatan.penghasilan_non_gaji'		=> 'numeric',
											'pendapatan.penghasilan_lain'			=> 'numeric',
											'pendapatan.sumber_penghasilan_lain'	=> 'string',

											'pengeluaran.biaya_rumah_tangga'		=> 'numeric',
											'pengeluaran.biaya_pendidikan'			=> 'numeric',
											'pengeluaran.biaya_telepon'				=> 'numeric',
											'pengeluaran.biaya_pdam'				=> 'numeric',
											'pengeluaran.biaya_listrik'				=> 'numeric',
											'pengeluaran.biaya_produksi'			=> 'numeric',
											'pengeluaran.pengeluaran_lain'			=> 'numeric',
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

        Finance::observe(new FinanceObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/

	/**
	 * scope search based on id (pk)
	 *
	 * @param string or array of id
	 */	
	public function scopePersonID($query, $variable)
	{
		if(is_array($variable))
		{
			return 	$query->whereIn('person.id', $variable);
		}

		if(is_null($variable))
		{
			return $query;
		}

		return 	$query->where('person.id', $variable);
	}
}
