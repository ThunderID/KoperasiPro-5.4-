<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\LogTrait;
use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\AggregateTrait;
use Thunderlabid\Credit\Models\Traits\EventRaiserTrait;

use Thunderlabid\Credit\Models\Traits\Policies\TanggalTrait;

use Validator, Exception;

/**
 * Model status
 *
 * Digunakan untuk menyimpan data status kredit (log status).
 * Ketentuan : 
 * 	- tidak bisa dihapus (Logtrait)
 * 	- tidak bisa direct changes, tapi harus melalui fungsi tersedia (aggregate)
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Status_A extends BaseModel
{
	use LogTrait;
	use GuidTrait;
	use AggregateTrait;
	use EventRaiserTrait;

	use TanggalTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'status';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'					,
											'status'				,
											'tanggal'				,
											'kredit_id'				,
											'ro_petugas_id'			,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'status'				=> 'max:255',
											'tanggal'				=> 'date_format:"Y-m-d"',
											'kredit_id'				=> 'max:255',
											'ro_petugas_id'			=> 'max:255',
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
    protected $hidden				= ['created_at', 'updated_at', 'deleted_at'];
	
	/**
	 * data accessor
	 *
	 * @var array
	 */
    protected $appends 				= ['tanggal'];
	
	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	/**
	 * transform created at as tanggal
	 *
	 * @return d/m/Y $value
	 */	
	protected function getTanggalAttribute()
	{
		return $this->formatDateTo($this->created_at);
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

	/**
	 * set status kredit
	 * 
	 * @param Kredit $kredit
	 * @param array $value
	 * @return Status_A $model
	 */
	public function SetStatus(Kredit $kredit, $value)
	{
		//1. validating value
		//1a. Validating if value contain valid variable
		$rules 			= [
			'status'		=> 'required|max:255',
			'tanggal'		=> 'required',
			'petugas.id'	=> 'required|max:255',
			'petugas.nama'	=> 'required|max:255',
			'petugas.role'	=> 'required|max:255',
		];

		$validator			= Validator::make($value, $rules);
		if(!$validator->passes())
		{
			throw new Exception($validator->messages()->toJson(), 1);
		}

		//3. simpan status
		//3a. simpan petugas
		$petugas			= new Petugas_RO;
		$petugas_ro			= $petugas->findornew($value['petugas']['id']);
		$petugas_ro->fill([
			'id' 	=> $value['petugas']['id'],
			'nama' 	=> $value['petugas']['nama'],
			'role' 	=> $value['petugas']['role'],
		]);

		$petugas_ro->save();

		//3b. simpan value
		$this->attributes['status'] 				= $value['status'];
		$this->attributes['tanggal'] 				= $this->formatDateFrom($value['tanggal']);
		$this->attributes['ro_petugas_id'] 			= $petugas_ro->id;
		$this->attributes['kredit_id'] 				= $kredit->id;

		$this->save();

		return $this;
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
