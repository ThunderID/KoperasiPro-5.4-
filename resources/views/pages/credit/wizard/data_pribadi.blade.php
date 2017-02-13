<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Pribadi</h4>
</div>
{{-- informasi umum --}}
<b><h5>Info Umum</h5></b>

<fieldset class="form-group">
	<label for="">NIK</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('person[nik]', null, ['class' => 'form-control number', 'placeholder' => 'NIK']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('person[name]', null, ['class' => 'form-control required', 'placeholder' => 'Ex. Suena Morn']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Tempat Lahir</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('person[place_of_birth]', null, ['class' => 'form-control required', 'placeholder' => 'Ex. Surabaya']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('person[date_of_birth]', null, ['class' => 'form-control dateFormat date_format', 'placeholder' => 'Ex. 19/03/1987']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-5">
			<label class="radio-inline">
				{!! Form::radio('person[gender]', 'male', true) !!} Laki-laki
			</label>
			<label class="radio-inline">
				{!! Form::radio('person[gender]', 'female') !!} Perempuan
			</label>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Agama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('person[religion]', [
				'buddha' 	=> 'Buddha', 
				'hindu' 	=> 'Hindu',
				'islam'		=> 'Islam',
				'protestan'	=> 'Kristen Protestan',
				'katolik'	=> 'Kristen Katolik'
			], null, ['class' => 'form-control']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Pendidikan Terakhir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('person[highest_education]', null, ['class' => 'form-control required', 'placeholder' => 'Pendidikan Terakhir']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('person[marital_status]', [
				'cerai'		=> 'Cerai',
				'single' 	=> 'Single',
				'menikah'	=> 'Menikah',
			], null, ['class' => 'form-control']) !!}
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
