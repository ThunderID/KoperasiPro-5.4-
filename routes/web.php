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

// reporting
Route::get('/report', 					['uses' => 'ReportController@index', 		'as' => 'report.index']);

//Menu Login
Route::get('privacy/policy', 	['uses' => 'WebController@privacypolicy', 		'as' => 'privacy.policy.index']);


Route::get('login', 	['uses' => 'LoginController@index', 		'as' => 'login.index']);
Route::post('login',	['uses' => 'LoginController@logging', 		'as' => 'login.store']);
Route::get('logout',	['uses' => 'LoginController@logout', 		'as' => 'login.destroy']);

// Here lies credit controller all things started here
Route::group(['middleware' => ['pjax', 'authenticated']], function()
{
	Route::get('/',		['uses'	=> 'HomeController@index',			'as' => 'home.index']);

	//Menu Debitur
	Route::any('ajax/jaminan/tanah/bangunan',	['uses' => 'JaminanController@tanah_bangunan', 	'as' => 'ajax.jaminan.tb']);
	Route::any('ajax/jaminan/kendaraan',		['uses' => 'JaminanController@kendaraan',	 	'as' => 'ajax.jaminan.k']);
	Route::any('ajax/debitur',					['uses' => 'DebiturController@index', 			'as' => 'ajax.debitur']);
	Route::any('ajax/role',						['uses' => 'PenggunaController@role', 			'as' => 'ajax.role.lists']);

	//Menu Simulasi
	Route::any('kredit/simulasi/create',			['uses' => 'SimulasiController@index',		'as' => 'simulasi.index']);
	Route::any('kredit/simulasi/store',				['uses' => 'SimulasiController@store',		'as' => 'simulasi.store']);
	Route::any('kredit/simulasi/clear',				['uses' => 'SimulasiController@clear',		'as' => 'simulasi.clear']);

	//Menu Kredit
	Route::resource('credit', 'KreditController');

	Route::any('kredit/{akta_id}/followup/store',	['uses' => 'KreditController@followupStore',	'as' => 'credit.followup.store']);

	//Menu Status Kredit
	Route::any('kredit/{id}/{status}',			['uses' => 'KreditController@status',				'as' => 'credit.status']);
	Route::any('duplikasi/kredit/{id}',			['uses' => 'KreditController@duplikasi',			'as' => 'credit.duplikasi']);

	Route::any('kredit/print/realisasi/{id}/{jj}/{dokumen}',		['uses' => 'KreditController@print_realisasi', 		'as' => 'credit.print.realisasi']);
	
	//Menu jaminan
	Route::any('hapus/jaminan/kendaraan/{kredit_id}/{jaminan_kendaraan_id}',			['uses' => 'KreditController@destroy', 	'as' => 'jaminan.kendaraan.destroy']);
	Route::any('hapus/jaminan/tanah/bangunan/{kredit_id}/{jaminan_tanah_bangunan_id}',	['uses' => 'KreditController@destroy', 	'as' => 'jaminan.tanah.bangunan.destroy']);
	Route::any('hapus/debitur/relasi/{kredit_id}/{relasi_id}',							['uses' => 'KreditController@destroy', 	'as' => 'debitur.relasi.destroy']);

	// download
	Route::get('/download/{filename}',			['uses'	=> 'DownloadController@download',			'as' => 'home.download']);

});

