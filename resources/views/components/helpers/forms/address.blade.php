{{-- 
	Plugin address
	Description: form untuk alamat
	Usage:
	- Param
		$param['prefix']: prefix variable input
		$param['province']: list province indonesian
		$param['cities']: list cities for province selected
 --}}
 <b><h5>Alamat</h5></b>
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-9">
			{!! Form::text( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[alamat]', null, ['class' => 'form-control auto-tabindex', 'placeholder' => 'Ex. Jln. Blimbing No. 8']) !!}
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
			{!! Form::select( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[provinsi]', $param['province'], null, ['class' => 'form-control auto-tabindex select select-province', 'placeholder' => 'Pilih Provinsi', 'data-placeholder' => 'Pilih Provinsi', 'data-url' => route('cities.index')]) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Regensi</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[regensi]', [], null, ['class' => 'form-control auto-tabindex select select-cities', 'placeholder' => 'Pilih Kota', 'data-placeholder' => 'Pilih Regensi']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Distrik</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[distrik]', null, ['class' => 'form-control auto-tabindex', 'placeholder' => 'Pilih Distrik']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Desa</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('desa', null, ['class' => 'form-control required auto-tabindex focus', 'placeholder' => 'Pilih Desa']) !!}
		</div>
	</div>
</fieldset>

{!! Form::hidden( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[negara]', 'indonesia', ['class' => 'form-control auto-tabindex', 'placeholder' => 'Pilih Kota', 'data-placeholder' => 'Pilih Kota']) !!}