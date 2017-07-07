{!! Form::hidden('aset_tanah_bangunan[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Nomor Sertifikat</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('aset_tanah_bangunan[nomor_sertifikat]', (isset($param['data']['nomor_sertifikat']) ? $param['data']['nomor_sertifikat'] : null), ['class' => 'form-control auto-tabindex']) !!}
			</div>
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label class="text-sm">Tipe</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_tanah_bangunan[tipe]', [
				'ruko'		=> 'Ruko',
				'rumah'		=> 'Rumah',
				'tambak'	=> 'Tambak',
				'lain_lain'	=> 'Lain lain',
				], (isset($param['data']['tipe']) ? $param['data']['tipe'] : 'ruko'), ['class' => 'form-control quick-select select auto-tabindex focus']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Luas</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('aset_tanah_bangunan[luas]', (isset($param['data']['luas']) ? $param['data']['luas'] : null), ['class' => 'form-control mask-number auto-tabindex']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'aset_tanah_bangunan',
		'data'		=> isset($param['data']['alamat']) ? $param['data']['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> ''
	]
])