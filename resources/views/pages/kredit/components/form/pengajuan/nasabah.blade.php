@php
/**
 * ===================================================================
 * Readme
 * ===================================================================
 * component name:		nasabah
 * author:				Agil M (agil.mahendra@gmail.com)
 * description:			form untuk nasabah
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
 * 		a. [data][name dari input value]
 * 			required:		no
 * 			value:			string
 * 			description:	untuk menampilkan value dari input, select maupun textarea
 *
 * 			contoh: 		tanggal_pengajuan
 */
@endphp
{!! Form::hidden('debitur[debitur_id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<h5 class="text-uppercase text-light">Info Umum</h5>
<fieldset class="form-group">
	<label class="text-sm">E-KTP</label>
	<div class="row">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			{!! Form::checkbox('debitur[is_ektp]', true, (isset($param['data']['is_ektp']) ? $param['data']['is_ektp'] : true), ['class' => 'form-control input-switch auto-tabindex focus', 'data-inverse' => 'true', 'data-on-color' => 'primary', 'data-on-text' => 'Iya', 'data-off-text' => 'Tidak']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">NIK</label>
	<div class="row">
		<div class="col-md-4">
			<div class="input-group">
				<div class="input-group-addon">35-</div>
				{!! Form::text('debitur[nik]', (isset($param['data']['nik']) ? $param['data']['nik'] : null), ['class' => 'form-control required mask-id-card input-search-ajax auto-tabindex', 'placeholder' => '00-00-360876-0001', 'data-parse' => 'is_ektp, nama, tanggal_lahir, jenis_kelamin, status_perkawinan, foto_ktp', 'data-url' => route('get.kreditur.index')]) !!}
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('debitur[nama]', (isset($param['data']['nama']) ? $param['data']['nama'] : null), ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama debitur']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('debitur[tanggal_lahir]', (isset($param['data']['tanggal_lahir']) ? $param['data']['tanggal_lahir'] : null), ['class' => 'form-control date mask-date auto-tabindex', 'placeholder' => 'Hari/tanggal/tahun (dd/mm/yyyy)']) !!}
			<span class="help-block">format pengisian tanggal hari/bulan/tahun (dd/mm/yyyy)</span>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('debitur[jenis_kelamin]', [
				'laki-laki'		=> 'Laki-laki',
				'perempuan'		=> 'Perempuan'
			], (isset($param['data']['jenis_kelamin']) ? $param['data']['jenis_kelamin'] : 'laki-laki'), ['class' => 'form-control quick-select auto-tabindex']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('debitur[status_perkawinan]', [
				'belum_kawin'		=> 'Belum Kawin',
				'cerai_hidup'		=> 'Cerai Hidup',
				'cerai_mati'		=> 'Cerai Mati',
				'kawin' 			=> 'Kawin',
			], (isset($param['data']['status_perkawinan']) ? $param['data']['status_perkawinan'] : 'belum_kawin'), ['class' => 'form-control quick-select auto-tabindex']) !!}
		</div> 
	</div> 
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Foto KTP</label>
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				{!! Form::text(null, (isset($param['data']['foto_ktp'])) ? $param['data']['foto_ktp'] : null, ['class' => 'form-control input-upload', 'readonly' => true] ) !!}
				<span class="input-group-btn">
					<label class="btn btn-primary" style="padding-top: 9.5px; padding-bottom: 9.5px; margin-left: -2px;">
						{!! Form::file('debitur[foto_ktp]', ['class' => 'hidden btn-upload auto-tabindex']) !!} Pilih Foto
					</label>
				</span>
			</div>
			{{-- {!! Form::text('debitur[foto_ktp]', null, ['class' => 'form-control auto-tabindex']) !!} --}}
		</div>
	</div>
</fieldset>
<hr/>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'debitur',
		'data'		=> isset($param['data']['alamat']) ? $param['data']['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> 'input-tanah-bangunan'
	]
])
<hr />

{{-- panel contact --}}
@include('components.helpers.forms.contact', [ 
	'param'		=> [
		'prefix'	=> 'debitur',
		'data'		=> isset($param['data']['telepon']) ? $param['data']['telepon'] : null,
	],
])