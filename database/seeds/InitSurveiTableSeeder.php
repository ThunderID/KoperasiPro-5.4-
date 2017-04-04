<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Thunderlabid\Immigration\Models\Pengguna;

use Carbon\Carbon;
use Thunderlabid\Web\Queries\ACL\SessionBasedAuthenticator;

class InitSurveiTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('survei_alamat')->truncate();
		DB::table('survei_aset_kendaraan')->truncate();
		DB::table('survei_aset_tanah_bangunan')->truncate();
		DB::table('survei_aset_usaha')->truncate();
		DB::table('survei_jaminan_kendaraan')->truncate();
		DB::table('survei_jaminan_tanah_bangunan')->truncate();
		DB::table('survei_kepribadian')->truncate();
		DB::table('survei_keuangan')->truncate();
		DB::table('survei_nasabah')->truncate();
		DB::table('survei_rekening_bank')->truncate();
		DB::table('survei_ro_petugas')->truncate();
		DB::table('survei')->truncate();

 		//1. simpan imigrasi
		$credentials	=	[
								'email'				=> 'admin@ksp.id',
								'password'			=> 'admin',
								'nama'				=> 'C Mooy'
							];
		$logged 		= new SessionBasedAuthenticator;
		$logged 		= $logged->login($credentials);

		//2. simpan kredit
		$lists 			= new TQueries\Kredit\DaftarKredit;
		$lists 			= $lists->get(['page' => 1, 'per_page'=> 4]);

		foreach ($lists as $list) 
		{
			$survei		= new \TCommands\Kredit\LanjutkanUntukSurvei($list['nomor_dokumen_kredit']);
			$survei->handle();
		}
	}
}
