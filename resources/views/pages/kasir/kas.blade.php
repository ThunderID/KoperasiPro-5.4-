@extends('pages.kasir.templates.index_show_template')

@section('page_content')
	@php
		// dd($page_datas);
	@endphp
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						Dokumen
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->kas['id']) && ($page_datas->kas['id']) != '0') ? str_replace('_', ' ', $page_datas->kas['tipe']) : '-' }}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						No. Transaksi
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->kas['id']) && !empty($page_datas->kas['id'])) ? $page_datas->kas['nomor_transaksi'] : '-' }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						Tanggal Jatuh Tempo
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->kas['id']) && !empty($page_datas->kas['id'])) ? $page_datas->kas['tanggal_jatuh_tempo'] : '-' }}
					</p>
				</div>
			</div>
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						Status
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->kas['id']) && !empty($page_datas->kas['id'])) ? $page_datas->kas['status'] : '-' }}
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