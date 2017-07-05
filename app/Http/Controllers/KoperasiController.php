<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, PDF, Carbon\Carbon, Exception, StdClass, TAuth, Redirect;

use App\Domain\Akses\Models\Visa;
use App\Domain\Akses\Models\Koperasi;

use App\Service\Pengaturan\GrantVisa;
use Illuminate\Support\Str;

use App\Service\Helpers\UI\UploadKaryawan;

/**
 * Kelas KoperasiController
 *
 * Digunakan untuk semua data Kredit.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class KoperasiController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct(Request $request)
	{
		parent::__construct();

		$this->request 		= $request;
	}

	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function index()
	{
		$page_datas 				= new StdClass;
		$page_datas->koperasi 		= Koperasi::paginate();
		
		$page_attributes 			= new StdClass;
		$page_attributes->paging 	= $page_datas->koperasi;

		return view('pages.koperasi.index', compact('page_datas', 'page_attributes'));
	}

	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$origin_id = TAuth::activeOffice()['koperasi']['id'];
		if($id != $origin_id){
			return Redirect::to(route('koperasi.show', ['id' => $origin_id]));
		}

		$page_datas 				= new StdClass;
		$page_datas->koperasi 		= Koperasi::paginate();
		$page_datas->data 			= Koperasi::findorfail($id);
		$page_datas->id 			= $id;
		$page_datas->users 			= Visa::where('akses_koperasi_id', $id)->with(['petugas'])->get()->toArray();


		$page_attributes 			= new StdClass;
		$page_attributes->paging 	= $page_datas->koperasi;
		

		return view('pages.koperasi.index', compact('page_datas', 'page_attributes'));
	}


	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function create($id = null)
	{
		$page_datas 				= new StdClass;
		// $page_datas->koperasi 		= Koperasi::paginate();
		$page_datas->data 			= Koperasi::findornew($id);
		$page_datas->id 			= $id;
		
		$page_attributes 			= new StdClass;
		// $page_attributes->paging 	= $page_datas->koperasi;

		return view('pages.koperasi.create', compact('page_datas', 'page_attributes'));
	}

	public function edit($id)
	{
		return $this->create($id);
	}

	public function store($id = null)
	{
		try
		{
			if(is_null($id))
			{
				$id 				= str_replace(' ', '', $this->request->get('nama'));
			}

			$data 					= Koperasi::findornew($id);
			$data->fill($this->request->only(['nama', 'alamat', 'nomor_telepon', 'latitude', 'longitude', 'kode']));
			$data->id 				= $id;

			$pusat 					= Koperasi::where('kode', $this->request->get('kode'))->first();
			if($pusat)
			{
				$data->pusat_id		= $pusat->id;
			}

			$data->save();

			//set user
			$user_baru 				= new GrantVisa(TAuth::loggedUser()['id'], TAuth::activeOffice()['role'], [['list' => 'modifikasi_koperasi'], ['list' => 'atur_akses']], $data->id);
			$user_baru->save();

			$this->page_attributes->msg['success']		= ['Data berhasil disimpan'];

			return $this->generateRedirect(route('koperasi.show', $data->id));
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
		
			return $this->generateRedirect(route('koperasi.create', $id));
		}
	}

	public function update($id)
	{
		return $this->store($id);
	}

	public function destroy($id)
	{
		try
		{
			$data 					= Koperasi::findorfail($id);
			$data->delete();

			$this->page_attributes->msg['success']		= ['Data berhasil dihapus'];

			return $this->generateRedirect(route('koperasi.index'));
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
		
			return $this->generateRedirect(route('koperasi.show', $id));
		}
	}

	public function batch()
	{
		if(Input::hasfile('koperasi'))
		{
			$file 		= Input::file('koperasi');

			$fn 		= 'koperasi-'.Str::slug(microtime()).'.'.$file->getClientOriginalExtension(); 

			$date 		= Carbon::now();
			$dp 		= $date->format('Y/m/d');

      		$file->move(public_path().'/'.$dp, $fn); // uploading file to given path

			if (($handle = fopen(public_path().'/'.$dp.'/'.$fn, "r")) !== FALSE) 
			{
				$header 		= null;

				while (($data = fgetcsv($handle, 500, ",")) !== FALSE) 
				{
					if ($header === null) 
					{
						$header = $data;
						continue;
					}
				
					$all_row 	= array_combine($header, $data);

					$pusat 		= Koperasi::where('kode', $all_row['kode_pusat'])->first();

					if(!$pusat)
					{
						$pusat 	= new Koperasi;
					}

					$koperasi_baru	= Koperasi::where('kode', $all_row['kode_kantor'])->first();

					if(!$koperasi_baru)
					{
						$koperasi_baru 	= new Koperasi;
					}

					$koperasi 	= [
						'id'			=> strtoupper(str_replace(' ', '', $all_row['nama_kantor'])),
						'pusat_id'		=> $pusat->id,
						'nama'			=> $all_row['nama_kantor'],
						'kode'			=> $all_row['kode_kantor'],
						'latitude'		=> $all_row['latitude'],
						'longitude'		=> $all_row['longitude'],
						'nomor_telepon'	=> $all_row['nomor_telepon'],
						'alamat'		=> $all_row['alamat'],
					];

					$koperasi_baru->fill($koperasi);
					$koperasi_baru->save();

					$visa 		= new GrantVisa(TAuth::loggedUser()['id'], TAuth::activeOffice()['role'], [['list' => 'modifikasi_koperasi'], ['list' => 'atur_akses']], $koperasi_baru->id);
					$visa->save();
				}
				fclose($handle);
			}
      	
      		return $this->generateRedirect(route('koperasi.show', 0));
		}
	}
}
