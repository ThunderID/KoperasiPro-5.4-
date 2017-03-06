@extends('pages.credit.templates.index_show_template')

@section('page_content')
	<!-- BLOCK 1 Display Data Rencana Kredit // -->
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
@stop

@push('scripts')
@endpush