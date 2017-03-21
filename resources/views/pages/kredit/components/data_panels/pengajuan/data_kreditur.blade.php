{{-- Check apakah sudah ada data apa belum, agar bisa di edit --}}
@php 
$edit = false;

if (isset($page_datas->credit['kreditur']) && !empty($page_datas->credit['kreditur']))
{
	$edit = true;
}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kreditur
			@if ($edit == true)
				<span class="pull-right">
					<small>
						<a class="text-capitalize" href="#" data-toggle="modal" data-target="#modal-data-kreditur" no-data-pjax>
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

@if (isset($page_datas->credit['kreditur']) && !empty($page_datas->credit['kreditur']))
	<div class="row">
		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Nama</strong></p>
					<p>{{ $page_datas->credit['kreditur']['nama'] }}</p>
				</div>
			</div>
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Tanggal Lahir</strong></p>
					<p>
						{{ Carbon\Carbon::parse($page_datas->credit['kreditur']['tanggal_lahir'])->format('d/m/Y') }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Jenis Kelamin</strong></p>
					<p>
						{{ ucwords($page_datas->credit['kreditur']['jenis_kelamin']) }}
					</p>
				</div>
			</div>	
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>

	<div class="row">
		<div class="col-sm-12">
			<h5 class="text-uppercase text-light">Kontak</h5>
		</div>
		<div class="col-sm-12">
			<div class="row m-b-xl m-t-xs-m-print">
				<div class="col-sm-12">
					@if (isset($page_datas->credit['kreditur']['telepon']))
						<p class="p-b-sm"><strong>Nomor Telepon</strong></p>
						<p>{{ $page_datas->credit['kreditur']['telepon'] }}</p>
					@else
						<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#" no-data-pjax> Tambahkan Sekarang </a></p>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>

	<div class="row">
		<div class="col-sm-12">
			<h5 class="text-uppercase text-light">Alamat</h5>
		</div>
		<div class="col-sm-12">
			<div class="row m-b-xl m-t-xs-m-print">
				<div class="col-sm-12">
					@if (isset($page_datas->credit['kreditur']['alamat']))
						<p class="p-b-sm"><strong>Alamat</strong></p>
						<p class="p-b-xs">{{ $page_datas->credit['kreditur']['alamat']['jalan'] }}, {{ $page_datas->credit['kreditur']['alamat']['desa'] }}, {{ $page_datas->credit['kreditur']['alamat']['distrik'] }}, {{ $page_datas->credit['kreditur']['alamat']['regensi'] }}</p>
						<p class="p-b-xs">{{ $page_datas->credit['kreditur']['alamat']['provinsi'] }} - {{ $page_datas->credit['kreditur']['alamat']['negara'] }}</p>
						<div class="clearfix hidden-print">&nbsp;</div>
						{{-- <h5 class="hidden-print"><a href="#" data-toggle="modal" data-target="#" no-data-pjax data-href="{{route('person.index', ['id' => $page_datas->credit->creditor->id, 'status' => 'rumah'])}}">Lihat Alamat Lain</a></h5> --}}
					@else
						<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#modal-data-address" no-data-pjax> Tambahkan Sekarang </a></p>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="clearfix hidden-print">&nbsp;</div>

	<div class="row">
		<div class="col-sm-12">
			<h5 class="text-uppercase text-light">Pekerjaan</h5>
		</div>
		@if (isset($page_datas->credit['kreditur']['pekerjaan']))
			<div class="col-sm-6">
				<div class="row m-b-xl m-t-xs-m-print">
					<div class="col-sm-12">
						<p class="p-b-sm"><strong>Jenis Pekerjaan</strong></p>
						<p>{{ ucwords(str_replace('_', ' ', $page_datas->credit['kreditur']['pekerjaan'])) }}</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row m-b-xl m-t-xs-m-print">
					<div class="col-sm-12">
						<p class="p-b-sm "><strong>Penghasilan Bersih</strong></p>
						<p>{{ $page_datas->credit['kreditur']['penghasilan_bersih'] }}</p>
					</div>
				</div>				
			</div>
		@else
			<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#modal-data-pekerjaan" no-data-pjax> Tambahkan Sekarang </a></p>
		@endif
	</div>
@endif

@push('show_modals')
	@if ($edit == true)
		<!-- Data kredit // -->
		{!! Form::open(['url' => '', 'class' => 'form no-enter']) !!}
		@component('components.modal', [
			'id' 		=> 'modal-data-kreditur',
			'title'		=> 'Data Kreditur',
			'settings'	=> [
				'modal_size'	=> 'modal-lg',
				'hide_buttons'	=> true
			]	
		])
			@include('pages.kredit.components.form.data_kreditur')
			<div class="modal-footer">
				<a type='button' class="btn btn-default" data-dismiss='modal'>
					Cancel
				</a>
				<button type="submit" class="btn btn-success">
					Simpan
				</button>
			</div>	
		@endcomponent
		{!! Form::close() !!}
	@endif

	{{-- modal alamat --}}
	@if (!isset($page_datas->credit['kreditur']['alamat']))
		{!! Form::open(['url' => '', 'class' => 'form no-enter']) !!}
		@component('components.modal', [
			'id' 		=> 'modal-data-address',
			'title'		=> 'Data Address',
			'settings'	=> [
				'hide_buttons'	=> true
			]	
		])
			@include('components.helpers.forms.address', [
				'param'		=> [
					'prefix'	=> 'kreditur',
					'provinsi' 	=> $page_datas->provinsi,
				]
			])

			<div class="modal-footer">
				<a type='button' class="btn btn-default" data-dismiss='modal'>
					Cancel
				</a>
				<button type="submit" class="btn btn-success">
					Simpan
				</button>
			</div>	
		@endcomponent
		{!! Form::close() !!}
	@endif
@endpush	