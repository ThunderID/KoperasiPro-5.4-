@php 
$edit = false;
if (isset($page_datas->credit['kreditur']['relasi']) && !empty($page_datas->credit['kreditur']['relasi']))
{
	$edit = true;
}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Keluarga
			@if ($edit == true)
				<span class="pull-right">
					<small>
					<a class="text-capitalize" data-toggle="modal" data-target="#modal-data-keluarga" no-data-pjax>
						<i class="fa fa-pencil" aria-hidden="true"></i>
						 Edit
					</a>
					</small>
				</span>
			@endif
		</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['kreditur']['relasi']) && !empty($page_datas->credit['kreditur']['relasi']))
	@foreach ($page_datas->credit['kreditur']['relasi'] as $key => $value)
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
							{{ $value['hubungan'] }}
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
	@endforeach
@else
	<div class="row">
		<div class="col-sm-6">
			<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#modal-data-keluarga" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

@push('show_modals')
	{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'no-enter', 'method' => 'PUT']) !!}
		@component('components.modal', [
			'id' 		=> 'modal-data-keluarga',
			'title'		=> 'Data Keluarga',
			'settings'	=> [
				'modal_size'	=> 'modal-lg',
				'hide_buttons'	=> true
			]
		])
			@include('pages.kredit.components.form.keluarga')
		@endcomponent
	{!! Form::close() !!}
@endpush