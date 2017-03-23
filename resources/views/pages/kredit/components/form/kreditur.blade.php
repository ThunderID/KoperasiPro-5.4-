@php
/**
 * ===================================================================
 * Readme
 * ===================================================================
 * component name:		kreditur
 * author:				Agil M (agil.mahendra@gmail.com)
 * description:			form untuk kreditur
 * 
 * ===================================================================
 * Usage
 * ===================================================================
 * include this file
 * 
 * ===================================================================
 * Parameters
 * ===================================================================
 * list parameters:
 *
 * 1. param
 * 		required:			no
 * 		description:		diperlukan untuk menampilkan hasil dari value input, untuk edit data
 *
 * 		a. [name dari input value]
 * 			required:		no
 * 			value:			string
 * 			description:	untuk menampilkan value dari input, select maupun textarea
 *
 * 			contoh: 		tanggal_pengajuan
 */
@endphp
<h5 class="text-uppercase text-light">Info Umum</h5>
<fieldset class="form-group">
	<label for="">E-KTP</label>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			{!! Form::checkbox('kreditur[is_ektp]', true, (isset($param['is_ektp']) ? $param['is_ektp'] : true), ['class' => 'form-control input-switch auto-tabindex focus', 'data-inverse' => 'true', 'data-on-color' => 'primary', 'data-on-text' => 'Iya', 'data-off-text' => 'Tidak']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">NIK</label>
	<div class="row">
		<div class="col-md-4">
			<div class="input-group">
				<div class="input-group-addon">35-</div>
				{!! Form::text('kreditur[nik]', (isset($param['nik']) ? $param['nik'] : null), ['class' => 'form-control required auto-tabindex mask-id-card', 'placeholder' => '00-00-360876-0001']) !!}
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('kreditur[nama]', (isset($param['nama']) ? $param['nama'] : null), ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama Kreditur']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[tanggal_lahir]', (isset($param['tanggal_lahir']) ? $param['tanggal_lahir'] : null), ['class' => 'form-control date mask-date-format auto-tabindex', 'placeholder' => 'Hari/tanggal/tahun (dd/mm/yyyy)']) !!}
			<span class="help-block">format pengisian tanggal hari/bulan/tahun (dd/mm/yyyy)</span>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('kreditur[jenis_kelamin]', [
				'laki-laki'		=> 'Laki-laki',
				'perempuan'		=> 'Perempuan'
			], (isset($param['jenis_kelamin']) ? $param['jenis_kelamin'] : 'laki-laki'), ['class' => 'form-control quick-select auto-tabindex']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('kreditur[status_perkawinan]', [
				'belum_kawin'		=> 'Belum Kawin',
				'cerai_hidup'		=> 'Cerai Hidup',
				'cerai_mati'		=> 'Cerai Mati',
				'kawin' 			=> 'Kawin',
			], (isset($param['status_perkawinan']) ? $param['status_perkawinan'] : 'belum_kawin'), ['class' => 'form-control quick-select auto-tabindex']) !!}
		</div> 
	</div> 
</fieldset>
<fieldset class="form-group">
	<label for="">Foto KTP</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('kreditur[foto_ktp]', null, ['class' => 'form-control auto-tabindex']) !!}
			<span class="help-block">Note: berupa gambar url ex. https://www.example.com/image.jpg</span>
		</div>
	</div>
</fieldset>
<hr/>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> ['prefix'	=> 'kreditur'],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> 'input-tanah-bangunan'
	]
])
<hr />

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