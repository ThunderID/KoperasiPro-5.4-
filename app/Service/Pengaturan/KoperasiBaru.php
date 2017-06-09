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
	protected $alamat;
	protected $nomor_telepon;

	/**
	 * Create new instance.
	 *
	 * @param  string $nama
	 * @param  string $latitude
	 * @param  string $longitude
	 * @param  string $alamat
	 * @param  string $nomor_telepon
	 */
	public function __construct($nama, $latitude, $longitude, $alamat, $nomor_telepon)
	{
		$this->nama				= $nama;
		$this->latitude			= $latitude;
		$this->longitude		= $longitude;
		$this->alamat			= $alamat;
		$this->nomor_telepon	= $nomor_telepon;
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
		 	$variable['nama']			= $this->nama;
		 	$variable['latitude']		= $this->latitude;
		 	$variable['longitude']		= $this->longitude;
		 	$variable['alamat']			= $this->alamat;
		 	$variable['nomor_telepon']	= $this->nomor_telepon;

		 	// 3. validate $details
			DB::BeginTransaction();

			//2a. store koperasi transaksi
			$koperasi 				= new Koperasi_RO;
			$koperasi 				= $koperasi->fill($variable);
			$koperasi->save();

			//2b. auto giving access to the one who created this org
			$isi_acl 				= [
				'role'				=> $this->activeOffice['role'],
				'scopes'			=> [
											[
												'list'		=> 'modifikasi_koperasi',
											],
											[
												'list'		=> 'atur_akses',
											],
										]
				'immigration_pengguna_id'		=> $this->loggedUser['id'],
				'immigration_ro_koperasi_id'	=> $koperasi->id,
			];

			$acl 					= new Visa_A;
			$acl->fill($isi_acl);
			$acl->save();

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