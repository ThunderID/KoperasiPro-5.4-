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
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
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
						{{ $page_datas->credit['kreditur']['tanggal_lahir'] }}
					</p>
				</div>
			</div>
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Jenis Kelamin</strong></p>
					<p>
						{{ ucwords($page_datas->credit['kreditur']['jenis_kelamin']) }}
					</p>
				</div>
			</div>	
		</div>
		@if (isset($page_datas->credit['kreditur']['foto_ktp']) && !is_null($page_datas->credit['kreditur']['foto_ktp']))
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<p class="p-b-sm"><strong>Foto KTP</strong></p>
						<img src="{{ $page_datas->credit['kreditur']['foto_ktp'] }}" class="img img-responsive img-panels" />
					</div>
				</div>
			</div>
		@endif
	</div>

	<div class="clearfix">&nbsp;</div>

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
						<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#modal-data-contact" no-data-pjax> Tambahkan Sekarang </a></p>
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
					@if (!empty($page_datas->credit['kreditur']['alamat']) && isset($page_datas->credit['kreditur']['alamat']))
						<p class="p-b-sm"><strong>Alamat</strong></p>
						<p class="p-b-xs">{{ $page_datas->credit['kreditur']['alamat'][0]['alamat'] }}, {{ $page_datas->credit['kreditur']['alamat'][0]['desa'] }}, {{ $page_datas->credit['kreditur']['alamat'][0]['distrik'] }}, {{ $page_datas->credit['kreditur']['alamat'][0]['regensi'] }}</p>
						<p class="p-b-xs">{{ $page_datas->credit['kreditur']['alamat'][0]['provinsi'] }} - {{ $page_datas->credit['kreditur']['alamat'][0]['negara'] }}</p>
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
		{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT', 'files' => true]) !!}
			@component('components.modal', [
				'id' 		=> 'modal-data-kreditur',
				'title'		=> 'Data Kreditur',
				'settings'	=> [
					'modal_class'	=> 'modal-lg',
					'hide_buttons'	=> true
				]	
			])
				@include('pages.kredit.components.form.kreditur', [
					'param'		=> [
						'is_ektp'			=> $page_datas->credit['kreditur']['is_ektp'],
						'nik'				=> substr($page_datas->credit['kreditur']['nik'], 3),
						'nama'				=> $page_datas->credit['kreditur']['nama'],
						'tanggal_lahir'		=> $page_datas->credit['kreditur']['tanggal_lahir'],
						'jenis_kelamin'		=> $page_datas->credit['kreditur']['jenis_kelamin'],
						'status_perkawinan'	=> $page_datas->credit['kreditur']['status_perkawinan'],
						'telepon'			=> $page_datas->credit['kreditur']['telepon'],
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

	{{-- modal alamat --}}
	{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
		@component('components.modal', [
			'id' 		=> 'modal-data-address',
			'title'		=> 'Data Address',
			'settings'	=> [
				'hide_buttons'	=> true
			]	
		])
			@include('components.helpers.forms.address', [
				'param'		=> ['prefix'	=> 'kreditur'],
				'data'		=> ['provinsi' 	=> $page_datas->provinsi],
				'settings'	=> [
					'class'						=> 'data-attribute-custome',
					'data_attribute_flag'		=> 'attribute-flag',
					'data_attribute_value'		=> '#modal-data-address',
				]
			])

			<div class="modal-footer">
				<a type='button' class="btn btn-default" data-dismiss='modal'>
					Cancel
				</a>
				<button type="submit" class="btn btn-primary">
					Simpan
				</button>
			</div>	
		@endcomponent
	{!! Form::close() !!}

	{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
		@component('components.modal', [
			'id'			=> 'modal-data-contact',
			'title'			=> 'Data Kontak',
			'settings'		=> [
				'hide_buttons'		=> true,
			]
		])
			{{-- panel contact --}}
			@include('components.helpers.panels.contact', [ 
				'param'		=> [
					'prefix'	=> 'kreditur',
					'telepon'	=> isset($param['telepon']) ? $param['telepon'] : null,
				],
				'settings'	=> [
					'target'	=> 'template-contact-person',
					'class'		=> [
						'init_add'		=> 'init-add-one',
					]
				]
			])

			{{-- modal footer button cancel & save --}}
			<div class="modal-footer">
				<a type='button' class="btn btn-default" data-dismiss='modal'>
					Cancel
				</a>
				<button type="submit" class="btn btn-primary">
					Simpan
				</button>
			</div>
		@endcomponent
	{!! Form::close() !!}
@endpush	