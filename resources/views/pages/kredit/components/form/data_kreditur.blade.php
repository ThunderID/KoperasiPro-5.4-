<div class="m-t-none m-b-md p-b-md">
	<h4 class="m-t-none m-b-xs">Data Kreditur</h4>
</div>
{{-- informasi umum --}}
<b><h5>Info Umum</h5></b>

<fieldset class="form-group">
	<label for="">E-KTP</label>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			{!! Form::checkbox('kreditur[is_ektp]', true, false, ['class' => 'form-control input-switch focus', 'data-inverse' => 'true', 'data-on-color' => 'primary']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">NIK</label>
	<div class="row">
		<div class="col-md-4">
			<div class="input-group">
				<div class="input-group-addon">35-</div>
				{!! Form::text('kreditur[nik]', null, ['class' => 'form-control required auto-tabindex mask-id-card', 'placeholder' => '00-36-08-76-0001']) !!}
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('kreditur[nama]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. Suena Morn']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('kreditur[tanggal_lahir]', null, ['class' => 'form-control date mask-date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('kreditur[jenis_kelamin]', [
				'laki-laki'		=> 'Laki-laki',
				'perempuan'		=> 'Perempuan'
			], 'laki-laki', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group p-b-sm">
	<label for="">Foto KTP</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('kreditur[foto_ktp]', null, ['class' => 'form-control auto-tabindex']) !!}
			<span class="help-block">Note: berupa gambar url ex. https://www.example.com/image.jpg</span>
		</div>
	</div>
</fieldset>

<hr/>
<div class="clearfix">&nbsp;</div>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'kreditur',
		'provinsi' 	=> $page_datas->province,
		'regensi'	=> $page_datas->cities,
	]
])

<hr />
<div class="clearfix">&nbsp;</div>

{{-- panel contact --}}
@include('components.helpers.panels.contact', [ 
	'param'	=> [
		'target'	=> 'template-contact-person',
		'prefix'	=> 'kreditur',
		'class'		=> [
			'init_add'		=> 'init-add-one'
		]
]])