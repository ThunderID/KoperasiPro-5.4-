{!! Form::hidden('nasabah[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Nama</label>
	<div class="row">
		<div class="col-md-5">
			@if (isset($param['data']['id']))
				{!! Form::text('nasabah[nama]', (isset($param['data']['nama']) ? $param['data']['nama'] : null), ['class' => 'form-control auto-tabindex', 'readonly' => true]) !!}
			@else
				{!! Form::text('nasabah[nama]', (isset($param['data']['nama']) ? $param['data']['nama'] : null), ['class' => 'form-control auto-tabindex']) !!}
			@endif
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Status</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::select('nasabah[status]', [
				'baru'	=> 'Baru',
				'lama'	=> 'Lama',
			], (isset($param['data']['status']) ? $param['data']['status'] : null), ['class' => 'form-control auto-tabindex select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Kredit Terdahulu</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::select('nasabah[kredit_terdahulu]', [
				'kurang_lancar'	=> 'Kurang Lancar',
				'lancar'		=> 'Lancar',
				'macet'			=> 'Macet',
			], (isset($param['data']['kredit_terdahulu']) ? $param['data']['kredit_terdahulu'] : null), ['class' => 'form-control auto-tabindex select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jaminan Terdahulu</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::select('nasabah[jaminan_terdahulu]', [
				'sama'			=> 'Sama',
				'tidak_sama'	=> 'Tidak Sama',
			], (isset($param['data']['jaminan_terdahulu']) ? $param['data']['jaminan_terdahulu'] : null), ['class' => 'form-control auto-tabindex select']) !!}
		</div>
	</div>
</fieldset>