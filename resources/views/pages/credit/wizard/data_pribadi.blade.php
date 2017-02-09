<div class="page-header m-t-none m-b-xl p-b-xs">
	<h2 class="m-t-none m-b-xs">Data Pribadi</h2>
</div>
{{-- informasi umum --}}
<b><h5>Info Umum</h5></b>
<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[nama]', null, ['class' => 'form-control', 'placeholder' => 'Ex. Suena Morn']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">No. Rekening</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[nomor_rekening]', null, ['class' => 'form-control', 'placeholder' => 'Jenis kelamin']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Tempat Lahir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[tempat_lahir]', null, ['class' => 'form-control', 'placeholder' => 'Tempat lahir']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[tanggal_lahir]', null, ['class' => 'form-control', 'placeholder' => 'Tanggal lahir']) !!}
		</div>
	</div>
</fieldset>

{{-- informasi alamat --}}
<br />
<b><h5>Alamat</h5></b>
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('kreditur[alamat][jalan]', null, ['class' => 'form-control', 'placeholder' => 'Nama Jalan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kelurahan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[alamat][kelurahan]', null, ['class' => 'form-control', 'placeholder' => 'Kelurahan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kecamatan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[alamat][kecamatan]', null, ['class' => 'form-control', 'placeholder' => 'Kecamatan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kota</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[alamat][kota]', null, ['class' => 'form-control', 'placeholder' => 'Kota']) !!}
		</div>
	</div>
</fieldset>

{{-- informasi kontak --}}
<br />
<strong><h5>Kontak</h5></strong>
<fieldset class="form-group">
	<label for="">No. Telp</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[kontak][telp]', null, ['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">No. Hp</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kreditur[kontak][handphone]', null, ['class' => 'form-control', 'placeholder' => 'Nomor Handphone']) !!}
		</div>
	</div>
</fieldset>