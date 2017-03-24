{{-- informasi umum --}}
<b><h5>Info Umum</h5></b>
<fieldset class="form-group">
	<label for="">Hubungan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('relasi[hubungan]', [
				'orang_tua'		=> 'Orang Tua',
				'pasangan'		=> 'Pasangan',
				'saudara'		=> 'Saudara',
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['hubungan']) ? $page_datas->credit['kreditur']['relasi'][0]['hubungan'] : ''), ['class' => 'form-control quick-select focus', 'data-other' => 'input-hubungan-keluarga']) !!}
			{!! Form::hidden('relasi[hubungan]', 'orang_tua', ['class' => 'input-hubungan-keluarga']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">E-KTP</label>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			{!! Form::checkbox('relasi[is_ektp]', true, false, ['class' => 'form-control input-switch auto-tabindex', 'data-inverse' => 'true', 'data-on-color' => 'primary']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">NIK</label>
	<div class="row">
		<div class="col-md-4">
			<div class="input-group">
				<div class="input-group-addon">35-</div>
				{!! Form::text('relasi[nik]', (!empty($page_datas->credit['kreditur']['relasi'][0]['nik']) ? $page_datas->credit['kreditur']['relasi'][0]['nik'] : ''), ['class' => 'form-control required auto-tabindex mask-id-card', 'placeholder' => '00-00-360876-0001']) !!}
			</div>
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('relasi[nama]', (!empty($page_datas->credit['kreditur']['relasi'][0]['nama']) ? $page_datas->credit['kreditur']['relasi'][0]['nama'] : ''), ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama Keluarga']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('relasi[tanggal_lahir]', (!empty($page_datas->credit['kreditur']['relasi'][0]['tanggal_lahir']) ? $page_datas->credit['kreditur']['relasi'][0]['tanggal_lahir'] : ''), ['class' => 'form-control date mask-date-format auto-tabindex', 'placeholder' => 'dd/mm/yyyy']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('relasi[jenis_kelamin]', [
				'laki-laki'		=> 'Laki-laki',
				'perempuan'		=> 'Perempuan'
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['jenis_kelamin']) ? $page_datas->credit['kreditur']['relasi'][0]['jenis_kelamin'] : ''), ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('relasi[status_perkawinan]', [
				'belum_kawin'		=> 'Belum Kawin',
				'cerai_hidup'		=> 'Cerai Hidup',
				'cerai_mati'		=> 'Cerai Mati',
				'kawin' 			=> 'Kawin',
			], (!empty($page_datas->credit['kreditur']['relasi'][0]['status_perkawinan']) ? $page_datas->credit['kreditur']['relasi'][0]['status_perkawinan'] : ''), ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

<hr />

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> ['prefix'	=> 'relasi'],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'						=> 'data-attribute-custome',
		'data_attribute_flag'		=> 'attribute-flag',
		'data_attribute_value'		=> '#modal-data-address',
	]
])

<hr />

{{-- panel contact --}}
@include('components.helpers.panels.contact', [ 
	'param'		=> [
		'target'	=> 'template-contact-person',
		'prefix'	=> 'keluarga',
	],
	'settings'	=> [
		'class'		=> [
			'init_add'		=> 'init-add-one'
		]
]])

<div class="clearfix">&nbsp;</div>


<div class="modal-footer">
	<a type='button' class="btn btn-default" data-dismiss='modal'>
		Cancel
	</a>
	<button type="submit" class="btn btn-primary">
		Simpan
	</button>
</div>	