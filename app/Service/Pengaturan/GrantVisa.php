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

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($petugas_id, $role, $scopes)
	{
		$this->petugas_id	= $petugas_id;
		$this->role			= $role;
		$this->scopes		= $scopes;
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
			$visa 			= new Visa;
			$visa->fill([
				'role'				=> $this->role,
				'scopes'			=> $this->scopes,
				'orang_id'			=> $orang->id,
				'akses_koperasi_id'	=> TAuth::activeOffice()['koperasi']['id'],
				]);
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