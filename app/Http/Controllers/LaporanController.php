<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Input, Exception, DB;
use App\Domain\HR\Models\Orang;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\RiwayatKredit;

use App\Domain\Survei\Models\JaminanKendaraan as SJaminanKendaraan;
use App\Domain\Survei\Models\JaminanTanahBangunan as SJaminanTanahBangunan;

/**
 * Class LaporanController
 * Description: digunakan untuk membantu UI untuk mengambil data
 *
 * author: @agilma <https://github.com/agilma>
 */
Class LaporanController extends Controller
{
	/**
	 * fungsi get cities
	 * Description: berfungsi untuk mendapatkan city dari id province tertentu
	 */
	public function pengajuan_kredit()
	{
		$this->setGlobal();

		$tanggal 		= ['start' =>  Carbon::now(), 'end' =>  Carbon::now()];
		$status 		= 'pengajuan';

		if(request()->has('date'))
		{
			$data 				= request()->get('date');
			$tanggal			= json_decode($data, true);
			$tanggal['start']	= Carbon::createFromFormat('d/m/Y', $tanggal['start']);
			$tanggal['end']		= Carbon::createFromFormat('d/m/Y', $tanggal['end']);
		}

		// if(request()->has('status'))
		// {
		// 	$status 	= request()->get('status');
		// }

		// $ids			= $this->getIDS($status, $tanggal['start'], $tanggal['end']);

		$this->page_datas->status 		= $status;
		$this->page_datas->start 		= $tanggal['start']->format('d/m/Y');
		$this->page_datas->end 			= $tanggal['end']->format('d/m/Y');
		$this->page_datas->pengajuan 	= Pengajuan::where('tanggal_pengajuan', '>=', $tanggal['start']->format('Y-m-d'))->where('tanggal_pengajuan', '<=', $tanggal['end']->format('Y-m-d'))->orderby('tanggal_pengajuan', 'asc')->with(['debitur', 'hp'])->get()->toArray();
		// $this->page_datas->pengajuan 	= Pengajuan::id($ids)->with(['debitur', 'hp'])->orderby('tanggal_pengajuan', 'desc')->get()->toArray();

		$this->view		= view('pages.laporan.kredit');

		return $this->generateView();
		// return response()->json($pengajuan);
	}

	public function realisasi_kredit()
	{
		$this->setGlobal();

		$tanggal 		= ['start' =>  Carbon::now(), 'end' =>  Carbon::now()];

		if(request()->has('date'))
		{
			$data 				= request()->get('date');
			$tanggal			= json_decode($data, true);
			$tanggal['start']	= Carbon::createFromFormat('d/m/Y', $tanggal['start']);
			$tanggal['end']		= Carbon::createFromFormat('d/m/Y', $tanggal['end']);
		}


		$this->page_datas->start 		= $tanggal['start']->format('d/m/Y');
		$this->page_datas->end 			= $tanggal['end']->format('d/m/Y');
		$this->page_datas->kredit 		= RiwayatKredit::selectraw('riwayat_kredit.*')->where('status', 'realisasi')->where('tanggal', '>=', $tanggal['start']->format('Y-m-d'))->where('tanggal', '<=', $tanggal['end']->format('Y-m-d'))->with(['pengajuan', 'pengajuan.debitur'])->orderby('tanggal','asc')->get()->toArray();

		$this->view		= view('pages.laporan.realisasi_kredit');

		return $this->generateView();
		// return response()->json($pengajuan);
	}

	public function proses_kredit()
	{
		$this->setGlobal();

		$tanggal 		= ['start' =>  Carbon::now(), 'end' =>  Carbon::now()];
		$status 		= ['survei', 'menunggu_realisasi', 'realisasi', 'tolak', 'lunas', 'menunggu_persetujuan'];

		if(request()->has('date'))
		{
			$data 				= request()->get('date');
			$tanggal			= json_decode($data, true);
			$tanggal['start']	= Carbon::createFromFormat('d/m/Y', $tanggal['start']);
			$tanggal['end']		= Carbon::createFromFormat('d/m/Y', $tanggal['end']);
		}

		if(request()->has('mode') && in_array(request()->get('mode'), $status))
		{
			$status 	= request()->get('mode');
		}

		$this->page_datas->start 		= $tanggal['start']->format('d/m/Y');
		$this->page_datas->end 			= $tanggal['end']->format('d/m/Y');
		$this->page_datas->kredit 		= RiwayatKredit::selectraw('riwayat_kredit.*')->selectraw(DB::raw('IFNULL((select riwayat_kredit_prev.status from riwayat_kredit as riwayat_kredit_prev join riwayat_kredit on riwayat_kredit.pengajuan_id = riwayat_kredit_prev.pengajuan_id where riwayat_kredit_prev.tanggal < riwayat_kredit.tanggal and riwayat_kredit.status <> riwayat_kredit_prev.status order by riwayat_kredit_prev.tanggal desc limit 1), "pengajuan") as status_prev'))

		->status($status)->where('tanggal', '>=', $tanggal['start']->format('Y-m-d'))->where('tanggal', '<=', $tanggal['end']->format('Y-m-d'))->with(['pengajuan', 'pengajuan.debitur', 'petugas'])->orderby('tanggal','asc')->get()->toArray();

		$this->view		= view('pages.laporan.proses_kredit');

		return $this->generateView();
		// return response()->json($pengajuan);
	}

	public function riwayat_jaminan()
	{
		$this->setGlobal();

		$this->page_datas->jaminan 	= [];
		$this->page_datas->nomor 	= null;

		$mode 			= 'kendaraan';
		$placeholder 	= 'nomor BPKB';
		if(request()->has('mode'))
		{
			if(request()->get('mode')=='kendaraan')
			{
				$mode 	= 'kendaraan';
			}
			elseif(request()->get('mode')=='tanah_bangunan')
			{
				$mode 			= 'tanah_bangunan';
				$placeholder 	= 'nomor sertifikat';
			}
		}

		$this->page_datas->mode 		= $mode;
		$this->page_datas->placeholder 	= $placeholder;

		if(request()->has('nomor'))
		{
			$nomor 		= request()->get('nomor');
			switch ($mode) 
			{
				case 'kendaraan':
					$this->page_datas->jaminan 		= Pengajuan::wherehas('jaminan_kendaraan', function($q)use($nomor){$q->where('nomor_bpkb', $nomor);})->with(['jaminan_kendaraan' => function($q)use($nomor){$q->where('nomor_bpkb', $nomor);}, 'debitur'])->get();
					break;
				case 'tanah_bangunan':
					$this->page_datas->jaminan 		= Pengajuan::wherehas('jaminan_tanah_bangunan', function($q)use($nomor){$q->where('nomor_sertifikat', $nomor);})->with(['jaminan_tanah_bangunan' => function($q)use($nomor){$q->where('nomor_sertifikat', $nomor);}, 'debitur'])->get();
					break;
			}
			$this->page_datas->nomor 	= $nomor;
		}

		$this->view	= view('pages.laporan.riwayat_jaminan');

		return $this->generateView();
		// return response()->json($pengajuan);
	}

	public function movement_jaminan()
	{
		$this->setGlobal();

		$tanggal	= ['start' =>  Carbon::now(), 'end' =>  Carbon::now()];
		$mode 		= 'in';

		if(request()->has('date'))
		{
			$data 				= request()->get('date');
			$tanggal			= json_decode($data, true);
			$tanggal['start']	= Carbon::createFromFormat('d/m/Y', $tanggal['start']);
			$tanggal['end']		= Carbon::createFromFormat('d/m/Y', $tanggal['end']);
		}

		if(request()->has('mode'))
		{
			$mode 		= request()->get('mode');
		}

		$this->page_datas->start 		= $tanggal['start']->format('d/m/Y');
		$this->page_datas->end 			= $tanggal['end']->format('d/m/Y');

		//realisasi
		switch ($mode) 
		{
			case 'in':
				$this->page_datas->pengajuan 	= RiwayatKredit::selectraw('riwayat_kredit.*')->where('status', 'realisasi')->where('tanggal', '>=', $tanggal['start']->format('Y-m-d'))->where('tanggal', '<=', $tanggal['end']->format('Y-m-d'))->with(['pengajuan', 'pengajuan.jaminan_kendaraan', 'pengajuan.jaminan_tanah_bangunan', 'pengajuan.debitur'])->orderby('tanggal','asc')->get()->toArray();
				$this->page_datas->mode 		= 'masuk';
				break;
			case 'out':
				$this->page_datas->pengajuan 	= RiwayatKredit::selectraw('riwayat_kredit.*')->where('status', 'lunas')->where('tanggal', '>=', $tanggal['start']->format('Y-m-d'))->where('tanggal', '<=', $tanggal['end']->format('Y-m-d'))->with(['pengajuan', 'pengajuan.jaminan_kendaraan', 'pengajuan.jaminan_tanah_bangunan', 'pengajuan.debitur'])->orderby('tanggal','asc')->get()->toArray();
				$this->page_datas->mode 		= 'keluar';
				break;
			case 'current':
				$this->page_datas->pengajuan 	= RiwayatKredit::selectraw('riwayat_kredit.*')->where('status', 'realisasi')->where('tanggal', '>=', $tanggal['start']->format('Y-m-d'))->where('tanggal', '<=', $tanggal['end']->format('Y-m-d'))->with(['pengajuan', 'pengajuan.jaminan_kendaraan', 'pengajuan.jaminan_tanah_bangunan', 'pengajuan.debitur'])->orderby('tanggal','asc')->get()->toArray();
				$this->page_datas->mode 		= 'tersimpan';
				break;
			default:
				throw new Exception("Error Processing Request", 1);
				break;
		}
		$this->view	= view('pages.laporan.jaminan');

		return $this->generateView();
		// return response()->json($pengajuan);
	}

	public function loan_to_value()
	{
		$this->setGlobal();
		$tanggal['start']	= Carbon::now()->startOfDay();
		$tanggal['end']		= Carbon::now()->endOfDay();

		if(request()->has('date'))
		{
			$tanggal			= json_decode(request()->get('date'), true);
			$tanggal['start']	= Carbon::createFromFormat('d/m/Y', $tanggal['start'])->startOfDay();
			$tanggal['end']		= Carbon::createFromFormat('d/m/Y', $tanggal['end'])->endOfDay();
		}

		$this->page_datas->start 		= $tanggal['start']->format('d/m/Y');
		$this->page_datas->end 			= $tanggal['end']->format('d/m/Y');

		$this->page_datas->kredit		= Pengajuan::selectraw('pengajuan_kredit.*')
							->where('pengajuan_kredit.tanggal_pengajuan', '>=', $tanggal['start']->format('Y-m-d'))
							->where('pengajuan_kredit.tanggal_pengajuan', '<=', $tanggal['end']->format('Y-m-d'))
							// ->status(['realisasi', 'lunas'])
							->leftjoin('p_jaminan_k', function ($join) 
								{
									$join->on ( 'pengajuan_kredit.id', '=', 'p_jaminan_k.pengajuan_id' )
									->wherenull('p_jaminan_k.deleted_at')
									;
							})->leftjoin('s_jaminan_k', function ($join) 
								{
									$join->on ( 'p_jaminan_k.id', '=', 's_jaminan_k.jaminan_kendaraan_id' )
									->wherenull('s_jaminan_k.deleted_at')
									;
							})->leftjoin('p_jaminan_tb', function ($join) 
								{
									$join->on ( 'pengajuan_kredit.id', '=', 'p_jaminan_tb.pengajuan_id' )
									->wherenull('p_jaminan_tb.deleted_at')
									;
							})->leftjoin('s_jaminan_tb', function ($join) 
								{
									$join->on ( 'p_jaminan_k.id', '=', 's_jaminan_tb.jaminan_tanah_bangunan_id' )
									->wherenull('s_jaminan_tb.deleted_at')
									;
							})->selectraw('IFNULL(SUM(IFNULL(s_jaminan_tb.taksasi_tanah, 0) + IFNULL(s_jaminan_tb.taksasi_bangunan, 0) + IFNULL(s_jaminan_k.harga_taksasi,0)),0) as taksasi')
							->groupby('pengajuan_kredit.id')->with(['debitur'])->orderby('tanggal_pengajuan', 'asc')->get();

		$this->view	= view('pages.laporan.ltv');

		return $this->generateView();
		// return response()->json($pengajuan);
	}

	public function employee_to_system()
	{
		$this->setGlobal();

		$this->page_datas->employee	= Orang::selectraw(DB::raw('(select IFNULL(COUNT(pengajuan2.id),0) from pengajuan_kredit as pengajuan2 join riwayat_kredit on riwayat_kredit.pengajuan_id = pengajuan2.id and riwayat_kredit.status = "pengajuan" where riwayat_kredit.petugas_id = orang.id) as total_pengajuan'))->selectraw(DB::raw('(select IFNULL(COUNT(riwayatterima.id),0) from pengajuan_kredit as pengajuan3 join riwayat_kredit on riwayat_kredit.pengajuan_id = pengajuan3.id and riwayat_kredit.status = "pengajuan" join riwayat_kredit as riwayatterima on riwayat_kredit.pengajuan_id = riwayatterima.pengajuan_id and riwayatterima.status = "realisasi" where riwayat_kredit.petugas_id = orang.id) as total_terima'))->selectraw(DB::raw('(select IFNULL(COUNT(riwayattolak.id),0) from  pengajuan_kredit as pengajuan3 join riwayat_kredit on riwayat_kredit.pengajuan_id = pengajuan3.id and riwayat_kredit.status = "pengajuan" join riwayat_kredit as riwayattolak on riwayat_kredit.pengajuan_id = riwayattolak.pengajuan_id and riwayattolak.status = "tolak" where riwayat_kredit.petugas_id = orang.id) as total_tolak'))->wherenotnull('nip')->selectraw('orang.*')->groupby('orang.id')->get()->toArray();

		$this->view	= view('pages.laporan.employee');

		return $this->generateView();
		// return response()->json($employee);
	}

	public function log_survei()
	{
		$this->setGlobal();

		$tanggal	= ['start' =>  Carbon::now()->startOfDay(), 'end' =>  Carbon::now()->endOfDay()];
		$mode 		= 'in';

		if(request()->has('date'))
		{
			$data 				= request()->get('date');
			$tanggal			= json_decode($data, true);
			$tanggal['start']	= Carbon::createFromFormat('d/m/Y', $tanggal['start'])->startOfDay();
			$tanggal['end']		= Carbon::createFromFormat('d/m/Y', $tanggal['end'])->endOfDay();
		}

		$this->page_datas->start 		= $tanggal['start']->format('d/m/Y');
		$this->page_datas->end 			= $tanggal['end']->format('d/m/Y');

		$jaminan_k 		= collect(SJaminanKendaraan::where('created_at', '>=', $tanggal['start']->format('Y-m-d H:i:s'))->where('created_at', '<=', $tanggal['end']->format('Y-m-d H:i:s'))->with(['petugas', 'jaminan_kendaraan'])->orderby('created_at', 'asc')->get()->toArray());
		$jaminan_tb 	= SJaminanTanahBangunan::where('created_at', '>=', $tanggal['start']->format('Y-m-d H:i:s'))->where('created_at', '<=', $tanggal['end']->format('Y-m-d H:i:s'))->with(['petugas', 'jaminan_tanah_bangunan'])->get()->toArray();

		$jaminan_k->merge($jaminan_tb);

		$this->page_datas->log 	= $jaminan_k;
		$this->view				= view('pages.laporan.log_karyawan');

		return $this->generateView();
		// return response()->json($pengajuan);
	}


	private function getIDS($status = 'pengajuan', $start = null, $end = null)
	{
		$statusp 		= new RiwayatKredit;
		$statusp 		= $statusp->where('status', $status);

		if(!is_null($start))
		{
			$rfrasa_sta		= Carbon::createFromFormat('d/m/Y', $start);
			$statusp 		= $statusp->where('tanggal', '>=', $rfrasa_sta->format('Y-m-d'));
		}
		else
		{
			$statusp 		= $statusp->where('tanggal', '>=', Carbon::now()->format('Y-m-d'));
		}

		if(!is_null($end))
		{
			$rfrasa_sto		= Carbon::createFromFormat('d/m/Y', $end);
			$statusp 		= $statusp->where('tanggal', '<=', $rfrasa_sto->format('Y-m-d'));
		}
		else
		{
			$statusp 		= $statusp->where('tanggal', '<=', Carbon::now()->format('Y-m-d'));
		}

		$statusp 			= $statusp->select('pengajuan_id')->groupby('pengajuan_id')->get()->toArray();
		$ids 				= array_column($statusp, 'pengajuan_id');

		return $ids;
	}
}