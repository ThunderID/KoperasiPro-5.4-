{!! Form::open(['url' => route('credit.updating', ['id' => $page_datas->credit['id']]), 'class' => 'no-enter']) !!}

<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data keluarga</h4>
</div>
{{-- informasi umum --}}
<b><h5>Info Umum</h5></b>
<fieldset class="form-group">
	<label for="">Hubungan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('keluarga[hubungan]', [
				'pasangan'		=> 'Pasangan',
				'orang_tua'		=> 'Orang Tua'
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['hubungan']) ? $page_datas->credit['kreditur']['relasi'][0]['hubungan'] : ''), ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">NIK</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('keluarga[nik]', (!empty($page_datas->credit['kreditur']['relasi'][0]['nik']) ? $page_datas->credit['kreditur']['relasi'][0]['nik'] : ''), ['class' => 'form-control required auto-tabindex focus mask-id-card', 'placeholder' => 'Ex. 11 00 36 08 76 0001']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::text('keluarga[nama]', (!empty($page_datas->credit['kreditur']['relasi'][0]['nama']) ? $page_datas->credit['kreditur']['relasi'][0]['nama'] : ''), ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. Suena Morn']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Tempat Lahir</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('keluarga[tempat_lahir]', $page_datas->cities_all, (!empty($page_datas->credit['kreditur']['relasi'][0]['tempat_lahir']) ? $page_datas->credit['kreditur']['relasi'][0]['tempat_lahir'] : ''), ['class' => 'form-control select select-tempat-lahir required auto-tabindex', 'placeholder' => 'Ex. Surabaya', 'data-placeholder' => 'Ex. Surabaya']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('keluarga[tanggal_lahir]', (!empty($page_datas->credit['kreditur']['relasi'][0]['tanggal_lahir']) ? $page_datas->credit['kreditur']['relasi'][0]['tanggal_lahir'] : ''), ['class' => 'form-control date mask-date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('keluarga[jenis_kelamin]', [
				'male'		=> 'Laki-laki',
				'female'	=> 'Perempuan'
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['jenis_kelamin']) ? $page_datas->credit['kreditur']['relasi'][0]['jenis_kelamin'] : ''), ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Agama</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('keluarga[agama]', [
				'buddha' 	=> 'Buddha', 
				'hindu' 	=> 'Hindu',
				'islam'		=> 'Islam',
				'protestan'	=> 'Kristen Protestan',
				'katolik'	=> 'Kristen Katolik',
				'konghucu'	=> 'Konghucu'
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['agama']) ? $page_datas->credit['kreditur']['relasi'][0]['agama'] : ''), ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-10">
			{!! Form::select('keluarga[status_perkawinan]', [
				'married' 		=> 'Menikah',
				'single'		=> 'Belum Menikah',
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['status_perkawinan']) ? $page_datas->credit['kreditur']['relasi'][0]['status_perkawinan'] : ''), ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Pendidikan Terakhir</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('keluarga[pendidikan_terakhir]', [
				'tk'			=> 'TK',
				'sd'			=> 'SD',
				'smp'			=> 'SMP',
				'sma'			=> 'SMA/Sederajat',
				'sarjana'		=> 'S1',
				'magister'		=> 'S2',
				'doctor'		=> 'S3'
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['pendidikan_terakhir']) ? $page_datas->credit['kreditur']['relasi'][0]['pendidikan_terakhir'] : ''), ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>


<fieldset class="form-group">
	<label for="">Kewarganegaraan</label>
	<div class="row">
		<div class="col-md-10">
			{!! Form::select('keluarga[kewarganegaraan]', [
				'wni' 		=> 'WNI',
				'wna'		=> 'WNA',
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['kewarganegaraan']) ? $page_datas->credit['kreditur']['relasi'][0]['kewarganegaraan'] : ''), ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>


<div class="clearfix">&nbsp;</div>
<hr />
<div class="clearfix">&nbsp;</div>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'keluarga',
		'province' 	=> $page_datas->province,
		'cities'	=> $page_datas->cities
	]
])
<div class="clearfix">&nbsp;</div>
<hr />
<div class="clearfix">&nbsp;</div>

{{-- panel contact --}}
@include('components.helpers.panels.contact', [ 
	'param'	=> [
		'target'	=> 'template-contact-person',
		'prefix'	=> 'keluarga',
		'class'		=> [
			'init_add'		=> 'init-add-one'
		]
]])

<div class="clearfix">&nbsp;</div>
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