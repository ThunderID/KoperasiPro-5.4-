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
	public function __construct($nip = null, $nama, $email, $password, $role, $scopes, $tanggal_masuk = Carbon::now())
	{
		$this->nip				= $nip;
		$this->nama				= $nama;
		$this->email			= $email;
		$this->password			= $password;
		$this->role				= $role;
		$this->scopes			= $scopes;
		$this->tanggal_masuk	= $tanggal_masuk;
	}

	private function generateNIP($tanggal_masuk)
	{
		if(!is_null($nip))
		{
			return $nip;
		}

		$nip 		= $tanggal_masuk->format('Y');

		$karyawan 	= Orang::wherehas('visas', function($q){$q;})->where('nip', 'like', '%'.$nip)->orderby('created_at', 'desc')->first();
		if(!$karyawan)
		{
			$norut 	= 1;
		}
		else
		{
			$norut 	= explode('.', $norut);
			$norut 	= ((int)$norut[1] * 1) + 1;
		}

		$norut 		= str_pad($norut, 4, '0', STR_PAD_LEFT);

		return $nip.'.'.$norut;
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

			$nip 		= $this->generateNIP($this->tanggal_masuk);

			//1. simpan user
			$orang 			= new Orang;
			$orang->fill([
				'nama'			=> $this->nama,
				'email'			=> $this->email,
				'password'		=> $this->password,
				'nip'			=> $nip,
				'tanggal_masuk'	=> $this->tanggal_masuk->format('d/m/Y'),
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