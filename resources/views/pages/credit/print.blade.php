@extends('template.print_template')
@push('content')
	<div class="row p-t-md-print m-b-lg-m-print">
		<div class="col-sm-12 text-right">
		  	<p class="visible-print-block m-b-md-m-print m-r-sm-print">Tgl. {{ date('d/m/Y') }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.print_rencana_kredit')
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>

	<!-- BLOCK 2 Display Data Rencana Kredit // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.print_data_pribadi')
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>

   <!-- 3 Data Kelurga // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.print_data_keluarga')
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>

   <!-- 4 Data Data Penjamin // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.print_data_penjamin')
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>

   <!-- BLOCK 5 Data Jaminan // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.print_data_jaminan')
		</div>
	</div>
	
	<div class="clearfix visible-print-block m-t-xl-print m-b-xl-print">&nbsp;</div>
	<div class="clearfix visible-print-block m-t-xl-print m-b-xl-print">&nbsp;</div>

	<div class="row visible-print-block p-t-xl-print">
		<div class="col-sm-12">
			<ul class="list-inline text-center">
				<li class="text-center p-l-sm-print p-r-sm-print m-l-sm-print m-r-sm-print">
					<p>_____________________</p>
					<p>Marketing</p>
				</li>
				<li class="text-center p-l-sm-print p-r-sm-print m-l-sm-print m-r-sm-print">
					<p>_____________________</p>
					<p>Adm. Kredit</p>
				</li>
				<li class="text-center p-l-sm-print p-r-sm-print m-l-sm-print m-r-sm-print">
					<p>_____________________</p>
					<p>Penjamin</p>
				</li>
				<li class="text-center p-l-sm-print p-r-sm-print m-l-sm-print m-r-sm-print">
					<p>_____________________</p>
					<p>Keluarga Pemohon</p>
				</li>
				<li class="text-center p-l-sm-print p-r-sm-print m-l-sm-print m-r-sm-print">
					<p>_____________________</p>
					<p>Pemohon</p>
				</li>
			</ul>
		</div>
	</div>
@endpush