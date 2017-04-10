<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TCommands\UIHelper\UploadGambar;

use TQueries\Kredit\DaftarKredit;
use TCommands\Kredit\PengajuanKreditBaru;
use TCommands\Kredit\SimpanPengajuanKredit;
use TCommands\Kredit\HapusPengajuanKredit;
use TCommands\Kredit\LanjutkanUntukSurvei;

use TCommands\Kredit\SimpanSurveiKredit;

use TQueries\Territorial\TeritoriIndonesia;

use TQueries\Kredit\UIHelper\JangkaWaktuKredit;
use TQueries\Kredit\UIHelper\JenisKredit;
use TQueries\Kredit\UIHelper\JenisJaminanKendaraan;
use TQueries\Kredit\UIHelper\MerkJaminanKendaraan;

use App\Web\Services\Person;
use Input, PDF, Carbon\Carbon, Exception;

/**
 * Kelas CreditController
 *
 * Digunakan untuk semua data Kredit.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class KreditController extends Controller
{
	private $credit_active_filters = [];

	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct(Request $request)
	{
		parent::__construct();

		$this->service 		= new DaftarKredit;
		$this->request 		= $request;
	}

	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function index()
	{
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
		try
		{
			//============ DATA KREDIT ============//
			$kredit		= Input::only('jenis_kredit', 'pengajuan_kredit', 'jangka_waktu');
			
			//============ DATA KREDITUR ============//
			$kredit['kreditur'] 				= Input::get('kreditur');

			// kreditur is e-ktp
			if (!isset($kredit['kreditur']['is_ektp'])) 
			{
				$kredit['kreditur']['is_ektp']	= false; 
			}
			else
			{
				$kredit['kreditur']['is_ektp']	= true;
			}
			$kredit['kreditur']['nik']			= '35-'.$kredit['kreditur']['nik'];

			// check input file foto_ktp
			if (Input::file('kreditur')['foto_ktp'])
			{
				$upload 						= new UploadGambar(Input::file('kreditur')['foto_ktp']);
				$upload 						= $upload->handle();

				$kredit['kreditur']['foto_ktp'] = $upload['url'];
			}

			//============ DATA JAMINAN ============//
			// JAMINAN KENDARAAN
			$jaminan_kendaraan 					= Input::get('jaminan_kendaraan');
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
						$temp_jaminan_tanah_bangunan[$k2][$k] = $v2;
					}
				}
			}
			else
			{
				$temp_jaminan_tanah_bangunan 	= [];
			}
			
			$kredit['jaminan_kendaraan']		= $temp_jaminan_kendaraan;
			$kredit['jaminan_tanah_bangunan']	= $temp_jaminan_tanah_bangunan;

			$simpan 	= new PengajuanKreditBaru($kredit);
			$simpan->handle();

			//function from parent to redirecting
			return $this->generateRedirect(route('credit.index'));
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
			//update data kreditur
			if (Input::has('kreditur'))
			{
				$kreditur 							= Input::get('kreditur');

				if (Input::file('kreditur')['foto_ktp'])
				{
					$upload 						= new UploadGambar(Input::file('kreditur')['foto_ktp']);
					$upload 						= $upload->handle();

					$kreditur['foto_ktp'] 			= $upload['url'];
				}

				$kreditur['nik'] 					= '35-'.$kreditur['nik'];
				$simpan 	= new SimpanPengajuanKredit($id, ['kreditur' => $kreditur]);
				$simpan->handle();
			}

			if (Input::has('relasi'))
			{
				$kreditur								= Input::only('relasi');
				// $kreditur['relasi']['nik']			= '35-'.$kreditur['relasi']['nik'];
				// $kreditur['relasi']['telepon']		= '';

				$simpan 	= new SimpanPengajuanKredit($id, ['kreditur' => $kreditur]);
				$simpan->handle();
			}

			//update jaminan
			if (Input::has('pengajuan'))
			{
				$jaminan = Input::only('pengajuan');

				if (isset($jaminan['pengajuan']['jaminan_kendaraan']))
				{
					$jaminan_kendaraan['jaminan_kendaraan']				= $jaminan['pengajuan']['jaminan_kendaraan'];
					$simpan 					= new SimpanPengajuanKredit($id, $jaminan_kendaraan);
					$simpan->handle();
				}

				if (isset($jaminan['pengajuan']['jaminan_tanah_bangunan']))
				{
					$jaminan_tanah_bangunan['jaminan_tanah_bangunan'] 	= $jaminan['pengajuan']['jaminan_tanah_bangunan'];
					$simpan 					= new SimpanPengajuanKredit($id, $jaminan_tanah_bangunan);
					$simpan->handle();
				}
			}

			if (Input::has('jangka_waktu'))
			{
				$simpan 	= new SimpanPengajuanKredit($id, Input::only('tanggal_pengajuan', 'pengajuan_kredit', 'jenis_kredit', 'jangka_waktu'));
				$simpan->handle();
			}

			// aset usaha for survei
			if (Input::has('aset_usaha'))
			{
				$simpan 	= new SimpanSurveiKredit($id, Input::only('aset_usaha'));
				$simpan->handle();
			}

			// aset kendaraan for survei
			if (Input::has('aset_kendaraan'))
			{
				$simpan 	= new SimpanSurveiKredit($id, Input::only('aset_kendaraan'));
				$simpan->handle();
			}

			// aset tanah & bangunan for survei
			if (Input::has('aset_tanah_bangunan'))
			{
				$simpan 	= new SimpanSurveiKredit($id, Input::only('aset_tanah_bangunan'));
				$simpan->handle();
			}

			// jaminan kendaraan for survei
			if (Input::has('jaminan_kendaraan'))
			{
				$simpan 	= new SimpanSurveiKredit($id, Input::only('jaminan_kendaraan'));
				$simpan->handle();
			}

			// jaminan tanah & bangunan for survei
			if (Input::has('jaminan_tanah_bangunan'))
			{
				$simpan 	= new SimpanSurveiKredit($id, Input::only('jaminan_tanah_bangunan'));
				$simpan->handle();
			}

			// rekening for survei
			if (Input::has('rekening'))
			{
				$simpan 	= new SimpanSurveiKredit($id, Input::only('rekening'));
				$simpan->handle();
			}

			// keuangan for survei
			if (Input::has('keuangan'))
			{
				$simpan 	= new SimpanSurveiKredit($id, Input::only('keuangan'));
				$simpan->handle();
			}

			// nasabah for survei
			if (Input::has('nasabah'))
			{
				$simpan 	= new SimpanSurveiKredit($id, Input::only('nasabah'));
				$simpan->handle();
			}

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

			return $this->generateRedirect(route('credit.index'));
		}
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
			if(str_is(strtolower($status), 'survei'))
			{
				$simpan 	= new LanjutkanUntukSurvei($id);
				$simpan->handle();
			}
			else
			{
				throw new Exception("Invalid Status", 1);
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
		}

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.show', $this->request->kredit_id));
	}

	/**
	 * lihat data credit tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function show($id)
	{
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
			$this->page_datas->credit				= $this->service->detailed($id);
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

		$this->page_datas->id 						= $id;

		// get active address on person
		$person_id 									= $this->page_datas->credit['kreditur']['id'];

		//initialize view
		switch ($this->page_datas->credit['status']) {
			case 'pengajuan':
				$this->view                                = view('pages.kredit.pengajuan');
				break;
			
			case 'survei':
				$this->view                                = view('pages.kredit.survei');
				break;

			case 'realisasi':
				$this->view                                = view('pages.kredit.realisasi');
				break;	

			default:
				$this->view                                = view('pages.kredit.pengajuan');
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
	public function destroy($id)
	{
		try {
			if($this->request->is('hapus/jaminan/kendaraan/*'))
			{
				$simpan 	= new HapusPengajuanKredit(['id' => $this->request->kredit_id], ['jaminan_kendaraan' => ['id' => $this->request->jaminan_kendaraan_id]]);
				$simpan->handle();
			}

			if($this->request->is('hapus/jaminan/tanah/bangunan/*'))
			{
				$simpan 	= new HapusPengajuanKredit(['id' => $this->request->kredit_id], ['jaminan_tanah_bangunan' => ['id' => $this->request->jaminan_tanah_bangunan_id]]);
				$simpan->handle();
			}
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
		$status 									= null; 
		if (Input::has('status'))
		{
			$status 								= Input::get('status');
			$this->credit_active_filters['status'] 	= $status;
		}

		//2. Parsing search box
		if (Input::has('q'))
		{
			$this->page_datas->credits				= $this->service->get(['status' => $status, 'kreditur' => Input::get('q'), 'per_page' => $take, 'page' => $page]);
			$this->page_datas->total_credits		= $this->service->count(['status' => $status, 'kreditur' => Input::get('q')]);
			$this->credit_active_filters['q'] 		= Input::get('q');
		}
		else
		{
			$this->page_datas->credits				= $this->service->get(['status' => $status, 'per_page' => $take, 'page' => $page]);
			$this->page_datas->total_credits		= $this->service->count(['status' => $status]);
		}

		//3. Memanggil fungsi filter active
		$this->page_datas->credit_filters 			= $this->service->statusLists();
	}

	/**
	 * function checkAllData
	 */
	private function checkAllData($data)
	{
		foreach ($data as $k => $v)
		{
			if (!isset($v['kreditur']['relasi']) || empty($v['kreditur']['relasi']))
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
		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('credit.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.kredit.print.'.$mode);

		//parsing master data here
		$this->page_datas->credit 					= $this->service->detailed($id);
		$this->page_datas->id 						= $id;

		// get active address on person
		$person_id 									= $this->page_datas->credit['kreditur']['id'];

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
			$teritori									= new TeritoriIndonesia;
			// get data provinsi
			$provinsi 									= collect($teritori->get());
			$provinsi 									= $provinsi->sortBy('nama');

			$this->page_datas->provinsi 				= $provinsi->pluck('nama', 'nama');
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
}
