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
		{!! Form::open(['url' => route('credit.store'), 'class' => 'form wizard', 'data-ajax-submit' => false]) !!}
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
				@include ('pages.credit.components.form.data_jaminan', [
					'param'	=> [
						'target'	=> 'template-jaminan-credit',
						'prefix'	=> 'credit',
						'class'		=> [
							'init_add'		=> 'init-add-one'
				]]])
			</section>

		{!! Form::close() !!}
	</div>
@endpush

@push('scripts')
@endpush