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
	$sample = [
			'pengajuan_kredit'	=> 'Rp 20.000.000',
			'kemampuan_angsur' 	=> 'Rp 2.000.000',
			'jangka_waktu'		=> 12,
			'tujuan_kredit'		=> 'Modal Usaha',
			'jaminan_kendaraan'	=> [[
				'tipe_jaminan' 	=> 'roda_2',
				'tahun'			=> '1999',
				'legal' 		=> [
					'nomor_polisi'	=> 'N 4314 CU',
					'nomor_bpkb'	=> '7027287',
				],
			]],
			'jaminan_tanah_bangunan'	=> [[
				'tipe_jaminan' 			=> 'tanah_bangunan',
				'legal' 				=> [
					'jenis_sertifikat'			=> 'HGB',
					'nomor_sertifikat'			=> '13.04.13.04.1.12456',
					'masa_berlaku_sertifikat'	=> '02/02/2020',
				],
				'alamat'				=> ['kota' => 'Malang'],
			]],
			'pribadi'			=> [
				'url_ktp'		=> 'http://test_gambar.p',
				'is_ektp'		=> true,
				'nik'			=> '35-73-03-510893-0004',
				'nama'			=> 'Chelsy Mooy',
				'tempat_lahir'	=> 'Dili',
				'tanggal_lahir'	=> '11/08/1993',
				'jenis_kelamin'	=> 'wanita',
				'status_perkawinan'	=> 'belum_kawin',
				'kewarganegaraan'	=> 'wni',
				'alamat'		=> [[
					'jalan'		=> 'Puri Cempaka Putih II AS 86',
					'kota'		=> 'Malang',
					'provinsi'	=> 'Jawa Timur',
					'negara'	=> 'Indonesia',
					'kode_pos'	=> '65135',
				]],
				'telepon'		=> ['0341 777668'],
				'handphone'		=> ['089654562911'],
				'relasi'			=> [[
					'hubungan'		=> 'orang_tua',
					'is_ektp'		=> true,
					'nik'			=> '35-73-03-670164-0001',
					'nama'			=> 'Yulia Pandie',
					'tempat_lahir'	=> 'Rote',
					'tanggal_lahir'	=> '27/02/1964',
					'jenis_kelamin'	=> 'wanita',
					'status_perkawinan'	=> 'kawin',
					'kewarganegaraan'	=> 'wni',
					'alamat'		=> [[
						'jalan'		=> 'Puri Cempaka Putih II AS 86',
						'kota'		=> 'Malang',
						'provinsi'	=> 'Jawa Timur',
						'negara'	=> 'Indonesia',
						'kode_pos'	=> '65135',
					]],
					'telepon'		=> ['0341 777668'],
					'handphone'		=> ['089654562701'],
				]],
			],
			'penjamin'			=> [
				'hubungan'		=> 'orang_tua',
				'is_ektp'		=> true,
				'nik'			=> '35-73-03-670164-0001',
				'nama'			=> 'Yulia Pandie',
				'tempat_lahir'	=> 'Rote',
				'tanggal_lahir'	=> '27/02/1964',
				'jenis_kelamin'	=> 'wanita',
				'status_perkawinan'	=> 'kawin',
				'kewarganegaraan'	=> 'wni',
				'alamat'		=> [[
					'jalan'		=> 'Puri Cempaka Putih II AS 86',
					'kota'		=> 'Malang',
					'provinsi'	=> 'Jawa Timur',
					'negara'	=> 'Indonesia',
					'kode_pos'	=> '65135',
				]],
				'telepon'		=> ['0341 777668'],
				'handphone'		=> ['089654562701'],
			],
		];

dd($sample);

	$content 	= [
		'jenis_pinjaman'		=> 'PA',
		'suku_bunga'			=> 50,
		'max_plafon_kredit'		=> 5000000,
		'usulan_kredit'			=> 40000000,
		'angsuran_pokok'		=> 4000000,
		'angsuran_bunga'		=> 400000,
		'jangka_waktu'			=> 12,
	];	

	$repository 			= new Thunderlabid\Credit\Repositories\CreditRepository;
	$credit 				= $repository->query([new Thunderlabid\Credit\Repositories\Specifications\SpecificationByID('18C5EBDB-5E24-4906-8080-F01AB687FEA6')]);
	$credit 				= $credit[0];
	$credit->rekomendasiKredit($content);

	$repository->store($credit);
dd($credit);

$model->rumah 	= [
	"status" => "milik_sendiri",
      "angsuran" => 0,
      "tenor_angsuran" => 0,
      "masa_sewa" => 0,
      "sejak" => "2016-07-03",
      "luas" => 36,
      "nilai_rumah" => 400000000
];

$model->usaha 	= [
	"nama" => "Software House",
      "bidang_usaha" => "IT",
      "sejak" => "2016-07-03",
      "status_usaha" => "milik_sendiri",
      "saham_usaha" => 50
];
dd($model);
dd($model->first());
});

//Menu Login
Route::get('login', 	['uses' => 'LoginController@index', 		'as' => 'login.index']);
Route::post('login',	['uses' => 'LoginController@logging', 		'as' => 'login.store']);
Route::get('logout',	['uses' => 'LoginController@logout', 		'as' => 'login.destroy']);


// Here lies credit controller all things started here
Route::group(['middleware' => ['pjax', 'authenticated']], function()
{
	//Menu Kredit
	Route::resource('credit', 'CreditController');

	//Menu Status Kredit
	Route::any('credit/{id}/{status}',		['uses' => 'CreditController@status', 	'as' => 'credit.status']);
	Route::post('updating/credit/{id}',		['uses' => 'CreditController@update', 	'as' => 'credit.updating']);

	///NO USE
	//Menu Survey
	Route::resource('survey', 'CreditSurveyController');

	//Menu Registrasi
	Route::resource('person', 'PersonController');
});


Route::group(['middleware' => ['pjax']], function()
{

	//Menu Settings
	//This one to change which office currently active
	Route::get('activate/{idx}', 	['uses' => 'LoginController@activateOffice', 'as' => 'office.activate']);

	//Dashboard page
	Route::get('/', 				['uses' => 'DashboardController@index', 		'as' => 'dashboard.index']);
	
	//Notification page
	Route::get('/notification',		['uses' => 'DashboardController@notification', 	'as' => 'notification.index']);

	//here lies test routes
	Route::get('/index', 	['uses' => 'DashboardController@indextest1', 'as' => 'dashboard.sample.index']);
	Route::get('/index2', 	['uses' => 'DashboardController@indextest2', 'as' => 'dashboard.sample.index2']);
});

Route::any('cities',			['uses' => 'HelperController@getCities', 'as' => 'cities.index']);

// route for print credit
Route::get('credit/print/rencana-kredit/{id}', 	['uses' => 'CreditController@print',			'as' => 'credit.print']);
// route for pdf credit
Route::get('credit/pdf/rencana-kredit/{id}', 	['uses' => 'CreditController@pdf',				'as' => 'credit.pdf']);
