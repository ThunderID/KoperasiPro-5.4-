<?php

namespace App\Service\Pengaturan;

use App\Domain\Akses\Models\Visa;
use App\Domain\HR\Models\Orang;

use Exception, DB, TAuth, Carbon\Carbon;

class GrantVisa
{
	protected $petugas_id;
	protected $role;
	protected $scopes;
	protected $koperasi_id;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($petugas_id, $role, $scopes, $koperasi_id = null)
	{
		$this->petugas_id	= $petugas_id;
		$this->role			= $role;
		$this->scopes		= $scopes;
		$this->koperasi_id	= $koperasi_id;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function save()
	{
		try
		{
			DB::BeginTransaction();

			//1. simpan user
			$orang 			= Orang::findorfail($this->petugas_id);

			//2. simpan visa
			if(!is_null($this->koperasi_id))
			{
				$kid 		= $this->koperasi_id;
			}
			else
			{
				$kid 		= TAuth::activeOffice()['koperasi']['id'];
			}

			$visa 			= new Visa;
			$visa->fill([
				'role'				=> $this->role,
				'scopes'			=> $this->scopes,
				'orang_id'			=> $orang->id,
				'akses_koperasi_id'	=> $kid,
				]);

			if($this->role=='pimpinan')
			{
				$visa->limit_max 	= 10000000;
			}

			$visa->save();

			DB::commit();

			return Visa::id($visa->id)->with(['petugas'])->first();
		}
		catch(Exception $e)
		{
			DB::rollback();
			throw $e;
		}
	}
}