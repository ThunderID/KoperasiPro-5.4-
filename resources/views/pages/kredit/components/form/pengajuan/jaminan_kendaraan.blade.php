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
			<input type="text" 
				name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[nomor_bpkb]' }}" 
				id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[nomor_bpkb]' }}" 
				value="{{ (isset($param['data']['nomor_bpkb']) && !is_null($param['data']['nomor_bpkb'])) ? $param['data']['nomor_bpkb'] : null }}" 
				class="form-control auto-tabindex input-kendaraan thunder-validation-input" 
				placeholder="Nomor BPKB" 
				data-field="nomor_bpkb" 
				thunder-validation-rules='required'>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jenis Kendaraan</label>
	<div class="row">
		<div class="col-md-3">
			<select name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tipe]' }}"
				class="form-control select auto-tabindex input-tipe-jaminan-kendaraan input-kendaraan thunder-validation-input" 
				placeholder="Pilih" 
				data-placeholder="Pilih" 
				data-other="input-tipe-jaminan-kendaraan" 
				onchange="uiMerkKendaraan(this);"
				data-default="roda_2"
				data-field="tipe"
				thunder-validation-rules='required'
			>
				@foreach($data['select_jenis_kendaraan'] as $k => $v)
					<option value="{{ $k }}" {{ (isset($param['data']['tipe']) && ($param['data']['tipe'] == $k)) ? 'selected' : '' }}>{{ $v }}</option>
				@endforeach
			</select>
			{{-- <input type="hidden" 
				name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tipe]' }}" 
				id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tipe]' }}" 
				class="input-tipe-jaminan-kendaraan input-kendaraan" 
				value="{{ (isset($param['data']['tipe'])) ? $param['data']['tipe'] : '' }}" 
				data-field="tipe"
			> --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Merk</label>
	<div class="row">
		<div class="col-md-4">
			<select id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[merk]' }}"" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[merk]' }}" class="thunder-validation-input form-control select-merk select auto-tabindex input-merk-kendaraan input-kendaraan" placeholder="Pilih" data-placeholder="Pilih" data-other="input-merk-kendaraan" data-field="merk" thunder-validation-rules='required'>
			@if(isset($param['data']['merk']))
				<option value="{{ $k }}" {{ (isset($param['data']['merk']) ? ($param['data']['merk'] == $k ? 'selected' : 'lain-lain') : '') }}>{{ $v }}</option>
			@endif
			</select>
			{{-- <input type="hidden" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[merk]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[merk]' }}" class="input-merk-kendaraan input-kendaraan" value="{{ (isset($param['data']['merk'])) ? $param['data']['merk'] : '' }}" data-field="merk"> --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tahun</label>
	<div class="row">
		<div class="col-md-3">
			<input type="text" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tahun]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[tahun]' }}" class="thunder-validation-input form-control auto-tabindex mask-year input-kendaraan" value="{{ (isset($param['data']['tahun']) && !is_null($param['data']['tahun'])) ? $param['data']['tahun'] : null }}" placeholder="Tahun Pembuatan" data-field="tahun" thunder-validation-rules='required numbermin={{ (date("Y")) - 20}}'>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Atas Nama BPKB</label>
	<div class="row">
		<div class="col-md-7">
			<input type="text" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[atas_nama]' }}" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[atas_nama]' }}" value="{{ (isset($param['data']['atas_nama']) && !is_null($param['data']['atas_nama'])) ? $param['data']['atas_nama'] : null }}" class="thunder-validation-input form-control auto-tabindex input-kendaraan" placeholder="Atas Nama BPKB" data-field="atas_nama" thunder-validation-rules='required'>
		</div>
	</div>
</fieldset>
<script type="text/javascript">
	function uiMerkKendaraan(e){

		// init
		var merk = [];

		@foreach($data['select_merk_kendaraan'] as $kategori => $values)
			merk["{{$kategori}}"] = [
				@foreach($values as $merk)
					'{{$merk}}',
				@endforeach
			];
		@endforeach

		// if val not empty
		var elementTarget = $('.select-merk');
		elementTarget.html('');

		if(e.value != ''){
			// set ux roles
			$('.select-merk').prop('disabled', false);

			// set options based on tipe
			$.each(merk[e.value], function(index, value) {
				var $option = $("<option value='" + value + "' data-id='" + value + "'>" +  window.thunder.stringManipulator.ucWords(window.thunder.stringManipulator.toSpace(value)) +"</option>");
				elementTarget.append($option);
			});					
		}else{
			$('.select-merk').prop('disabled', true);
		}

		elementTarget.val('');		
	}
</script>