<div class="row p-r-none p-b-none">
	<div class="col-md-12 hidden-md hidden-lg" style="background-color: white; height: 37px;  border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-12">
				<p class="text-muted p-t-sm">
					<span class="p-r-xs"><i class="fa fa-id-card-o"></i> &nbsp; {{ $page_datas->credit['debitur']['nama'] }}</span>-<span class="p-l-xs">{{ $page_datas->credit['debitur']['nik'] }}</span>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 " style="background-color: white; height: 42px; border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-5 col-sm-6  hidden-md hidden-lg">
				<a href="{{ route('credit.index') }}" class="btn primary p-r-sm p-l-none">
					<i class="fa fa-chevron-left"></i> Kembali
				</a>
			</div>
			<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
				<p class="text-muted text-lg p-t-sm">
					<i class="fa fa-id-card-o"></i> {{ $page_datas->credit['debitur']['nama'] }} | {{ $page_datas->credit['debitur']['nik'] }}
				</p>
			</div>
			<div class="col-xs-7 col-sm-6 col-md-6 col-lg-6 text-right">
				<!-- <a href="#" data-toggle="modal" data-target="#modal-riwayat-note" class="btn p-r-sm p-l-sm">
					<i class="fa fa-info-circle"></i> Riwayat Note
				</a> -->
				<p class="p-r-sm p-t-sm p-l-sm text-danger">
					Ditolak
				</p>
			</div>
		</div>
	</div>
</div>

@section('page_modals')
	@component('components.modal', [
			'id'			=> 'modal-riwayat-note',
			'title'			=> 'Riwayat Note',
			'settings'		=> [
				'hide_buttons'	=> true
			]
		])
		<div class="row">
			<div class="col-md-12">
				<div class="form-group text-right">
					<a type="button" class="btn btn-default" data-dismiss="modal" no-data-pjax="">
						Tutup
					</a>
				</div>
			</div>
		</div>
	@endcomponent
@append