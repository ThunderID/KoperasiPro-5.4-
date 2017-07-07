@php
/**
 * ===================================================================
 * Readme
 * ===================================================================
 * component name:		widget jaminan kendaraan
 * author:				Agil M (agil.mahendra@gmail.com)
 * description:			form untuk jaminan kendaraan
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
 * 		a. select_jenis_kendaraan
 * 			required:		yes
 * 			value:			array list
 * 			description:	untuk menampilkan data jenis_kendaraan select option
 *
 * 		b. select_merk_kendaraan
 * 			required:		yes
 * 			value:			array list
 * 			description:	untuk menampilkan data jenis_kendaraan select option
 
 */
@endphp
{!! Form::hidden( (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">No. BPKB</label>
	<div class="row">
		<div class="col-md-3">
			<input type="text" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[nomor_bpkb]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[nomor_bpkb]' }}" value="{{ (isset($param['data']['nomor_bpkb']) && !is_null($param['data']['nomor_bpkb'])) ? $param['data']['nomor_bpkb'] : null }}" class="form-control auto-tabindex input-kendaraan" placeholder="Nomor BPKB" data-field="nomor_bpkb" onkeyup="autofillbpkb()">
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jenis Kendaraan</label>
	<div class="row">
		<div class="col-md-3">
			<select name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tipe]' }}" class="form-control quick-select select auto-tabindex" placeholder="" data-other="input-tipe-jaminan-kendaraan" data-default="roda_2">
				@foreach($data['select_jenis_kendaraan'] as $k => $v)
					<option value="{{ $k }}" {{ (isset($param['data']['tipe']) && ($param['data']['tipe'] == $k)) ? 'selected' : '' }}>{{ $v }}</option>
				@endforeach
			</select>
			<input type="hidden" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tipe]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tipe]' }}" class="input-tipe-jaminan-kendaraan input-kendaraan" value="{{ (isset($param['data']['tipe'])) ? $param['data']['tipe'] : 'roda_2' }}" data-field="tipe">
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tahun</label>
	<div class="row">
		<div class="col-md-3">
			<input type="text" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tahun]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tahun]' }}" class="form-control auto-tabindex mask-year input-kendaraan" value="{{ (isset($param['data']['tahun']) && !is_null($param['data']['tahun'])) ? $param['data']['tahun'] : null }}" placeholder="Tahun Pembuatan" data-field="tahun">
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Merk</label>
	<div class="row">
		<div class="col-md-4">
			<select id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[merk]' }}"" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[merk]' }}" class="form-control quick-select select auto-tabindex" placeholder="Merk Kendaraan" data-other="input-merk-kendaraan">
				@foreach($data['select_merk_kendaraan'] as $k => $v)
					<option value="{{ $k }}" {{ (isset($param['data']['merk']) ? ($param['data']['merk'] == $k ? 'selected' : 'lain-lain') : '') }}>{{ $v }}</option>
				@endforeach
			</select>
			<!-- <input type="hidden" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[merk]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[merk]' }}" class="input-merk-kendaraan input-kendaraan" value="{{ (isset($param['data']['merk'])) ? $param['data']['merk'] : 'daihatsu' }}" data-field="merk"> -->
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Atas Nama</label>
	<div class="row">
		<div class="col-md-7">
			<input type="text" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[atas_nama]' }}" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[atas_nama]' }}" value="{{ (isset($param['data']['atas_nama']) && !is_null($param['data']['atas_nama'])) ? $param['data']['atas_nama'] : null }}" class="form-control auto-tabindex input-kendaraan" placeholder="Atas Nama" data-field="atas_nama">
		</div>
	</div>
</fieldset>