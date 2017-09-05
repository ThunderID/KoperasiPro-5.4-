<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Input, Exception, DB;
use App\Domain\HR\Models\Orang;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\RiwayatKredit;

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

		$tanggal 		= ['start' => null, 'end' => null];
		$status 		= 'pengajuan';

		if(request()->has('date'))
		{
			$data 		= request()->get('date');
			$tanggal	= json_decode($data, true);
		}

		if(request()->has('status'))
		{
			$status 	= request()->get('status');
		}

		$ids			= $this->getIDS($status, $tanggal['start'], $tanggal['end']);

		$this->page_datas->status 		= $status;
		$this->page_datas->pengajuan 	= Pengajuan::id($ids)->with(['debitur', 'hp'])->get()->toArray();

		$this->view		= view('pages.laporan.kredit');

		return $this->generateView();
		// return response()->json($pengajuan);
	}

	public function movement_jaminan()
	{
		$this->setGlobal();

		$tanggal 	= ['start' => null, 'end' => null];
		$mode 		= 'in';

		if(request()->has('date'))
		{
			$data 		= request()->get('date');
			$tanggal	= json_decode($data, true);
		}

		if(request()->has('mode'))
		{
			$mode 		= request()->get('mode');
		}

		//realisasi
		switch ($mode) 
		{
			case 'in':
				$ids	= $this->getIDS('realisasi', $tanggal['start'], $tanggal['end']);
				break;
			case 'out':
				$ids	= $this->getIDS('lunas', $tanggal['start'], $tanggal['end']);
				break;
			default:
				throw new Exception("Error Processing Request", 1);
				break;
		}

		$this->page_datas->pengajuan 	= Pengajuan::id($ids)->with(['jaminan_kendaraan', 'jaminan_tanah_bangunan', 'riwayat_status'])->get();

		$this->view	= view('pages.laporan.jaminan');

		return $this->generateView();
		// return response()->json($pengajuan);
	}

	public function loan_to_value()
	{
		$this->setGlobal();
		$tanggal['start']	= Carbon::now()->startOfDay()->format('Y-m-d H:i:s');
		$tanggal['end']		= Carbon::now()->endOfDay()->format('Y-m-d H:i:s');

		$mode 		= 'in';

		if(request()->has('date'))
		{
			$tanggal			= json_decode(request()->get('date'), true);
			$tanggal['start']	= Carbon::createFromFormat('d/m/Y', $tanggal['start'])->startOfDay()->format('Y-m-d H:i:s');
			$tanggal['end']		= Carbon::createFromFormat('d/m/Y', $tanggal['end'])->endOfDay()->format('Y-m-d H:i:s');
		}

		$this->page_datas->kredit		= Pengajuan::selectraw('pengajuan_kredit.*')
							->where('pengajuan_kredit.created_at', '>=', $tanggal['start'])
							->where('pengajuan_kredit.created_at', '<=', $tanggal['end'])
							->status(['realisasi', 'lunas'])
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
							})->selectraw('IFNULL(SUM(IFNULL(s_jaminan_tb.taksasi_tanah, 0) + IFNULL(s_jaminan_tb.taksasi_tanah, 0) + IFNULL(s_jaminan_k.harga_taksasi,0)),0) as taksasi')
							->selectraw('IFNULL(SUM(pengajuan_kredit.pengajuan_kredit/(IFNULL(s_jaminan_tb.taksasi_tanah, 0) + IFNULL(s_jaminan_tb.taksasi_tanah, 0) + IFNULL(s_jaminan_k.harga_taksasi,0))  * 100),0) as lvr')->groupby('pengajuan_kredit.id')->with(['debitur'])->get();

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