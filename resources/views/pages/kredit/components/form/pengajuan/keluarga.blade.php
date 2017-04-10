{{-- informasi umum --}}
{!! Form::hidden('relasi[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<b><h5>Info Umum</h5></b>
<fieldset class="form-group">
	<label for="">Hubungan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('relasi[hubungan]', [
				'orang_tua'		=> 'Orang Tua',
				'pasangan'		=> 'Pasangan',
				'saudara'		=> 'Saudara',
			], (!empty($param['data']['hubungan']) ? $param['data']['hubungan'] : ''), ['class' => 'form-control quick-select focus', 'data-other' => 'input-hubungan-keluarga']) !!}
			{!! Form::hidden('relasi[hubungan]', 'orang_tua', ['class' => 'input-hubungan-keluarga']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('relasi[nama]', (!empty($param['data']['nama']) ? $param['data']['nama'] : ''), ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama Keluarga']) !!}
		</div>
	</div>
</fieldset>

<hr />

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'relasi',
		'data'		=> isset($param['data']['alamat']) ? $param['data']['alamat'] : null, 
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'						=> 'data-attribute-custome',
		'data_attribute_flag'		=> 'attribute-flag',
		'data_attribute_value'		=> '#modal-data-address',
	]
])

<hr />

{{-- panel contact --}}
@include('components.helpers.forms.contact', [ 
	'param'		=> [
		'prefix'	=> 'relasi',
		'data'		=> isset($param['data']['telepon']) ? $param['data']['telepon'] : null, 
	],
])