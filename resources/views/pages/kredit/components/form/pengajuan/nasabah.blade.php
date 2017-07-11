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
<h5 class="text-uppercase text-light">Identitas Nasabah</h5>
<fieldset class="form-group">
	<label class="text-sm">NIK</label>
	<div class="row">
		<div class="col-md-7">
			<div class="input-group">
				<div class="input-group-addon">35-</div>
				{!! Form::text('debitur[nik]', (isset($param['data']['nik']) ? $param['data']['nik'] : null), ['id' => 'debitur_id', 'class' => 'form-control required mask-id-card input-search-ajax auto-tabindex', 'placeholder' => '00-00-360876-0001', 'data-parse' => 'is_ektp, nama, tanggal_lahir, jenis_kelamin, status_perkawinan, foto_ktp', 'data-url' => route('get.kreditur.index')]) !!}
				<span class="input-group-addon debitur_id_loader" style="background-color: white; border-color:white; color: #46BE8A;visibility: hidden;">
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
				{!! Form::checkbox('debitur[is_ektp]', true, (isset($param['data']['is_ektp']) ? $param['data']['is_ektp'] : true), ['class' => 'form-control input-switch auto-tabindex focus', 'data-inverse' => 'true', 'data-on-color' => 'primary', 'data-on-text' => 'Iya', 'data-off-text' => 'Tidak', 'style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
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
			{!! Form::text('debitur[nama]', (isset($param['data']['nama']) ? $param['data']['nama'] : null), ['id' => 'debitur_nama', 'class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama Lengkap Nasabah']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('debitur[tanggal_lahir]', (isset($param['data']['tanggal_lahir']) ? $param['data']['tanggal_lahir'] : null), ['id' => 'debitur_tanggal_lahir', 'class' => 'form-control date mask-birthdate auto-tabindex', 'placeholder' => 'Tanggal/Bulan/Tahun (dd/mm/yyyy)']) !!}
			<span class="help-block m-b-none">format pengisian (tanggal/bulan/tahun)</span>
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
			], (isset($param['data']['jenis_kelamin']) ? $param['data']['jenis_kelamin'] : 'laki-laki'), ['id' => 'debitur_jenis_kelamin', 'class' => 'form-control quick-select auto-tabindex select']) !!}
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
			], (isset($param['data']['status_perkawinan']) ? $param['data']['status_perkawinan'] : 'belum_kawin'), ['id' => 'debitur_status_perkawinan', 'class' => 'form-control quick-select auto-tabindex select']) !!}
		</div> 
	</div> 
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Foto KTP</label>
	<div class="row">
		<div class="col-md-6">
			<img src="{{URL::asset('/images/no-image.png')}}" id="ktp_previewer" class="img-responsive" alt="No Image Selected" style="width: 100%; display: block;">
			</br>

			<div class="input-group">
				{!! Form::text(null, (isset($param['data']['foto_ktp'])) ? $param['data']['foto_ktp'] : null, ['class' => 'form-control input-upload', 'readonly' => true, 'placeholder' => 'Belum Ada Foto Dipilih'] ) !!}
				<span class="input-group-btn">
					<label class="btn btn-primary" style="padding-top: 9.5px; padding-bottom: 9.5px; margin-left: -2px;">
						{!! Form::file('debitur[foto_ktp]', ['class' => 'hidden btn-upload auto-tabindex file_ktp']) !!} Pilih Foto
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

