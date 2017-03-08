<?php

namespace Thunderlabid\Credit\Valueobjects;


use Thunderlabid\Credit\Valueobjects\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobjects\Traits\IValueObjectTrait;
use Exception, Validator;

class JaminanTanahBangunan implements IValueObject { 

	use IValueObjectTrait;

	/**
	 * @param [string] $jaminan_tanah_bangunan   	[jaminan_tanah_bangunan of the credit ]
	 */
	public function __construct($jaminan_tanah_bangunan)
	{
		$validator 	= Validator::make($jaminan_tanah_bangunan, [
			'tipe_jaminan' 				=> 'string', 
			'tanah.panjang' 			=> 'numeric', 
			'tanah.lebar' 				=> 'numeric', 
			'tanah.luas' 				=> 'numeric', 

			'spesifikasi_bangunan.bentuk' 		=> 'string', 
			'spesifikasi_bangunan.konstruksi' 	=> 'string', 
			'spesifikasi_bangunan.lantai' 		=> 'string', 
			'spesifikasi_bangunan.dinding' 		=> 'string', 
			'spesifikasi_bangunan.listrik' 		=> 'string', 
			'spesifikasi_bangunan.air' 			=> 'string', 
			'spesifikasi_bangunan.fungsi' 		=> 'string', 
			'spesifikasi_bangunan.lainnya' 		=> 'string', 

			'legal.atas_nama_sertifikat' 		=> 'string', 
			'legal.jenis_sertifikat'			=> 'string', 
			'legal.masa_berlaku_sertifikat'		=> 'date_format:"Y-m-d"', 
			'legal.imb' 						=> 'boolean', 
			'legal.akta_jual_beli' 				=> 'boolean', 
			'legal.pbb_terakhir' 				=> 'boolean', 

			'alamat.jalan' 				=> 'string', 
			'alamat.kota' 				=> 'string', 
			'alamat.provinsi' 			=> 'string', 
			'alamat.negara' 			=> 'string', 
			'alamat.kode_pos' 			=> 'string', 

			'nilai.jalan' 				=> 'string', 
			'nilai.letak_lokasi' 		=> 'string', 
			'nilai.lingkungan' 			=> 'string', 
			'nilai.asuransi' 			=> 'boolean', 
			'nilai.harga_njop' 			=> 'numeric', 
			'nilai.nilai_tanah' 		=> 'numeric', 
			'nilai.nilai_bangunan' 		=> 'numeric', 
			'nilai.nilai_taksasi' 		=> 'numeric', 
		]);

		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		$this->attributes['tipe_jaminan']				= $jaminan_tanah_bangunan['tipe_jaminan'];
		$this->attributes['tanah']						= $jaminan_tanah_bangunan['tanah'];
		$this->attributes['spesifikasi_bangunan']		= $jaminan_tanah_bangunan['spesifikasi_bangunan'];
		$this->attributes['legal']						= $jaminan_tanah_bangunan['legal'];
		$this->attributes['alamat']						= $jaminan_tanah_bangunan['alamat'];
		$this->attributes['nilai']						= $jaminan_tanah_bangunan['nilai'];
		$this->attributes['nilai']['harga_njop']		= new IDR($jaminan_tanah_bangunan['nilai']['harga_njop']);
		$this->attributes['nilai']['nilai_tanah']		= new IDR($jaminan_tanah_bangunan['nilai']['nilai_tanah']);
		$this->attributes['nilai']['nilai_bangunan']	= new IDR($jaminan_tanah_bangunan['nilai']['nilai_bangunan']);
		$this->attributes['nilai']['nilai_taksasi']		= new IDR($jaminan_tanah_bangunan['nilai']['nilai_taksasi']);
	}

	public function equals($jaminan_tanah_bangunan)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$jaminan_tanah_bangunan instanceOf JaminanTanahBangunan)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->attributes['tipe_jaminan']			=== $jaminan_tanah_bangunan->tipe_jaminan) &&
				($this->attributes['tanah']					=== $jaminan_tanah_bangunan->tanah) &&
				($this->attributes['spesifikasi_bangunan']	=== $jaminan_tanah_bangunan->spesifikasi_bangunan) &&
				($this->attributes['legal']					=== $jaminan_tanah_bangunan->legal) &&
				($this->attributes['alamat']				=== $jaminan_tanah_bangunan->alamat) &&
				($this->attributes['nilai']					=== $jaminan_tanah_bangunan->nilai)
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
