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
				<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
					<p class="text-muted p-t-sm text-lg">
						<span class="p-r-xs"><i class="fa fa-building"></i> {{ $page_datas->data['nama'] }}</span>
					</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
					<a href="{{ route('koperasi.edit', ['id' => $page_datas->id]) }}" data-toggle="modal" data-target="" class="btn success p-r-sm p-l-sm">
						<i class="fa fa-pencil" aria-hidden="true"></i> Edit Koperasi
					</a>				
					<a href="#" data-url="{{ route('koperasi.destroy',['id' => $page_datas->id]) }}" data-toggle="modal" data-target="#modal-delete" class="btn p-r-none p-l-sm danger">
						<i class="fa fa-trash" aria-hidden="true"></i> Hapus Koperasi
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
											<div class="gllpMap">
												Loading Google Maps
												<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
											</div>
												<input type="hidden" class="gllpLatitude" value="{{ $page_datas->data['latitude'] == '' ? 0 : $page_datas->data['latitude']}}"/>
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
						<div style="border-bottom: 1px solid #e6e8e6;">

							<div data-panel="data-index">
								<h4 class="text-uppercase">Data Pengguna
									<span class="pull-right text-capitalize">
										<small>
										<a href="#" data-toggle="hidden" data-target="create" data-panel="data-index" no-data-pjax>
											<i class="fa fa-plus" aria-hidden="true"></i>
											Tambah Baru
										</a>
										</small>
									</span>
								</h4>
							</div>

							<div class="hidden" data-form="create">
								<h4 class="text-uppercase">Tambah Pengguna</h4>
							</div>

							@foreach($page_datas->users as $key => $value)
							<div class="hidden" data-form="edit_{{ $value['id'] }}">
								<h4 class="text-uppercase">Edit Pengguna {{ ucwords($value['pengguna']['nama']) }}</h4>
							</div>
							@endforeach

						</div>
					</div>
				</div>

				<div class="row _window p-t-md" data-padd-top="auto" data-padd-bottom="0">
					<div class="col-xs-12">

						<div data-panel="data-index">
							@include('pages.koperasi.components.panel.index')
						</div>

						<div data-form="create" class="hidden">
							@include('pages.koperasi.components.panel.create')
						</div>
						
						@include('pages.koperasi.components.panel.edit')

					</div>
				</div>

			</div>
		</div>

	</div>  
@endpush


@section('script-plugins')
	<script src="/js/jquery-2.1.1.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhGU-wSjC89hoHPStx7bYGOjHpULJQHGI&libraries=places"
	        async defer></script>	
	<script src="/js/jquery-gmaps-latlon-picker.js"></script>
@stop