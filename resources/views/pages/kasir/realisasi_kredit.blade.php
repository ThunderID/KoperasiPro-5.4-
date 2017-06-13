@extends('pages.kasir.templates.index_show_template')

@section('realisasi_kredit')
	active
@stop

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
						{{ (isset($page_datas->kas['orang_id']) && ($page_datas->kas['orang_id']) != '0') ? $page_datas->kas['orang']['nama'] : '-' }}
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
						{{-- {{ (isset($page_datas->kas['details']) && !empty($page_datas->kas['details'])) ? $page_datas->kas['details'][0]['harga_satuan'] : '-' }} --}}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Jaminan
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
						Nominal
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->kas['details']) && !empty($page_datas->kas['details'])) ? $page_datas->kas['details'][0]['harga_satuan'] : '-' }}
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
						{{-- {{ (isset($page_datas->kas['details']) && !empty($page_datas->kas['details'])) ? $page_datas->kas['details'][0]['harga_satuan'] : '-' }} --}}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Angsuran /Bulan
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{-- {{ (isset($page_datas->kas['details']) && !empty($page_datas->kas['details'])) ? $page_datas->kas['details'][0]['harga_satuan'] : '-' }} --}}
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
						Usaha
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
						Jenis Pinjaman
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
						Nama AO
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
						Suku Bunga
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
						Setiap Tanggal
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{-- {{ (isset($page_datas->kas['details']) && !empty($page_datas->kas['details'])) ? $page_datas->kas['details'][0]['harga_satuan'] : '-' }} --}}
					</p>
				</div>
			</div>
		</div>
	</div>
@stop

@section('page_modals')
	@stack('show_modals')
@append

@section('page_scripts')
@append