@push('scripts')
	/* Init */
	$( document ).ready(function(){
		// disable autofill inputs
		document.getElementById("debitur_nama").disabled = true;
		document.getElementById("debitur_tanggal_lahir").disabled = true;
		document.getElementById("debitur_jenis_kelamin").disabled = true;
		document.getElementById("debitur_status_perkawinan").disabled = true;
		document.getElementById("debitur[alamat][0][alamat]").disabled = true;
		document.getElementById("debitur[alamat][0][rt]").disabled = true;
		document.getElementById("debitur[alamat][0][rw]").disabled = true;
		document.getElementById("debitur[alamat][0][provinsi]").disabled = true;
		document.getElementById("debitur[alamat][0][regensi]").disabled = true;
		document.getElementById("debitur[alamat][0][distrik]").disabled = true;
		document.getElementById("debitur[alamat][0][desa]").disabled = true;
		document.getElementById("debitur[alamat][0][negara]").disabled = true;
		document.getElementById("debitur[telepon]").disabled = true;
		document.getElementById("debitur_pekerjaan").disabled = true;
		document.getElementById("debitur_penghasilan_bersih").disabled = true;
	});

	/* Autofill based on NIK */
	$(document).on('keypress', '#debitur_id', function(e) {
		if($('#debitur_id').val()[$('#debitur_id').val().length -1] != '_'){
			// UI
			$('.debitur_id_loader').css("visibility", "visible");

			// disable autofill inputs
			document.getElementById("debitur_nama").disabled = true;
			document.getElementById("debitur_tanggal_lahir").disabled = true;
			document.getElementById("debitur_jenis_kelamin").disabled = true;
			document.getElementById("debitur_status_perkawinan").disabled = true;
			document.getElementById("debitur[alamat][0][alamat]").disabled = true;
			document.getElementById("debitur[alamat][0][rt]").disabled = true;
			document.getElementById("debitur[alamat][0][rw]").disabled = true;
			document.getElementById("debitur[alamat][0][provinsi]").disabled = true;
			document.getElementById("debitur[alamat][0][regensi]").disabled = true;
			document.getElementById("debitur[alamat][0][distrik]").disabled = true;
			document.getElementById("debitur[alamat][0][desa]").disabled = true;
			document.getElementById("debitur[alamat][0][negara]").disabled = true;
			document.getElementById("debitur[telepon]").disabled = true;
			document.getElementById("debitur_pekerjaan").disabled = true;
			document.getElementById("debitur_penghasilan_bersih").disabled = true;			
			
			// Ajax Data
			var nik = '35-'+document.getElementById("debitur_id").value;

			$.ajax({url: "{{route('ajax.debitur')}}?nik="+nik, success: function(result, enableNasabahForm)
			{
				// UI
				$('.debitur_id_loader').css("visibility", "hidden");

				// enable autofill inputs
				document.getElementById("debitur_nama").disabled = false;
				document.getElementById("debitur_tanggal_lahir").disabled = false;
				document.getElementById("debitur_jenis_kelamin").disabled = false;
				document.getElementById("debitur_status_perkawinan").disabled = false;
				document.getElementById("debitur[alamat][0][alamat]").disabled = false;
				document.getElementById("debitur[alamat][0][rt]").disabled = false;
				document.getElementById("debitur[alamat][0][rw]").disabled = false;
				document.getElementById("debitur[alamat][0][provinsi]").disabled = false;
				document.getElementById("debitur[alamat][0][regensi]").disabled = false;
				document.getElementById("debitur[alamat][0][distrik]").disabled = false;
				document.getElementById("debitur[alamat][0][desa]").disabled = false;
				document.getElementById("debitur[alamat][0][negara]").disabled = false;
				document.getElementById("debitur[telepon]").disabled = false;
				document.getElementById("debitur_pekerjaan").disabled = false;
				document.getElementById("debitur_penghasilan_bersih").disabled = false;				

				// if result, set the data 
				if(result.nama){
					document.getElementById("debitur_nama").value = result.nama;
					document.getElementById("debitur_tanggal_lahir").value = result.tanggal_lahir;
					document.getElementById("debitur_jenis_kelamin").value = result.jenis_kelamin;
					document.getElementById("debitur_status_perkawinan").value = result.status_perkawinan;
					document.getElementById("debitur[alamat][0][alamat]").value = result.alamat.alamat;
					document.getElementById("debitur[alamat][0][rt]").value = result.alamat.rt;
					document.getElementById("debitur[alamat][0][rw]").value = result.alamat.rw;
					document.getElementById("debitur[alamat][0][provinsi]").value = result.alamat.provinsi;
					document.getElementById("debitur[alamat][0][regensi]").value = result.alamat.regensi;
					document.getElementById("debitur[alamat][0][distrik]").value = result.alamat.distrik;
					document.getElementById("debitur[alamat][0][desa]").value = result.alamat.desa;
					document.getElementById("debitur[alamat][0][negara]").value = result.alamat.negara;
					document.getElementById("debitur[telepon]").value = result.telepon;
					document.getElementById("debitur_pekerjaan").value = result.pekerjaan;
					document.getElementById("debitur_penghasilan_bersih").value = result.penghasilan_bersih;				
				}

			}});
		}
	});	

	/* Foto Ktp Previewer */
	$(document).on('change', '.file_ktp', function(e) {
		var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#ktp_previewer').attr('src', e.target.result);
        }

        reader.onloadend = function (e) {
		    // init form wizard window
	        window.wizard.resizeContent();
        }

        reader.readAsDataURL($(this).context.files[0]);
	});

@endpush