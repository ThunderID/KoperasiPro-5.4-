@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kreditur
			@if (!empty($page_datas->credit['kreditur']))
				@if ($edit == true)
					<span class="pull-right">
						<small>
						<a href="#" data-toggle="hidden" data-target="kreditur" data-panel="data-kreditur" no-data-pjax>
							<i class="fa fa-pencil" aria-hidden="true"></i>
							 Edit
						</a>
						</small>
					</span>
				@endif
			@endif
		</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['kreditur']) && !empty($page_datas->credit['kreditur']))
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Nama</strong></p>
					<p>{{ !is_null($page_datas->credit['kreditur']['nama']) ? $page_datas->credit['kreditur']['nama'] : '-'  }}</p>
				</div>
			</div>
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Tanggal Lahir</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['tanggal_lahir'] }}
					</p>
				</div>
			</div>
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Jenis Kelamin</strong></p>
					<p>
						{{ ucwords($page_datas->credit['kreditur']['jenis_kelamin']) }}
					</p>
				</div>
			</div>	
		</div>
		@if (isset($page_datas->credit['kreditur']['foto_ktp']) && !is_null($page_datas->credit['kreditur']['foto_ktp']))
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<p class="p-b-sm"><strong>Foto KTP</strong></p>
						<img src="{{ $page_datas->credit['kreditur']['foto_ktp'] }}" class="img img-responsive img-panels img-thumbnail img-rounded"/>
					</div>
				</div>
			</div>
		@endif
	</div>

	<div class="row">
		<div class="col-sm-12">
			<h5 class="text-uppercase text-light">Kontak</h5>
		</div>
		<div class="col-sm-12">
			<div class="row m-b-xl m-t-xs-m-print">
				<div class="col-sm-12">
					@if (isset($page_datas->credit['kreditur']['telepon']))
						<p class="p-b-sm"><strong>Nomor Telepon</strong></p>
						<p>{{ $page_datas->credit['kreditur']['telepon'] }}</p>
					@else
						<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kontak" data-panel="data-kreditur" no-data-pjax> Tambahkan Sekarang </a></p>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<h5 class="text-uppercase text-light">Alamat</h5>
		</div>
		<div class="col-sm-12">
			<div class="row m-b-xl m-t-xs-m-print">
				<div class="col-sm-12">
					@if (!is_null($page_datas->credit['kreditur']['alamat']) && isset($page_datas->credit['kreditur']['alamat']))
						<p class="p-b-sm"><strong>Alamat</strong></p>
						<p class="p-b-xs">{{ $page_datas->credit['kreditur']['alamat'][0]['alamat'] }}, {{ $page_datas->credit['kreditur']['alamat'][0]['desa'] }}, {{ $page_datas->credit['kreditur']['alamat'][0]['distrik'] }}, {{ $page_datas->credit['kreditur']['alamat'][0]['regensi'] }}</p>
						<p class="p-b-xs">{{ $page_datas->credit['kreditur']['alamat'][0]['provinsi'] }} - {{ $page_datas->credit['kreditur']['alamat'][0]['negara'] }}</p>
						<div class="clearfix hidden-print">&nbsp;</div>
						{{-- <h5 class="hidden-print"><a href="#" data-toggle="modal" data-target="#" no-data-pjax data-href="{{route('person.index', ['id' => $page_datas->credit->creditor->id, 'status' => 'rumah'])}}">Lihat Alamat Lain</a></h5> --}}
					@else
						<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="alamat" data-panel="data-kreditur" no-data-pjax> Tambahkan Sekarang </a> Tambahkan Sekarang </a></p>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<h5 class="text-uppercase text-light">Pekerjaan</h5>
		</div>
		<div class="col-sm-12">
			@if (isset($page_datas->credit['kreditur']['pekerjaan']))
				<div class="row">
					<div class="col-sm-6">
						<div class="row m-b-xl m-t-xs-m-print">
							<div class="col-sm-12">
								<p class="p-b-sm"><strong>Jenis Pekerjaan</strong></p>
								<p>{{ ucwords(str_replace('_', ' ', $page_datas->credit['kreditur']['pekerjaan'])) }}</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row m-b-xl m-t-xs-m-print">
							<div class="col-sm-12">
								<p class="p-b-sm "><strong>Penghasilan Bersih</strong></p>
								<p>{{ $page_datas->credit['kreditur']['penghasilan_bersih'] }}</p>
							</div>
						</div>				
					</div>
				</div>
			@else
				<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="pekerjaan" data-panel="data-kreditur" no-data-pjax> Tambahkan Sekarang </a></p>
			@endif
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kreditur" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>