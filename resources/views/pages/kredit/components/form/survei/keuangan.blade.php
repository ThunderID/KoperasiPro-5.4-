{!! Form::hidden('keuangan[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group p-b-md">
	<label class="text-sm">Penghasilan Rutin</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[penghasilan_rutin]', (isset($param['data']['penghasilan_rutin']) ? $param['data']['penghasilan_rutin'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Penghasilan Pasangan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[penghasilan_pasangan]', (isset($param['data']['penghasilan_pasangan']) ? $param['data']['penghasilan_pasangan'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Penghasilan Usaha</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[penghasilan_usaha]', (isset($param['data']['penghasilan_usaha']) ? $param['data']['penghasilan_usaha'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Biaya Rutin</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_rutin]', (isset($param['data']['biaya_rutin']) ? $param['data']['biaya_rutin'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Biaya Rumah Tangga</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_rumah_tangga]', (isset($param['data']['biaya_rumah_tangga']) ? $param['data']['biaya_rumah_tangga'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Biaya Pendidikan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_pendidikan]', (isset($param['data']['biaya_pendidikan']) ? $param['data']['biaya_pendidikan'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Biaya Angsuran Kredit</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_angsuran_kredit]', (isset($param['data']['biaya_angsuran_kredit']) ? $param['data']['biaya_angsuran_kredit'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Biaya Lain</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[biaya_lain]', (isset($param['data']['biaya_lain']) ? $param['data']['biaya_lain'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Sumber Pendapatan Utama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('keuangan[sumber_pendapatan_utama]', (isset($param['data']['sumber_pendapatan_utama']) ? $param['data']['sumber_pendapatan_utama'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jumlah Tanggungan Keluarga</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::text('keuangan[jumlah_tanggungan_keluarga]', (isset($param['data']['jumlah_tanggungan_keluarga']) ? $param['data']['jumlah_tanggungan_keluarga'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '']) !!}
				<div class="input-group-addon">Orang</div>
			</div>
		</div>
	</div>
</fieldset>