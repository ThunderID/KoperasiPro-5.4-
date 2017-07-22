@php
// dd($page_datas->credit);

@endphp
@extends('template.print_template')
@push('content')
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center"  style="padding-left: 10px; padding-right: 10px;">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Form Survei Jaminan Tanah &amp; bangunan</h4>
		</div>
	</div>
	@include('pages.kredit.print.components.jaminan_tanah_bangunan', [
		'datas' => $page_datas->credit['jaminan_tanah_bangunan']
	])
	<div class="clearfix">&nbsp;</div>
@endpush