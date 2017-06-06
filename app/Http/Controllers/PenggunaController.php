<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, PDF, Carbon\Carbon, Exception, StdClass;

use TImmigration\Models\Pengguna;

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
			$data 					= Pengguna::find($id);

			if(!$data)
			{
				$simpan 			= new DaftarkanPengguna($request->only(['email', 'password', 'nama']));
				$simpan 			= $simpan->handle();

				$data 				= Pengguna::find($simpan['id']);
			}
			else
			{
				$data->fill($request->only(['email', 'password', 'nama']));
				$data->save();
			}

			if($reuqest->has('add_visa'))
			{
				$visa 				= $request->get('add_visa');
				$simpan_visa 		= new GrantVisa($data['id'], $visa);
				$simpan_visa 		= $simpan_visa->handle();
			}

			if($reuqest->has('remove_visa'))
			{
				$visa 				= $request->get('remove_visa');
				$hapus_visa 		= new RemoveVisa($data['id'], $visa);
				$hapus_visa 		= $hapus_visa->handle();
			}

			$this->page_attributes->msg['success']		= ['Data berhasil disimpan'];

			return $this->generateRedirect(route('pengguna.show', $data->id));
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
		
			return $this->generateRedirect(route('pengguna.edit', $id));
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
