<div class="page-header m-t-none m-b-xl p-b-xs">
	<h2 class="m-t-none m-b-xs">Data Penjamin</h2>
</div>
<fieldset class="form-group">
	<label for="">Hubungan Sebagai</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penjamin[hubungan]', null, ['class' => 'form-control', 'placeholder' => 'Penjamin hubungan sebagai']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penjamin[nama]', null, ['class' => 'form-control', 'placeholder' => 'Nama penjamin']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Alamat</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penjamin[alamat][jalan]', null, ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kelurahan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penjamin[alamat][kelurahan]', null, ['class' => 'form-control', 'placeholder' => 'kelurahan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kecamatan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penjamin[alamat][kecamatan]', null, ['class' => 'form-control', 'placeholder' => 'kecamatan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kota</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penjamin[alamat][kota]', null, ['class' => 'form-control', 'placeholder' => 'kota']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">No. Telp</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penjamin[kontak][telepon]', null, ['class' => 'form-control', 'placeholder' => 'Nomor telepon']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Handphone</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penjamin[kontak][handphone]', null, ['class' => 'form-control', 'placeholder' => 'Nomor handphone']) !!}
		</div>
	</div>
</fieldset>