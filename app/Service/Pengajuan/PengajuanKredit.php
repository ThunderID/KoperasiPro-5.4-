<?php

namespace App\Service\Pengajuan;

use App\Domain\HR\Models\Orang;
use App\Domain\Akses\Models\Koperasi;
use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Akses\Models\Mobile;
use App\Domain\Akses\Models\Koperasi;
use App\Domain\Pengajuan\Models\RiwayatKredit;

use App\Infrastructure\Traits\PengajuanKreditTrait;

use Exception, DB, TAuth, Carbon\Carbon;

class PengajuanKredit
{
	use PengajuanKreditTrait;

	protected $jenis_kredit;
	protected $jangka_waktu;
	protected $pengajuan_kredit;
	protected $tanggal_pengajuan;
	protected $mobile;
	protected $spesimen_ttd;
	protected $foto_ktp;
	protected $lokasi;
	protected $referensi;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($jenis_kredit, $jangka_waktu, $pengajuan_kredit, $tanggal_pengajuan, $mobile = [], $spesimen_ttd = null, $foto_ktp = null, $lokasi = null, $referensi = null)
	{
		$this->jenis_kredit     	= $jenis_kredit;
		$this->jangka_waktu     	= $jangka_waktu;
		$this->pengajuan_kredit     = $pengajuan_kredit;
		$this->tanggal_pengajuan	= $tanggal_pengajuan;
		$this->mobile				= $mobile;
		$this->spesimen_ttd			= $spesimen_ttd;
		$this->foto_ktp				= $foto_ktp;
		$this->lokasi				= $lokasi;
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
			// DB::BeginTransaction();

			//1. simpan orang
			if(!empty($this->debitur))
			{
				$orang		= Orang::where('nik', $this->debitur['nik'])->first();
				
				if(!$orang)
				{
					$orang 	= new Orang;
				}
			}
			elseif((array)$this->mobile)
			{
				$mobile 	= Mobile::where('mobile_id', $this->mobile['id'])->where('mobile_model', $this->mobile['model'])->with(['pemilik'])->first();	

				if(!empty($mobile['pemilik']) && !isset($orang))
				{
					$orang 	= Orang::find($mobile['orang_id']);
				}
			}

			if(!isset($orang))
			{
				$orang 		= new Orang;
				$orang->save();
			}
			else
			{
				$orang 		= $this->simpanDebitur($orang, $this->debitur);
			}

			$pengajuan 		= new Pengajuan;
			$pengajuan->fill([
				'jenis_kredit'			=> $this->jenis_kredit,
				'jangka_waktu'			=> $this->jangka_waktu,
				'pengajuan_kredit'		=> $this->pengajuan_kredit,
				'tanggal_pengajuan'		=> $this->tanggal_pengajuan,
				'status'				=> 'pengajuan',
				'spesimen_ttd'			=> $this->spesimen_ttd,
				'foto_ktp'				=> $this->foto_ktp,
				'orang_id'				=> $orang->id,
				]);

			//2. simpan mobile
			if((array)$this->mobile)
			{
				$mobile = $mobile->fill(['mobile_id' => $this->mobile['id'], 'mobile_model' => $this->mobile['model']]);
				$mobile->save();

				$pengajuan->hp_id 	= $mobile->id;
			}

			//3. check assign koperasi id
			if(TAuth::isLogged())
			{
				$pengajuan->akses_koperasi_id 	= TAuth::activeOffice()['koperasi']['id'];
			}
			elseif(!is_null($this->lokasi))
			{
				$all_koperasi 			= Koperasi::get();

				foreach ($all_koperasi as $key => $value) 
				{
					$selisih_lat 			= $this->lokasi['latitude'] - $value['latitude'];
					$selisih_lon 			= $this->lokasi['longitude'] - $value['longitude'];

					if($key == 0)
					{
						$lat_ln 						= $selisih_lon + $selisih_lat;
						$pengajuan->akses_koperasi_id	= $value['id'];
					}
					elseif($lat_ln > $selisih_lat+$selisih_lon)
					{
						$lat_ln 						= $selisih_lat + $selisih_lon;
						$pengajuan->akses_koperasi_id	= $value['id'];
					}
				}
			}

			//see petugas
			if(!is_null($this->referensi))
			{
				$pengajuan->petugas_id 			= $this->referensi['id'];
			}

			//check this and dat
			if(is_null($this->referensi) && isset($mobile))
			{
				$max 	= Pengajuan::where('hp_id', $pengajuan->hp_id)->where('status', 'pengajuan')->count();
				if($max < 3)
				{
					throw new Exception("Pengajuan Max 3", 1);
				}
			}

			$pengajuan->save();

			$this->simpanJaminanKendaraan($this->jaminan_kendaraan, $pengajuan->id);
			$this->simpanJaminanTanahBangunan($this->jaminan_tanah_bangunan, $pengajuan->id);

			//6. update status
			$riwayat 		= new RiwayatKredit;
			$riwayat->fill([
					'status'	=> 'pengajuan',
					'tanggal'	=> Carbon::now()->format('d/m/Y'),
				]);
			$riwayat->petugas_id 	= TAuth::loggedUser()['id'];
			$riwayat->pengajuan_id 	= $pengajuan->id;
			$riwayat->uraian 		= json_encode($this->notes);
			$riwayat->save();

			// DB::commit();

			return $pengajuan->toArray();
		}
		catch(Exception $e)
		{
			// DB::rollback();
			throw $e;
		}
	}

}