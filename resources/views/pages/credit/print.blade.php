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

	<!-- BLOCK 5 & 6 Display Data Keuangan, Data Aset // -->
	<div class="row">
		<div class="col-sm-6">
			@if(isset($page_datas->credit->finance))
				@include('pages.credit.components.data_panels.print_data_keuangan')
			@endif
		</div>
		<div class="col-sm-6">
			@if(isset($page_datas->credit->asset))
				@include('pages.credit.components.data_panels.print_data_aset')
			@endif
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>

   <!-- BLOCK 7 Data Kelurga, Data Penjamin // -->
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
				<li class="text-center p-l-xl-print p-r-xl-print m-l-xl-print m-r-xl-print">
					<p>_____________________</p>
					<p>Marketing</p>
				</li>
				<li class="text-center p-l-xl-print p-r-xl-print m-l-xl-print m-r-xl-print">
					<p>_____________________</p>
					<p>Adm. Kredit</p>
				</li>
				<li class="text-center p-l-xl-print p-r-xl-print m-l-xl-print m-r-xl-print">
					<p>_____________________</p>
					<p>Penjamin</p>
				</li>
				<li class="text-center p-l-xl-print p-r-xl-print m-l-xl-print m-r-xl-print">
					<p>_____________________</p>
					<p>Keluarga Pemohon</p>
				</li>
				<li class="text-center p-l-xl-print p-r-xl-print m-l-xl-print m-r-xl-print">
					<p>_____________________</p>
					<p>Pemohon</p>
				</li>
			</ul>
		</div>
	</div>
@endpush