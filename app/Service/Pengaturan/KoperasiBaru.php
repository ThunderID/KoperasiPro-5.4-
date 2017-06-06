<?php

namespace App\Service\Pengaturan;

use TImmigration\Models\Koperasi_RO;

use Exception, TAuth, Carbon\Carbon, DB, Validator;

/**
 * Service untuk membuat kantor koperasi baru
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class KoperasiBaru
{
	protected $nama;
	protected $latitude;
	protected $longitude;

	/**
	 * Create new instance.
	 *
	 * @param  string $nama
	 * @param  string $latitude
	 * @param  string $longitude
	 */
	public function __construct($nama, $latitude, $longitude)
	{
		$this->nama				= $nama;
		$this->latitude			= $latitude;
		$this->longitude		= $longitude;
	}

	/**
	 * Simpan Pengaturan baru
	 *
	 * @return array $Pengaturan
	 */
	public function save()
	{
		try
		{
			// Auth : 
		 	// 1. Siapa pun yang teregistrasi dalam sistem @authorize
			$this->authorize();

			// 2. Orang ID 
		 	$variable['nama']		= $this->nama;
		 	$variable['latitude']	= $this->latitude;
		 	$variable['longitude']	= $this->longitude;

		 	// 3. validate $details
			DB::BeginTransaction();

			//2a. store koperasi transaksi
			$koperasi 				= new Koperasi_RO;
			$koperasi 				= $koperasi->fill($variable);
			$koperasi->save();

			return $koperasi->toArray();
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			throw $e;
		}
	}

	/**
	 * Authorization user
	 *
	 * MELALUI HTTP
	 * 1. User harus login
	 *
	 * MELALUI CONSOLE
	 * belum ada
	 *
	 * @return Exception 'Invalid User'
	 * @return boolean true
	 */
	private function authorize()
	{
		//MELALUI HTTP

		//demi menghemat resource
		$this->activeOffice 	= TAuth::activeOffice();
		$this->loggedUser 		= TAuth::loggedUser();
		$this->koperasi 		= Koperasi_RO::find($this->activeOffice['koperasi']['id']);

		return true;
	
		//MELALUI CONSOLE
	}

	/**
	 * Validasi Judul
	 *
	 * 1. Judul harus unique
	 *
	 * @return Exception 'Judul sudah pernah dipakai'
	 * @return boolean true
	 */
	private function validate_details()
	{
		foreach ($this->details as $key => $value) 
		{
			$rules 			= [
								'deskripsi'				=> 'required',
								'kuantitas'				=> 'required|numeric',
								'harga_satuan'			=> 'required',
							];

			$validator 		= Validator::make($value, $rules);

			if(!$validator->passes())
			{
				throw new Exception($validator->messages()->toJson(), 1);
			}
		}

		return $this->details;
	}
}