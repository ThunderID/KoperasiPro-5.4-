<fieldset class="form-group">
	<label for="">Tipe</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_tanah_bangunan[][tipe]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Tanah</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_tanah_bangunan[][luas_tanah]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_tanah_bangunan[][luas_bangunan]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> ['prefix'	=> 'aset_tanah_bangunan[]'],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> ''
	]
])