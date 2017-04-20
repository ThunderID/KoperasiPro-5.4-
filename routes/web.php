<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test', function () 
{
	$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];
dd($geo);
	$teritori 	= new TQueries\Territorial\TeritoriIndonesia;
	$teritori 	= $teritori->get(['temukan_desa' => true, 'nama_distrik' => 'Blimbing', 'nama_desa' => 'Arjosari']);
	dd($teritori);
	$parse_data['rekening']	= [
		'id'			=> 'D392EEB2-DB88-47C8-A405-7589A0CDBA87',
		'nama_bank'		=> 'BCA',
		'atas_nama'		=> 'Chemo',
		'saldo_awal'	=> 'Rp 2.400.000',
		'saldo_akhir'	=> 'Rp 12.400.000',
	];
	// $data 	= new TCommands\Kredit\SimpanSurveiKredit('D47931EE-A2E5-40AE-B1E7-9EBDBA47FE65', $parse_data);
	// dd($data->handle());
	// 	$data  	= [
	// 			  	"id" 				=> "95F5BC06-9BF8-416A-93E1-B52B93E15743",
	//   				"jenis_kredit" 		=> "pt",
	//   				"nomor_kredit" 		=> "8FF78643-1E30-4436-851D-468D44566920",
	//   				"pengajuan_kredit" 	=> "Rp 2.222.222",
	//   				"jangka_waktu" 		=> 24,
	//   				"status" 			=> "pengajuan",
	//   				"tanggal_pengajuan" => "31/03/2017",
	//  				"kreditur" 			=> [
	// 				    "id" 			=> "B8E47A2B-A15B-41BA-9235-A9CF32D1622F",
	// 				    "is_ektp" 		=> true,
	// 				    "foto_ktp" 		=> "http://128.199.145.173:8778/2017/03/31/ktp-057398900-1490925726.jpg",
	//     				"nik" 			=> "35-001547-110284-0004",
	// 				    "nama" 			=> "Yds cm",
	// 				    "tanggal_lahir" => "03/04/2017",
	//     				"jenis_kelamin" => "laki-laki",
	//     				"status_perkawinan" => "belum_kawin",
	// 				    "telepon" 		=> "089654562911",
	// 				    "pekerjaan" 	=> "Pegawai Negeri",
	// 				    "penghasilan_bersih" => "Rp 200.000.000",
	// 				    "alamat" 		=>	[
	// 				    						"alamat" 	=> "Puri Cempaka",
	// 									        "rt" 		=> null,
	// 									        "rw" 		=> null,
	// 									        "desa" 		=> "6205020009",
	// 									        "distrik" 	=> "6205020",
	// 									        "regensi" 	=> "6205",
	// 									        "provinsi" 	=> "62",
	// 									        "negara" 	=> "indonesia"
	// 									    ],
	// 					"relasi"		=> [[
	// 						"hubungan"	=> 'orang_tua',
	// 						"nama"		=> 'Yulia P',
	// 						"alamat" 	=>	[
	// 				    						"alamat" 	=> "Puri Cempaka",
	// 									        "rt" 		=> null,
	// 									        "rw" 		=> null,
	// 									        "desa" 		=> "6205020009",
	// 									        "distrik" 	=> "6205020",
	// 									        "regensi" 	=> "6205",
	// 									        "provinsi" 	=> "62",
	// 									        "negara" 	=> "indonesia"
	// 									],
	// 					]]
	//  				],
	//  				'jaminan_kendaraan'	=> [
	//  					[
	// 						"tipe" 			=> "roda_4",
	// 						"merk" 			=> "daihatsu",
	// 						"tahun" 		=> 2000,
	// 						"nomor_bpkb" 	=> "56775433",
	// 						"atas_nama" 	=> "BBC CV",
	// 						"nomor_mesin" 	=> "123456789123456789",
	// 						"nomor_rangka" 	=> "123456478978978910",
	// 						"masa_berlaku_stnk" => "11/08/2018",
	// 						"nomor_polisi" 		=> "N 4314 CU",
	// 						"harga_taksasi" 	=> "Rp 90.000.000",
	// 						"fungsi_sehari_hari"	=> "Kendaraan Pribadi",
	// 						"survei"			=> [
	// 							"tanggal"		=> "04/04/2017",
	// 							"petugas"		=> [
	// 								"id"		=> "AB190728-4943-427F-B433-7BE14B205D06",
	// 								"nama"		=> "Chelsy M",
	// 							]
	// 						]
	//  					]
	//  				],
	//  				'jaminan_tanah_bangunan'	=> [
	//  					[
	// 						"tipe" 				=> "bangunan",
	// 						"jenis_sertifikat" 	=> "shm",
	// 						"nomor_sertifikat" 	=> "13-89-52-21-8-89104",
	// 						"masa_berlaku_sertifikat" 	=> "2028",
	//       					"atas_nama" 		=> "Mr. Chad Terry III",
	//       					"luas_tanah" 		=> 72,
	//       					"luas_bangunan" 	=> 36,
	// 						"alamat" 			=> [
	// 							"alamat" 		=> "1157 Leuschke Forest Hermanburgh, RI 10293",
	// 					        "rt" 			=> "003",
	// 							"rw" 			=> "003",
	// 							"desa" 			=> null,
	// 							"distrik" 		=> null,
	// 							"regensi" 		=> "Tuban",
	// 							"provinsi" 		=> "Jawa Timur",
	// 							"negara" 		=> "Indonesia",
	// 						],
	//  						"fungsi_bangunan" 	=> "ruko",
	//  						"bentuk_bangunan" 	=> "tingkat",
	//  						"konstruksi_bangunan" 	=> "permanen",
	//  						"lantai_bangunan" 	=> "keramik",
	//  						"dinding" 			=> "tembok",
	//  						"listrik" 			=> "1300_watt",
	//  						"air" 				=> "pdam",
	//  						"jalan" 			=> "aspal",
	//  						"lebar_jalan" 		=> 4,
	//  						"letak_lokasi_terhadap_jalan"	=> "sama_tinggi_dengan_jalan",
	//  						"lingkungan"		=> "perumahan",
	//  						"nilai_jaminan"		=> "Rp 720.000.000",
	//  						"taksasi_tanah"		=> "Rp 288.000.000",
	//  						"taksasi_bangunan"	=> "Rp 288.000.000",
	//  						"njop"				=> "Rp 5.333.333",
	//  						"uraian"			=> "Juga rumah tinggal",
	// 						"survei"			=> [
	// 							"tanggal"		=> "04/04/2017",
	// 							"petugas"		=> [
	// 								"id"		=> "AB190728-4943-427F-B433-7BE14B205D06",
	// 								"nama"		=> "Chelsy M",
	// 							]
	// 						]
	// 				    ]
	// 				],
	// 				"riwayat_status" 		=> [
	// 					[
	// 						"id" 			=> "F8190728-4943-427F-B433-7BE14B205D05",
	// 						"status" 		=> "pengajuan",
	// 						"tanggal" 		=> "03/04/2017",
	// 					],
	// 					[
	// 						"id" 			=> "F8190728-4943-427F-B433-7BE14B205D06",
	// 						"status" 		=> "survei",
	// 						"tanggal" 		=> "04/04/2017",
	// 					]
	// 				],
	// 				'aset_usaha'			=> [[
	// 					'bidang_usaha'		=> 'usaha dagang',
	// 					'nama_usaha'		=> 'Toko Rosela',
	// 					'tanggal_berdiri'	=> '11/11/2000',
	// 					'status'			=> 'milik_sendiri',
	// 					"alamat" 			=> [
	// 						"alamat" 		=> "1157 Leuschke Forest Hermanburgh, RI 10293",
	// 				        "rt" 			=> "003",
	// 						"rw" 			=> "003",
	// 						"desa" 			=> null,
	// 						"distrik" 		=> null,
	// 						"regensi" 		=> "Tuban",
	// 						"provinsi" 		=> "Jawa Timur",
	// 						"negara" 		=> "Indonesia",
	// 					],
	// 					"status_tempat_usaha"	=> "milik_sendiri",
	// 					"luas_tempat_usaha"		=> 72,
	// 					"jumlah_karyawan"		=> 6,
	// 					"nilai_aset"			=> "Rp 720.000.000",
	// 					"perputaran_stok"		=> 600,
	// 					"jumlah_konsumen_perbulan"	=> 6000,
	// 					"jumlah_pesaing_perkota"	=> 40,
	// 					"uraian"			=> "Bisnisnya bagus",
	// 					"survei"			=> [
	// 						"tanggal"		=> "04/04/2017",
	// 						"petugas"		=> [
	// 							"id"		=> "AB190728-4943-427F-B433-7BE14B205D06",
	// 							"nama"		=> "Chelsy M",
	// 						]
	// 					]
	// 				]],
	//  				'aset_kendaraan'	=> [
	//  					[
	// 						"tipe" 			=> "roda_4",
	// 						"nomor_bpkb" 	=> "56775433",
	// 						"survei"			=> [
	// 							"tanggal"		=> "04/04/2017",
	// 							"petugas"		=> [
	// 								"id"		=> "AB190728-4943-427F-B433-7BE14B205D06",
	// 								"nama"		=> "Chelsy M",
	// 							]
	// 						]
	//  					]
	//  				],
	//  				'aset_tanah_bangunan'	=> [
	//  					[
	// 						"tipe" 				=> "bangunan",
	//       					"luas_tanah" 		=> 72,
	//       					"luas_bangunan" 	=> 36,
	// 						"alamat" 			=> [
	// 							"alamat" 		=> "1157 Leuschke Forest Hermanburgh, RI 10293",
	// 					        "rt" 			=> "003",
	// 							"rw" 			=> "003",
	// 							"desa" 			=> null,
	// 							"distrik" 		=> null,
	// 							"regensi" 		=> "Tuban",
	// 							"provinsi" 		=> "Jawa Timur",
	// 							"negara" 		=> "Indonesia",
	// 						],
	// 						"survei"			=> [
	// 							"tanggal"		=> "04/04/2017",
	// 							"petugas"		=> [
	// 								"id"		=> "AB190728-4943-427F-B433-7BE14B205D06",
	// 								"nama"		=> "Chelsy M",
	// 							]
	// 						]
	//  					]
	//  				],
	//  				'kas_rekening'				=> [
	//  					[
	// 						"nama_bank" 		=> "BCA",
	// 						"atas_nama" 		=> "Chelsy M",
	// 						"saldo_awal" 		=> "Rp 2.000.000",
	// 						"saldo_akhir" 		=> "Rp 2.000.000",
	// 						"survei"			=> [
	// 							"tanggal"		=> "04/04/2017",
	// 							"petugas"		=> [
	// 								"id"		=> "AB190728-4943-427F-B433-7BE14B205D06",
	// 								"nama"		=> "Chelsy M",
	// 							]
	// 						]
	//  					]
	//  				],
	//  				'kondisi_keuangan'			=> [
	//  					[
	// 						"penghasilan_rutin"		=> "Rp 30.000.000",
	// 						"penghasilan_pasangan"	=> "Rp 0",
	// 						"penghasilan_usaha"		=> "Rp 10.000.000",
	// 						"biaya_rutin"			=> "Rp 2.000.000",
	// 						"biaya_rumah_tangga"	=> "Rp 2.000.000",
	// 						"biaya_pendidikan"		=> "Rp 9.500.000",
	// 						"biaya_angsuran_kredit"	=> "Rp 900.000",
	// 						"biaya_lain"			=> "Rp 500.000",
	// 						"sumber_pendapatan_utama"		=> "Gaji",
	// 						"jumlah_tanggungan_keluarga"	=> 1,
	// 						"survei"			=> [
	// 							"tanggal"		=> "04/04/2017",
	// 							"petugas"		=> [
	// 								"id"		=> "AB190728-4943-427F-B433-7BE14B205D06",
	// 								"nama"		=> "Chelsy M",
	// 							]
	// 						]
	//  					]
	//  				],
	// 				"status_berikutnya" => "setujui",
	// 				"status_sebelumnya" => "survei",
	// 			];


	// 	// $data 	= new TQueries\Kredit\DaftarKredit;
	// 	// $data 	= $data->detailed('95F5BC06-9BF8-416A-93E1-B52B93E15743');

	// 	dd($data);
});

