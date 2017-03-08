<div class="row m-t-sm-m-print">
	<div class="col-sm-12">
		<h4 class="text-uppercase m-b-sm-m-print">DATA KELUARGA
			@if((array)$page_datas->credit['kreditur']['relasi'])
				@if($edit == true)
					<span class="pull-right">
						<small>
							<a href="#data-aset" data-toggle="modal" data-target="#data_keluarga" no-data-pjax>
								<i class="fa fa-pencil" aria-hidden="true"></i>
								Edit
							</a>
						</small>
					</span>
				@endif
			@endif
		</h4>
		<hr/>
	</div>
</div>


@forelse ($page_datas->credit['kreditur']['relasi'] as $key => $value)
	<div class="row">
		<div class="col-sm-6">
			<div class="row m-b-xl m-t-xs-print">
				<div class="col-sm-12">
					<p class="p-b-sm m-b-xs-m-print"><strong>Nama</strong></p>
					<p>
						{{ $value['nama'] }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row m-b-xl m-t-xs-print">
				<div class="col-sm-12">
					<p class="p-b-sm m-b-xs-m-print"><strong>Hubungan</strong></p>
					<p>
						{{ $value['relasi'] }}
					</p>
				</div>
			</div>

		</div>
	</div>
	<div class="clearfix hidden-print">&nbsp;</div>
	<!-- <div class="row">
		<div class="col-sm-12">
			{{-- <h5><a class="hidden-print" href="{{route('address.index', ['id' => $value->id, 'status' => 'rumah'])}}">Lihat Alamat</a></h5> --}}
		</div>
	</div> -->
@empty
	<div class="row">
		<div class="col-sm-6">
			<div class="row m-b-xl m-t-xs-print">
				<div class="col-sm-12">
					<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#data_keluarga" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		</div>
	</div>
@endforelse


@push('show_modals')
	@if($edit == true)

		@component('components.modal', [
			'id' 		=> 'data_keluarga',
			'title'		=> 'Data Keluarga',
			'settings'	=> [
				'hide_buttons'	=> true
			]
		])
			@include('pages.credit.components.form.data_keluarga')
		@endcomponent

	@endif
@endpush