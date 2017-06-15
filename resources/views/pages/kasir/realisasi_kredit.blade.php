@extends('pages.kasir.templates.index_show_template')

@section('realisasi_kredit')
	active
@stop

@php
	// dd($page_datas);
@endphp

@section('page_content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Nama
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->cash['orang_id']) && ($page_datas->cash['orang_id']) != '0') ? $page_datas->cash['orang']['nama'] : '-' }}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Alamat
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{-- {{ (isset($page_datas->cash['details']) && !empty($page_datas->cash['details'])) ? $page_datas->cash['details']['alamat'] : '-' }} --}}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Pekerjaan 
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->cash['orang']) && !empty($page_datas->cash['orang'])) ? $page_datas->cash['orang']['pekerjaan'] : '-' }}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Jangka Waktu
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->cash['pengajuan']) && !empty($page_datas->cash['pengajuan'])) ? $page_datas->cash['pengajuan']['jangka_waktu'] : '-' }} Bulan
					</p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						No. SPK
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{-- {{ (isset($page_datas->kas['details']) && !empty($page_datas->kas['details'])) ? $page_datas->kas['details'][0]['harga_satuan'] : '-' }} --}}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Nominal Pinjaman
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->cash['referensi']) && !empty($page_datas->cash['referensi'])) ? $page_datas->cash['referensi']['pengajuan_kredit'] : '-' }}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Jenis Pinjaman
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						@if (isset($page_datas->cash['pengajuan']) && !empty($page_datas->cash['pengajuan']))
							@php
								switch ($page_datas->cash['pengajuan']['jenis_kredit']) {
									case 'pa':
										$jenis_pinjaman = 'angsuran';
										break;
									case 'pt':
										$jenis_pinjaman = 'musiman';
										break;
									case 'rumah_delta':
										$jenis_pinjaman = 'rumah delta';
										break;
									default:
										$jenis_pinjaman = str_replace('_', ' ', $page_datas->cash['pengajuan']['jenis_kredit']);
										break;
								}
							@endphp
							{{ $jenis_pinjaman }}
						@endif
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Nama AO
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{-- {{ (isset($page_datas->cash['referensi']) && !empty($page_datas->cash['referensi'])) ? $page_datas->cash['referensi'][0]['harga_satuan'] : '-' }} --}}
					</p>
				</div>
			</div>
			{{-- <div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Suku Bunga
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->kas['details']) && !empty($page_datas->kas['details'])) ? $page_datas->kas['details'][0]['harga_satuan'] : '-' }}
					</p>
				</div>
			</div> --}}
			{{-- <div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Setiap Tanggal
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->kas['details']) && !empty($page_datas->kas['details'])) ? $page_datas->kas['details'][0]['harga_satuan'] : '-' }}
					</p>
				</div>
			</div> --}}
		</div>
	</div>
@stop

@section('page_modals')
	@stack('show_modals')
@append

@section('page_scripts')
@append