Route::group(['middleware' => ['survei_kredit']], function()
{
	//Menu survei / hapus
	Route::any('hapus/survei/aset/usaha/{kredit_id}/{survei_aset_usaha_id}',						['uses' => 'KreditController@destroy', 	'as' => 'survei.aset.usaha.destroy']);
	Route::any('hapus/survei/aset/kendaraan/{kredit_id}/{survei_aset_kendaraan_id}',				['uses' => 'KreditController@destroy', 	'as' => 'survei.aset.kendaraan.destroy']);
	Route::any('hapus/survei/aset/tanah/bangunan/{kredit_id}/{survei_aset_tanah_bangunan_id}',		['uses' => 'KreditController@destroy', 	'as' => 'survei.aset.tanah.bangunan.destroy']);

	Route::any('hapus/survei/jaminan/kendaraan/{kredit_id}/{survei_jaminan_kendaraan_id}',			['uses' => 'KreditController@destroy', 	'as' => 'survei.jaminan.kendaraan.destroy']);
	Route::any('hapus/survei/jaminan/tanah/bangunan/{kredit_id}/{survei_jaminan_tanah_bangunan_id}', ['uses' => 'KreditController@destroy', 	'as' => 'survei.jaminan.tanah.bangunan.destroy']);

	Route::any('hapus/survei/rekening/{kredit_id}/{survei_rekening_id}',							['uses' => 'KreditController@destroy', 	'as' => 'survei.rekening.destroy']);
	Route::any('hapus/survei/kepribadian/{kredit_id}/{survei_kepribadian_id}',						['uses' => 'KreditController@destroy', 	'as' => 'survei.kepribadian.destroy']);
	Route::any('hapus/survei/keuangan/{kredit_id}/{survei_keuangan_id}',							['uses' => 'KreditController@destroy', 	'as' => 'survei.keuangan.destroy']);

	// route for print kredit
	Route::get('print/kredit/{mode}/{id}', 		['uses' => 'KreditController@prints',	'as' => 'credit.print']);
});
	
Route::group(['middleware' => ['survei_kredit']], function()
{
	//SEEMS NO USE
	// route for pdf kredit
	Route::get('rencana/kredit/pdf/{id}', 		['uses' => 'CreditController@pdf',				'as' => 'credit.pdf']);
});

Route::group(['middleware' => ['transaksi_harian']], function()
{
	// Kasir - KAS masuk & keluar
	Route::get('kasir/kas', 					['uses' => 'KasirController@index', 'as' => 'kasir.kas.index']);
	Route::get('kasir/kas/{id}',				['uses' => 'KasirController@show', 'as' => 'kasir.kas.show']);
	Route::get('kasir/kas/{status}/baru',		['uses' => 'KasirController@create', 'as' => 'kasir.kas.create']);
	Route::post('kasir/kas/{status}/simpan',	['uses' => 'KasirController@store', 'as' => 'kasir.kas.store']);
	Route::get('kasir/realisasi/',				['uses' => 'KasirController@realisasi', 'as' => 'kasir.realisasi.kredit']);
	Route::get('kasir/realisasi/{id}',			['uses' => 'KasirController@show', 'as' => 'kasir.realisasi.show']);
	Route::get('kasir/angsuran/bayar',			['uses' => 'KasirController@angsuran', 'as' => 'kasir.angsuran']);
});

Route::group(['middleware' => ['modifikasi_koperasi']], function()
{
	//Menu Koperasi
	Route::resource('koperasi', 'KoperasiController');
	
	Route::post('koperasi/batch/store', 		['uses' => 'KoperasiController@batch', 'as' => 'koperasi.batch']);
});

Route::group(['middleware' => ['atur_akses']], function()
{
	//Menu Pengguna
	Route::resource('pengguna', 'PenggunaController');
	
	Route::post('pengguna/batch/store', 		['uses' => 'PenggunaController@batch', 'as' => 'pengguna.batch']);
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
	/*
	Route::get('/index', 						['uses' => 'DashboardController@indextest1', 	'as' => 'dashboard.sample.index']);
	Route::get('/index2', 						['uses' => 'DashboardController@indextest2', 	'as' => 'dashboard.sample.index2']);
	*/
});

// route to get json from helper for get address to select2
Route::any('regensi',							['uses' => 'HelperController@getRegensi', 		'as' => 'regensi.index']);
Route::any('distrik',							['uses'	=> 'HelperController@getDistrik',		'as' => 'distrik.index']);
Route::any('desa',								['uses' => 'HelperController@getDesa',			'as' => 'desa.index']);

// route to get daftar nik from daftar kreditur
Route::any('daftar/kreditur',					['uses' => 'HelperController@getDaftarKreditur', 	'as' => 'get.kreditur.index']);


Route::any('upload/foto',						['uses' => 'HelperController@storeGambar', 		'as' => 'helper.gambar.store']);
Route::any('hapus/foto',						['uses' => 'HelperController@destroyGambar', 	'as' => 'helper.gambar.destroy']);
