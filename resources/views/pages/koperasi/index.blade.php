@extends('template.cms_template')

@section('pengaturan')
	active in
@stop

@section('koperasi')
	active
@stop

@push('content')
	<div class="row field">
		<div class="{{ (isset($page_datas->id) ? 'hidden-xs' : '') }} col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Koperasi',
					'status'			=> 	['semua' => 'semua'],
					'status_default'	=> 'semua'
				]])
			</div>

			<div class="sidebar-content _window" data-padd-top="auto" data-padd-bottom="39">
				<div class="list-group">
				    @foreach($page_datas->koperasi as $key => $value)
				        <a href="{{ route('koperasi.show', array_merge(['id' => $value['id']], Input::all())) }}" class="list-group-item {{ $key == 0? 'first': '' }} {{ ((isset($page_datas->id) && $page_datas->id == $value['id']) ? 'active' : '') }}">
				            <h4 class="list-group-item-heading">
				                {{ $value['nama'] }} 
				            </h4>
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
			@if(!isset($page_datas->id))
				<div class="row">
					<div class="col-md-12 text-center">
						<h4 style="margin-top: 21%">Belum Ada Data Dipilih</h4>
						<p class="p-b-md">Silahkan Terlebih Dahulu Memilih Data Kredit</p>
						<span class="glyphicon glyphicon-hand-left" style="font-size: 30px;"></span>
					</div>
				</div>
			@else
				<div class="row">
					<div class="col-md-12 text-center">
						<h4 style="margin-top: 21%">{{$page_datas->data['nama']}}</h4>
					</div>
				</div>
			@endif
		</div>
	</div>  
@endpush

@push('modals')
	@yield('page_modals')
@endpush