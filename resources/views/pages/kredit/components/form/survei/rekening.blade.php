<fieldset class="form-group p-b-md">
	<label for="">Nama Bank</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('kas_rekening[][nama_bank]', [
				'bca'		=> 'BCA',
				'bni'		=> 'BNI',
				'bri'		=> 'BRI',
				'danamon'	=> 'Danamon',
				'mandiri'	=> 'Mandiri',
				'00000'		=> 'Lainnya',
			], null, ['class' => 'form-control']) !!} <br/>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Atas Nama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kas_rekening[][atas_nama]', null, ['class' => 'form-control', 'placeholder' => 'atas nama']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Saldo Awal</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kas_rekening[][saldo_awal]', null, ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Saldo Akhir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('kas_rekening[][saldo_akhir]', null, ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>