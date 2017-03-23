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
 * 		a. [name dari input value]
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
			{!! Form::select('kreditur[pekerjaan]', $data['select_jenis_pekerjaan'], (isset($param['pekerjaan']) ? $param['pekerjaan'] : 'tidak_bekerja'), ['class' => 'form-control quick-select auto-tabindex focus select-pekerjaan', 'data-other' => 'input-jenis-pekerjaan']) !!} <br/>
			{!! Form::hidden('kreditur[pekerjaan]', null, ['class' => 'form-control m-t-sm auto-tabindex input-jenis-pekerjaan', 'placeholder' => 'Sebutkan', 'style' => 'width:40%']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Penghasilan Bersih</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penghasilan_bersih', (isset($param['penghasilan_bersih']) ? $param['penghasilan_bersih'] : null), ['class' => 'form-control mask-money required auto-tabindex', 'placeholder' => 'Penghasilan bersih']) !!}
		</div>
	</div>
</fieldset>