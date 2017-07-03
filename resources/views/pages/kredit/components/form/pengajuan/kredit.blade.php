@php
/**
 * ===================================================================
 * Readme
 * ===================================================================
 * component name:		kredit
 * author:				Agil M (agil.mahendra@gmail.com)
 * description:			form untuk kredit
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
 * 	 	a. select_jenis_kredit
 * 		 	required:		yes
 * 		  	value:			array list
 * 		   	description:	untuk menampilkan list select option jenis kredit
 *
 * 		b. select_jangka_waktu
 * 			required:		yes
 * 		  	value:			array list
 * 		   	description:	untuk menampilkan list select option jangka waktu
 * 2. param
 * 		required:			no
 * 		description:		diperlukan untuk menampilkan hasil dari value input
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
	<label class="text-sm">Tanggal Pengajuan</label>
	<div class="row">
		<div class="col-xs-12 col-sm-5 col-md-5">
			{!! Form::text('tanggal_pengajuan', (isset($param['data']['tanggal_pengajuan']) ? $param['data']['tanggal_pengajuan'] : Carbon\Carbon::now()->format('d/m/Y')), ['class' => 'form-control required mask-date auto-tabindex focus', 'placeholder' => 'Hari/tanggal/tahun (dd/mm/yyyy)']) !!}
			<span class="help-block">format pengisian tanggal hari/bulan/tahun (dd/mm/yyyy)</span>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jumlah Pinjaman</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('pengajuan_kredit', (isset($param['data']['pengajuan_kredit']) ? $param['data']['pengajuan_kredit'] : null), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Jumlah pinjaman']) !!}
			<span class="help-block">Minimal Jumlah Pinjaman Rp 2.500.000</span>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jenis Kredit</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('jenis_kredit', $data['select_jenis_kredit'], (isset($param['data']['jenis_kredit']) ? $param['data']['jenis_kredit'] : 'pa'), ['class' => 'form-control quick-select required auto-tabindex focus', 'placeholder' => 'Jumlah pinjaman', 'data-other' => 'input-jenis-kredit']) !!} <br/>
			{!! Form::hidden('jenis_kredit', 'pa', ['class' => 'form-control m-t-sm auto-tabindex input-jenis-kredit', 'placeholder' => 'Sebutkan', 'style' => 'width:60%']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Lama Angsuran</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jangka_waktu', $data['select_jangka_waktu'], (isset($param['data']['jangka_waktu']) ? $param['data']['jangka_waktu'] : '6'), ['class' => 'form-control select required auto-tabindex', 'placeholder' => 'Lama angsuran', 'data-placeholder' => 'Lama angsuran']) !!}
		</div>
	</div>
</fieldset>