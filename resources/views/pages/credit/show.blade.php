@extends('pages.credit.templates.index_show_template')

@section('page_content')
	<!-- BLOCK 1 Display Data Rencana Kredit // -->
	<div class="row">
		<div class="col-sm-12">
		<?php
			// A ver.
		?>
			@include('pages.credit.components.data_panels.rencana_kredit')
		<?php
			// B ver.
			// @include('pages.credit.components.data_panels.[b]rencana_kredit')
		?>
		<?php
			// C ver.
			// @include('pages.credit.components.data_panels.[c]rencana_kredit')
		?>
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

	<!-- BLOCK 2 Display Data Rencana Kredit // -->
	<div class="row">
		<div class="col-sm-12">
		<?php
			// A ver.
		?>
			@include('pages.credit.components.data_panels.data_pribadi')
		<?php
			// B ver.
			// @include('pages.credit.components.data_panels.[b]data_pribadi')
		?>
		<?php
			// C ver.
			// @include('pages.credit.components.data_panels.[c]data_pribadi')
		?>
		</div>
	</div>

   <!-- 3 Data Kelurga // -->
	<div class="row">
		<div class="col-sm-12">
			<?php
				// A ver.
			?>
				@include('pages.credit.components.data_panels.data_keluarga')
			<?php
				// B ver.
				// @include('pages.credit.components.data_panels.[b]data_keluarga')
			?>
			<?php
				// C ver.
				// @include('pages.credit.components.data_panels.[c]data_keluarga')
			?>
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

   <!-- 4 Data Data Penjamin // -->
	<div class="row">
		<div class="col-sm-12">
			<?php
				// A ver.
			?>
				@include('pages.credit.components.data_panels.data_penjamin')
			<?php
				// B ver.
				// @include('pages.credit.components.data_panels.[b]data_penjamin')
			?>
			<?php
				// C ver.
				// @include('pages.credit.components.data_panels.[c]data_penjamin')
			?>
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

	<!-- BLOCK 5 & 6 Display Data Keuangan, Data Aset // -->
	<div class="row">
		<div class="col-sm-6">
			@if(isset($page_datas->credit->finance))
				@include('pages.credit.components.data_panels.data_keuangan')
			@endif
		</div>
		<div class="col-sm-6">
			@if(isset($page_datas->credit->asset))
				@include('pages.credit.components.data_panels.data_aset')
			@endif
		</div>
	</div>

   <!-- BLOCK 7 Data Kelurga, Data Penjamin // -->
	<div class="row">
		<div class="col-sm-12">
			<?php
				// A ver.
			?>
				@include('pages.credit.components.data_panels.data_jaminan')
			<?php
				// B ver.
				// @include('pages.credit.components.data_panels.[b]data_jaminan')
			?>
			<?php
				// C ver.
				// @include('pages.credit.components.data_panels.[c]data_jaminan')
			?>
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<!-- BLOCK 8 Action Button // -->
	<div class="row">
		<div class="col-sm-6 text-left">
			{{Form::open(['url' => route('credit.destroy', [$page_datas->credit->credit->id]), 'class' => 'form form-inline'])}}
				<button class="btn btn-danger">Tolak</button>
			{{Form::close()}}
		</div>
		<div class="col-sm-6 text-right">
			<a data-url="{{ route('credit.print', ['id' => $page_datas->credit->credit->id]) }}" data-id="" class="btn btn-success btn-print" >Print</a>
			<a class="btn btn-success" href="{{route('credit.propose', ['id' => $page_datas->credit->credit->id])}}">Ajukan</a>
			<a class="btn btn-success">Drafting</a>
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>
	<div class="print-page hide" data-print="false"></div>
@stop

@push('scripts')
	$('document').ready( function() {
		$('.btn-print').click( function() {
			url = $(this).data('url');
			printDiv(url);
		});

		function printDiv(url) {
			//page = location.href(url);
			//var mywindow = window.open("http://mlmarketing.ir/1/printtarget.php");
			//mywindow.document.write('<p>' + document.getElementById('news').innerHTML + '</p>');
			//newWindow.open('');
	

			newWindow = window.open(url, 'test', 'directories=no, titlebar=no, toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no');

			newWindow.document.write(newWindow.innertHtml());
			newWindow.print();
			newWindow.close();
			$('#print-page').addClass('hide');
			//window.open('/pageaddress.html','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=350');

		}
	});	
@endpush