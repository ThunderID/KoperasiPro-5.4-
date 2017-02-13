<div class="page-header m-t-none m-b-xl p-b-xs">
	<h4 class="m-t-none m-b-xs">Data Pribadi</h4>
</div>
{{-- informasi umum --}}
<b><h5>Info Umum</h5></b>

<fieldset class="form-group">
	<label for="">NIK</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[nik]', null, ['class' => 'form-control', 'placeholder' => 'NIK']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[name]', null, ['class' => 'form-control', 'placeholder' => 'Ex. Suena Morn']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Tempat Lahir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[place_of_birth]', null, ['class' => 'form-control', 'placeholder' => 'Tempat lahir']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[date_of_birth]', null, ['class' => 'form-control', 'placeholder' => 'Tanggal lahir']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[gender]', null, ['class' => 'form-control', 'placeholder' => 'Jenis Kelamin']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Agama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[religion]', null, ['class' => 'form-control', 'placeholder' => 'Agama']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Pendidikan Terakhir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[highest_education]', null, ['class' => 'form-control', 'placeholder' => 'Pendidikan Terakhir']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[marital_status]', null, ['class' => 'form-control', 'placeholder' => 'Status pernikahan']) !!}
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
			{!! Form::text('address[street]', null, ['class' => 'form-control', 'placeholder' => 'Nama Jalan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kota</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('address[city]', null, ['class' => 'form-control', 'placeholder' => 'Kota']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Provinsi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('address[province]', null, ['class' => 'form-control', 'placeholder' => 'Provinsi']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Negara</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('address[country]', null, ['class' => 'form-control', 'placeholder' => 'Negara']) !!}
		</div>
	</div>
</fieldset>

{{-- informasi kontak --}}
<br />
<strong><h5>Kontak</h5></strong>
<fieldset class="form-group">
	<label for="">No. Hp</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[phone_number]', null, ['class' => 'form-control', 'placeholder' => 'Nomor Handphone']) !!}
		</div>
	</div>
</fieldset>
