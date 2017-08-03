@php
/**
 * ===================================================================
 * Readme
 * ===================================================================
 * component name:		pekerjaan
 * author:				Agil M (agil.mahendra@gmail.com)
 * description:			form untuk pekerjaan
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
 * 1. data
 * 		required: 			yes
 * 		description:		diperlukan untuk menampilkan parameters data
 *
 * 		a. select_jenis_pekerjaan
 * 			required:		yes
 * 			value:			array list
 * 			description:	untuk menampilkan data jenis_pekerjaan select option
 * 			
 * 2. param
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
<fieldset class="form-group">
	<label class="text-sm">Jenis Pekerjaan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('debitur[pekerjaan]', $data['select_jenis_pekerjaan'], (isset($param['data']['pekerjaan']) ? (in_array($param['data']['pekerjaan'], ['tidak_bekerja', 'karyawan_swasta', 'nelayan', 'pegawai_negeri', 'petani', 'polri', 'wiraswasta']) ? $param['data']['pekerjaan'] : 'lain_lain') : ''), [
				'id' => 'debitur_pekerjaan', 
				'class' => 'form-control quick-select auto-tabindex focus select select-pekerjaan thunder-validation-input',
				'data-other' => 'input-jenis-pekerjaan', 
				'style' => 'width:40%;', 
				'placeholder' => 'Pilih', 
				'data-placeholder' => 'Pilih',
				'thunder-validation-rules' => 'required'
			]) !!} 
			<!-- <br/> -->
			<!-- {!! Form::text('debitur[pekerjaan]', (isset($param['data']['pekerjaan']) ? $param['data']['pekerjaan'] : 'tidak_bekerja'), ['class' => 'form-control auto-tabindex m-t-sm input-jenis-pekerjaan ' . (in_array($param['data']['pekerjaan'], ['tidak_bekerja', 'karyawan_swasta', 'nelayan', 'pegawai_negeri', 'petani', 'polri', 'wiraswasta']) ? 'hidden' : (!isset($param['data']['pekerjaan']) ? 'hidden' : '')), 'placeholder' => 'Sebutkan']) !!} -->
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Penghasilan Bersih</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('debitur[penghasilan_bersih]', (isset($param['data']['penghasilan_bersih']) ? $param['data']['penghasilan_bersih'] : null), [
				'id' => 'debitur_penghasilan_bersih', 
				'class' => 'form-control mask-money required auto-tabindex thunder-validation-input', 
				'placeholder' => 'Penghasilan bersih',
				'thunder-validation-rules' => 'required minCurrency=1',
				'thunder-validation-custom-message' => 'Input harus diisi'
			]) !!}
		</div>
	</div>
</fieldset>