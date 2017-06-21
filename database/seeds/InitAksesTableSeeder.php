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
use TQueries\ACL\SessionBasedAuthenticator;

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
								'nama'				=> 'C Mooy'
							];
		$visa_1 		= 	[
								'id'				=> null,
								'koperasi'			=> 	[
															'id'			=> 'MAJUJAYA',
															'nama'			=> 'Maju Jaya',
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
															'id'			=> 'AYOMAJUAYOJAYA',
															'nama'			=> 'Ayo Maju Ayo Jaya',
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
			]);
		$visa->save();

		$sba 				= new SessionBasedAuthenticator;
		$sba 				= $sba->login($credentials);

		$koperasi_baru_2	= new KoperasiBaru($visa_2['koperasi']['nama'], $visa_2['koperasi']['latitude'], $visa_2['koperasi']['longitude'], $visa_2['koperasi']['nomor_telepon'], $visa_2['koperasi']['alamat']);
		$koperasi_baru_2 	= $koperasi_baru_2->save();

		$koperasi_baru_3 	= new KoperasiBaru($visa_3['koperasi']['nama'], $visa_3['koperasi']['latitude'], $visa_3['koperasi']['longitude'], $visa_3['koperasi']['nomor_telepon'], $visa_3['koperasi']['alamat']);
		$koperasi_baru_3 	= $koperasi_baru_3->save();

		$admin_2 			= new GrantVisa($orang['id'], $visa_2['role'], $visa_2['scopes']);
		$admin_2 			= $admin_2->save();

		$admin_3 			= new GrantVisa($orang['id'], $visa_3['role'], $visa_3['scopes']);
		$admin_3 			= $admin_3->save();
	}
}
