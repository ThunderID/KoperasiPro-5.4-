<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Domain\Teritori\Models\Negara;
use App\Domain\Teritori\Models\Provinsi;
use App\Domain\Teritori\Models\Regensi;
use App\Domain\Teritori\Models\Distrik;
use App\Domain\Teritori\Models\Desa;

class IndonesiaTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('territorial_desa')->truncate();
		DB::table('territorial_distrik')->truncate();
		DB::table('territorial_regensi')->truncate();
		DB::table('territorial_provinsi')->truncate();
		DB::table('territorial_negara')->truncate();
	
		$negara		= ['id' => 'ID', 'nama' => 'Indonesia'];
		$model 		= new Negara;
		$model->fill($negara);
		$model->save();

		// provinsi
		if (($handle = fopen(database_path().'/seeds/csv/provinces.csv', "r")) !== FALSE) 
		{
			while (($data = fgetcsv($handle, 500, ",")) !== FALSE) 
			{
				$attr 		= ['id' => $data[0], 'nama' => $data[2], 'territorial_negara_id' => $data[1]];
				$model 		= new Provinsi;
				$model->fill($attr);
				$model->save();
			}
			fclose($handle);
		}

		// regency
		if (($handle = fopen(database_path().'/seeds/csv/regencies.csv', "r")) !== FALSE) 
		{
			while (($data = fgetcsv($handle, 500, ",")) !== FALSE) 
			{
				$attr 		= ['id' => $data[0], 'nama' => $data[2], 'territorial_provinsi_id' => $data[1]];
				$model 		= new Regensi;
				$model->fill($attr);
				$model->save();
			}
			fclose($handle);
		}

		// district
		if (($handle = fopen(database_path().'/seeds/csv/districts.csv', "r")) !== FALSE) 
		{
			while (($data = fgetcsv($handle, 500, ",")) !== FALSE) 
			{
				$attr 		= ['id' => $data[0], 'nama' => $data[2], 'territorial_regensi_id' => $data[1]];
				$model 		= new Distrik;
				$model->fill($attr);
				$model->save();
			}
			fclose($handle);
		}

		// village
		if (($handle = fopen(database_path().'/seeds/csv/villages.csv', "r")) !== FALSE) 
		{
			while (($data = fgetcsv($handle, 500, ",")) !== FALSE) 
			{
				$attr 		= ['id' => $data[0], 'nama' => $data[2], 'territorial_distrik_id' => $data[1]];
				$model 		= new Desa;
				$model->fill($attr);
				$model->save();
			}
			fclose($handle);
		}
	}
}
