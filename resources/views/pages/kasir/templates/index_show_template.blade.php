@extends('template.cms_template')

@section('kasir')
	active in
@stop

@section(Route::is('kasir.kas.index') ? 'kas' : 'realisasi_kredit')
	active
@stop
@php
	// dd($page_datas);
@endphp
@push('content')
	<div class="row field">
		<div class="{{ (isset($page_datas->kas['id']) ? 'hidden-xs' : '') }} col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				{{-- @include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Kredit',
					'status'			=> null,
					'status_default'	=> 'semua'
				]]) --}}
			</div>

			<div class="sidebar-content _window" data-padd-top="auto" data-padd-bottom="39">
				<div class="list-group">
				    @foreach($page_datas->kas as $key => $value)
				        <a href="{{ route('kasir.kas.show', array_merge(['id' => $value['id']], Input::all())) }}" class="list-group-item {{ $key == 0? 'first': '' }} {{ ((isset($page_datas->id) && $page_datas->id == $value['id']) ? 'active' : '') }}">
							{{-- <span class="badge badge-state pull-right" style="background-color:{{ $color_switcher[$value['status']] }};">
								{{ str_replace('_', ' ', $value['status']) }}
							</span> --}}
				            <h4 class="list-group-item-heading text-capitalize">
							{{ $value['nomor_transaksi'] }} - {{ str_replace('_', ' ', $value['tipe']) }}
				            </h4>
				            <p>Jatuh Tempo {{ $value['tanggal_jatuh_tempo'] }}</p>
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
			<div class="row _window" data-padd-top="auto" data-padd-bottom="39" style="padding:16px;overflow-y: auto;">
				@yield('page_content')
			</div>
		</div>
	</div>  
@endpush

@push('modals')
	@yield('page_modals')
@endpush