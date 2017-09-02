<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SIMULASI PENGAJUAN KREDIT</title>

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
			<header>
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3>BPR/KOPERASI {{$acl_active_office['koperasi']['nama']}}</h3>
						<p>{{$acl_active_office['koperasi']['alamat']}}</p>
						<p>Telp : {{$acl_active_office['koperasi']['nomor_telepon']}}</p>
					</div>
				</div>
				<hr>
			</header>
			<section>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 text-left">
						<div class="row text-center">
							<div class="col-sm-12">
								<h4>SIMULASI PENGAJUAN KREDIT<br/>(Bunga Flat)</h4>
							</div> 
						</div> 

						<div class="row">
							<div class="col-sm-6">
								Pokok pinjaman :
							</div>
							<div class="col-sm-6 text-right">
								{{$page_datas->pokok}}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								Bunga per Bulan :
							</div>
							<div class="col-sm-6 text-right">
								{{$page_datas->bunga}} %
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								Jangka Waktu Peminjaman :
							</div>
							<div class="col-sm-6 text-right">
								{{$page_datas->tenor}} bulan
							</div>
						</div>
						<hr/>

						<div class="row">
							<div class="col-sm-6">
								Cicilan Pokok :
							</div>
							<div class="col-sm-6 text-right">
								{{$page_datas->angsuran_pokok}}
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								Cicilan Bunga :
							</div>
							<div class="col-sm-6 text-right">
								{{$page_datas->angsuran_bunga}}
							</div>
						</div>
						<hr/>

						<div class="row">
							<strong>
								<div class="col-sm-6">
									Angsuran per Bulan :
								</div>
								<div class="col-sm-6 text-right">
									{{$page_datas->angsuran}}
								</div>
							</strong>
						</div>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>
