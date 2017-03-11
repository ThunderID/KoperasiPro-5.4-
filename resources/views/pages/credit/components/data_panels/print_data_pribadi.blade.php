<div class="row m-t-md-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA PRIBADI</h4>
		<hr class="print"/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Nama</p>
			</div>
			<div class="col-sm-7">
				<p>{{ $page_datas->credit['kreditur']['nama'] }}</p>
			</div>
		</div>
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Jenis Kelamin</p>
			</div>
			<div class="col-sm-7">
				<p>@gender($page_datas->credit['kreditur']['nama'])</p>
			</div>
		</div>		
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Tanggal Lahir</p>
			</div>
			<div class="col-sm-7">
				<p>{{ Carbon\Carbon::parse($page_datas->credit['kreditur']['tanggal_lahir'])->format('d/m/Y') }}</p>
			</div>
		</div>	
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Tempat Lahir</p>
			</div>
			<div class="col-sm-7">
				<p>{{ $page_datas->credit['kreditur']['tempat_lahir'] }}</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Pendidikan Terakhir</p>
			</div>
			<div class="col-sm-7">
				<p>{{ $page_datas->credit['kreditur']['pendidikan_terakhir'] }}</p>
			</div>
		</div>
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Status Pernikahan</p>
			</div>
			<div class="col-sm-7">
				<p>@marital($page_datas->credit['kreditur']['status_perkawinan'])</p>
			</div>
		</div>			
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Agama</p>
			</div>
			<div class="col-sm-7">
				<p>{{ $page_datas->credit['kreditur']['agama'] }}</p>
			</div>
		</div>		
	</div>
</div>

<div class="clearfix hidden-print">&nbsp;</div>

@if (!is_null($page_datas->credit['kreditur']['kontak']))
<div class="row m-t-xs-print">
	<div class="col-sm-12">
		<p><strong>Kontak</strong></p>
	</div>
</div>
<div class="row m-t-xs-print">
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Nomor Telepon</p>
			</div>
			<div class="col-sm-7">
				@forelse($page_datas->credit['kreditur']['kontak'] as $key => $value)
					<p> {{ $value['telepon'] }}</p>
				@empty
					<p>Belum ada data disimpan.</p>
				@endforelse
			</div>
		</div>
	</div>
</div>
@endif

<div class="clearfix hidden-print">&nbsp;</div>

<div class="row m-t-xs-print">
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-5">
				<p>Alamat</p>
			</div>
			<div class="col-sm-7">
				<p class="m-b-xs-print">{{ $page_datas->credit['kreditur']['alamat'][0]['jalan'] }}, {{ $page_datas->credit['kreditur']['alamat'][0]['kota'] }}</p>
				<p class="m-b-xs-print">{{ $page_datas->credit['kreditur']['alamat'][0]['provinsi'] }} - {{ $page_datas->credit['kreditur']['alamat'][0]['negara'] }}</p>
				<p>{{ $page_datas->credit['kreditur']['alamat'][0]['kode_pos'] }}</p>
				<div class="clearfix hidden-print">&nbsp;</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix hidden-print">&nbsp;</div>

@if(!is_null($page_datas->credit['kreditur']['pekerjaan']))
	<div class="row m-t-xs-print">
		<div class="col-sm-12">
			<p><strong>Pekerjaan</strong></p>
		</div>
	</div>
	<div class="row">
		@forelse($page_datas->credit['kreditur']['pekerjaan'] as $key => $value)
			<div class="col-sm-6">
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-5">
						<p>Jenis Pekerjaan</p>
					</div>
					<div class="col-sm-7">
						<p>{{ $value['jenis'] }}</p>
					</div>
				</div>
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-5">
						<p>Posisi</p>
					</div>
					<div class="col-sm-7">
						<p>{{ $value['jabatan'] }}</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-5">
						<p>Sejak</p>
					</div>
					<div class="col-sm-7">
						<p>{{ Carbon\Carbon::parse($value['sejak'])->format('d/m/Y') }}</p>
					</div>
				</div>
			</div>
		@empty
			<div class="col-sm-6">
				<p>Belum ada data disimpan. </p>
			</div>
		@endforelse
	</div>
@endif