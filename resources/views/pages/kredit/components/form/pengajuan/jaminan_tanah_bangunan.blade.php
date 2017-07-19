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
	<label class="text-sm">No. Sertifikat</label>
	<div class="row">
		<div class="col-md-3">
			<input type="text" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[nomor_sertifikat]' }}" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[nomor_sertifikat]' }}" class="form-control auto-tabindex input-tanah-bangunan" data-field="nomor_sertifikat" placeholder="No. Sertifikat" value="{{ (isset($param['data']['nomor_sertifikat']) && !is_null($param['data']['nomor_sertifikat'])) ? $param['data']['nomor_sertifikat'] : null }}">
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tipe</label>
	<div class="row">
		<div class="col-md-4">
			<select name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[tipe]' }}" class="form-control quick-select select auto-tabindex" data-field="tipe" placeholder="Pilih" data-placeholder="Pilih">
				<option value="bangunan" {{ (isset($param['data']['tipe']) && ($param['data']['tipe'] == 'bangunan')) ? 'selected' : '' }}>Bangunan</option>
				<option value="tanah" {{ (isset($param['data']['tipe']) && ($param['data']['tipe'] == 'tanah')) ? 'selected' : '' }}>Tanah</option>
			</select>
			<input type="hidden" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[tipe]' }}" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[tipe]' }}" class="input-tipe-jaminan-tanah-bangunan input-tanah-bangunan" data-field="tipe" value="{{ (isset($param['data']['tipe']) && !is_null($param['data']['tipe'])) ? $param['data']['tipe'] : 'bangunan' }}"> 
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jenis Sertifikat</label>
	<div class="row">
		<div class="col-md-5">
			<select name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[jenis_sertifikat]' }}" onchange="uiJenisSertifikat(this);" class="form-control select auto-tabindex" data-field="jenis_sertifikat" placeholder="Pilih" data-placeholder="Pilih">
				<option value="hgb" {{ (isset($param['data']['jenis_sertifikat']) && ($param['data']['jenis_sertifikat'] == 'hgb')) ? 'selected' : '' }}>Hak Guna Bangunan (HGB)</option>
				<option value="shm" {{ (isset($param['data']['jenis_sertifikat']) && ($param['data']['jenis_sertifikat'] == 'shm')) ? 'selected' : '' }}>Sertifikat Hak Milik (SHM)</option>
			</select>
			<input type="hidden" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[jenis_sertifikat]' }}" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[jenis_sertifikat]' }}" class="input-tipe-jaminan-tanah-bangunan input-tanah-bangunan" data-field="jenis_sertifikat" value="{{ (isset($param['data']['jenis_sertifikat']) && !is_null($param['data']['jenis_sertifikat'])) ? $param['data']['jenis_sertifikat'] : 'hgb' }}">
		</div>
	</div>
</fieldset>
<fieldset class="form-group" id="masa-berlaku-shgb" style="display: none;">
	<label class="text-sm">Masa Berlaku</label>
	<div class="row">
		<div class="col-md-3">
			<input type="text" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[masa_berlaku_sertifikat]' }}" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[masa_berlaku_sertifikat]' }}" class="form-control auto-tabindex mask-year input-tanah-bangunan" data-field="masa_berlaku_sertifikat" placeholder="20xx" value="{{ (isset($param['data']['masa_berlaku_sertifikat']) && !is_null($param['data']['masa_berlaku_sertifikat'])) ? $param['data']['masa_berlaku_sertifikat'] : null }}">
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Atas Nama</label>
	<div class="row">
		<div class="col-md-7">
			<input type="text" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[atas_nama]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[atas_nama]' }}" class="form-control auto-tabindex input-tanah-bangunan" data-field="atas_nama" placeholder="Atas Nama" value="{{ (isset($param['data']['atas_nama']) && !is_null($param['data']['atas_nama'])) ? $param['data']['atas_nama'] : null }}">
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Luas Tanah</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				<input type="text" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[luas_tanah]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[luas_tanah]' }}" class="form-control mask-number auto-tabindex input-tanah-bangunan" data-field="luas_tanah" value="{{ (isset($param['data']['luas_tanah']) && !is_null($param['data']['luas_tanah'])) ? $param['data']['luas_tanah'] : null }}" placeholder="Luas Tanah" >
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Luas Bangunan</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				<input type="text" name="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[luas_bangunan]' }}" id="{{ (isset($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[luas_bangunan]' }}" class="form-control auto-tabindex mask-number input-tanah-bangunan" data-field="luas_bangunan" value="{{ (isset($param['data']['luas_bangunan']) && !is_null($param['data']['luas_bangunan'])) ? $param['data']['luas_bangunan'] : null }}" placeholder="Luas Bangunan">
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

<script type="text/javascript">
	function uiJenisSertifikat(e){
		if(e.value){
			if(e.value.toLowerCase() == 'shm'){
				document.getElementById("masa-berlaku-shgb").style.display = 'none';
			}else{
				document.getElementById("masa-berlaku-shgb").style.display = 'block';
			}
		}
	}
</script>