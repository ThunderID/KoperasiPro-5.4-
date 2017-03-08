<?php
/*
	==============================================================
	Readme 
	==============================================================
	How to use?
	--------------------------------------------------------------
	Extend this template inside your blade page.
	example:
	@extends('template.cms_template')

	--------------------------------------------------------------
	Requirements
	--------------------------------------------------------------
	To use this layout, you need to  fulfill this following 
	required variable to get this layout working correctly, if not
	it will only display blank value.
	
	This list show required parameter which are encapsulated by
	$page_attributes variables. 

	1. Title
	Description : set value of the page title
	Type 		: String
	Format 		: Case sensitive. No any string operation, what 
				  you write is what you get. 

	2. Breadcrumb
	Description : set value of the breadcrumb
	Type 		: Array of breadcrumb
	Format 		: [
					Bread crumb label => Routing,
					Bread crumb label => Routing,
					and so on....
				  ] 

	--------------------------------------------------------------
	Stacks
	--------------------------------------------------------------
	1. modals
	Description: this where you can push your required modals you 
				 need from your page view.

	2. scripts
	Description: this where you can push your required scripts 
				 you need from your page view.		

	3. Content
	Description: here you can insert your html code of your 
				 content page				 		 

	==============================================================
*/
?>

@extends('layout.layout')

@section('template-styles')
	@stack('styles')
@endsection

@section('template')
	<!-- This for pjax fragment replacement -->
	<div id="pjax-container">

		<!-- Topbar -->
		@include('components.admin_topbar')

		<!-- Navigation -->
		@include('components.navigation')

		<!-- Content -->
		<div class="panel-workspace">
			<div class="panel-workspace-container">
				<?php
				// <div class="panel-workspace-header">
				// 	<h1 class="title">
				// 		{{ $page_attributes->title }}
				// 	</h1>
				// 	@include('components.breadcrumb')
				// </div>
				?>
				<div class="panel-workspace-content">
					@stack('content')
				</div>
			</div>
		</div>

		@stack('modals')

		@include('components.push_notification')

	<!-- End of pjax fragment replacement -->
	</div>
	{{-- modal change koperasi --}}
	@component('components.modal', [
			'id'			=> 'modal-change-koperasi',
			'title'			=> 'Pindah Koperasi',
			'settings'		=> [
				'hide_buttons'	=> true
			]
		])
		<div id="list-koperasi">
			<div class="form-group has-feedback">
				<input type="text" class="search form-control" placeholder="cari nama koperasi">
				<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
			</div>
			<ul class="list-group list">
				@foreach(TAuth::loggedUser()['visas'] as $key => $value)
					<li class="list-group-item">
						<a class="name" href="{{ route('office.activate', ['idx' => $value['office']['id']]) }}" ><i class="fa fa-building"></i>&nbsp;&nbsp; {{ $value['office']['name'] }}</a>
					</li>
				@endforeach
			</ul>
		</div>
		
		<div class="clearfix">&nbsp;</div>
		<div class="modal-footer" style="margin-left: -15px; margin-right: -15px;">
			<p class="text-left m-b-none">
				<span class="label label-primary">Aktif : &nbsp;&nbsp;&nbsp;<i class="fa fa-building"></i>&nbsp;&nbsp;{{ TAuth::activeOffice()['office']['name'] }}
				</span>
			</p>
		</div>
	@endcomponent

	{{-- modal confirmation logout --}}
	@component('components.modal', [
			'id'			=> 'modal-logout',
			'title'			=> 'Logout',
			'settings'		=> [
				'overrides'		=> [
					'action_ok'		=> [
						'title'			=> 'Logout Sekarang',
						'style'			=> 'danger',
						'link'			=> route('login.destroy')
					],
					'action_cancel'	=> [
						'title'			=> 'Batal',
						'style'			=> 'default',
					]
				]
			]
		])
		<p>Apakah anda ingin Logout ?</p>
		<div class="clearfix">&nbsp;</div>
	@endcomponent
@endsection

@section('template-scripts')
	@stack('scripts')
@endsection