<div class="page-header m-t-none m-b-xl p-b-xs">
	<h2 class="m-t-none m-b-xs">Data Kredit</h2>
</div>
<fieldset class="form-group">
	<label for="">No. Permohonan Kredit</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('nomor_kredit', null, ['class' => 'form-control', 'placeholder' => 'Ex. 09913365']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kemampuan Jumlah Angsuran</label>
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				{!! Form::text('kemampuan_angsuran', null, ['class' => 'form-control', 'placeholder' => 'Kemampuan jumlah angsuran']) !!}
				<div class="input-group-addon">/ Bulan</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lama Angsuran</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::text('jangka_waktu', null, ['class' => 'form-control', 'placeholder' => 'Lama angsuran']) !!}
				<div class="input-group-addon">Bulan</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jumlah Pinjaman</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('pengajuan_kredit', null, ['class' => 'form-control', 'placeholder' => 'Jumlah pinjaman']) !!}
		</div>
	</div>
</fieldset>