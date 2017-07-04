<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Domain\Akses\Models\PandoraBox;

class InitAPITestTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('akses_pandora_box')->truncate();

		//1. simpan imigrasi
		$credentials 		= 
		[
			'key'			=> 'tlid_kpro_m_a',
			'secret'		=> 'thunderawesome',
			'jenis'			=> 'mobile',
			'versi'			=> '1.0.2',
		];

		$pbox 			= new PandoraBox;
		$pbox->fill($credentials);
		$pbox->save();
	}
}
