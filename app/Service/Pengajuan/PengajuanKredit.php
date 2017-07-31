<?php

namespace App\Service\Pengajuan;

use App\Domain\HR\Models\Orang;

use App\Domain\Akses\Models\Koperasi;
use App\Domain\Akses\Models\Mobile;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\DokumenCeklist;
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
		$this->pengajuan_id 		= null;
		$this->jenis_kredit     	= $jenis_kredit;
		$this->jangka_waktu     	= $jangka_waktu;
		$this->pengajuan_kredit     = $pengajuan_kredit;
		$this->tanggal_pengajuan	= $tanggal_pengajuan;
		$this->mobile				= $mobile;
		$this->spesimen_ttd			= $spesimen_ttd;
		$this->foto_ktp				= $foto_ktp;
		$this->lokasi				= $lokasi;
		$this->referensi			= $referensi;
		$this->notes				= [];
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

			//1. simpan orang
			if(!empty($this->debitur) && !is_null($this->debitur['nik']))
			{
				$orang		= Orang::where('nik', $this->debitur['nik'])->first();
				
				if(!$orang)
				{
					$orang 	= new Orang;
				}
			}
			elseif((array)$this->mobile)
			{
				\Log::info('Here lies mobile checker');

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

			$orang 			= $this->simpanDebitur($orang, $this->debitur);

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
				if(!isset($mobile))
				{
					$mobile 	= new Mobile;
				}
				$mobile = $mobile->fill(['mobile_id' => $this->mobile['id'], 'mobile_model' => $this->mobile['model']]);
				
				if(!is_null($this->referensi))
				{
					$mobile->orang_id 	= $this->referensi['id'];
				}
				else
				{
					$mobile->orang_id 	= $orang->id;
				}

				$mobile->save();

				$pengajuan->hp_id 	= $mobile->id;
			}

			//3. check assign koperasi id
			if(!is_null($this->lokasi))
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
			elseif(TAuth::isLogged())
			{
				$pengajuan->akses_koperasi_id 	= TAuth::activeOffice()['koperasi']['id'];
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
				if($max >= 3)
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
			$riwayat->uraian 		= $this->notes;
			$riwayat->save();

			//7. initiate checklists
			foreach ($this->initiateChecklists() as $key => $value) 
			{
				$checklist 		= new DokumenCeklist;
				$checklist->fill($value);
				$checklist->pengajuan_kredit_id 	= $pengajuan->id;
				$checklist->is_added 				= false;
				$checklist->save();
			}

			DB::commit();

			return $pengajuan->toArray();
		}
		catch(Exception $e)
		{
			DB::rollback();
			throw $e;
		}
	}

	private function initiateChecklists()
	{
		return 	[
					['kode_dokumen' => '001_KTP_DEB', 		'judul' => 'FC KTP Pemohon'],
					['kode_dokumen' => '001_KTP_REL', 		'judul' => 'FC KTP Suami/Istri/Orang Tua'],
					['kode_dokumen' => '001_KK', 			'judul' => 'FC Buku Nikah/Akta Cerai/Pisah Harta'],
					['kode_dokumen' => '001_KTP_TAX', 		'judul' => 'FC NPWP/SIUP/Surat Pengangkatan Karyawan'],
					
					['kode_dokumen' => '002_BPKB',			'judul' => 'FC BPKB'],
					['kode_dokumen' => '002_STNK', 			'judul' => 'FC Faktur & STNK'],
					['kode_dokumen' => '002_KWITANSI_JB', 	'judul' => 'FC Kwitansi Jual\Beli'],
					['kode_dokumen' => '002_SURAT_KIR', 	'judul' => 'FC Surat KIR'],
					['kode_dokumen' => '002_SERTIFIKAT', 	'judul' => 'Sertifikat Tanah Asli & FC'],
					['kode_dokumen' => '002_PBB', 			'judul' => 'FC PBB Terakhir (Max 1 tahun sebelumnya)'],
					['kode_dokumen' => '002_IMB', 			'judul' => 'FC IMB (untuk SHM/SHGB  di lokasi industri, perdagangan , perumahan)'],
					['kode_dokumen' => '002_FOTO', 			'judul' => 'Foto Jaminan'],
					['kode_dokumen' => '002_NOKA_NOSIN', 	'judul' => 'Gesekan Noka/Nosin'],
					['kode_dokumen' => '002_REK_BULANAN', 	'judul' => 'FC Rekening Air/Listrik/Telepon'],
					['kode_dokumen' => '002_SLIP_GAJI', 	'judul' => 'FC Slip Gaji (3 Bulan Terakhir)'],
					['kode_dokumen' => '002_REKENING', 		'judul' => 'FC Buku Tabungan & Transaksi (3 Bulan Terakhir)'],
					['kode_dokumen' => '002_ANGSURAN', 		'judul' => 'FC Bukti Pembayaran Angsuran (Lain)'],

					['kode_dokumen' => '003_PERMOHONAN', 		'judul' => 'Aplikasi Permohonan Kredit'],
					['kode_dokumen' => '003_SURVEY', 			'judul' => 'Survey Report'],
					['kode_dokumen' => '003_KOMITE', 			'judul' => 'Persetujuan Komite Kredit'],
					['kode_dokumen' => '003_SPK_1', 			'judul' => 'Surat Perjanjian Kredit (Intern)'],
					['kode_dokumen' => '003_SPK_2', 			'judul' => 'Surat Perjanjian Kredit (Notaris)'],
					['kode_dokumen' => '003_SPO',	 			'judul' => 'Surat Persetujuan Orang Tua (untuk anak dibawah umur)'],
					['kode_dokumen' => '003_SP_PLANG',	 		'judul' => 'Surat Persetujuan Pemasangan Plang Jaminan'],
					['kode_dokumen' => '003_SK_JUAL',	 		'judul' => 'Surat Kuasa Menjual & Menarik Jaminan'],
					['kode_dokumen' => '003_SK_PEMBEBANAN',	 	'judul' => 'Surat Kuasa Pembebanan FEO'],
					['kode_dokumen' => '003_SJ_FIDUSIA',	 	'judul' => 'Sertifikat Jaminan Fiducia'],
					['kode_dokumen' => '003_SKMHT',	 		'judul' => 'SKMHT'],
					['kode_dokumen' => '003_APHT',	 		'judul' => 'APHT'],
				];
	}
}