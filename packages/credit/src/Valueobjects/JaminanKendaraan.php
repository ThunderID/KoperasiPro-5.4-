<?php

namespace Thunderlabid\Credit\Valueobjects;


use Thunderlabid\Credit\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobjects\Traits\IValueObjectTrait;
use Exception, Validator;

class JaminanKendaraan implements IValueObject { 

	use IValueObjectTrait;

	/**
	 * @param [string] $jaminan_kendaraan   	[jaminan_kendaraan of the credit]
	 */
	public function __construct($jaminan_kendaraan)
	{
		$validator 	= Validator::make($jaminan_kendaraan, [
			'merk' 						=> 'string', 
			'jenis' 					=> 'string', 
			'warna' 					=> 'string', 
			'tahun' 					=> 'string', 

			'legal.atas_nama' 			=> 'string', 
			'legal.alamat' 				=> 'string', 
			'legal.nomor_polisi' 		=> 'string', 
			'legal.no_bpkb' 			=> 'string', 
			'legal.no_mesin' 			=> 'string', 
			'legal.no_rangka' 			=> 'string', 
			'legal.masa_berlaku_stnk' 	=> 'date_format:"Y-m-d"', 
			'legal.faktur' 				=> 'boolean', 
			'legal.kuitansi_jual_beli' 	=> 'boolean', 
			'legal.kuitansi_kosong_bpkb'=> 'boolean', 
			'legal.ktp_bpkb' 			=> 'boolean', 
			'legal.status_kepemilikan' 	=> 'string', 

			'nilai.fungsi' 				=> 'string', 
			'nilai.kondisi' 			=> 'string', 
			'nilai.asuransi' 			=> 'boolean', 
			'nilai.harga_taksasi' 		=> 'numeric', 
			'nilai.harga_bank' 			=> 'numeric', 
		]);

		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		$this->attributes['merk']		= $jaminan_kendaraan['merk'];
		$this->attributes['jenis']		= $jaminan_kendaraan['jenis'];
		$this->attributes['warna']		= $jaminan_kendaraan['warna'];
		$this->attributes['tahun']		= $jaminan_kendaraan['tahun'];
		$this->attributes['legal']		= $jaminan_kendaraan['legal'];
		$this->attributes['nilai']		= $jaminan_kendaraan['nilai'];
	}

	public function equals($jaminan_kendaraan)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$jaminan_kendaraan instanceOf JaminanKendaraan)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->attributes['merk']	=== $jaminan_kendaraan->merk) && 
				($this->attributes['jenis']	=== $jaminan_kendaraan->jenis) && 
				($this->attributes['warna']	=== $jaminan_kendaraan->warna) && 
				($this->attributes['tahun']	=== $jaminan_kendaraan->tahun) && 
				($this->attributes['legal']	=== $jaminan_kendaraan->legal) && 
				($this->attributes['nilai']	=== $jaminan_kendaraan->nilai)
			)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
