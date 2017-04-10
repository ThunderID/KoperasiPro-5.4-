{!! Form::hidden('kepribadian[id]', (isset($data['id']) ? $data['id'] : null)) !!}
<fieldset class="form-group">
	<label for="">Nama Referens</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kepribadian[nama_referens]', (isset($data['nama_referens']) ? $data['nama_referens'] : null), ['class' => 'form-control auto-tabindex']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Hubungan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('kepribadian[hubungan]', [
				'orang_tua'		=> 'Orang Tua',
				'pasangan'		=> 'Pasangan',
				'saudara'		=> 'Saudara',
				'rekan_kerja'	=> 'Rekan Kerja',
				'tetangga'		=> 'Tetangga',
			], (isset($data['hubungan']) ? $data['hubungan'] : 'orang_tua'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Telepon</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('kepribadian[telepon_referens]', (isset($data['telepon_referens']) ? $data['telepon_referens'] : null), ['class' => 'form-control auto-tabindex']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Uraian</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kepribadian[uraian]', (isset($data['uraian']) ? $data['uraian'] : null), ['class' => 'form-control auto-tabindex']) !!}
		</div>
	</div>
</fieldset>