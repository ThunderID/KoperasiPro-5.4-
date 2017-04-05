<fieldset class="form-group">
	<label for="">Tipe</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_kendaraan[][tipe]', $page_datas->select_jenis_kendaraan, 'roda_2', ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nomor BPKB</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_kendaraan[][nomor_bpkb]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>