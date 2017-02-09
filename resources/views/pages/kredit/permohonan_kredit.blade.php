@extends('template.cms_template')

@push('content')
	{!! Form::open(['url' => route('kredit.pengajuan.store'), 'class' => 'form']) !!}
		<div class="wizard">
			{{-- untuk data kredit --}}
			<h2>Data Kredit</h2>
			<section>
				@include ('pages.kredit.wizard.data_kredit')
			</section>
			<h2>Data Pribadi</h2>
			<section>
				@include ('pages.kredit.wizard.data_pribadi')
			</section>
			<h2>Data Penjamin</h2>
			<section>
				@include ('pages.kredit.wizard.data_penjamin')
			</section>
			<h2>Data Jaminan</h2>
			<section>
				@include ('pages.kredit.wizard.data_jaminan')
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
@endpush

@push('scripts')
	wizard('h2', 'section', '.wizard');
@endpush