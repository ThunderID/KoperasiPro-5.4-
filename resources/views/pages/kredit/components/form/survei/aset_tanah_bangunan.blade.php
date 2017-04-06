{!! Form::hidden('aset_tanah_bangunan[id]', (isset($data['id']) ? $data['id'] : null)) !!}
<fieldset class="form-group">
	<label for="">Tipe</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_tanah_bangunan[tipe]', [
				'bangunan'	=> 'Bangunan',
				'tanah'		=> 'Tanah',
				], (isset($data['tipe']) ? $data['tipe'] : 'bangunan'), ['class' => 'form-control']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::text('aset_tanah_bangunan[luas]', (isset($data['luas']) ? $data['luas'] : null), ['class' => 'form-control mask-number']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> ['prefix'	=> 'aset_tanah_bangunan'],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> ''
	]
])