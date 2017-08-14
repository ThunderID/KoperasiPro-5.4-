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

@php
	// dd($page_datas);
	// dd($param);
	// dd(Input::old());
@endphp


{!! Form::hidden('debitur[debitur_id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<h5 class="text-uppercase text-light">Identitas Nasabah</h5>
<fieldset class="form-group">
	<label class="text-sm">NIK</label>
	<div class="row">
		<div class="col-md-7">
			<div class="input-group">
				<div class="input-group-addon">35-</div>
				{!! Form::text('debitur[nik]', (isset($param['data']['nik']) ? $param['data']['nik'] : null), [
					'id' => 'debitur_id', 
					'class' => 'form-control required mask-id-card input-search-ajax auto-tabindex thunder-validation-input',
					'placeholder' => '00-00-360876-0001', 
					'data-parse' => 'is_ektp, nama, tanggal_lahir, jenis_kelamin, status_perkawinan, foto_ktp', 
					'data-url' => route('ajax.debitur'), 
					'thunder-validation-rules' => 'required' 
				]) !!}
				<span class="input-group-addon input_loader debitur_id_loader">
					<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
					<span class="hidden-xs">Memeriksa NIK</span>
				</span>				
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<!-- <label class="text-sm">E-KTP</label> -->
	<div class="row">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 m-l-lg">
			<label class="checkbox text-sm">Nasabah menggunakan E-KTP
				{!! Form::checkbox('debitur[is_ektp]', true, (isset($param['data']['is_ektp']) ? $param['data']['is_ektp'] : true), [
					'class' => 'form-control input-switch auto-tabindex focus thunder-validation-input', 
					'data-inverse' => 'true', 
					'data-on-color' => 'primary', 
					'data-on-text' => 'Iya', 
					'data-off-text' => 'Tidak', 
					'style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;',
					'thunder-validation-rules' => 'required' 
				]) !!}
			</label>
		</div>
	</div>
</fieldset>

<hr>
<h5 class="text-uppercase text-light">Profil Nasabah</h5>
<fieldset class="form-group">
	<label class="text-sm">Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('debitur[nama]', (isset($param['data']['nama']) ? $param['data']['nama'] : null), [
				'id' => 'debitur_nama', 
				'class' => 'form-control required auto-tabindex thunder-validation-input', 
				'placeholder' => 'Nama Lengkap Nasabah',
				'thunder-validation-rules' => 'required' 
			]) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('debitur[tanggal_lahir]', (isset($param['data']['tanggal_lahir']) ? $param['data']['tanggal_lahir'] : null), [
				'id' => 'debitur_tanggal_lahir', 
				'class' => 'form-control date mask-birthdate auto-tabindex thunder-validation-input', 
				'placeholder' => 'Tanggal/Bulan/Tahun (dd/mm/yyyy)',
				'thunder-validation-rules' => 'required',
				'thunder-validation-no-message' => true
			]) !!}
			<span class="help-block m-b-none">Format pengisian (tanggal/bulan/tahun)</span>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::select('debitur[jenis_kelamin]', [
				'laki-laki'		=> 'Laki-laki',
				'perempuan'		=> 'Perempuan'
			], (isset($param['data']['jenis_kelamin']) ? $param['data']['jenis_kelamin'] : ''), [
				'id' => 'debitur_jenis_kelamin', 
				'class' => 'form-control auto-tabindex select thunder-validation-input', 
				'placeholder' => 'Pilih', 'data-placeholder' => 'Pilih',
				'thunder-validation-rules' => 'required'
			]) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('debitur[status_perkawinan]', [
				'belum_kawin'		=> 'Belum Kawin',
				'cerai'				=> 'Cerai Hidup',
				'cerai_mati'		=> 'Cerai Mati',
				'kawin' 			=> 'Kawin',
			], (isset($param['data']['status_perkawinan']) ? $param['data']['status_perkawinan'] : ''), [
				'id' => 'debitur_status_perkawinan', 
				'class' => 'form-control quick-select auto-tabindex select thunder-validation-input', 
				'placeholder' => 'Pilih', 
				'data-placeholder' => 'Pilih',
				'thunder-validation-rules' => 'required' 
			]) !!}
		</div> 
	</div> 
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Foto KTP</label>
	<div class="row p-b-md">
		<div class="col-md-6">
			<img src="{{URL::asset('/images/no-image.png')}}" 
				class="img-responsive thunder-imagePreview-canvas" 
				alt="No Image Selected" 
				style="width: 100%; display: block;">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				{!! Form::text(null, (isset($param['data']['foto_ktp'])) ? $param['data']['foto_ktp'] : null, [
					'class'	 		=> 'form-control thunder-imagePreview-path thunder-validation-input', 
					'readonly' 		=> true, 
					'placeholder' 	=> 'Belum Ada Foto Dipilih',
					'thunder-validation-rules' => 'required' 
				] ) !!}
				<span class="input-group-btn">
					<label class="btn btn-primary" style="padding-top: 9.5px; padding-bottom: 9.5px; margin-left: -2px;">
						{!! Form::file('debitur[foto_ktp]', [
							'id'								=> 'input_foto_ktp',
							'class' 							=> 'hidden btn-upload auto-tabindex',
							'accept' 							=> 'image/jpeg'
						]) !!} Pilih Foto
					</label>
				</span>
			</div>
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
<h5 class="text-uppercase text-light">Kontak</h5>
{{-- panel contact --}}
@include('components.helpers.forms.contact', [ 
	'param'		=> [
		'prefix'	=> 'debitur',
		'data'		=> isset($param['data']['telepon']) ? $param['data']['telepon'] : null,
	],
])