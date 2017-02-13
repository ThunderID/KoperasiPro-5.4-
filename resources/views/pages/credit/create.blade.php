@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('pengajuan_baru')
    active
@stop

@push('content')
	<div class="p-content">
		{!! Form::open(['url' => route('credit.store'), 'class' => 'form']) !!}
			<div class="page-header m-t-none m-b-xl p-b-xs">
				<h2 class="m-t-none m-b-xs">Pengajuan Baru</h2>
			</div>
			<div class="wizard">
				{{-- untuk data kredit --}}
				<h2>Data Kredit</h2>
				<section>
					@include ('pages.credit.wizard.data_kredit')
				</section>
				<h2>Data Pribadi</h2>
				<section>
					@include ('pages.credit.wizard.data_pribadi')
				</section>
				<h2>Data Penjamin</h2>
				<section>
					@include ('pages.credit.wizard.data_penjamin')
				</section>
				<h2>Data Jaminan</h2>
				<section>
					@include ('pages.credit.wizard.data_jaminan')
				</section>
			</div>
			{{-- koperasi --}}
			{!! Form::hidden('koperasi[kode]', 'ksu_tt') !!}
			{!! Form::hidden('koperasi[nama]', 'tanjung terang') !!}

			{{-- status --}}
			{!! Form::hidden('status[][status]', 'drafting') !!}
			{!! Form::hidden('status[][keterangan]', 'dalam proses drafting') !!}
			{!! Form::hidden('status[][tanggal]', 'today') !!}
			{!! Form::hidden('status[][petugas][nip]', '1234567890') !!}
			{!! Form::hidden('status[][petugas][nama]', 'Benedict Cumberbatch') !!}
		{!! Form::close() !!}
	</div>
@endpush

@push('scripts')
@endpush