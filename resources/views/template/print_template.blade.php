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
	.header { font-size: 18px !important; }
	.title { font-size: 17px !important; }
	.text { font-size: 16px !important; }
	.label-fa-icon { font-size: 17px !important; }
	.row-info { margin-top: 10px; margin-bottom: 10px; }
	.money { 
		float: right;
		bottom: 0px;
	}
	.string { 
		bottom: 0px;
	}
	.line-info { margin-right: 30px; border-bottom: 1px }
	.dot-line { margin-top: 2px; border-bottom: 2px dotted #bbb;  }
	.word-justify { 
		text-align: justify;
		text-justify: inter-word;
	}
@endsection