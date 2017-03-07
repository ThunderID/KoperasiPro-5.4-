<?php
/*
	==============================================================
	Readme 
	==============================================================
	How to use?
	--------------------------------------------------------------
	Extend this template inside your blade page.
	example:
	@extends('template.print_template')

	--------------------------------------------------------------
	Stacks
	--------------------------------------------------------------
	1. Content
	Description: here you can insert your html code of your 
				 content page				 		 

	==============================================================
*/
?>

@extends('layout.layout')

@section('template')
	<div class="container print-area">
		@stack('content')
	</div>
@endsection

@section('template-styles')
	body{ background-color: #fff; }
@endsection