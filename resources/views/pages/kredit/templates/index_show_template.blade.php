@php
	$color_switcher 	= [
			'survei' 				=> '#FCA985',
			'tolak' 				=> '#e74c3c',
			'menunggu_persetujuan' 	=> '#9966cc',
			'menunggu_realisasi' 	=> '#6666cc',
			'realisasi' 			=> '#48B5A3',
			'lunas' 				=> '#000',
			'pengajuan'				=> '#0BB7D6',
	];
@endphp
@inject('cservice', 'App\Service\Helpers\ACL\KewenanganKredit')

@extends('template.cms_template')

@section('kredit')
	active in
@stop

@section('data_kredit')
	active
@stop

@push('content')
	<div class="row field">
		<div class="{{ (isset($page_datas->credit['debitur']['id']) ? 'hidden-xs' : '') }} col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Kredit',
					'status'			=> 	$cservice::statusLists($acl_active_office['role']),
					'status_default'	=> 'semua'
				]])
			</div>
			<div class="sidebar-content _window" data-padd-top="auto" data-padd-bottom="39">
				<div class="list-group">
					@foreach($page_datas->credits as $key => $value)
						<a href="{{ route('credit.show', array_merge(['id' => $value['id']], Input::all())) }}" class="list-group-item {{ $key == 0? 'first': '' }} {{ ((isset($page_datas->id) && $page_datas->id == $value['id']) ? 'active' : '') }}">
							<span class="badge badge-state pull-right" style="background-color:{{ $color_switcher[$value['status']] }};">
								{{ str_replace('_', ' ', $value['status']) }}
							</span>
				            <h4 class="list-group-item-heading">
				                {{ $value['debitur']['nama'] }} 
				            </h4>
				            <p>{{$value['nomor_kredit']}}</p>
				            <p class="list-group-item-text p-t-xs">
				            	{{ $value['pengajuan_kredit'] }}
				                <span class="pull-right">{{$value['tanggal']}}</span>
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

			@if (isset($page_datas->credit['debitur']['id']))
				@if ($page_datas->credit['status'] == 'pengajuan')
					@include('pages.kredit.components.top_menu.pengajuan')
				@elseif ($page_datas->credit['status'] == 'survei')
					@include('pages.kredit.components.top_menu.survei')
				@elseif ($page_datas->credit['status'] == 'menunggu_persetujuan')
					@include('pages.kredit.components.top_menu.menunggu_persetujuan')
				@elseif ($page_datas->credit['status'] == 'menunggu_realisasi')
					@include('pages.kredit.components.top_menu.menunggu_realisasi')
				@elseif ($page_datas->credit['status'] == 'realisasi')
					@include('pages.kredit.components.top_menu.terealisasi')
				@elseif ($page_datas->credit['status'] == 'lunas')
					@include('pages.kredit.components.top_menu.lunas')
				@else
					@include('pages.kredit.components.top_menu.tolak')
				@endif
			@endif

			<div class="row _window" data-padd-top="auto" data-padd-bottom="39" style="padding:16px;overflow-y: auto;">
				@yield('page_content')
			</div>

			@if (isset($page_datas->credit['debitur']['id']))
				@if ($page_datas->credit['status'] == 'pengajuan')
					@include('pages.kredit.components.bottom_menu.pengajuan')
				@elseif ($page_datas->credit['status'] == 'survei')
					@include('pages.kredit.components.bottom_menu.survei')
				@elseif ($page_datas->credit['status'] == 'menunggu_persetujuan')
					@include('pages.kredit.components.bottom_menu.menunggu_persetujuan')
				@elseif ($page_datas->credit['status'] == 'menunggu_realisasi')
					@include('pages.kredit.components.bottom_menu.menunggu_realisasi')
				@elseif ($page_datas->credit['status'] == 'realisasi')
					@include('pages.kredit.components.bottom_menu.terealisasi')
				@elseif ($page_datas->credit['status'] == 'lunas')
					@include('pages.kredit.components.bottom_menu.lunas')
				@else
					@include('pages.kredit.components.bottom_menu.'.$page_datas->credit['status_sebelumnya'])
				@endif
			@endif
				
		</div>
	</div>  
@endpush

@push('modals')
	@yield('page_modals')
@endpush