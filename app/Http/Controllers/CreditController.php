<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Thunderlabid\Application\Queries\Credit\DaftarKredit;
use Thunderlabid\Application\Services\ProvinceService;
use App\Web\Services\Person;
use Input, PDF, Carbon\Carbon;

/**
 * Kelas CreditController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class CreditController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();

		$this->service 		= new DaftarKredit;
	}

	/**
	 * lihat semua data credit
	 *
	 * @return Response
	 */
	public function index()
	{
		$page 				= 1;
		if(Input::has('page'))
		{
			$page 			= (int)Input::get('page');
		}
		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "Daftar Kredit";
		$this->page_attributes->breadcrumb			= [
															'Kredit'   => route('credit.index'),
													 ];

		//this function to set all needed variable in lists credit (sidebar)
		$this->getCreditLists($page, 10);

		// Paginate
		$this->paginate(route('credit.index'),$this->page_datas->total_credits,$page,10);

		//initialize view
		$this->view									= view('pages.credit.index');

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
		$this->view 								= view('pages.credit.create');
		// get data province
		$data										= new ProvinceService;

		// sort data province by 'province_name'
		$data 										= collect($data->read());

		$cities 									= new \Thunderlabid\Indonesia\Infrastructures\Models\City;
		// sort cities by 'city_name_full'
		$cities										= $cities->sortBy('city_name_full');

		// get province first to set list cities
		$cities_first								= collect($data[0]['cities']);
		$cities_first 								= $cities_first->sortBy('city_name_full');

		$this->page_datas->province 				= $data->pluck('province_name', 'province_id');
		$this->page_datas->cities 					= $cities_first->pluck('city_name_full', 'city_id');
		$this->page_datas->cities_all				= $cities->pluck('city_name_full', 'city_name_full');
		// get province first to set list cities
		$cities_first								= collect($data[0]['cities']);
		$cities_first 								= $cities_first->sortBy('city_name_full');

		$this->page_datas->province 				= $data->pluck('province_name', 'province_id');
		$this->page_datas->cities 					= $cities_first->pluck('city_name_full', 'city_id');

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

			//data pribadi
			$pribadi 						= Input::get('pribadi');
			$pribadi['tanggal_lahir']		= Carbon::createFromFormat('d/m/Y', $pribadi['tanggal_lahir'])->format('Y-m-d');
			$pribadi['id']			= null;
			$pribadi['relasi']		= null;
			$pribadi['pekerjaan'][0]			= Input::get('pekerjaan');
			$pribadi['pekerjaan'][0]['sejak']	= Carbon::createFromFormat('d/m/Y', $pribadi['pekerjaan'][0]['sejak'])->format('Y-m-d');
			$pribadi['alamat'][0]				= Input::get('orang')['alamat'];
			$pribadi['alamat'][0]['negara']		= 'Indonesia';
			$new_kontak 			= [];

			foreach ($pribadi['kontak']['telepon'] as $key => $value) 
			{
				if(!is_null($value))
				{
					$new_kontak[]['telepon']	= $value;
				}
			}

			unset($pribadi['kontak']['telepon']);
			$pribadi['kontak']		= $new_kontak;

			//data kredit
			$kredit 				= Input::get('kredit');
			$kredit['id']			= null;
			$kredit['penjamin']		= [];

			$kredit['pengajuan_kredit']		= str_replace('IDR', '', str_replace('.', '', $kredit['pengajuan_kredit']));
			$kredit['kemampuan_angsur']		= str_replace('IDR', '', str_replace('.', '', $kredit['kemampuan_angsur']));

			//parse jaminan
			$kredit['jaminan_kendaraan']		= [];
			$kredit['jaminan_tanah_bangunan']	= [];

			if(Input::has('jaminan_kendaraan'))
			{
				foreach (Input::get('jaminan_kendaraan') as $key => $value) 
				{
					if(!is_null($value['status_kepemilikan']))
					{
						if(str_is($value['legalitas'], 'bpkb_r2'))
						{
							$legal 						= 'Kendaraan Roda 2';
						}
						else
						{
							$legal 						= 'Kendaraan Roda 4';
						}

						$kredit['jaminan_kendaraan'][]	= [
							'merk' 						=> 'null', 
							'jenis' 					=> $legal, 
							'warna' 					=> 'null', 
							'tahun' 					=> 'null', 

							'legal'						=> [
								'atas_nama' 			=> 'null', 
								'alamat' 				=> 'null', 
								'nomor_polisi' 			=> 'null', 
								'no_bpkb' 				=> 'null', 
								'no_mesin' 				=> 'null', 
								'no_rangka' 			=> 'null', 
								'masa_berlaku_stnk' 	=> Carbon::now()->format('Y-m-d'), 
								'faktur' 				=> true, 
								'kuitansi_jual_beli' 	=> true, 
								'kuitansi_kosong_bpkb'	=> true, 
								'ktp_bpkb' 				=> true, 
								'status_kepemilikan' 	=> $value['status_kepemilikan'], 
							],

							'nilai'						=> [
								'fungsi' 				=> 'null', 
								'kondisi' 				=> 'null', 
								'asuransi' 				=> true, 
								'harga_taksasi' 		=> 0, 
								'harga_bank' 			=> 0, 
							],
						]; 
					}
				}
			}

			if(Input::has('jaminan_tanah_bangunan'))
			{
				foreach (Input::get('jaminan_tanah_bangunan') as $key => $value) 
				{
					if(!is_null($value['status_kepemilikan']))
					{
						$kredit['jaminan_tanah_bangunan'][]	= [
						'tipe_jaminan' 				=> $value['legalitas'], 
						'tanah'						=> [
							'panjang' 				=> 0, 
							'lebar' 				=> 0, 
							'luas' 					=> 0, 
						],
						'spesifikasi_bangunan'		=> [
							'bentuk' 				=> 'null', 
							'konstruksi' 			=> 'null', 
							'lantai' 				=> 'null', 
							'dinding' 				=> 'null', 
							'listrik' 				=> 'null', 
							'air' 					=> 'null', 
							'fungsi' 				=> 'null', 
							'lainnya' 				=> 'null', 
						],

						'legal' 					=> [
							'atas_nama_sertifikat' 		=> $value['status_kepemilikan'], 
							'jenis_sertifikat'			=> 'null', 
							'masa_berlaku_sertifikat'	=> Carbon::now()->format('Y-m-d'), 
							'imb' 						=> true, 
							'akta_jual_beli' 			=> true, 
							'pbb_terakhir' 				=> true, 
						],

						'alamat' 					=> [
							'jalan' 				=> 'null', 
							'kota' 					=> 'null', 
							'provinsi' 				=> 'null', 
							'negara' 				=> 'null', 
							'kode_pos' 				=> 'null', 
						],
						'nilai'						=> [
							'jalan' 				=> 'null', 
							'letak_lokasi' 			=> 'null', 
							'lingkungan' 			=> 'null', 
							'asuransi' 				=> true, 
							'harga_njop' 			=> 0, 
							'nilai_tanah' 			=> 0, 
							'nilai_bangunan' 		=> 0, 
							'nilai_taksasi' 		=> 0, 
						]
						];
					}
				}
			}

			$result					= $this->service->pengajuan($pribadi, $kredit);

			//function from parent to redirecting
			return $this->generateRedirect(route('credit.show', $result['kredit']));
		}
		catch(Exception $e)
		{
			if(is_array($e->getMessage()))
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
			// if(Input::has('keluarga'))
			// {
			// 	$data		= Input::get('keluarga');
			// 	$result		= $this->service->simpanRelasi($id, $data);
			// }

			if(Input::has('penjamin'))
			{
				$data						= Input::get('penjamin');
				$data['alamat']['negara']	= 'Indonesia';
				$temp_alamat 				= $data['alamat'];
				unset($data['alamat']);
				unset($data['kontak']);

				$data['tanggal_lahir']		= Carbon::createFromFormat('d/m/Y', $data['tanggal_lahir'])->format('Y-m-d');

				$data['alamat'][] 	= $temp_alamat;
				$data['kontak'][] 	= [];
				$data['relasi'] 	= null;
				$data['pekerjaan'] 	= null;

				$result		= $this->service->simpanPenjamin($id, $data);
			}

			if(Input::has('jaminan_kendaraan'))
			{
				$data		= Input::get('jaminan_kendaraan');
				$result		= $this->service->tambahJaminanKendaraan($id, $data);
			}

			if(Input::has('jaminan_tanah_bangunan'))
			{
				$data		= Input::get('jaminan_tanah_bangunan');
				$result		= $this->service->tambahJaminanTanahBangunan($id, $data);
			}

			if(Input::has('kepribadian'))
			{
				$data		= Input::get('kepribadian');
				$result		= $this->service->simpanSurveyKepribadian($id, $data);
			}

			if(Input::has('keuangan'))
			{
				$data		= Input::get('keuangan');
				$result		= $this->service->simpanSurveyKeuangan($id, $data);
			}

			if(Input::has('aset'))
			{
				$data		= Input::get('aset');
				$result		= $this->service->simpanSurveyAset($id, $data);
			}

			if(Input::has('makro'))
			{
				$data		= Input::get('makro');
				$result		= $this->service->simpanSurveyMakro($id, $data);
			}

			$this->page_attributes->msg['success']       = ['Data berhasil disimpan'];
		}
		catch(Exception $e)
		{
			if(is_array($e->getMessage()))
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
	 * status kredit
	 *
	 * @return Response
	 */
	public function status($id, $status)
	{
		$result		= $this->service->updateStatus($id, $status);

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.index'));
	}

	/**
	 * lihat data credit tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function show($id)
	{
		$page 				= 1;
		if(Input::has('page'))
		{
			$page 			= (int)Input::get('page');
		}

		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('credit.index'),
													 ];



		//this function to set all needed variable in lists credit (sidebar)
		$this->getCreditLists($page, 10);

		// Paginate
		$this->paginate(route('credit.show', ['id' => $id]),$this->page_datas->total_credits,$page,10);

		//parsing master data here
		$this->page_datas->credit 					= $this->service->detailed($id);
		$this->page_datas->id 						= $id;

		// get active address on person
		$person_id 									= $this->page_datas->credit['kreditur']['id'];

		//initialize view
		switch ($this->page_datas->credit['status']) {
			case 'pengajuan':
				$this->view                                = view('pages.credit.pengajuan');
				break;
			
			case 'survei':
				$this->view                                = view('pages.credit.survei');
				break;

			case 'realisasi':
				$this->view                                = view('pages.credit.realisasi');
				break;	

			default:
				$this->view                                = view('pages.credit.pengajuan');
				break;
		}

		
		// get data province
		$data										= new ProvinceService;

		// sort data province by 'province_name'
		$data 										= collect($data->read());

		$cities 									= new \Thunderlabid\Indonesia\Infrastructures\Models\City;
		// sort cities by 'city_name_full'
		$cities										= $cities->sortBy('city_name_full');

		// get province first to set list cities
		$cities_first								= collect($data[0]['cities']);
		$cities_first 								= $cities_first->sortBy('city_name_full');

		$this->page_datas->province 				= $data->pluck('province_name', 'province_id');
		$this->page_datas->cities 					= $cities_first->pluck('city_name_full', 'city_id');
		$this->page_datas->cities_all				= $cities->pluck('city_name_full', 'city_name_full');
		// get province first to set list cities
		$cities_first								= collect($data[0]['cities']);
		$cities_first 								= $cities_first->sortBy('city_name_full');

		$this->page_datas->province 				= $data->pluck('province_name', 'province_id');
		$this->page_datas->cities 					= $cities_first->pluck('city_name_full', 'city_id');

											 
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
		//using credit service to delete credit data
		$credit    = Credit::delete($id);

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.index'));
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
		if(Input::has('status'))
		{
			$status 								= Input::get('status');
		}

		//2. Parsing search box
		if(Input::has('q'))
		{
			$this->page_datas->credits				= $this->service->read();
			$this->page_datas->total_credits		= $this->service->count();
		}
		else
		{
			$this->page_datas->credits				= $this->service->read();
			$this->page_datas->total_credits		= $this->service->count();
		}

		//3. Memanggil fungsi filter active
		$this->page_datas->credit_filters 			= $this->service->statusLists();
	}

	/**
	 * Fungsi untuk menampilkan halaman rencana kredit yang akan di print
	 */
	public function print($id)
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('credit.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.credit.print');

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
		$this->view                                = view('pages.credit.print');

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
		$pdf = PDF::loadView('pages.credit.print', ['page_datas' => $this->page_datas]);
		
		return $pdf->stream();
	}
}
