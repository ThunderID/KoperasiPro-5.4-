<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\FollowUp;
use App\Service\Pengajuan\PengajuanKredit;
use App\Service\Pengajuan\UpdatePengajuanKredit;

use App\Service\Pengajuan\UpdateStatusKredit;
use App\Service\Pengajuan\UpdateDebitur;
use App\Service\Pengajuan\HapusDataKredit;
use App\Service\Pengajuan\DuplikatKredit;

use App\Service\Survei\SurveiKredit;

use App\Service\Helpers\UI\UploadGambar;
use App\Service\Helpers\ACL\KewenanganKredit;

use App\Service\Helpers\Kredit\JangkaWaktuKredit;
use App\Service\Helpers\Kredit\JenisKredit;
use App\Service\Helpers\Kredit\JenisJaminanKendaraan;
use App\Service\Helpers\Kredit\MerkJaminanKendaraan;

use App\Service\Teritorial\TeritoriIndonesia;

use App\Domain\Akses\Models\Koperasi;
use App\Domain\Akses\Models\Visa;

use Input, PDF, Exception, TAuth, Session;
use Carbon\Carbon;

use App\Infrastructure\Traits\IDRTrait;

/**
 * Kelas CreditController
 *
 * Digunakan untuk semua data Kredit.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class KreditController extends Controller
{
	use IDRTrait;
	private $credit_active_filters = [];

	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct(Request $request)
	{
		parent::__construct();

		$this->service 			= new Pengajuan;
		$this->request 			= $request;
	}

	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->setGlobal();

		$page 				= 1;

		if (Input::has('page'))
		{
			$page 			= (int)Input::get('page');
		}

		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "Daftar Kredit";
		$this->page_attributes->breadcrumb			= 	[
															'Kredit'   => route('credit.index'),
														];

		//this function to set all needed variable in lists credit (sidebar)
		$this->getCreditLists($page, 10);

		// Paginate
		$this->paginate(route('credit.index', $this->credit_active_filters), $this->page_datas->total_credits, $page, 10);

		//initialize view
		$this->view									= view('pages.kredit.index');

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * membuat data kredit baru
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->setGlobal();
	
		// set page attributes (please check parent variable)
		$this->page_attributes->title 				= "Kredit Baru";
		$this->page_attributes->breadcrumb 			= [
															'Kredit'   => route('credit.create'),
														];
		//initialize view
		$this->view 								= view('pages.kredit.create');
		
		$this->page_datas->credit 					= null;
	
		// get parameter from function getParamToView to parsing view
		$this->getParamToView(['provinsi', 'jangka_waktu', 'jenis_kredit', 'jenis_kendaraan', 'merk_kendaraan', 'jenis_pekerjaan']);
		
		//function from parent to generate view
		return $this->generateView();
	}


	/**
	 * simpan kredit
	 *
	 * @return Response
	 */
	public function store()
	{
		/* debug : always return error
		$this->page_attributes->msg['error'] 	= ['error pkoke'];

		return $this->generateRedirect(route('credit.create'));
		*/

		try
		{
			//============ DATA KREDIT ============//
			$kredit		= Input::only('jenis_kredit', 'pengajuan_kredit', 'jangka_waktu');
			
			//============ DATA debitur ============//
			$kredit['debitur'] 				= Input::get('debitur');

			// debitur is e-ktp
			if (!isset($kredit['debitur']['is_ektp'])) 
			{
				$kredit['debitur']['is_ektp']	= false; 
			}
			else
			{
				$kredit['debitur']['is_ektp']	= true;
			}

			$kredit['debitur']['nik']			= '35-'.$kredit['debitur']['nik'];

			// check input file foto_ktp
			if (Input::file('debitur')['foto_ktp'])
			{
				$upload 		= new UploadGambar(Input::file('debitur')['foto_ktp']);
				$upload 		= $upload->handle();

				$foto_ktp 		= $upload['url'];
			}
			else
			{
				$foto_ktp 		= null;
			}

			//============ DATA JAMINAN ============//
			// JAMINAN KENDARAAN
			$jaminan_kendaraan 	= Input::get('jaminan_kendaraan');
			if (!is_null($jaminan_kendaraan))
			{
				foreach ($jaminan_kendaraan as $k => $v)
				{
					foreach ($v as $k2 => $v2)
					{
						$temp_jaminan_kendaraan[$k2][$k] = $v2;
					}
				}
			}
			else
			{
				$temp_jaminan_kendaraan			= [];
			}

			// JAMINAN TANAH & BANGUNAN
			$jaminan_tanah_bangunan 			= Input::get('jaminan_tanah_bangunan');
			if (!is_null($jaminan_tanah_bangunan))
			{
				foreach ($jaminan_tanah_bangunan as $k => $v)
				{
					foreach ($v as $k2 => $v2)
					{
						if(in_array($k, ['alamat', 'rt', 'rw', 'provinsi', 'regensi', 'distrik', 'desa', 'negara']))
						{
							$temp_jaminan_tanah_bangunan[$k2]['alamat'][$k] = $v2;
						}
						else
						{
							$temp_jaminan_tanah_bangunan[$k2][$k] = $v2;
						}
					}
				}
			}
			else
			{
				$temp_jaminan_tanah_bangunan 	= [];
			}

			$kredit['jaminan_kendaraan']		= $temp_jaminan_kendaraan;
			$kredit['jaminan_tanah_bangunan']	= $temp_jaminan_tanah_bangunan;

			$simpan 	= new PengajuanKredit($kredit['jenis_kredit'], $kredit['jangka_waktu'], $kredit['pengajuan_kredit'], Carbon::now()->format('d/m/Y'), [], null, $foto_ktp, null, null);

			$simpan->setDebitur($kredit['debitur']['nik'], $kredit['debitur']['nama'], $kredit['debitur']['tanggal_lahir'], $kredit['debitur']['jenis_kelamin'], $kredit['debitur']['status_perkawinan'], $kredit['debitur']['telepon'], $kredit['debitur']['pekerjaan'], $kredit['debitur']['penghasilan_bersih'], $kredit['debitur']['is_ektp'], $kredit['debitur']['alamat']);

			foreach ($temp_jaminan_kendaraan as $key => $value) 
			{
				$simpan->tambahJaminanKendaraan($value['tipe'], $value['merk'], $value['tahun'], $value['nomor_bpkb'], $value['atas_nama']);
			}

			foreach ($temp_jaminan_tanah_bangunan as $key => $value) 
			{
				$simpan->tambahJaminanTanahBangunan($value['tipe'], $value['jenis_sertifikat'], $value['nomor_sertifikat'], $value['masa_berlaku_sertifikat'], $value['atas_nama'], $value['alamat'], $value['luas_bangunan'], $value['luas_tanah']);
			}

			$simpan->save();

			//function from parent to redirecting
			return $this->generateRedirect(route('credit.index'));
		}
		catch (Exception $e)
		{
			//reset foto
			if(!is_null($foto_ktp))
			{
				$filename 	= str_replace(url('/'), public_path(), $foto_ktp);

				if (file_exists($filename) && str_is(public_path().'*', $filename)) 
				{
					unlink($filename);
				} 				
			}

			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		
			return $this->generateRedirect(route('credit.create'));
		}
	}

	/**
	 * update kredit
	 *
	 * @return Response
	 */
	public function update($id)
	{
		try
		{
			$kredit 			= Pengajuan::findorfail($id);

			if($kredit->status=='pengajuan')
			{
				$update 		= new UpdatePengajuanKredit($id);
			}
			elseif($kredit->status=='survei')
			{
				$update 		= new SurveiKredit($id);
			}

			//update data debitur
			if (Input::has('debitur'))
			{
				$debitur 		= Input::get('debitur');
				$debitur['nik'] = '35-'.$debitur['nik'];

				$update->setDebitur($debitur['nik'], $debitur['nama'], $debitur['tanggal_lahir'], $debitur['jenis_kelamin'], $debitur['status_perkawinan'], $debitur['telepon'], $debitur['pekerjaan'], $debitur['penghasilan_bersih'], $debitur['is_ektp'], $debitur['alamat']);
			}

			if (Input::has('relasi'))
			{
				$debitur 		= new UpdateDebitur($kredit->orang_id);
				$debitur->tembahRelasi(Input::get('relasi')['hubungan'], null, Input::get('relasi')['nama'], null, null, null, Input::get('relasi')['telepon'], null, null, true, Input::get('relasi')['alamat'], Input::get('relasi')['id']);
				$debitur->save();
			}

			//update jaminan
			if (Input::has('pengajuan'))
			{
				$jaminan = Input::get('pengajuan');
				if (isset($jaminan['jaminan_kendaraan']))
				{
					$update->tambahJaminanKendaraan($jaminan['jaminan_kendaraan']['tipe'], $jaminan['jaminan_kendaraan']['merk'], $jaminan['jaminan_kendaraan']['tahun'], $jaminan['jaminan_kendaraan']['nomor_bpkb'], $jaminan['jaminan_kendaraan']['atas_nama'], $jaminan['jaminan_kendaraan']['id']);
				}

				if (isset($jaminan['jaminan_tanah_bangunan']))
				{
					$update->tambahJaminanTanahBangunan($jaminan['jaminan_tanah_bangunan']['tipe'], $jaminan['jaminan_tanah_bangunan']['jenis_sertifikat'], $jaminan['jaminan_tanah_bangunan']['nomor_sertifikat'], $jaminan['jaminan_tanah_bangunan']['masa_berlaku_sertifikat'], $jaminan['jaminan_tanah_bangunan']['atas_nama'], $jaminan['jaminan_tanah_bangunan']['alamat'], $jaminan['jaminan_tanah_bangunan']['luas_bangunan'], $jaminan['jaminan_tanah_bangunan']['luas_tanah'], $jaminan['jaminan_tanah_bangunan']['id']);
				}
			}

			if (Input::has('suku_bunga'))
			{
				$update->setsukubunga(Input::get('suku_bunga'));
			}

			if (Input::has('jangka_waktu'))
			{
				$update->setjangkawaktu(Input::get('jangka_waktu'));
			}

			if (Input::has('pengajuan_kredit'))
			{
				$update->setpengajuankredit(Input::get('pengajuan_kredit'));
			}

			// aset usaha for survei
			if (Input::has('aset_usaha'))
			{
				$update->tambahAsetUsaha(Input::get('aset_usaha')['bidang_usaha'], Input::get('aset_usaha')['nama_usaha'], Input::get('aset_usaha')['tanggal_berdiri'], Input::get('aset_usaha')['status'], Input::get('aset_usaha')['status_tempat_usaha'], Input::get('aset_usaha')['luas_tempat_usaha'], Input::get('aset_usaha')['jumlah_karyawan'], Input::get('aset_usaha')['nilai_aset'], Input::get('aset_usaha')['perputaran_stok'], Input::get('aset_usaha')['jumlah_konsumen_perbulan'], Input::get('aset_usaha')['jumlah_saingan_perkota'], Input::get('aset_usaha')['alamat'], Input::get('aset_usaha')['id']);
			}

			// aset kendaraan for survei
			if (Input::has('aset_kendaraan'))
			{
				$update->tambahAsetKendaraan(Input::get('aset_kendaraan')['tipe'], Input::get('aset_kendaraan')['nomor_bpkb'], Input::get('aset_kendaraan')['id']);
			}

			// aset tanah & bangunan for survei
			if (Input::has('aset_tanah_bangunan'))
			{
				$update->tambahAsetTanahBangunan(Input::get('aset_tanah_bangunan')['nomor_sertifikat'], Input::get('aset_tanah_bangunan')['tipe'], Input::get('aset_tanah_bangunan')['luas'], Input::get('aset_tanah_bangunan')['alamat'], Input::get('aset_tanah_bangunan')['id']);
			}

			// jaminan kendaraan for survei
			if (Input::has('jaminan_kendaraan'))
			{
				$update->tambahJaminanKendaraan(Input::get('jaminan_kendaraan')['tipe'], Input::get('jaminan_kendaraan')['merk'], Input::get('jaminan_kendaraan')['warna'], Input::get('jaminan_kendaraan')['tahun'], Input::get('jaminan_kendaraan')['nomor_polisi'], Input::get('jaminan_kendaraan')['nomor_bpkb'], Input::get('jaminan_kendaraan')['nomor_mesin'], Input::get('jaminan_kendaraan')['nomor_rangka'], Input::get('jaminan_kendaraan')['masa_berlaku_stnk'], Input::get('jaminan_kendaraan')['status_kepemilikan'], Input::get('jaminan_kendaraan')['harga_taksasi'], Input::get('jaminan_kendaraan')['fungsi_sehari_hari'], Input::get('jaminan_kendaraan')['atas_nama'], Input::get('jaminan_kendaraan')['alamat'], Input::get('jaminan_kendaraan')['id'], null, null, []);
			}

			// jaminan tanah & bangunan for survei
			if (Input::has('jaminan_tanah_bangunan'))
			{
				$barcode 	= null;
				$update->tambahJaminanTanahBangunan(Input::get('jaminan_tanah_bangunan')['tipe'], Input::get('jaminan_tanah_bangunan')['jenis_sertifikat'], Input::get('jaminan_tanah_bangunan')['nomor_sertifikat'], Input::get('jaminan_tanah_bangunan')['masa_berlaku_sertifikat'], Input::get('jaminan_tanah_bangunan')['atas_nama'], Input::get('jaminan_tanah_bangunan')['luas_tanah'], Input::get('jaminan_tanah_bangunan')['jalan'], Input::get('jaminan_tanah_bangunan')['lebar_jalan'], Input::get('jaminan_tanah_bangunan')['letak_lokasi_terhadap_jalan'], Input::get('jaminan_tanah_bangunan')['lingkungan'], Input::get('jaminan_tanah_bangunan')['nilai_jaminan'], Input::get('jaminan_tanah_bangunan')['taksasi_tanah'], Input::get('jaminan_tanah_bangunan')['njop'], Input::get('jaminan_tanah_bangunan')['pbb_terakhir'], Input::get('jaminan_tanah_bangunan')['listrik'], Input::get('jaminan_tanah_bangunan')['air'], $barcode, Input::get('jaminan_tanah_bangunan')['alamat'], Input::get('jaminan_tanah_bangunan')['luas_bangunan'], Input::get('jaminan_tanah_bangunan')['fungsi_bangunan'], Input::get('jaminan_tanah_bangunan')['bentuk_bangunan'], Input::get('jaminan_tanah_bangunan')['konstruksi_bangunan'], Input::get('jaminan_tanah_bangunan')['lantai_bangunan'], Input::get('jaminan_tanah_bangunan')['dinding'], Input::get('jaminan_tanah_bangunan')['taksasi_bangunan'], Input::get('jaminan_tanah_bangunan')['id'], null, []);
			}

			// rekening for survei
			if (Input::has('rekening'))
			{
				$update->setRekening(Input::get('rekening')['rekening'], Input::get('rekening')['nomor_rekening'], Input::get('rekening')['tanggal_awal'], Input::get('rekening')['tanggal_akhir'], Input::get('rekening')['saldo_awal'], Input::get('rekening')['saldo_akhir'], Input::get('rekening')['id']);
			}

			// keuangan for survei
			if (Input::has('keuangan'))
			{
				$update->setKeuangan(Input::get('keuangan')['penghasilan_rutin'], Input::get('keuangan')['penghasilan_pasangan'], Input::get('keuangan')['penghasilan_usaha'], Input::get('keuangan')['penghasilan_lain'], Input::get('keuangan')['biaya_rumah_tangga'], Input::get('keuangan')['biaya_rutin'], Input::get('keuangan')['biaya_pendidikan'], Input::get('keuangan')['biaya_angsuran_kredit'], Input::get('keuangan')['biaya_lain'], Input::get('keuangan')['sumber_pendapatan_utama'], Input::get('keuangan')['jumlah_tanggungan_keluarga']);
			}

			// kepribadian for survei
			if (Input::has('kepribadian'))
			{
				$update->tambahKepribadian(Input::get('kepribadian')['nama_referens'], Input::get('kepribadian')['telepon_referens'], Input::get('kepribadian')['hubungan'], Input::get('kepribadian')['uraian'], Input::get('kepribadian')['id']);
			}

			// nasabah for survei
			if (Input::has('nasabah'))
			{
				$update->setNasabah(Input::get('nasabah')['status'], Input::get('nasabah')['kredit_terdahulu'], Input::get('nasabah')['jaminan_terdahulu']);
			}

			if (Input::has('ceklist'))
			{
				if(isset(Input::get('ceklist')['is_added']))
				{
					$is_added 	= true;
				}
				else
				{
					$is_added 	= false;
				}

				$update->setCeklist(Input::get('ceklist')['id'], $is_added);
			}

			$update->save();

			$this->page_attributes->msg['success']		= ['Data berhasil disimpan'];
		
			return $this->generateRedirect(route('credit.show', ['id' => $id]));
		}
		catch (Exception $e)
		{
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}

			return $this->generateRedirect(route('credit.show', ['id' => $id]));
		}
	}

	/**
	 * status kredit
	 *
	 * @return Response
	 */
	public function gandakan_survei($dari_id, $ke_id)
	{
		try
		{
			$gandakan 		= new GandakanSurvei($dari_id, $ke_id);
			$gandakan 		= $gandakan->handle();
			$this->page_attributes->msg['success']		= ['Data berhasil disimpan'];
		}
		catch(Exception $e)
		{
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		}

		return $this->generateRedirect(route('credit.show', $this->request->ke_id));
	}

	/**
	 * status kredit
	 *
	 * @return Response
	 */
	public function status($id, $status)
	{
		try
		{
			$u_status 	= new UpdateStatusKredit($id);
			$notes 		= Input::get("notes");

			if(str_is(strtolower($status), 'survei'))
			{
				$u_status 	= $u_status->toSurvei($notes);
			}
			elseif(str_is(strtolower($status), 'menunggu_persetujuan'))
			{
				$u_status 	= $u_status->toMenungguPersetujuan($notes);
			}
			elseif(str_is(strtolower($status), 'menunggu_realisasi'))
			{
				$u_status 	= $u_status->toMenungguRealisasi($notes);
			}
			elseif(str_is(strtolower($status), 'realisasi'))
			{
				$u_status 	= $u_status->toRealisasi($notes);
			}
			elseif(str_is(strtolower($status), 'tolak'))
			{
				$u_status 	= $u_status->toTolak($notes);
			}
			elseif(str_is(strtolower($status), 'lunas'))
			{
				$u_status 	= $u_status->toLunas($notes);
			}
			else
			{
				throw new Exception("Invalid Status", 1);
			}
			$u_status->save();
			$this->page_attributes->msg['success']		= ['Status berhasil diupdate'];
		}
		catch(Exception $e)
		{
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		}

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.show', $id));
	}


	/**
	 * duplikasi kredit
	 *
	 * @return Response
	 */
	public function duplikasi($id)
	{
		try
		{
			$kredit 	= new DuplikatKredit($id);
			$copy 		= $kredit->semua();
			$id 		= $copy['id'];
		
			$this->page_attributes->msg['success']		= ['Kredit berhasil diduplikasi'];
		}
		catch(Exception $e)
		{
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		}

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.show', $id));
	}

	/**
	 * lihat data credit tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->setGlobal();
	
		$page 										= 1;
		if (Input::has('page'))
		{
			$page 									= (int)Input::get('page');
		}

		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
														'Kredit'   => route('credit.index'),
													 ];



		//this function to set all needed variable in lists credit (sidebar)
		$this->getCreditLists($page, 10);

		// Paginate
		$this->paginate(route('credit.show', array_merge(['id' => $id], $this->credit_active_filters)),$this->page_datas->total_credits,$page,10);

		//parsing master data here
		try
		{
			$this->page_datas->credit				= Pengajuan::id($id)->status(KewenanganKredit::statusLists($this->acl_active_office['role']))->where('akses_koperasi_id', $this->acl_active_office['koperasi']['id'])->with(['debitur', 'debitur.relasi', 'survei_kepribadian', 'survei_kepribadian.surveyor', 'survei_kepribadian.surveyor.visas', 'survei_nasabah', 'survei_nasabah.surveyor', 'survei_nasabah.surveyor.visas', 'survei_aset_usaha', 'survei_aset_usaha.surveyor', 'survei_aset_usaha.surveyor.visas', 'survei_aset_tanah_bangunan', 'survei_aset_tanah_bangunan.surveyor', 'survei_aset_tanah_bangunan.surveyor.visas', 'survei_aset_kendaraan', 'survei_aset_kendaraan.surveyor', 'survei_aset_kendaraan.surveyor.visas', 'jaminan_kendaraan', 'jaminan_kendaraan.survei_jaminan_kendaraan', 'jaminan_kendaraan.survei_jaminan_kendaraan.surveyor', 'jaminan_kendaraan.survei_jaminan_kendaraan.surveyor.visas', 'jaminan_tanah_bangunan', 'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan', 'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan.surveyor', 'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan.surveyor.visas', 'survei_rekening', 'survei_rekening.surveyor', 'survei_rekening.surveyor.visas', 'survei_keuangan', 'survei_keuangan.surveyor', 'survei_keuangan.surveyor.visas', 'marketing', 'riwayat_status', 'debitur.kredit' => function($q)use($id){$q->notid($id);}, 'debitur.kredit.jaminan_kendaraan', 'debitur.kredit.jaminan_tanah_bangunan', 'dokumen_ceklist'])->first()->toArray();

			if((!count($this->page_datas->credit['debitur']) || !count($this->page_datas->credit['debitur']['relasi'])) && $this->page_datas->credit['status']=='pengajuan')
			{
				$this->page_datas->credit['checklist']['kelengkapan_nasabah']		= false;
			}
			else
			{
				$this->page_datas->credit['checklist']['kelengkapan_nasabah']		= true;
			}

			if(!count($this->page_datas->credit['survei_kepribadian'])  && $this->page_datas->credit['status']=='survei')
			{
				$this->page_datas->credit['checklist']['kelengkapan_kepribadian']	= false;
			}
			else
			{
				$this->page_datas->credit['checklist']['kelengkapan_kepribadian']	= true;
			}

			if((!count($this->page_datas->credit['survei_keuangan']) || !count($this->page_datas->credit['survei_rekening'])) && $this->page_datas->credit['status']=='survei')
			{
				$this->page_datas->credit['checklist']['kelengkapan_keuangan']		= false;
			}
			else
			{
				$this->page_datas->credit['checklist']['kelengkapan_keuangan']		= true;
			}

			if((!count($this->page_datas->credit['survei_aset_usaha']) || !count($this->page_datas->credit['survei_aset_kendaraan']) || !count($this->page_datas->credit['survei_aset_tanah_bangunan'])) && $this->page_datas->credit['status']=='survei')
			{
				$this->page_datas->credit['checklist']['kelengkapan_aset']		= false;
			}
			else
			{
				$this->page_datas->credit['checklist']['kelengkapan_aset']		= true;
			}

			if((!count($this->page_datas->credit['jaminan_kendaraan']) && !count($this->page_datas->credit['jaminan_tanah_bangunan'])) && $this->page_datas->credit['status']=='pengajuan')
			{
				$this->page_datas->credit['checklist']['kelengkapan_jaminan']	= false;
			}
			else
			{
				$this->page_datas->credit['checklist']['kelengkapan_jaminan']	= true;
			}

			$this->page_datas->credit['checklist']['kelengkapan_survei_jaminan']= true;

			foreach ((array)$this->page_datas->credit['jaminan_kendaraan'] as $key => $value) 
			{
				if(!count($value['survei_jaminan_kendaraan']) && $this->page_datas->credit['status']=='survei')
				{
					$this->page_datas->credit['checklist']['kelengkapan_survei_jaminan']	= false;
				}
			}

			foreach ((array)$this->page_datas->credit['jaminan_tanah_bangunan'] as $key => $value) 
			{
				if(!count($value['survei_jaminan_tanah_bangunan']) && $this->page_datas->credit['status']=='survei')
				{
					$this->page_datas->credit['checklist']['kelengkapan_survei_jaminan']	= false;
				}
			}

			$this->page_datas->credit['checklist']['kelengkapan_dokumen_fisik']			= true;

			foreach ((array)$this->page_datas->credit['dokumen_ceklist'] as $key => $value) 
			{
				if(!$value['is_added'])
				{
					$this->page_datas->credit['checklist']['kelengkapan_dokumen_fisik']	= false;
				}
			}
		}
		catch(Exception $e)
		{
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		
			return $this->generateRedirect(route('credit.index'));
		}

		$this->page_datas->id		= $id;

		// get active address on person
		$person_id					= $this->page_datas->credit['debitur']['id'];

		$this->view					= view('pages.kredit.pengajuan');
		//initialize view
		switch ($this->page_datas->credit['status']) {
			case 'pengajuan':
				// $this->view 						= view('pages.kredit.pengajuan');
				$this->page_datas->credit['status_sebelumnya']	= null;
				$this->page_datas->credit['status_berikutnya']	= 'survei';
				break;
			
			case 'survei':
				$this->page_datas->credit['status_sebelumnya']	= 'pengajuan';
				$this->page_datas->credit['status_berikutnya']	= 'menunggu_persetujuan';
				// $this->view                  		= view('pages.kredit.survei');
				break;

			case 'menunggu_persetujuan':
				$this->page_datas->credit['status_sebelumnya']	= 'survei';
				$this->page_datas->credit['status_berikutnya']	= 'menunggu_realisasi';
				// $this->view 						= view('pages.kredit.menunggu_persetujuan');
				break;

			case 'menunggu_realisasi':
				$this->page_datas->credit['status_sebelumnya']	= 'menunggu_persetujuan';
				$this->page_datas->credit['status_berikutnya']	= 'realisasi';
				// $this->view 						= view('pages.kredit.menunggu_realisasi');
				break;

			case 'realisasi':
				$this->page_datas->credit['status_sebelumnya']	= 'menunggu_realisasi';
				$this->page_datas->credit['status_berikutnya']	= 'lunas';
				// $this->view 						= view('pages.kredit.terrealisasi');
				break;	

			case 'lunas':
				$this->page_datas->credit['status_sebelumnya']	= 'realisasi';
				$this->page_datas->credit['status_berikutnya']	= null;
				// $this->view 						= view('pages.kredit.terrealisasi');
				break;	
			case 'tolak':
				if(isset($this->page_datas->credit['riwayat_status'][count($this->page_datas->credit['riwayat_status']) - 2]))
				{
					$this->page_datas->credit['status_sebelumnya']	= $this->page_datas->credit['riwayat_status'][count($this->page_datas->credit['riwayat_status']) - 2 ]['status'];
				}
				else
				{
					$this->page_datas->credit['status_sebelumnya']	= null;
				}

				$this->page_datas->credit['status_berikutnya']	= null;
				// $this->view 						= view('pages.kredit.terrealisasi');
				break;	
			default:
				// $this->view 						= view('pages.kredit.pengajuan');
				break;
		}

		// get parameter from function getParamToView to parsing view
		$this->getParamToView(['provinsi', 'jenis_kendaraan', 'jenis_kredit', 'jangka_waktu', 'merk_kendaraan', 'jenis_pekerjaan']);

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * menghapus credit tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function destroy()
	{
		try {

			$hapus 			= new HapusDataKredit($this->request->kredit_id);

			if($this->request->is('hapus/jaminan/kendaraan/*'))
			{
				$hapus 	= $hapus->hapusJaminanKendaraan($this->request->jaminan_kendaraan_id);
			}

			if($this->request->is('hapus/jaminan/tanah/bangunan/*'))
			{
				$hapus 	= $hapus->hapusJaminanTanahBangunan($this->request->jaminan_tanah_bangunan_id);
			}

			if($this->request->is('hapus/debitur/relasi/*'))
			{
				$hapus 	= $hapus->hapusRelasiDebitur($this->request->relasi_id);
			}

			if($this->request->is('hapus/survei/aset/usaha/*'))
			{
				$hapus 	= $hapus->hapusSurveiAsetUsaha($this->request->survei_aset_usaha_id);
			}
			if($this->request->is('hapus/survei/aset/kendaraan/*'))
			{
				$hapus 	= $hapus->hapusSurveiAsetKendaraan($this->request->survei_aset_kendaraan_id);
			}
			if($this->request->is('hapus/survei/aset/tanah/bangunan/*'))
			{
				$hapus 	= $hapus->hapusSurveiAsetTanahBangunan($this->request->survei_aset_tanah_bangunan_id);
			}
			if($this->request->is('hapus/survei/jaminan/kendaraan/*'))
			{
				$hapus 	= $hapus->hapusSurveiJaminanKendaraan($this->request->survei_jaminan_kendaraan_id);
			}
			if($this->request->is('hapus/survei/jaminan/tanah/bangunan/*'))
			{
				$hapus 	= $hapus->hapusSurveiJaminanTanahBangunan($this->request->survei_jaminan_tanah_bangunan_id);
			}

			if($this->request->is('hapus/survei/rekening/*'))
			{
				$hapus 	= $hapus->hapusSurveiRekening($this->request->survei_rekening_id);
			}

			if($this->request->is('hapus/survei/kepribadian/*'))
			{
				$hapus 	= $hapus->hapusSurveiKepribadian($this->request->survei_kepribadian_id);
			}
			
			if($this->request->is('hapus/survei/keuangan/*'))
			{
				$hapus 	= $hapus->hapusSurveiKeuangan($this->request->survei_keuangan_id);
			}

			$hapus 		= $hapus->save();

			$this->page_attributes->msg['success']		= ['Data berhasil dihapus'];

		} catch (Exception $e) {
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		}

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.show', $this->request->kredit_id));
	}

	/**
	 * Fungsi ini untuk menampilkan credit lists, fungsi sidebar.
	 * variable filter dan search juga di parse disini
	 * data dari view pages.credit.lists diatur disini
	 */
	private function getCreditLists($page, $take)
	{
		//1. Parsing status
		$status 									= KewenanganKredit::statusLists($this->acl_active_office['role']); 

		if (Input::has('status'))
		{
			$status 								= Input::get('status');
			$this->credit_active_filters['status'] 	= $status;
		}

		//2. Parsing search box
		if (Input::has('q'))
		{
			$nama 	= Input::get('q');

			$this->page_datas->credits				= $this->service->status($status)->where('akses_koperasi_id', $this->acl_active_office['koperasi']['id'])->namaDebitur($nama)->with(['debitur'])->orderby('created_at', 'desc')->paginate($take);
			$this->page_datas->total_credits		= $this->service->status($status)->where('akses_koperasi_id', $this->acl_active_office['koperasi']['id'])->namaDebitur($nama)->count();

			$this->credit_active_filters['q'] 		= Input::get('q');
		}
		else
		{
			$this->page_datas->credits				= $this->service->status($status)->where('akses_koperasi_id', $this->acl_active_office['koperasi']['id'])->with(['debitur'])->orderby('created_at', 'desc')->paginate($take);

			$this->page_datas->total_credits		= $this->service->status($status)->where('akses_koperasi_id', $this->acl_active_office['koperasi']['id'])->count();
		}

		//3. Memanggil fungsi filter active
		$this->page_datas->credit_filters 			= $status;
	}

	/**
	 * function checkAllData
	 */
	private function checkAllData($data)
	{
		foreach ($data as $k => $v)
		{
			if (!isset($v['debitur']['relasi']) || empty($v['debitur']['relasi']))
			{
				$complete 							= false;  
			}
			else if (!isset($v['jaminan_kendaraan']) || empty($v['jaminan_kendaraan']))
			{
				$complete 							= false;
			}
			else if (!isset($v['jaminan_tanah_bangunan']) || empty($v['jaminan_tanah_bangunan']))
			{
				$complete 						 	= false;
			}
			else
			{
				$complete 							= true;
			}

			if ($complete == false)
			{
				$data[$k]['data_complete']			= false;
			}
		}
		$this->page_datas->credits 					= $data;
	}

	/**
	 * Fungsi untuk menampilkan halaman rencana kredit yang akan di print
	 */
	public function prints($mode, $id)
	{
		$this->setGlobal();

		// set page attributes (please check parent variable)
		$this->page_attributes->title 		= "Daftar Kredit";
		$this->page_attributes->breadcrumb 	= [
											'Kredit'   => route('credit.index'),
											];
		try 
		{
			$this->page_datas->credit			= Pengajuan::id($id)->status(KewenanganKredit::statusLists($this->acl_active_office['role']))
												->where('akses_koperasi_id', $this->acl_active_office['koperasi']['id'])
												->with(['debitur', 'debitur.relasi', 
													'survei_kepribadian', 'survei_kepribadian.surveyor', 
													'survei_kepribadian.surveyor.visas', 'survei_nasabah', 
													'survei_nasabah.surveyor', 'survei_nasabah.surveyor.visas', 
													'survei_aset_usaha', 'survei_aset_usaha.surveyor', 
													'survei_aset_usaha.surveyor.visas', 'survei_aset_tanah_bangunan', 
													'survei_aset_tanah_bangunan.surveyor', 'survei_aset_tanah_bangunan.surveyor.visas', 
													'survei_aset_kendaraan', 'survei_aset_kendaraan.surveyor', 
													'survei_aset_kendaraan.surveyor.visas', 'jaminan_kendaraan', 
													'jaminan_kendaraan.survei_jaminan_kendaraan', 'jaminan_kendaraan.survei_jaminan_kendaraan.surveyor', 
													'jaminan_kendaraan.survei_jaminan_kendaraan.surveyor.visas', 'jaminan_tanah_bangunan', 
													'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan', 
													'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan.surveyor', 
													'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan.surveyor.visas', 
													'survei_rekening', 'survei_rekening.surveyor', 
													'survei_rekening.surveyor.visas', 'survei_keuangan', 
													'survei_keuangan.surveyor', 'survei_keuangan.surveyor.visas', 
													'marketing', 'riwayat_status', 'debitur.kredit' => function($q)use($id){$q->notid($id);}, 
													'debitur.kredit.jaminan_kendaraan', 'debitur.kredit.jaminan_tanah_bangunan'])
												->first()->toArray();
		}
		catch (Exception $e)
		{
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		
			return $this->generateRedirect(route('credit.index'));
		}

		//initialize view
		switch ($mode) {
			case 'survei_rekening':
				$this->view 				= view('pages.kredit.print.form_survei_rekening');
				break;
			case 'survei_keuangan':
				$this->view 				= view('pages.kredit.print.form_survei_keuangan');
				break;
			case 'survei_kepribadian':
				$this->view 				= view('pages.kredit.print.form_survei_kepribadian');
				break;
			case 'survei_aset':
				$this->view 				= view('pages.kredit.print.form_survei_aset');
				break;
			case 'survei_jaminan_kendaraan':
				$this->view 				= view('pages.kredit.print.form_survei_jaminan_kendaraan');
				break;
			case 'survei_jaminan_tanah_bangunan':
				$this->view 				= view('pages.kredit.print.form_survei_jaminan_tanah_bangunan');
				break;
			case 'survei_all':
				$this->view 				= view('pages.kredit.print.form_survei_all');
				break;
			case 'pengajuan_kredit':
				$this->view 				= view('pages.kredit.print.form_pengajuan_kredit');
				break;
			default:
				// $this->page_datas->credit 	= $this->service->detailed
				break;
		}

		// $this->page_datas->credit 			= $this->service->detailed($id);
		// $this->page_datas->id 				= $id;

		// get active address on person
		// $person_id 						= $this->page_datas->credit['debitur']['id'];

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * fungsi untuk menjadikan pdf form pengajuan credit
	 */
	public function pdf($id)
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('credit.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.kredit.print');

		//parsing master data here
		$this->page_datas->credit 					= Credit::findByID($id);
		$this->page_datas->id 						= $id;

		// get active address on person
		$person_id 									= $this->page_datas->credit->credit->creditor->id;
		$this->page_datas->creditor_address_active	= Person::findByID($person_id);

		// check address for warrator (penjamin)
		if (($this->page_datas->credit->credit->warrantor))
		{
			$person_id 									= $this->page_datas->credit->credit->warrantor->id;
			$this->page_datas->warrantor_address_active	= Person::findByID($person_id);
			
		}

		//function from parent to generate view
		$pdf = PDF::loadView('pages.kredit.print', ['page_datas' => $this->page_datas]);
		
		return $pdf->stream();
	}

	/**
	 * function set param to view
	 * Description: helper functio to parsing static element to view
	 * paramater: provinsi, jangka_waktu, jenis_kredit, jenis_kendaraan, merk_kendaraan
	 */
	private function getParamToView($element)
	{

		// get parameter provinsi
		if (in_array('provinsi', $element))
		{
			// initialize teritori indonesia
			$teritori								= new TeritoriIndonesia;
			// get data provinsi
			$provinsi 							= collect($teritori->get());
			$provinsi 							= $provinsi->sortBy('nama');

			$this->page_datas->provinsi 				= $provinsi->pluck('nama', 'id');
		}

		// get parameter jangka waktu
		if (in_array('jangka_waktu', $element))
		{
			// - jangka waktu
			$jw 										= new JangkaWaktuKredit;
			$this->page_datas->select_jangka_waktu		= $jw->get();
		}

		if (in_array('jenis_kredit', $element))
		{
			// - jenis kredit
			$jk 										= new JenisKredit;
			$this->page_datas->select_jenis_kredit		= $jk->get();
		}

		if (in_array('jenis_kendaraan', $element))
		{
			// - jenis kendaraan
			$jjk 										= new JenisJaminanKendaraan;
			$this->page_datas->select_jenis_kendaraan	= $jjk->get();
		}

		if (in_array('merk_kendaraan', $element))
		{
			// - merk kendaraan
			$mjk 										= new MerkJaminanKendaraan;
			$this->page_datas->select_merk_kendaraan	= $mjk->get();
		}

		if (in_array('jenis_pekerjaan', $element))
		{
			$jp 										= [
				'tidak_bekerja'		=> 'Belum / Tidak Bekerja',
				'karyawan_swasta'	=> 'Karyawan Swasta',
				'nelayan'			=> 'Nelayan',
				'pegawai_negeri'	=> 'Pegawai Negeri',
				'petani'			=> 'Petani',
				'polri'				=> 'Polri',
				'wiraswasta'		=> 'Wiraswasta',
				'lain_lain'			=> 'Lainnya'
			];
			$this->page_datas->select_jenis_pekerjaan	= $jp;
		}
	}

	/**
	 * function uploadFile
	 * description: helper function to upload file
	 * parameters: input file upload
	 * return $path location file
	 */
	function uploadFile($file, $name, $location)
	{
		$path 			= $file->storeAs('photos', $location . $name . '.jpg');

		return $path;
	}

	public function simulasiCreate()
	{
		$this->setGlobal();

		$this->page_datas->pokok 			= 'Rp 0';
		$this->page_datas->bunga 			= 0;
		$this->page_datas->tenor 			= 6;
		$this->page_datas->angsuran_pokok 	= 'Rp 0';
		$this->page_datas->angsuran_bunga 	= 'Rp 0';
		$this->page_datas->angsuran 		= 'Rp 0';

		if(!Session::has('simulasi'))
		{
			Session::put('simulasi', $this->page_datas);
		}
	
		// set page attributes (please check parent variable)
		$this->page_attributes->title 				= "Simulasi Kredit";
		$this->page_attributes->breadcrumb 			= [
															'Kredit'   => route('credit.create'),
														];
		//initialize view
		$this->view 								= view('pages.kredit.simulasi.create');
		$this->getParamToView(['jangka_waktu']);
		
		//function from parent to generate view
		return $this->generateView();
	}

	public function simulasiStore()
	{
		$this->setGlobal();

		//1. hitung pinjaman
		//pokok pinjaman 
		$pokok 		= $this->formatMoneyFrom(Input::get('pinjaman'));
		$bunga 		= Input::get('suku_bunga');
		$tenor 		= Input::get('jangka_waktu');

		$this->page_datas->pokok 			= $this->formatMoneyTo($pokok);
		$this->page_datas->bunga 			= $bunga;
		$this->page_datas->tenor 			= $tenor;
		$this->page_datas->angsuran_pokok 	= $this->formatMoneyTo($pokok/max(1, $tenor));
		$this->page_datas->angsuran_bunga 	= $this->formatMoneyTo($pokok * $bunga/100);
		$this->page_datas->angsuran 		= $this->formatMoneyTo(($pokok/max(1, $tenor)) + ($pokok * $bunga/100));

		Session::put('simulasi', $this->page_datas);

		// set page attributes (please check parent variable)
		$this->page_attributes->title 				= "Simulasi Kredit";
		$this->page_attributes->breadcrumb 			= [
															'Kredit'   => route('credit.create'),
														];
		//initialize view
		$this->view 								= view('pages.kredit.simulasi.create');
		$this->getParamToView(['jangka_waktu']);
		
		//function from parent to generate view
		return $this->generateView();
	}

	public function simulasiPrint()
	{
		$this->setGlobal();

		$this->page_datas 	= Session::get('simulasi');

		//initialize view
		$this->view			= view('print.pengajuan.simulasi');
		
		//function from parent to generate view
		return $this->generateView();
	}

	public function followupStore($akta_id)
	{
		$this->setGlobal();
		$validate_kredit 			= Pengajuan::id($akta_id)->status(KewenanganKredit::statusLists($this->acl_active_office['role']))->where('akses_koperasi_id', $this->acl_active_office['koperasi']['id'])->firstorfail();

		$followup 					= FollowUp::where('pengajuan_id', $akta_id)->first();

		if($followup->is_called)
		{
			$followup->is_called 	= false;
		}
		else
		{
			$followup->is_called 	= true;
		}

		$followup->save();

		//function from parent to generate view
		return $this->generateRedirect(route('home.index'));
	}


	/**
	 * Fungsi untuk menampilkan halaman rencana kredit yang akan di print
	 */
	public function print_realisasi($id, $jj, $dokumen)
	{
		$this->setGlobal();

		//check kredit
		$kredit			= $this->service->id($id)->with(['jaminan_kendaraan', 'jaminan_tanah_bangunan', 'debitur'])->first()->toArray();
		$koperasi 		= Koperasi::id($this->acl_active_office['koperasi']['id'])->first();
		$pimpinan 		= Visa::where('akses_koperasi_id', $this->acl_active_office['koperasi']['id'])->whereIn('role', ['pimpinan', 'komisaris'])->with(['petugas'])->orderby('role', 'asc')->first()['petugas'];

		if(!empty($kredit['jaminan_kendaraan']) && $jj =='jk')
		{
			switch (strtolower($dokumen)) 
			{
				case 'berita_acara_penyerahan_jaminan':
					return view('print.realisasi.jaminan_bpkb.berita_acara_penyerahan_jaminan', compact('kredit', 'koperasi', 'pimpinan'));				
					break;
				case 'pernyataan_penjamin_jaminan':
					return view('print.realisasi.jaminan_bpkb.pernyataan_penjamin_jaminan', compact('kredit', 'koperasi', 'pimpinan'));				
					break;
				case 'pernyataan_penjamin':
					return view('print.realisasi.jaminan_bpkb.pernyataan_penjamin', compact('kredit', 'koperasi', 'pimpinan'));				
					break;
				case 'surat_kuasa_beban_fiducia':
					return view('print.realisasi.jaminan_bpkb.surat_kuasa_beban_fiducia', compact('kredit', 'koperasi', 'pimpinan'));				
					break;
				case 'surat_serah_terima_fiducia':
					return view('print.realisasi.jaminan_bpkb.surat_serah_terima_fiducia', compact('kredit', 'koperasi', 'pimpinan'));				
					break;
				case 'surat_perjanjian_kredit':
					return view('print.realisasi.jaminan_bpkb.surat_perjanjian_kredit', compact('kredit', 'koperasi', 'pimpinan'));				
					break;
				
				default:
					throw new Exception("Invalid dokumen", 1);
					break;
			}
		}

		if(!empty($kredit['jaminan_tanah_bangunan']) && $jj =='jtb')
		{
			switch (strtolower($dokumen)) 
			{
				case 'pernyataan_penjamin_jaminan':
					return view('print.realisasi.jaminan_sertifikat.pernyataan_penjamin_jaminan', compact('kredit', 'koperasi', 'pimpinan'));
					break;
				case 'pernyataan_penjamin':
					return view('print.realisasi.jaminan_sertifikat.pernyataan_penjamin', compact('kredit', 'koperasi', 'pimpinan'));
					break;
				case 'surat_perjanjian_kredit':
					return view('print.realisasi.jaminan_sertifikat.surat_perjanjian_kredit', compact('kredit', 'koperasi', 'pimpinan'));
					break;
				case 'surat_pemasangan_plang':
					return view('print.realisasi.jaminan_sertifikat.surat_pemasangan_plang', compact('kredit', 'koperasi', 'pimpinan'));
					break;
				
				default:
					throw new Exception("Invalid dokumen", 1);
					break;
			}
		}

	}
}
