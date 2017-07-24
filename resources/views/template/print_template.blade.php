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
	<div class="print-mask">&nbsp;</div>
@endsection

@section('template-styles')
	body{ background-color: #fff; }
	.header { font-size: 16px !important; }
	.title { font-size: 14px !important; }
	.text { font-size: 1em !important; }
@endsection