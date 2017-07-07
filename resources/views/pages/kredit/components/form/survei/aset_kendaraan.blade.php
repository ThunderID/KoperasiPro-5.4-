{!! Form::hidden('aset_kendaraan[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Tipe</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_kendaraan[tipe]', $page_datas->select_jenis_kendaraan, (isset($param['data']['tipe']) && !is_null($param['data']['tipe'])) ? $param['data']['tipe'] : 'roda_2', ['class' => 'form-control quick-select select auto-tabindex focus']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nomor BPKB</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('aset_kendaraan[nomor_bpkb]', (isset($param['data']['nomor_bpkb']) && !is_null($param['data']['nomor_bpkb'])) ? $param['data']['nomor_bpkb'] : (isset($param['data']['nomor_bpkb']) && !is_null($param['data']['nomor_bpkb'])) ? $param['data']['nomor_bpkb'] : null, ['class' => 'form-control auto-tabindex']) !!}
		</div>
	</div>
</fieldset>