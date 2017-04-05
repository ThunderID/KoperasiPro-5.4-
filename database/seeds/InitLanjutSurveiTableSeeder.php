<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use TImmigration\Models\Pengguna;

use Carbon\Carbon;
use TQueries\ACL\SessionBasedAuthenticator;

class InitLanjutSurveiTableSeeder extends Seeder
{
	public function run()
	{
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
		$lists 			= $lists->get(['page' => 1, 'per_page'=> 7]);

		foreach ($lists as $list) 
		{
			$survei		= new \TCommands\Kredit\LanjutkanUntukSurvei($list['id']);
			$survei->handle();
		}
	}
}
