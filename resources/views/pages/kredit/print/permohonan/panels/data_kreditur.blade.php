	<div class="row">
		<div class="col-sm-12">
			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Nomor KTP</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $page_datas->credit['kreditur']['nik'] }}</p>
				</div>
			</div>

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Nama</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $page_datas->credit['kreditur']['nama'] }}</p>
				</div>
			</div>

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Tanggal Lahir</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $page_datas->credit['kreditur']['tanggal_lahir'] }}</p>
				</div>
			</div>

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Jenis Kelamin</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $page_datas->credit['kreditur']['jenis_kelamin'] }}</p>
				</div>
			</div>
		</div>
	</div>

	@foreach((array)$page_datas->credit['kreditur']['alamat'] as $key => $value)
	<div class="row">
		<div class="col-sm-12">
			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Alamat</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $value['alamat'] }}</p>
				</div>
			</div>
			
			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-2 col-sm-offset-3">
					RT
				</div>
				<div class="col-sm-1">
					{{$value['rt']}}
				</div>
				<div class="col-sm-2">
					RW
				</div>
				<div class="col-sm-1">
					{{$value['rt']}}
				</div>
			</div>
			
			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-2 col-sm-offset-3">
					Desa/Kel
				</div>
				<div class="col-sm-10">
					{{$value['desa']}}
				</div>
			</div>

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-2 col-sm-offset-3">
					Kec
				</div>
				<div class="col-sm-10">
					{{$value['distrik']}}
				</div>
			</div>

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-2 col-sm-offset-3">
					Kota/Kab
				</div>
				<div class="col-sm-10">
					{{$value['regensi']}}
				</div>
			</div>

		</div>
	</div>
	@endforeach

	<div class="row">
		<div class="col-sm-12">
			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Telepon</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $page_datas->credit['kreditur']['telepon'] }}</p>
				</div>
			</div>

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Status</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $page_datas->credit['kreditur']['status_perkawinan'] }}</p>
				</div>
			</div>

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Pekerjaan</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $page_datas->credit['kreditur']['pekerjaan'] }}</p>
				</div>
			</div>

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-3">
					<p>Penghasilan Bersih</p>
				</div>
				<div class="col-sm-9">
					<p>{{ $page_datas->credit['kreditur']['penghasilan_bersih'] }}</p>
				</div>
			</div>
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>