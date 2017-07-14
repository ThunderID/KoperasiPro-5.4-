<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Service\Pengaturan\KoperasiBaru;
use App\Service\Pengaturan\PenggunaBaru;
use App\Service\Pengaturan\GrantVisa;

use App\Domain\Akses\Models\Visa;
use App\Domain\Akses\Models\Koperasi;
use App\Domain\HR\Models\Orang;

use Carbon\Carbon;
use App\Service\Akses\SessionBasedAuthenticator;

class InitAksesTableSeeder extends Seeder
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
								'nama'				=> 'C Mooy',
								'tanggal_masuk'		=> Carbon::now()->format('d/m/Y'),
								'nip'				=> '2017.0001'
							];
		$visa_1 		= 	[
								'id'				=> null,
								'koperasi'			=> 	[
															'id'			=> 'MAJUJAYA',
															'pusat_id'		=> 'Holding',
															'nama'			=> 'Maju Jaya',
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

		$visa_2 		= 	[
								'id'				=> null,
								'koperasi'			=> 	[
															'id'			=> 'MAJUTERUS',
															'nama'			=> 'Maju Terus',
															'latitude'		=> -6.21462,
															'longitude'		=> 106.84513,
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
									// [
									// 	'list'		=> 'kas_harian',
									// ],
									// [
									// 	'list'		=> 'transaksi_harian',
									// ],
									// [
									// 	'list'		=> 'atur_akses',
									// ],
								],
							];

			$visa_3 		= 	[
								'id'				=> null,
								'koperasi'			=> 	[
															'id'			=> 'HOLDING',
															'nama'			=> 'Holding',
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
			// 'limit_max'			=> 10000000
			]);
		$visa->save();

		$sba 				= new SessionBasedAuthenticator;
		$sba 				= $sba->login($credentials);

		return true;
		foreach (range(0, 999) as $key) 
		{
			$longitude 	= (float) -7.24917;
			$latitude 	= (float) 112.75083;
			$radius 	= rand(1,999); // in miles

			$lng[0] 	= $longitude - $radius / abs(cos(deg2rad($latitude)) * 69);
			$lng[1] 	= $longitude + $radius / abs(cos(deg2rad($latitude)) * 69);
			$lat[0] 	= $latitude - ($radius / 69);
			$lat[1] 	= $latitude + ($radius / 69);

			$koperasi_baru_2	= new KoperasiBaru($faker->company, rand(1000000, 9999999), $lat[rand(0,1)], $lng[rand(0,1)], $faker->phoneNumber, $faker->address, 'Holding');
			$koperasi_baru_2 	= $koperasi_baru_2->save();
	
			$admin_2 			= new GrantVisa($orang['id'], $visa_3['role'], $visa_3['scopes']);
			$admin_2 			= $admin_2->save();
		}
	}
}
