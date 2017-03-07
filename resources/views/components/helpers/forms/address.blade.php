{{-- 
	Plugin address
	Description: form untuk alamat
	Usage:
	- Variable
	- Param
		$param['province']: list province indonesian
		$param['cities']: list cities for province selected
 --}}
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('alamat[jalan]', null, ['class' => 'form-control auto-tabindex', 'placeholder' => 'Ex. Jln. Blimbing No. 8']) !!}
		</div>
		<div class="col-md-3 p-l-none">
			<a href="#" class="btn btn-link btn-sm p-l-none p-r-none open-modal" data-toggle="modal" data-target=".modal"><i class="fa fa-search"></i> Cari Alamat yg Ada</a>
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Provinsi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('alamat[provinsi]', $param['province'], null, ['class' => 'form-control auto-tabindex select select-province', 'placeholder' => 'Pilih Provinsi', 'data-placeholder' => 'Pilih Provinsi', 'data-url' => route('cities.index')]) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Kota</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('alamat[kota]', [], null, ['class' => 'form-control auto-tabindex select select-cities', 'placeholder' => 'Pilih Kota', 'data-placeholder' => 'Pilih Kota']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Kodepos</label>
	<div class="row">
		<div class="col-md-2">
			{!! Form::number('alamat[kode_pos]', null, ['class' => 'form-control auto-tabindex required input-kodepos', 'placeholder' => 'Kodepos']) !!}
		</div>
	</div>
</fieldset>