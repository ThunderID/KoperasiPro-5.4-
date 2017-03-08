<?php

namespace Thunderlabid\Registry\Infrastructures\Models;

/**
 * Used for Macro Models
 * 
 * @author cmooy
 */
use Thunderlabid\Registry\Infrastructures\Models\Observers\MacroObserver;
use Thunderlabid\Registry\Infrastructures\Models\Traits\LinkedListTrait;
use Thunderlabid\Registry\Infrastructures\Models\Scopes\LinkedListScope;

/**
 * Model Macro
 *
 * Digunakan untuk menyimpan data nasabah.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Macro extends BaseModel
{
	use LinkedListTrait;
	
	/**
	 * The database collection used by the model.
	 *
	 * @var string
	 */
	protected $collection			= 'test_macro_1';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'persaingan_usaha'			,
											'prospek_usaha'				,
											'perputaran_usaha'			,
											'pengalaman_usaha'			,
											'resiko_usaha'				,
											'jumlah_pelanggan_harian'	,
											'keterangan'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'person.id'					=> 'required|max:255',
											'persaingan_usaha'			=> 'required|max:255',
											'prospek_usaha'				=> 'required|max:255',
											'perputaran_usaha'			=> 'required|max:255',
											'pengalaman_usaha'			=> 'required|max:255',
											'resiko_usaha'				=> 'required|max:255',
											'jumlah_pelanggan_harian'	=> 'required|numeric',
											'keterangan'				=> 'required|max:255',
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

        Macro::observe(new MacroObserver());
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
