@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('pengajuan_baru')
    active
@stop

@push('content')
	<div class="p-content">
		<div class="page-header m-t-none m-b-xl p-b-xs">
			<h2 class="m-t-none m-b-xs">Pengajuan Baru</h2>
		</div>
		{!! Form::open(['url' => route('credit.store'), 'class' => 'form wizard']) !!}
			{{-- untuk data kredit --}}
			<h3>Data Kredit</h3>
			<section>
				@include ('pages.credit.components.form.data_kredit')
			</section>
			<h3>Data Pribadi</h3>
			<section>
				@include ('pages.credit.components.form.data_pribadi')
			</section>
			<h3>Data Pekerjaan</h3>
			<section>
				@include ('pages.credit.components.form.data_pekerjaan')
			</section>
			<h3>Data Jaminan</h3>
			<section>
				@include ('pages.credit.components.form.data_jaminan')
			</section>

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