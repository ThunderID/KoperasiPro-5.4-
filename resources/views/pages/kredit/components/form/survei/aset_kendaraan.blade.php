{!! Form::hidden('aset_kendaraan[id]', (isset($data['id']) ? $data['id'] : null)) !!}
<fieldset class="form-group">
	<label for="">Tipe</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_kendaraan[tipe]', $page_datas->select_jenis_kendaraan, (isset($data['tipe']) ? $data['tipe'] : 'roda_2'), ['class' => 'form-control quick-select auto-tabindex focus']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nomor BPKB</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_kendaraan[nomor_bpkb]', (isset($data['nomor_bpkb']) ? $data['nomor_bpkb'] : null), ['class' => 'form-control auto-tabindex']) !!}
		</div>
	</div>
</fieldset>