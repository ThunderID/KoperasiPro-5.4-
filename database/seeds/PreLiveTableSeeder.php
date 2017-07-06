<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Service\Pengaturan\KoperasiBaru;
use App\Service\Pengaturan\PenggunaBaru;
use App\Service\Pengaturan\GrantVisa;

use App\Service\Helpers\UI\UploadKaryawan;

use App\Domain\Akses\Models\Visa;
use App\Domain\Akses\Models\Koperasi;
use App\Domain\HR\Models\Orang;

use Carbon\Carbon;
use App\Service\Akses\SessionBasedAuthenticator;

class PreLiveTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('akses_koperasi')->truncate();
		DB::table('akses_mobile')->truncate();
		DB::table('akses_pandora_box')->truncate();
		DB::table('akses_visa')->truncate();
		DB::table('orang')->truncate();

		$faker			= \Faker\Factory::create();

		//1. simpan imigrasi
		$credentials	=	[
								'email'				=> 'admin@ksp.id',
								'password'			=> 'admin',
								'nama'				=> 'Admin',
								'tanggal_masuk'		=> Carbon::now()->format('d/m/Y'),
								'nip'				=> '2017.0001'
							];
		$visa_1 		= 	[
								'id'				=> null,
								'koperasi'			=> 	[
															'id'			=> 'HOLDING',
															'pusat_id'		=> null,
															'nama'			=> 'Holding',
															'kode'			=> rand(1000000, 9999999),
															'latitude'		=> -7.24917,
															'longitude'		=> 112.75083,
															'nomor_telepon'	=> $faker->PhoneNumber,
															'alamat'		=> $faker->address,
														],
								'role'				=>  'komisaris',
								'scopes'			=>  [
									[
										'list'		=> 'modifikasi_koperasi',
									],
									[
										'list'		=> 'pengajuan_kredit',
									],
									[
										'list'		=> 'survei_kredit',
									],
									[
										'list'		=> 'setujui_kredit',
									],
									[
										'list'		=> 'realisasi_kredit',
									],
									[
										'list'		=> 'kas_harian',
									],
									[
										'list'		=> 'transaksi_harian',
									],
									[
										'list'		=> 'atur_akses',
									],
								],
							];


		//0. simpan koperasi_baru
		$koperasi_baru	= new Koperasi;
		$koperasi_baru->fill($visa_1['koperasi']);
		$koperasi_baru->save();

		//1. simpan user
		$orang 			= new Orang;
		$orang->fill($credentials);
		$orang->save();

		//2. simpan visa
		$visa 			= new Visa;
		$visa->fill([
			'role'				=> $visa_1['role'],
			'scopes'			=> $visa_1['scopes'],
			'orang_id'			=> $orang->id,
			'akses_koperasi_id'	=> $koperasi_baru->id,
			]);
		$visa->save();

		//upload init data kantor
		if (($handle = fopen(database_path().'/seeds/csv/kantor_pandaan.csv', "r")) !== FALSE) 
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
			}
			fclose($handle);
		}

		//upload init data karyawan
		$csv_file 				= fopen(database_path().'/seeds/csv/user_pandaan.csv', "r");
		$fungsi_karyawan_baru 	= new UploadKaryawan($csv_file, database_path().'/seeds/csv/', 'user_pandaan.csv');
		$fungsi_karyawan_baru->save();
		fclose($csv_file);
	}
}
