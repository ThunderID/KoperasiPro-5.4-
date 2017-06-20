<?php

namespace App\Service\Pengaturan;

use App\Domain\Akses\Models\Visa;
use App\Domain\HR\Models\Orang;

use Exception, DB, TAuth, Carbon\Carbon;

class PenggunaBaru
{
	protected $nama;
	protected $email;
	protected $password;
	protected $role;
	protected $scopes;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($nama, $email, $password, $role, $scopes)
	{
		$this->nama			= $nama;
		$this->email		= $email;
		$this->password		= $password;
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
			$orang 			= new Orang;
			$orang->fill([
				'nama'		=> $this->nama,
				'email'		=> $this->email,
				'password'	=> $this->password,
				]);
			$orang->save();

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