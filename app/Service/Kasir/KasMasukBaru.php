<?php

namespace App\Service\Kasir;

use App\Domain\Kasir\Models\HeaderTransaksi;
use App\Domain\Kasir\Models\DetailTransaksi;
use TImmigration\Models\Koperasi_RO;

use Exception, TAuth, Carbon\Carbon, DB, Validator;

/**
 * Service untuk membuat kas masuk baru
 *
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class KasMasukBaru
{
	protected $orang_id;
	protected $referensi_id;
	protected $nomor_transaksi;
	protected $tanggal_dikeluarkan;
	protected $details;

	/**
	 * Create new instance.
	 *
	 * @param  string $orang_id
	 * @param  string $referensi_id
	 * @param  array $nomor_transaksi
	 * @param  array $tanggal_dikeluarkan
	 * @param  array $details
	 * @return KasMasukBaru $kasir
	 */
	public function __construct($orang_id, $referensi_id, $nomor_transaksi, $tanggal_dikeluarkan, array $details)
	{
		$this->orang_id				= $orang_id;
		$this->referensi_id			= $referensi_id;
		$this->nomor_transaksi		= $nomor_transaksi;
		$this->tanggal_dikeluarkan	= $tanggal_dikeluarkan;
		$this->details				= $details;
	}
	/**
	 * Simpan kasir baru
	 *
	 * @return array $kasir
	 */
	public function save()
	{
		try
		{
			// Auth : 
		 	// 1. Siapa pun yang teregistrasi dalam sistem @authorize
			$this->authorize();

			// 2. Orang ID 
		 	$variable['orang_id']				= $this->orang_id;
		 	$variable['koperasi_id']			= $this->koperasi->id;
		 	$variable['referensi_id']			= $this->referensi_id;
		 	$variable['nomor_transaksi']		= $this->nomor_transaksi;
		 	$variable['tipe']					= 'bukti_kas_masuk';
		 	$variable['status']					= 'pending';
		 	$variable['tanggal_dikeluarkan']	= $this->tanggal_dikeluarkan;
		 	$variable['tanggal_jatuh_tempo']	= Carbon::parse($variable['tanggal_dikeluarkan'])->addMonths(1)->format('Y-m-d H:i:s');

		 	// 3. validate $details
		 	$details 							= $this->validate_details();

			DB::BeginTransaction();

			//2a. store header transaksi
			$header 							= new HeaderTransaksi;
			$header 							= $header->fill($variable);
			$header->save();

			foreach ($details as $key => $value) 
			{
				$detail 							= new DetailTransaksi;
				$detail 							= $detail->fill($value);
				$detail->header_transaksi_id 		= $header->id;
				$detail->save();
			}

			DB::commit();

			$detail_kas 						= new DaftarKas;
			$detail_kas 						= $detail_kas->detailed($header->id);

			return $detail_kas;
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