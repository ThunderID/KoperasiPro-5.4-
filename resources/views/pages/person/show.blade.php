@extends('template.cms_template')

@section('registrasi')
	active in
@stop

@section('data_orang')
	active
@stop

@push('content')
	<div class="row field">
		<div class="col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Orang',
					'status'			=> 	[],
					'status_default'	=> 'semua'
				]])
			</div>

			<div class="sidebar-content">
				@include('pages.person.helper.lists')
			</div>
		</div>

		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-12">
					<h3 style="margin-top: 5px">Alamat</h3>
					<hr/>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3">
					<h4><small>Jalan</small></h4>
				</div>
				<div class="col-sm-9">
					<h4>{{$page_datas->person->address->address->street}}</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3">
					<h4><small>Kota</small></h4>
				</div>
				<div class="col-sm-9">
					<h4>{{$page_datas->person->address->address->city}}</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3">
					<h4><small>Provinsi</small></h4>
				</div>
				<div class="col-sm-9">
					<h4>{{$page_datas->person->address->address->province}}</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3">
					<h4><small>Negara</small></h4>
				</div>
				<div class="col-sm-9">
					<h4>{{$page_datas->person->address->address->country}}</h4>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
		</div>
	</div>	
@endpush

@push('scripts')
@endpush
