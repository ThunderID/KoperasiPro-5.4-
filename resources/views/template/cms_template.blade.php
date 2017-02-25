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
			<div class="container-fluid">
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
		</div>

		@stack('modals')
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
		<fieldset class="form-group">
			<div class="row">
				<div class="col-md-12">
					{!! Form::text('search_koperasi', null, ['class' => 'form-control']) !!}
					<span class="form-control-feedback m-r-md" aria-hidden="true"><i class="fa fa-search"></i></span>
				</div>
				<div class="col-md-12">
					<ul class="p-l-none list-unstyled list-group">
						@foreach(App\Web\Services\TAuth::loggedUser()->accesses as $key => $value)
							<li class="list-group-item"><a href="{{ route('office.activate', ['idx' => $value->office->id]) }}"><i class="fa fa-building"></i>&nbsp;&nbsp; {{ $value->office->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</fieldset>
	    <div class="clearfix">&nbsp;</div>
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