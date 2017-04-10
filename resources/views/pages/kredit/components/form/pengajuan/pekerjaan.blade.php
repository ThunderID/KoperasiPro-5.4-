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
<fieldset class="form-group p-b-md">
	<label for="">Jenis Pekerjaan</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('kreditur[pekerjaan]', $data['select_jenis_pekerjaan'], (isset($param['data']['pekerjaan']) ? (in_array($param['data']['pekerjaan'], ['tidak_bekerja', 'karyawan_swasta', 'nelayan', 'pegawai_negeri', 'petani', 'polri', 'wiraswasta']) ? $param['data']['pekerjaan'] : 'lain_lain') : 'tidak_bekerja'), ['class' => 'form-control quick-select auto-tabindex focus select-pekerjaan', 'data-other' => 'input-jenis-pekerjaan']) !!} <br/>
			{!! Form::text('kreditur[pekerjaan]', (isset($param['data']['pekerjaan']) ? $param['data']['pekerjaan'] : 'tidak_bekerja'), ['class' => 'form-control auto-tabindex m-t-sm input-jenis-pekerjaan ' . (in_array($param['data']['pekerjaan'], ['tidak_bekerja', 'karyawan_swasta', 'nelayan', 'pegawai_negeri', 'petani', 'polri', 'wiraswasta']) ? 'hidden' : (!isset($param['data']['pekerjaan']) ? 'hidden' : '')), 'placeholder' => 'Sebutkan', 'style' => 'width:40%;']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Penghasilan Bersih</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penghasilan_bersih', (isset($param['data']['penghasilan_bersih']) ? $param['data']['penghasilan_bersih'] : null), ['class' => 'form-control mask-money required auto-tabindex', 'placeholder' => 'Penghasilan bersih']) !!}
		</div>
	</div>
</fieldset>