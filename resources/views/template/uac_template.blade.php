<?php
/*
	==============================================================
	Readme 
	==============================================================
	How to use?
	--------------------------------------------------------------
	Extend this template inside your blade page.
	example:
	@extends('template.uac_template')

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

@section('template')
	<section id="uac">
		<div class="container">
			@stack('content')
		</div>

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p>KoperasiPro © - 2017</p>
						<p>Powered by <strong><a href="#" no-data-pjax>Thunderlab.id</a></strong></p>
					</div>
				</div>
			</div>
		</footer>	
	</section>
@endsection

@section('template-modals')
	@stack('modals')
@endsection

@section('template-scripts')
	@stack('scripts')
@endsection

