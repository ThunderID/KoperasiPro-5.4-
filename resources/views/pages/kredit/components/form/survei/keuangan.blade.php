{!! Form::hidden('keuangan[id]', (isset($data['id']) ? $data['id'] : null)) !!}
<fieldset class="form-group p-b-md">
	<label for="">Penghasilan Rutin</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[penghasilan_rutin]', (isset($data['penghasilan_rutin']) ? $data['penghasilan_rutin'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Penghasilan Pasangan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[penghasilan_pasangan]', (isset($data['penghasilan_pasangan']) ? $data['penghasilan_pasangan'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Penghasilan Usaha</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[penghasilan_usaha]', (isset($data['penghasilan_usaha']) ? $data['penghasilan_usaha'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Biaya Rutin</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_rutin]', (isset($data['biaya_rutin']) ? $data['biaya_rutin'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Biaya Rumah Tangga</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_rumah_tangga]', (isset($data['biaya_rumah_tangga']) ? $data['biaya_rumah_tangga'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Biaya Pendidikan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_pendidikan]', (isset($data['biaya_pendidikan']) ? $data['biaya_pendidikan'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Biaya Angsuran Kredit</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_angsuran_kredit]', (isset($data['biaya_angsuran_kredit']) ? $data['biaya_angsuran_kredit'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Biaya Lain</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_lain]', (isset($data['biaya_lain']) ? $data['biaya_lain'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Sumber Pendapatan Utama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[sumber_pendapatan_utama]', (isset($data['sumber_pendapatan_utama']) ? $data['sumber_pendapatan_utama'] : null), ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jumlah Tanggungan Keluarga</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::number('keuangan[jumlah_tanggungan_keluarga]', (isset($data['jumlah_tanggungan_keluarga']) ? $data['jumlah_tanggungan_keluarga'] : null), ['class' => 'form-control', 'placeholder' => '']) !!}
				<div class="input-group-addon">Org</div>
			</div>
		</div>
	</div>
</fieldset>