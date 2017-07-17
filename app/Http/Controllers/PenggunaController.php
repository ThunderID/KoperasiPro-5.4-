<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Input, PDF, Carbon\Carbon, Exception, StdClass;

use App\Service\Pengaturan\GrantVisa;

use App\Service\Helpers\UI\UploadKaryawan;

use App\Domain\HR\Models\Orang;
use App\Domain\Akses\Models\Koperasi;
use App\Domain\Akses\Models\Visa;

use TAuth, URL, Response;

/**
 * Kelas PenggunaController
 *
 * Digunakan untuk semua data Kredit.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class PenggunaController extends Controller
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
		$page_datas->pengguna 		= Pengguna::paginate();
		
		$page_attributes 			= new StdClass;
		$page_attributes->paging 	= $page_datas->pengguna;

		return view('pages.pengguna.index', compact('page_datas', 'page_attributes'));
	}

	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function show($id)
	{
		return $this->destroy($id);
		$page_datas 				= new StdClass;
		$page_datas->pengguna 		= Visa::paginate();
		$page_datas->data 			= Visa::id($id)->with(['petugas'])->firstorfail();
		$page_datas->id 			= $id;
		
		$page_attributes 			= new StdClass;
		$page_attributes->paging 	= $page_datas->pengguna;

		return view('pages.pengguna.index', compact('page_datas', 'page_attributes'));
	}


	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function create($id = null)
	{
		$page_datas 				= new StdClass;
		// $page_datas->pengguna 		= Pengguna::paginate();
		$page_datas->data 			= Pengguna::findornew($id);
		$page_datas->id 			= $id;
		
		$page_attributes 			= new StdClass;
		// $page_attributes->paging 	= $page_datas->pengguna;

		return view('pages.pengguna.create', compact('page_datas', 'page_attributes'));
	}

	public function edit($id)
	{
		return $this->create($id);
	}

	public function store($id = null)
	{
		try
		{
			\DB::BeginTransaction();
			$data 					= Orang::findornew($id);

			$data->fill($this->request->only(['email', 'password', 'nama']));
			$data->save();

			$koperasi 					= Koperasi::findorfail(TAuth::ActiveOffice()['koperasi']['id']);

			$visa['role'] 						= $this->request->get('role');
			$visa['koperasi']['id'] 			= $koperasi['id'];
			$visa['koperasi']['nama'] 			= $koperasi['nama'];
			$visa['koperasi']['latitude'] 		= $koperasi['latitude'];
			$visa['koperasi']['longitude'] 		= $koperasi['longitude'];
			$visa['koperasi']['alamat'] 		= $koperasi['alamat'];
			$visa['koperasi']['nomor_telepon'] 	= $koperasi['nomor_telepon'];

			$scopes 					= \App\Service\Helpers\ACL\KewenanganKredit::template_scopes()[$visa['role']];

			foreach ($scopes as $key => $value) 
			{
				$visa['scopes'][]			= ['list' => $value];
			}
			$simpan_visa 		= new GrantVisa($data['id'], $visa['role'], $visa['scopes']);
			$simpan_visa 		= $simpan_visa->save();

			\DB::commit();
			$this->page_attributes->msg['success']		= ['Data berhasil disimpan'];

			return $this->generateRedirect(route('koperasi.show', 0));
		}
		catch (Exception $e)
		{
			\DB::rollback();

			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		
			return $this->generateRedirect(route('koperasi.show', 0));
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
			$data 					= Visa::findorfail($id);
			$data->delete();

			$this->page_attributes->msg['success']		= ['Data berhasil dihapus'];
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
		
		}
		return $this->generateRedirect(route('koperasi.show', 0));
	}

	public function batch()
	{
		if(Input::hasfile('pengguna'))
		{
			$file 		= Input::file('pengguna');

			$fn 		= 'pengguna-'.Str::slug(microtime()).'.'.$file->getClientOriginalExtension(); 

			$date 		= Carbon::now();
			$dp 		= $date->format('Y/m/d');

      		$file->move(public_path().'/'.$dp, $fn); // uploading file to given path

			$karyawan 	= new UploadKaryawan(fopen(public_path().'/'.$dp.'/'.$fn, "r"), public_path().'/'.$dp.'/', 'password-'.$fn);
      		$returned 	= $karyawan->save(); 
			
			return response()->download(public_path().'/'.$dp.'/'.$returned['url']);
		}

  		return $this->generateRedirect(route('koperasi.show', 0));
	}

	public function role()
	{
		$data 	= \App\Service\Helpers\ACL\KewenanganKredit::template_scopes()[Input::get('role')];

		return Response::json($data);
	}
}
