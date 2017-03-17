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
		{!! Form::open(['url' => route('credit.store'), 'class' => 'form wizard', 'data-ajax-submit' => true]) !!}
			{{-- untuk data kredit --}}
			<h3>Data Kredit</h3>
			<section>
				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">Data Kredit</h4>
				</div>

				@include ('pages.kredit.components.form.data_kredit')
			</section>
			<h3>Data Kreditur</h3>
			<section>
				<div class="m-t-none m-b-md p-b-md">
					<h4 class="m-t-none m-b-xs">Data Kreditur</h4>
				</div>

				@include ('pages.kredit.components.form.data_kreditur')
			</section>
			<h3>Data Pekerjaan</h3>
			<section>
				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">Data Pekerjaan</h4>
				</div>

				@include ('pages.kredit.components.form.data_pekerjaan')
			</section>
			<h3>Data Jaminan</h3>
			<section>
				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">Data Jaminan</h4>
				</div>
				
				@include ('pages.kredit.components.form.data_jaminan', [
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