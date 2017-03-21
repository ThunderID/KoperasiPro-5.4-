<div class="row m-t-md-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA KREDITUR</h4>
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
				<p>{{ $page_datas->credit['kreditur']['tanggal_lahir'] }}</p>
			</div>
		</div>	
	</div>
</div>

<div class="clearfix hidden-print">&nbsp;</div>

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
				<p> {{ $page_datas->credit['kreditur']['telepon'] }}</p>
			</div>
		</div>
	</div>
</div>

<div class="clearfix hidden-print">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<h5 class="text-uppercase text-light">Alamat</h5>
	</div>
	<div class="col-sm-12">
		<div class="row m-b-xl m-t-xs-m-print">
			<div class="col-sm-12">
				@if (isset($page_datas->credit['kreditur']['alamat']))
					<p class="p-b-sm"><strong>Alamat</strong></p>
					<p class="p-b-xs">{{ $page_datas->credit['kreditur']['alamat']['jalan'] }}, {{ $page_datas->credit['kreditur']['alamat']['desa'] }}, {{ $page_datas->credit['kreditur']['alamat']['distrik'] }}, {{ $page_datas->credit['kreditur']['alamat']['regensi'] }}</p>
					<p class="p-b-xs">{{ $page_datas->credit['kreditur']['alamat']['provinsi'] }} - {{ $page_datas->credit['kreditur']['alamat']['negara'] }}</p>
					<div class="clearfix hidden-print">&nbsp;</div>
					{{-- <h5 class="hidden-print"><a href="#" data-toggle="modal" data-target="#" no-data-pjax data-href="{{route('person.index', ['id' => $page_datas->credit->creditor->id, 'status' => 'rumah'])}}">Lihat Alamat Lain</a></h5> --}}
				@endif
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