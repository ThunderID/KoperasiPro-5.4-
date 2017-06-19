@extends('template.cms_template')

@section('kasir')
	active in
@stop

@push('content')
	<div class="row field">
		<div class="{{ (isset($page_datas->cash['id']) ? 'hidden-xs' : '') }} col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Kas',
					'status'			=> null,
					'status_default'	=> 'semua',
					'placeholder_input' => 'Cari',
				]])
			</div>
			<div class="sidebar-content _window" data-padd-top="auto" data-padd-bottom="39">
				<div class="list-group">
					@foreach($page_datas->cashes as $key => $value)
						<a href="
							@if (!empty($value['referensi_id']) && ($value['tipe'] == 'nota_realisasi'))
								{{ route('kasir.kas.show', array_merge(['id' => $value['id'], 'section' => 'realisasi'], Input::all())) }}
							@else
								{{ route('kasir.realisasi.show', array_merge(['id' => $value['id'], 'section' => 'kas'], Input::all())) }}
							@endif" class="list-group-item {{ $key == 0? 'first': '' }} {{ ((isset($page_datas->id) && $page_datas->id == $value['id']) ? 'active' : '') }}">
							@if (Route::is('kasir.kas.index'))
								<span class="pull-right">
									@if ($value['tipe'] == 'bukti_kas_keluar')
										<i class="fa fa-arrow-circle-o-up fa-lg text-danger"></i>
									@else
										<i class="fa fa-arrow-circle-o-down fa-lg text-primary"></i>
									@endif
								</span>
							@endif
							<h4 class="list-group-item-heading text-capitalize">
								{{ $value['nomor_transaksi'] }} - {{ str_replace('_', ' ', $value['details'][0]['deskripsi']) }}
							</h4>
							@if ($value['status'] == 'lunas')
								<p class="text-capitalize text-primary">{{ $value['status'] }}</p>
							@else
								<p class="text-capitalize">Jatuh Tempo {{ $value['tanggal_jatuh_tempo'] }}</p>
							@endif

								<p class="list-group-item-text p-t-xs">
						{{-- {{ $value['pengajuan_kredit'] }} --}}
						{{-- <span class="pull-right">{{$value['tanggal']}}</span> --}}
								</p>
						</a>
					@endforeach
				</div>
			</div>
			<div class="sidebar-footer">
				<div class="col-md-12 text-center">
					@include('components.custom_paginator',[
						'range' 	=> 5
					])
				</div>
			</div>			
		</div>
		<div class="col-xs-12 col-sm-9">
			@if (isset($page_datas->cash['id']))
				@if (!empty($page_datas->cash['referensi_id']) && ($page_datas->cash['tipe'] == 'nota_realisasi'))
					@include('pages.kasir.components.top_menu.realisasi_kredit')
				@else
					@include('pages.kasir.components.top_menu.kas')
				@endif
			@endif

			<div class="row _window" data-padd-top="auto" data-padd-bottom="39" style="padding:16px;overflow-y: auto;">
				@yield('page_content')
			</div>
		</div>
	</div>  
@endpush

@push('modals')
	@yield('page_modals')
@endpush