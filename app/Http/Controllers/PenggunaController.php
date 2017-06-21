<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, PDF, Carbon\Carbon, Exception, StdClass;

use TCommands\ACL\DaftarkanPengguna;
use TCommands\ACL\GrantVisa;

use TImmigration\Models\Pengguna;
use TImmigration\Models\Koperasi_RO;

use TAuth;

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
		$page_datas 				= new StdClass;
		$page_datas->pengguna 		= Pengguna::paginate();
		$page_datas->data 			= Pengguna::id($id)->with(['visas'])->firstorfail();
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
			$data 					= Pengguna::find($id);

			if(!$data)
			{
				$simpan 			= new DaftarkanPengguna($this->request->only(['email', 'password', 'nama']));
				$simpan 			= $simpan->handle();

				$data 				= Pengguna::find($simpan['id']);
			}
			else
			{
				$data->fill($this->request->only(['email', 'password', 'nama']));
				$data->save();
			}

			// if($this->request->has('add_visa'))
			// {
				$koperasi 					= Koperasi_RO::find(TAuth::ActiveOffice()['koperasi']['id']);

				$visa['role'] 						= $this->request->get('role');
				$visa['koperasi']['id'] 			= $koperasi['id'];
				$visa['koperasi']['nama'] 			= $koperasi['nama'];
				$visa['koperasi']['latitude'] 		= $koperasi['latitude'];
				$visa['koperasi']['longitude'] 		= $koperasi['longitude'];
				$visa['koperasi']['alamat'] 		= $koperasi['alamat'];
				$visa['koperasi']['nomor_telepon'] 	= $koperasi['nomor_telepon'];

				foreach ($this->request->get('scope') as $key => $value) 
				{
					$visa['scopes'][]			= ['list' => $value];
				}
				$simpan_visa 		= new GrantVisa($data['id'], $visa);
				$simpan_visa 		= $simpan_visa->handle();
			// }

			if($this->request->has('remove_visa'))
			{
				$visa 				= $this->request->get('remove_visa');
				$hapus_visa 		= new RemoveVisa($data['id'], $visa);
				$hapus_visa 		= $hapus_visa->handle();
			}

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
			$data 					= Pengguna::findorfail($id);
			$data->delete();

			$this->page_attributes->msg['success']		= ['Data berhasil dihapus'];

			return $this->generateRedirect(route('pengguna.index'));
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
		
			return $this->generateRedirect(route('pengguna.show', $id));
		}
	}
}
