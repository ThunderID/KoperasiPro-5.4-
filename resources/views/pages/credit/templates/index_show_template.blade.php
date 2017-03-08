@inject('cservice', 'Thunderlabid\Application\Services\CreditService')

@extends('template.cms_template')

@section('kredit')
	active in
@stop

@section('data_kredit')
	active
@stop

@push('content')
	<div class="row field">
		<div class="col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Kredit',
					'status'			=> 	$cservice->statusLists(),
					'status_default'	=> 'semua'
				]])
			</div>

			<div class="sidebar-content _window" data-padd-top="auto" data-padd-bottom="39">
				<div class="list-group">
				    @foreach($page_datas->credits as $key => $value)
				        <a href="{{route('credit.show', array_merge(['id' => $value['id']], Input::all()))}}" class="list-group-item {{$key == 0? 'first': ''}} {{((isset($page_datas->id) && $page_datas->id == $value['id']) ? 'active' : '')}} " >
				            <h4 class="list-group-item-heading">
				                {{$value['kreditur']['nama']}} 
				                <span class="badge pull-right">{{$value['status']}}</span>
				            </h4>
				            <p>{{$value['id']}}</p>
				            <p class="list-group-item-text p-t-xs">{{$value['pengajuan_kredit']}}</p>
				        </a>
				    @endforeach
				</div>
			</div>
			<div class="sidebar-footer">
				<div class="col-md-12 p-l-none text-center">
					@include('components.custom_paginator',[
						'range' 	=> 5
					])
				</div>
			</div>			
		</div>
		<div class="col-sm-9">
			@include('pages.credit.components.top_menu.pengajuan')

			<div class="row _window" data-padd-top="auto" data-padd-bottom="39" style="padding:16px;overflow-y: auto;">
					@yield('page_content')
			</div>

			@include('pages.credit.components.bottom_menu.pengajuan')
		</div>
	</div>  
@endpush

@push('modals')
	@yield('page_modals')
@endpush