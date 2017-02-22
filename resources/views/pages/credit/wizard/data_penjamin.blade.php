<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Penjamin</h4>
</div>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('warrantor[name]', null, ['class' => 'form-control auto-tabindex focus', 'placeholder' => 'Ex. Sudarsono']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('warrantor[address][street]', null, ['class' => 'form-control auto-tabindex', 'placeholder' => 'Ex. Jln. Blimbing No. 8']) !!}
		</div>
		<div class="col-md-3 p-l-none">
			<a href="#" class="btn btn-link btn-sm p-l-none p-r-none open-modal" data-toggle="modal" data-target=".modal"><i class="fa fa-search"></i> Cari Alamat yg Ada</a>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Negara</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('warrantor[address][country]', 'Indonesia', ['class' => 'form-control', 'placeholder auto-tabindex' => 'Ex. Indonesia']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Provinsi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('address[province]', $page_datas->province, null, ['class' => 'form-control auto-tabindex select select-province', 'placeholder' => 'Pilih Provinsi', 'data-placeholder' => 'Pilih Provinsi', 'data-url' => route('cities.index')]) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kota</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('address[city]', $page_datas->cities, null, ['class' => 'form-control auto-tabindex select select-cities', 'placeholder' => 'Pilih Kota', 'data-placeholder' => 'Pilih Kota']) !!}
		</div>
	</div>
</fieldset>