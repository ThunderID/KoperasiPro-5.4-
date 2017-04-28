{!! Form::hidden('kepribadian[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Nama Referens</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kepribadian[nama_referens]', (isset($param['data']['nama_referens']) ? $param['data']['nama_referens'] : null), ['class' => 'form-control auto-tabindex']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Hubungan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('kepribadian[hubungan]', [
				'orang_tua'		=> 'Orang Tua',
				'pasangan'		=> 'Pasangan',
				'saudara'		=> 'Saudara',
				'rekan_kerja'	=> 'Rekan Kerja',
				'tetangga'		=> 'Tetangga',
			], (isset($param['data']['hubungan']) ? $param['data']['hubungan'] : 'orang_tua'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Telepon</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('kepribadian[telepon_referens]', (isset($param['data']['telepon_referens']) ? $param['data']['telepon_referens'] : null), ['class' => 'form-control auto-tabindex mask-number']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Uraian</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kepribadian[uraian]', (isset($param['data']['uraian']) ? $param['data']['uraian'] : null), ['class' => 'form-control auto-tabindex']) !!}
		</div>
	</div>
</fieldset>