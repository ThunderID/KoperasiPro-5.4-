@extends('template.cms_template')

@section('registrasi')
	active in
@stop

@section('buku_alamat')
	active
@stop

@push('content')
	<div class="row field">
		<div class="col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Kreditur',
					'status'			=> 	['rumah','kantor'],
					'status_default'	=> 'semua'
				]])
			</div>

			<div class="sidebar-content">
				@include('pages.person.helper.lists')
			</div>
		</div>

		<div class="col-sm-9">
			@if(count($page_datas->address))
				@foreach($page_datas->address as $key => $value)
					<div class="row">
						<div class="col-sm-12">
							<h3 style="margin-top: 5px">Alamat {{$key+1}}</h3>
							<hr/>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3">
							<h4><small>Jalan</small></h4>
						</div>
						<div class="col-sm-9">
							<h4>{{$value->address->street}}</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3">
							<h4><small>Kota</small></h4>
						</div>
						<div class="col-sm-9">
							<h4>{{$value->address->city}}</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3">
							<h4><small>Provinsi</small></h4>
						</div>
						<div class="col-sm-9">
							<h4>{{$value->address->province}}</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3">
							<h4><small>Negara</small></h4>
						</div>
						<div class="col-sm-9">
							<h4>{{$value->address->country}}</h4>
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="clearfix">&nbsp;</div>
					<div class="clearfix">&nbsp;</div>
				@endforeach
			@endif
		</div>
	</div>	
@endpush

@push('scripts')
@endpush
