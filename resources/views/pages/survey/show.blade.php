@extends('template.cms_template')

@section('kredit')
	active in
@stop

@section('survey_kredit')
	active
@stop

@push('content')
	<div class="row field">
		<div class="col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Kredit',
					'status'			=> 	[],
					'status_default'	=> 'analyzing'
				]])
			</div>

			<div class="sidebar-content">
				@include('pages.credit.helper.lists', ['param' => 'survey.show'])
			</div>
		</div>
		<div class="col-sm-9">
			<div class="p-content">
				<div class="page-header m-t-none m-b-xl p-b-xs">
					<h2 class="m-t-none m-b-xs">Survey Kredit</h2>
				</div>
				{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}
					{{-- untuk data kredit --}}

					<!-- BLOCK 1 Display Data Rencana Kredit // -->
					<h3>Data Kredit</h3>
					<section>
						@include('pages.credit.show.rencana_kredit')
					</section>

					<!-- BLOCK 2 Display Data Kepribadian // -->
					<h3>Data Kepribadian</h3>
					<section>
						@include('pages.survey.form.data_kepribadian')
					</section>

					<!-- BLOCK 3 Display Ekonomi Makro // -->
					<h3>Data Ekonomi Makro</h3>
					<section>
						@include('pages.survey.form.eco_macro')
					</section>

					<!-- BLOCK 4 Display Data Usaha // -->
					<h3>Data Usaha</h3>
					<section>
						@include('pages.survey.form.data_aset')
					</section>

					<!-- BLOCK 5 Display Data Keuangan // -->
					<h3>Data Keuangan</h3>
					<section>
						@include('pages.survey.form.data_keuangan')
					</section>

					<!-- BLOCK 6 Display Data Jaminan // -->
					<h3>Data Jaminan</h3>
					<section>
						@include('pages.survey.form.data_jaminan')
					</section>

					<!-- BLOCK 7 action // -->
					<button type="submit">TEST</button>

				{!! Form::close() !!}
			</div>
		</div>
	</div>	
@endpush

@push('scripts')
@endpush
