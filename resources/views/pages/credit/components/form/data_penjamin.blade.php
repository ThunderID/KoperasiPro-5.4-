{!! Form::open(['url' => route('credit.updating', ['id' => $page_datas->credit['id']]), 'method' => 'POST', 'class' => '']) !!}

<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Penjamin</h4>
</div>
{{-- informasi umum --}}
<b><h5>Info Umum</h5></b>

<fieldset class="form-group">
	<label for="">Hubungan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('penjamin[hubungan]', [
				'pasangan'		=> 'Pasangan',
				'orang_tua'		=> 'Orang Tua'
			], 'pasangan', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">NIK</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('penjamin[nik]', null, ['class' => 'form-control required auto-tabindex focus mask-id-card', 'placeholder' => 'Ex. 11 00 36 08 76 0001']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::text('penjamin[nama]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. Suena Morn']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Tempat Lahir</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('penjamin[tempat_lahir]', $page_datas->cities_all, null, ['class' => 'form-control select required auto-tabindex', 'placeholder' => 'Ex. Surabaya', 'data-placeholder' => 'Ex. Surabaya']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('penjamin[tanggal_lahir]', null, ['class' => 'form-control date mask-date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('penjamin[jenis_kelamin]', [
				'male'		=> 'Laki-laki',
				'female'	=> 'Perempuan'
			], 'male', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Agama</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('penjamin[agama]', [
				'buddha' 	=> 'Buddha', 
				'hindu' 	=> 'Hindu',
				'islam'		=> 'Islam',
				'protestan'	=> 'Kristen Protestan',
				'katolik'	=> 'Kristen Katolik',
				'konghucu'	=> 'Konghucu'
			], 'buddha', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-10">
			{!! Form::select('penjamin[status_perkawinan]', [
				'married' 		=> 'Menikah',
				'single'		=> 'Belum Menikah',
			], 'married', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Pendidikan Terakhir</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('penjamin[pendidikan_terakhir]', [
				'tk'			=> 'TK',
				'sd'			=> 'SD',
				'smp'			=> 'SMP',
				'sma'			=> 'SMA/Sederajat',
				'sarjana'		=> 'S1',
				'magister'		=> 'S2',
				'doctor'		=> 'S3'
			], 'tk', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>


<fieldset class="form-group">
	<label for="">Kewarganegaraan</label>
	<div class="row">
		<div class="col-md-10">
			{!! Form::select('penjamin[kewarganegaraan]', [
				'wni' 		=> 'WNI',
				'wna'		=> 'WNA',
			], 'wni', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>


<div class="clearfix">&nbsp;</div>
<hr />
<div class="clearfix">&nbsp;</div>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'penjamin',
		'province' 	=> $page_datas->province,
		'cities'	=> $page_datas->cities
	]
])
<div class="clearfix">&nbsp;</div>
<hr />
<div class="clearfix">&nbsp;</div>

<div class="modal-footer">
	<a type='button' class="btn btn-default" data-dismiss='modal'>
		Cancel
	</a>
	<button type="submit" class="btn btn-success">
		Save
	</button>
</div>	

{!! Form::close() !!}	
