
@extends('pages.kredit.templates.index_show_template')

@section('page_content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="data-kredit" role="tabpanel">
					@include ('pages.kredit.components.panel.pengajuan.panel_kredit')
				</div>
				<div class="tab-pane fade" id="data-nasabah" role="tabpanel">
					@include ('pages.kredit.components.panel.pengajuan.panel_nasabah')
				</div>
				<div class="tab-pane fade" id="data-keluarga" role="tabpanel">
					@include ('pages.kredit.components.panel.pengajuan.panel_keluarga')
				</div>
				<div class="tab-pane fade" id="data-jaminan" role="tabpanel">
					@include ('pages.kredit.components.panel.pengajuan.panel_jaminan')
				</div>
			</div>
		</div>
	</div>
@stop

@section('page_modals')
	@stack('show_modals')
@append