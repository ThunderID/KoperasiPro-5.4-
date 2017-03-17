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
			{!! Form::select( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[provinsi]', $param['provinsi'], null, ['class' => 'form-control auto-tabindex select select-provinsi', 'placeholder' => 'Pilih Provinsi', 'data-placeholder' => 'Pilih Provinsi', 'data-url' => route('regensi.index'), 'style' => 'width:100%;']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Regensi</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[regensi]', [], null, ['class' => 'form-control auto-tabindex select select-regensi', 'placeholder' => 'Pilih Kota', 'disabled' => 'disabled', 'data-placeholder' => 'Pilih Regensi', 'data-url' => route('distrik.index'), 'style' => 'width:100%;']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Distrik</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[distrik]', [], null, ['class' => 'form-control auto-tabindex select select-distrik', 'placeholder' => 'Pilih Distrik', 'disabled' => 'disabled', 'data-placeholder' => 'Pilih Distrik', 'data-url' => route('desa.index'), 'style' => 'width:100%;']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group p-b-md">
	<label for="">Desa</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[desa]', [], null, ['class' => 'form-control auto-tabindex select select-desa', 'placeholder' => 'Pilih Desa', 'disabled' => 'disabled', 'data-placeholder' => 'Pilih Desa', 'style' => 'width:100%;']) !!}
		</div>
	</div>
</fieldset>

{!! Form::hidden( (!is_null($param['prefix']) ? $param['prefix'] . '[alamat]' : 'alamat') . '[negara]', 'indonesia') !!}