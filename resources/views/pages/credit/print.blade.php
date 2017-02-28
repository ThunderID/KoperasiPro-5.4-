@extends('template.print_template')
@push('content')
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.rencana_kredit')
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

	<!-- BLOCK 2 Display Data Rencana Kredit // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.data_pribadi')
		</div>
	</div>

   <!-- 3 Data Kelurga // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.data_keluarga')
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

   <!-- 4 Data Data Penjamin // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.credit.components.data_panels.data_penjamin')
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
			@include('pages.credit.components.data_panels.data_jaminan')
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<ul class="list-inline text-center">
				<li class="text-center">
					<p>_____________________</p>
					<p>Marketing</p>
				</li>
				<li class="text-center p-l-xl">
					<p>_____________________</p>
					<p>Adm. Kredit</p>
				</li>
				<li class="text-center p-l-xl">
					<p>_____________________</p>
					<p>Penjamin</p>
				</li>
				<li class="text-center p-l-xl">
					<p>_____________________</p>
					<p>Keluarga Pemohon</p>
				</li>
				<li class="text-center p-l-xl">
					<p>_____________________</p>
					<p>Pemohon</p>
				</li>
			</ul>
		</div>
	</div>
@endpush