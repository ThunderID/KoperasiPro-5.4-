@extends('pages.survey.templates.index_show_template')

@section('page_content')
	<div class="row">
		<div class="col-sm-12">
			<div class="p-content">
				<div class="page-header m-t-none m-b-xl p-b-xs">
					<h2 class="m-t-none m-b-xs">Survey Kredit</h2>
				</div>
				{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}
					{{-- untuk data kredit --}}

					<!-- BLOCK 1 Display Data Rencana Kredit // -->
					<h3>Data Kredit</h3>
					<section>
						@include('pages.credit.components.data_panels.rencana_kredit')
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
@stop