//Menu Login
Route::get('/',			['uses'	=> 'LoginController@index',			'as' => 'index']);
Route::get('login', 	['uses' => 'LoginController@index', 		'as' => 'login.index']);
Route::post('login',	['uses' => 'LoginController@logging', 		'as' => 'login.store']);
Route::get('logout',	['uses' => 'LoginController@logout', 		'as' => 'login.destroy']);

// Here lies credit controller all things started here
Route::group(['middleware' => ['pjax', 'authenticated']], function()
{
	//Menu Kredit
	Route::resource('credit', 'KreditController');

	//Menu Status Kredit
	Route::any('kredit/{id}/{status}',		['uses' => 'KreditController@status', 	'as' => 'credit.status']);
	
	//Menu jaminan
	Route::any('hapus/jaminan/kendaraan/{kredit_id}/{jaminan_kendaraan_id}',	['uses' => 'KreditController@destroy', 	'as' => 'jaminan.kendaraan.destroy']);
	Route::any('hapus/jaminan/tanah/bangunan/{kredit_id}/{jaminan_tanah_bangunan_id}',	['uses' => 'KreditController@destroy', 	'as' => 'jaminan.tanah.bangunan.destroy']);
	Route::any('hapus/kreditur/relasi/{kredit_id}/{relasi_id}',	['uses' => 'KreditController@destroy', 	'as' => 'kreditur.relasi.destroy']);

	//Menu survei / hapus
	Route::any('hapus/survei/aset/usaha/{kredit_id}/{survei_aset_usaha_id}',					['uses' => 'KreditController@destroy', 	'as' => 'survei.aset.usaha.destroy']);
	Route::any('hapus/survei/aset/kendaraan/{kredit_id}/{survei_aset_kendaraan_id}',			['uses' => 'KreditController@destroy', 	'as' => 'survei.aset.kendaraan.destroy']);
	Route::any('hapus/survei/aset/tanah/bangunan/{kredit_id}/{survei_aset_tanah_bangunan_id}',	['uses' => 'KreditController@destroy', 	'as' => 'survei.aset.tanah.bangunan.destroy']);

	Route::any('hapus/survei/jaminan/kendaraan/{kredit_id}/{survei_jaminan_kendaraan_id}',					['uses' => 'KreditController@destroy', 	'as' => 'survei.jaminan.kendaraan.destroy']);
	Route::any('hapus/survei/jaminan/tanah/bangunan/{kredit_id}/{survei_jaminan_tanah_bangunan_id}',		['uses' => 'KreditController@destroy', 	'as' => 'survei.jaminan.tanah.bangunan.destroy']);

	Route::any('hapus/survei/rekening/{kredit_id}/{survei_rekening_id}',											['uses' => 'KreditController@destroy', 	'as' => 'survei.rekening.destroy']);
	Route::any('hapus/survei/kepribadian/{kredit_id}/{survei_kepribadian_id}',											['uses' => 'KreditController@destroy', 	'as' => 'survei.kepribadian.destroy']);

	// route for print kredit
	Route::get('print/kredit/{mode}/{id}', 	['uses' => 'KreditController@prints',	'as' => 'credit.print']);
	
	//SEEMS NO USE
	// route for pdf kredit
	Route::get('kredit/pdf/rencana-kredit/{id}', 	['uses' => 'CreditController@pdf',				'as' => 'credit.pdf']);
});


