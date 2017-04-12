@php
/**
 * ===================================================================
 * Readme
 * ===================================================================
 * component name:		jaminan tanah & bangunan
 * author:				Agil M (agil.mahendra@gmail.com)
 * description:			form untuk jaminan tanah & bangunan
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
 * no parameters
 *
 */
@endphp

{!! Form::hidden( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label for="">Tipe</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[tipe]', [
					'bangunan'	=> 'Bangunan',
					'tanah'		=> 'Tanah',
				], (isset($param['data']['tipe']) && !is_null($param['data']['tipe'])) ? $param['data']['tipe'] : 'bangunan', ['class' => 'form-control quick-select auto-tabindex', 'data-other' => 'input-tipe-jaminan-tanah-bangunan']) !!}
			{!! Form::hidden( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[tipe]', (isset($param['data']['tipe']) && !is_null($param['data']['tipe'])) ? $param['data']['tipe'] : 'bangunan', ['class' => 'input-tipe-jaminan-tanah-bangunan input-tanah-bangunan', 'data-field' => 'tipe']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jenis Sertifikat</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[jenis_sertifikat]', [
					'hgb'	=> 'Hak Guna Bangunan (HGB)',
					'shm'	=> 'Sertifikat Hak Milik (SHM)',
				], (isset($param['data']['jenis_sertifikat']) && !is_null($param['data']['jenis_sertifikat'])) ? $param['data']['jenis_sertifikat'] : 'bangunan', ['class' => 'form-control quick-select auto-tabindex']) !!}
			{!! Form::hidden( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[jenis_sertifikat]', (isset($param['data']['jenis_sertifikat']) && !is_null($param['data']['jenis_sertifikat'])) ? $param['data']['jenis_sertifikat'] : 'bangunan', ['class' => 'input-tipe-jaminan-tanah-bangunan input-tanah-bangunan', 'data-field' => 'jenis_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">No. Sertifikat</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[nomor_sertifikat]', (isset($param['data']['nomor_sertifikat']) && !is_null($param['data']['nomor_sertifikat'])) ? $param['data']['nomor_sertifikat'] : null, ['class' => 'form-control auto-tabindex mask-no-sertifikat input-tanah-bangunan', 'placeholder' => 'No. Sertifikat', 'data-field' => 'nomor_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Masa Berlaku</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[masa_berlaku_sertifikat]', (isset($param['data']['masa_berlaku_sertifikat']) && !is_null($param['data']['masa_berlaku_sertifikat'])) ? $param['data']['masa_berlaku_sertifikat'] : null, ['class' => 'form-control auto-tabindex mask-year input-tanah-bangunan', 'placeholder' => 'Masa Berlaku', 'data-field' => 'masa_berlaku_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Atas Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[atas_nama]', (isset($param['data']['atas_nama']) && !is_null($param['data']['atas_nama'])) ? $param['data']['atas_nama'] : null, ['class' => 'form-control auto-tabindex input-tanah-bangunan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Tanah</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[luas_tanah]', (isset($param['data']['luas_tanah']) && !is_null($param['data']['luas_tanah'])) ? $param['data']['luas_tanah'] : null, ['class' => 'form-control mask-number auto-tabindex input-tanah-bangunan', 'placeholder' => '', 'data-field' => 'luas_tanah']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Bangunan</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[luas_bangunan]', (isset($param['data']['luas_bangunan']) && !is_null($param['data']['luas_bangunan'])) ? $param['data']['luas_bangunan'] : null, ['class' => 'form-control auto-tabindex mask-number input-tanah-bangunan', 'placeholder' => '', 'data-field' => 'luas_bangunan']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan'),
		'data'		=> isset($data['alamat']) ? $data['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'	=> 'input-tanah-bangunan'
	]
])