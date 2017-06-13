@extends('template.cms_template')

@section('pengaturan')
	active in
@stop

@section('koperasi')
	active
@stop

<?php
	// dd($page_datas);
?>

@push('content')
	<div class="row field">
		{{--
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
		--}}
		<div class="col-md-12 hidden-md hidden-lg" style="background-color: white; height: 37px; border-bottom: 1px solid #e6e8e6;">
			<div class="row">
				<div class="col-xs-12">
					<p class="text-muted p-t-sm ">
						<span class="p-r-xs"><i class="fa fa-building"></i> &nbsp; {{ $page_datas->data['nama'] }}</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-12 " style="background-color: white; height: 42px; border-bottom: 1px solid #e6e8e6;">
			<div class="row">
				<div class="col-xs-5 col-sm-6 hidden-md hidden-lg">
				</div>
				<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
					<p class="text-muted p-t-sm text-lg">
						<span class="p-r-xs"><i class="fa fa-building"></i> {{ $page_datas->data['nama'] }}</span>
					</p>
				</div>
				<div class="col-xs-7 col-sm-6 col-md-6 col-lg-6 text-right">
					<a href="#modal-change-status" data-toggle="modal" data-target="" class="btn success p-r-sm p-l-sm">
						<i class="fa fa-pencil" aria-hidden="true"></i> Edit
					</a>				
					<a href="#modal-tolak" data-toggle="modal" data-target="" class="btn p-r-none p-l-sm danger">
						<i class="fa fa-trash" aria-hidden="true"></i> Hapus
					</a>					
				</div>
			</div>
		</div>

		<div class="col-sm-3 col-xs-12 beranda">
			<div class="clearfix">&nbsp;</div>
			<div class="sidebar-header p-b-sm">
				<div class="panel panel-default" >
					<div class="panel-body" style="border-bottom: 1px solid #dedddd;">
						<h4>Informasi</h4>
					</div>
					<div class="panel-content">
						<div class="sidebar-content _window" data-padd-top="auto" data-padd-bottom="29">
							<div class="col-md-12">
								<div class="row p-t-lg">
									<div class="col-xs-12">
										<p class="text-capitalize text-light text-muted">Nama Koperasi</p>
									</div>
									<div class="col-xs-12">
										<p class="m-b-xs text-capitalize text-light">{{ $page_datas->data['nama'] == "" ? '_' : $page_datas->data['nama'] }}</p>
									</div>
								</div>
								<div class="row p-t-lg">
									<div class="col-xs-12">
										<p class="text-capitalize text-light text-muted">Nomor Telepon</p>
									</div>
									<div class="col-xs-12">
										<p class="m-b-xs text-capitalize text-light">{{ $page_datas->data['nomor_telepon'] == "" ? '_' : $page_datas->data['nomor_telepon'] }}</p>
									</div>
								</div>					
								<div class="row p-t-lg">
									<div class="col-xs-12">
										<p class="text-capitalize text-light text-muted">Alamat</p>
									</div>
									<div class="col-xs-12">
										<p class="m-b-xs text-capitalize text-light">{{ $page_datas->data['alamat'] == "" ? '_' : $page_datas->data['alamat'] }}</p>
									</div>
								</div>
								<div class="row p-t-lg">
									<div class="col-xs-12">
										<fieldset class="gllpLatlonPicker">
											<div class="gllpMap">Loading Google Maps</div>
												<input type="hidden" class="gllpLatitude" value="{{ $page_datas->data['latitidue'] == '' ? 0 : $page_datas->data['latitidue']}}"/>
												<input type="hidden" class="gllpLongitude" value="{{ $page_datas->data['longitude'] == '' ? 0 : $page_datas->data['longitude']}}"/>
												<input type="hidden" class="gllpZoom" value="14"/>
										</fieldset>		
									</div>
								</div>
								<div class="row clearfix">
									&nbsp;
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-9 p-l-none p-r-none">
			<div class="clearfix">&nbsp;</div>

			<div class="col-md-12 p-l-none"> 
				<div class="row">
					<div class="col-sm-12">
						<h4 class="text-uppercase">Data User
							<span class="pull-right text-capitalize">
								<small>
								<a href="#" data-toggle="" data-target="" data-panel="" no-data-pjax>
									<i class="fa fa-plus" aria-hidden="true"></i>
									Tambah Baru
								</a>
								</small>
							</span>
						</h4>
						<hr/>
					</div>
				</div>
				<div class="row _window" data-padd-top="auto" data-padd-bottom="0">
					
				</div>
			</div>

		</div>

		{{--
		<div class="col-xs-12 col-sm-12">
			@if(!isset($page_datas->id))
				<div class="row">
					<div class="col-md-12 text-center">
						<h4 style="margin-top: 21%">Belum Ada Data Dipilih</h4>
						<p class="p-b-md">Silahkan Terlebih Dahulu Memilih Data Kredit</p>
						<span class="glyphicon glyphicon-hand-left" style="font-size: 30px;"></span>
					</div>
				</div>
			@else
				<div class="row p-r-none p-b-none">
					<div class="col-md-12 hidden-md hidden-lg" style="background-color: white; height: 37px; border-bottom: 1px solid #e6e8e6;">
						<div class="row">
							<div class="col-xs-12">
								<p class="text-muted p-t-sm ">
									<span class="p-r-xs"><i class="fa fa-building"></i> &nbsp; {{ $page_datas->data['nama'] }}</span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-12 " style="background-color: white; height: 42px; border-bottom: 1px solid #e6e8e6;">
						<div class="row">
							<div class="col-xs-5 col-sm-6 hidden-md hidden-lg">
							</div>
							<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
								<p class="text-muted p-t-sm text-lg">
									<span class="p-r-xs"><i class="fa fa-building"></i> {{ $page_datas->data['nama'] }}</span>
								</p>
							</div>
							<div class="col-xs-7 col-sm-6 col-md-6 col-lg-6 text-right">
							</div>
						</div>
					</div>
				</div>
				<div class="row _window p-t-md" data-padd-top="auto" data-padd-bottom="0">
					<div class="col-md-12">
						<div class="row">
							<div class="col-sm-12">
								<h4 class="text-uppercase">Data Koperasi
									<span class="pull-right text-capitalize">
										<small>
										<a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" no-data-pjax>
											<i class="fa fa-pencil" aria-hidden="true"></i>
											 Edit
										</a>
										&nbsp; &nbsp;
										<a href="#" class="danger" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" no-data-pjax>
											<i class="fa fa-trash" aria-hidden="true"></i>
											 Hapus
										</a>										
										</small>
									</span>
								</h4>
								<hr/>
							</div>
						</div>					
						<div class="row p-t-lg">
							<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<p class="text-capitalize text-light">Nama Koperasi</p>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<p class="m-b-xs text-capitalize text-light">{{ $page_datas->data['nama'] == "" ? '_' : $page_datas->data['nama'] }}</p>
							</div>
						</div>
						<div class="row p-t-lg">
							<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<p class="text-capitalize text-light">Nomor Telepon</p>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<p class="m-b-xs text-capitalize text-light">{{ $page_datas->data['nomor_telepon'] == "" ? '_' : $page_datas->data['nomor_telepon'] }}</p>
							</div>
						</div>					
						<div class="row p-t-lg">
							<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<p class="text-capitalize text-light">Alamat</p>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<p class="m-b-xs text-capitalize text-light">{{ $page_datas->data['alamat'] == "" ? '_' : $page_datas->data['alamat'] }}</p>
							</div>
						</div>
						<div class="row p-t-lg">
							<div class="col-xs-12 col-sm-9 col-md-7 col-lg-7">
								<fieldset class="gllpLatlonPicker">
									<div class="gllpMap">Loading Google Maps</div>
										<input type="hidden" class="gllpLatitude" value="{{ $page_datas->data['latitidue'] == '' ? 0 : $page_datas->data['latitidue']}}"/>
										<input type="hidden" class="gllpLongitude" value="{{ $page_datas->data['longitude'] == '' ? 0 : $page_datas->data['longitude']}}"/>
										<input type="hidden" class="gllpZoom" value="14"/>
								</fieldset>		
							</div>
						</div>	
					</div>
				</div>
			@endif
		</div>
		--}}

	</div>  
@endpush

@push('modals')
	@yield('page_modals')
@endpush

@section('script-plugins')
	<script src="/js/jquery-2.1.1.min.js"></script>
	<script src="/js/jquery-gmaps-latlon-picker.js"></script>    	    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhGU-wSjC89hoHPStx7bYGOjHpULJQHGI&libraries=places&callback=initAutocomplete"
	        async defer></script>	
@stop