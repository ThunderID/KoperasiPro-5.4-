<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Kredit</h4>
</div>
<fieldset class="form-group">
	<label for="">Jumlah Pinjaman</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('credit[credit_amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Jumlah pinjaman']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Kemampuan Jumlah Angsuran</label>
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				{!! Form::text('credit[installment]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Kemampuan jumlah angsuran']) !!}
				<div class="input-group-addon">/ Bulan</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lama Angsuran</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::number('credit[period]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Lama angsuran', 'min' => '1', 'max' => '50']) !!}
				<div class="input-group-addon">Bulan</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Tujuan Kredit</label>
	<div class="row">
		<div class="col-md-12">
			<div class="input-group">
				{!! Form::textarea('credit[purpose]', null, ['class' => 'form-control no-resize required auto-tabindex', 'placeholder' => 'Tujuan kredit', 'rows' => '2', 'cols' => '120']) !!}
			</div>
		</div>
	</div>
</fieldset>