Route::group(['middleware' => ['pjax', 'authenticated']], function()
{
	//Menu Settings
	//This one to change which office currently active
	Route::get('activate/{idx}', 				['uses' => 'LoginController@activateOffice', 	'as' => 'office.activate']);

	//Dashboard page
	Route::get('/dashboard', 					['uses' => 'DashboardController@index', 		'as' => 'dashboard.index']);
	
	//Notification page
	Route::get('/notification',					['uses' => 'DashboardController@notification', 	'as' => 'notification.index']);

	//here lies test routes
	Route::get('/index', 						['uses' => 'DashboardController@indextest1', 	'as' => 'dashboard.sample.index']);
	Route::get('/index2', 						['uses' => 'DashboardController@indextest2', 	'as' => 'dashboard.sample.index2']);
});

// route to get json from helper for get address to select2
Route::any('regensi',							['uses' => 'HelperController@getRegensi', 		'as' => 'regensi.index']);
Route::any('distrik',							['uses'	=> 'HelperController@getDistrik',		'as' => 'distrik.index']);
Route::any('desa',								['uses' => 'HelperController@getDesa',			'as' => 'desa.index']);

// route to get daftar nik from daftar kreditur
Route::any('daftar/kreditur',					['uses' => 'HelperController@getDaftarKreditur', 'as' => 'get.kreditur.index']);

// Route::get('daftar/kreditur', function() {
// 	$data = new TQueries\Kredit\DaftarKreditur;

// 	dd($data->get(['nik' => '35-73-03-478656-0003']));
// });