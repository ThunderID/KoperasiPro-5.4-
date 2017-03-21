{{-- 
	Plugin address
	Description: form untuk alamat
	Usage:
	- Param
		$param['prefix']: prefix variable input
		$param['provinsi']: list provinsi indonesia
 --}}
  <b><h5 class="text-uppercase text-light">Alamat</h5></b>
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-9">
			{!! Form::text( (isset($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[alamat]', null, ['class' => 'form-control auto-tabindex ' . (isset($param["class"]) ? $param["class"] : ""), 'placeholder' => 'Ex. Jln. Blimbing No. 8', 'data-field' => 'alamat']) !!}
		</div>
		<!-- <div class="col-md-3 p-l-none">
			<a href="#" class="btn btn-link btn-sm p-l-none p-r-none open-modal" data-toggle="modal" data-target=".modal"><i class="fa fa-search"></i> Cari Alamat yg Ada</a>
		</div> -->
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Provinsi</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[provinsi]', $param['provinsi'], null, ['class' => 'form-control auto-tabindex select select-get-ajax ' . (isset($param["class"]) ? $param["class"] : ""), 'placeholder' => 'Pilih Provinsi', 'data-placeholder' => 'Pilih Provinsi', 'data-url' => route('regensi.index'), 'data-target-parsing' => '.select-regensi', 'data-field' => 'provinsi', 'style' => 'width:100%;']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kota/Kabupaten</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[regensi]', [], null, ['class' => 'form-control auto-tabindex select select-get-ajax select-regensi ' . (isset($param["class"]) ? $param["class"] : ""), 'placeholder' => 'Pilih Kota/Kabupaten', 'disabled' => 'disabled', 'data-placeholder' => 'Pilih Kota/Kabupaten', 'data-url' => route('distrik.index'), 'data-target-parsing' => '.select-distrik', 'data-field' => 'regensi', 'style' => 'width:100%;']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kecamatan</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[distrik]', [], null, ['class' => 'form-control auto-tabindex select select-get-ajax select-distrik ' . (isset($param["class"]) ? $param["class"] : ""), 'placeholder' => 'Pilih Kecamatan', 'disabled' => 'disabled', 'data-placeholder' => 'Pilih Kecamatan', 'data-url' => route('desa.index'), 'data-target-parsing' => '.select-desa', 'data-field' => 'distrik', 'style' => 'width:100%;']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group p-b-md">
	<label for="">Desa</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select( (isset($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[desa]', [], null, ['class' => 'form-control auto-tabindex select select-get-ajax select-desa ' . (isset($param["class"]) ? $param["class"] : ""), 'placeholder' => 'Pilih Desa', 'disabled' => 'disabled', 'data-placeholder' => 'Pilih Desa', 'data-field' => 'desa', 'style' => 'width:100%;']) !!}
		</div>
	</div>
</fieldset>

{!! Form::hidden( (isset($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[negara]', 'indonesia', ['class' => ' ' . (isset($param["class"]) ? $param["class"] : ""), 'data-field' => 'negara']) !!}