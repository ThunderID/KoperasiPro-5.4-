<fieldset class="form-group">
	<label for="">Dilingkungan Tinggal</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('personality[residence][acquinted]', [
				'dikenal'			=> 'Dikenal',
				'kurang_dikenal'	=> 'Kurang Dikenal',
				'tidak_dikenal'		=> 'Tidak Dikenal'
			], 'dikenal', ['class' => 'form-control quick-select residence-acquinted']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Dilingkungan Kerja</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('personality[workplace][acquinted]', [
				'dikenal'			=> 'Dikenal',
				'kurang_dikenal'	=> 'Kurang Dikenal',
				'tidak_dikenal'		=> 'Tidak Dikenal'
			], 'dikenal', ['class' => 'form-control quick-select workplace-acquinted']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Karakter</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('personality[character]', [
				'baik'			=> 'Baik',
				'kurang_baik'	=> 'Cukup Baik',
				'tidak_baik'	=> 'Tidak Baik'
			], 'baik', ['class' => 'form-control quick-select character']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Pola Hidup</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('personality[lifestyle]', [
				'sederhana'		=> 'Sederhana',
				'mewah'			=> 'Mewah'
			], 'sederhana', ['class' => 'form-control quick-select lifestyle']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Keterangan Lain</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::text('personality[notes][0]', null, ['class' => 'form-control no-resize required auto-tabindex', 'placeholder' => 'Keterangan Lain']) !!}
		</div>
	</div>
</fieldset>