@php
	$hari 	= ['monday' => 'senin', 'tuesday' => 'selasa', 'wednesday' => 'rabu', 'thursday' => 'kamis', 'friday' => 'jumat', 'saturday' => 'sabtu', 'sunday' => 'minggu'];
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SURAT PERNYATAAN SEBAGAI PENJAMIN</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<!-- Styles -->
		<style>

		</style>
	</head>
	<body>
		<div class="container" style="width: 21cm;height: 29.7cm; ">
			<div class="clearfix">&nbsp;</div>
			
			<div class="row text-center">
				<div class="col-sm-12">
					<h2>SURAT PERNYATAAN SEBAGAI PENJAMIN</h2>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row text-justify">
				<div class="col-sm-12">
					<p>
						Pada hari ini {{$hari[strtolower(Carbon\Carbon::now()->format('l'))]}} tanggal {{Carbon\Carbon::now()->format('d-m-Y')}} 
					</p>

					<p>
						<ol>
							<li>
								<p>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$kredit['debitur']['nama']}}</p>
								<p>Pekerjaan&nbsp;&nbsp;: {{$kredit['debitur']['pekerjaan']}}</p>
								<p>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$kredit['debitur']['alamat'][0]['alamat']}}</p>
								<p>Untuk selanjutnya disebut Pihak Pertama.</p>
							</li>
							<li>
								<p>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$pimpinan['nama']}}</p>
								<p>Pekerjaan&nbsp;&nbsp;: Pimpinan {{$koperasi['nama']}}</p>
								<p>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$koperasi['alamat']}}</p>
								<p>Dalam hal ini bertindak dalam kedudukannya sebagai Direktur/Pimpinan dari dan karena itu dan atas nama serta mewakili BPR/Koperasi {{$koperasi['nama']}}; 
								<br/>Untuk selanjutnya disebut Pihak Kedua</p>
							</li>
						</ol>
					</p>

					<div class="clearfix">&nbsp;</div>

					<p>
						Menerangkan :
						<ul>
							<li>
								Bahwa {{$kredit['debitur']['nama']}} (selanjutnya disebut Debitur) telah memperoleh fasilitas kredit dari Pihak Kedua, sejumlah {{$kredit['pengajuan_kredit']}} ({{\App\Service\Helpers\Terbilang::dariRupiah($kredit['pengajuan_kredit'])}}) sebagaimana tersebut dalam Perjanjian Kredit Nomer {{$kredit['nomor_kredit']}}, tanggal {{$kredit['tanggal_pengajuan']}} ;
							</li>
							<li>
								Bahwa dalam memberikan kredit/pinjaman tersebut, Pihak Kedua membutuhkan jaminan pribadi Pihak Pertama untuk pelunasan hutang Debitur tersebut;
							</li>
							<li>
								Bahwa untuk menjamin pembayaran kembali hutang Debitur kepada Pihak Kedua tersebut, baik yang sekarang ada maupun dikemudian hari akan ada, maka Pihak Pertama bersedia sebagai Penjamin/Penanggung hutang (borg);
							</li>
						</ul>
					</p>
					<p>
						Selanjutnya sehubungan dengan hal – hal yang diuraikan diatas, maka Pihak Pertama menerangkan bahwa terhadap pelunasan hutang Debitur, baik berupa pokok kredit, bunga, provisi, denda dan ongkos – ongkos penagihan maupun beban – beban lainnya yang timbul, maka Pihak Pertama dengan ini mengikat diri sebagai Penjamin (borg), untuk secara pribadi turut bertanggung jawab sepenuhnya dan sanggup untuk menyelesaikan seluruh pinjaman Debitur termaksuddengan melepaskan hak – hak yang diberikan oleh Undang – Undang kepada Penjamin, yaitu hak – hak dalam pasal – pasal 1430, 1831, 1837, 1847, 1848, 1849, 1830 dan 1832 Kitab Undang – Undang Hukum Perdata dan dengan sukarela menyerahkan Jaminan berupa :
					</p>
					<p>
						@foreach($kredit['jaminan_kendaraan'] as $key1 => $value1)
							&emsp;&emsp;&emsp;<p>Kendaraan {{$key1+1}}</p>
							@foreach($value1 as $key2 => $value2)
								@if(in_array($key2, ['tipe', 'merk', 'tahun', 'atas_nama', 'nomor_rangka', 'nomor_mesin', 'nomor_bpkb', 'nomor_polisi', 'status_kepemilikan']))
									<div class="row">
										<div class="col-sm-3 col-sm-offset-1">
											{{ucwords(str_replace('_',' ',$key2))}} 
										</div>
										<div class="col-sm-1">
											:
										</div>
										<div class="col-sm-7">
											{{ucwords(str_replace('_',' ',$value2))}}
										</div>
									</div>
								@endif
							@endforeach
						@endforeach
					</p>
					<div class="clearfix">&nbsp;</div>
					<p>
						Surat Pernyataan Sebagai Penjamin ini merupakan bagian yang penting dan tidak terpisahkan dari Perjanjian Kredit Nomer {{$kredit['nomor_kredit']}}, tanggal {{$kredit['tanggal_pengajuan']}} dan karenanya selama Perjanjian Kredit sebagaimana dimaksud masih berlaku, maka surat pernyataan ini tidak dapat dicabut dan atau tidak dapat dibatalkan oleh karena sebab apapun.
						Demikian Surat Pernyataan Sebagai Penjamin ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
					</p>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>


			<div class="row text-center">
				<div class="col-sm-8">
				</div>
				<div class="col-sm-4">
					Penjamin
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>

				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					({{$kredit['debitur']['nama']}})
				</div>
			</div>
		
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
		</div>
	</body>
</html>
