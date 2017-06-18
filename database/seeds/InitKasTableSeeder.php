<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use TQueries\ACL\SessionBasedAuthenticator;

use App\Service\Kasir\KasMasukBaru;
use App\Service\Kasir\KasKeluarBaru;
use App\Service\Kasir\HapusBuktiKas;
use App\Service\Kasir\PelunasanKas;

use App\Domain\Kasir\Models\HeaderTransaksi;

class InitKasTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('header_transaksi')->truncate();
		DB::table('detail_transaksi')->truncate();

		$credentials	=	[
								'email'				=> 'admin@ksp.id',
								'password'			=> 'admin',
								'nama'				=> 'C Mooy'
							];

		$logged 	= new SessionBasedAuthenticator;
		$logged 	= $logged->login($credentials);

		//2. simpan transaksi kas keluar
		$desk 					= ['Pembelian ATK', 'Pembelian Bensin', 'Bayar Gaji', 'Stok Buku'];
		$harga 					= ['Rp 500.000', 'Rp 800.000', 'Rp 10.000.000', 'Rp 200.000'];

		foreach (range(0, 19) as $key) 
		{
			$rand 				= rand(0,3);

			$details 			= [
				'deskripsi'				=> $desk[$rand],
				'kuantitas'				=> 1,
				'harga_satuan'			=> $harga[$rand],
				'diskon_satuan'			=> 'Rp 0',
			];

			$transaksi 			= new KasMasukBaru(0, 0, rand(11111111,99999999), Carbon::parse(rand(-28,-0).' months')->format('d/m/Y'), [$details]);
			$transaksi->save();
		}

		//3. simpan transaksi kas masuk
		$desk 					= ['Penambahan Modal'];
		$harga 					= ['Rp 1.000.000'];

		foreach (range(0, 1) as $key) 
		{
			$rand 				= 0;

			$details 			= [
				'deskripsi'				=> $desk[$rand],
				'kuantitas'				=> 1,
				'harga_satuan'			=> $harga[$rand],
				'diskon_satuan'			=> 'Rp 0',
			];

			$transaksi 			= new KasKeluarBaru(0, 0, rand(11111111,99999999), Carbon::parse(rand(-28,-0).' months')->format('d/m/Y'), [$details]);
			$transaksi->save();
		}

		// 4. Pelunasan
		foreach (range(0, 9) as $key) 
		{
			$rand_trs 			= HeaderTransaksi::skip(rand(0,20))->take(1)->get();

			$transaksi 			= new PelunasanKas($rand_trs[0]['id']);
			$transaksi->save();
		}

		//5. delete
		// foreach (range(0, 0) as $key) 
		// {
		// 	$rand_trs 			= HeaderTransaksi::skip(rand(0,20))->take(1)->get();

		// 	$transaksi 			= new HapusBuktiKas($rand_trs[0]['id']);
		// 	$transaksi->save();
		// }
	}
}
