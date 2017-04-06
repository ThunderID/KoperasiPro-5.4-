<fieldset class="form-group">
	<label for="">Tipe</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_tanah_bangunan[tipe]', [
				'bangunan'	=> 'Bangunan',
				'tanah'		=> 'Tanah',
				], (isset($data['tipe']) ? $data['tipe'] : 'bangunan'), ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Tanah</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::text('aset_tanah_bangunan[luas_tanah]', (isset($data['luas_tanah']) ? $data['luas_tanah'] : null), ['class' => 'form-control mask-number']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::text('aset_tanah_bangunan[luas_bangunan]', (isset($data['luas_bangunan']) ? $data['luas_bangunan'] : null), ['class' => 'form-control mask-number']) !!}
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