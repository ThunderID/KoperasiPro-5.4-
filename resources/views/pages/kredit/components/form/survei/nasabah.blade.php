{!! Form::hidden('nasabah[id]', (isset($data['id']) ? $data['id'] : null)) !!}
<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-5">
			@if (isset($data['id']))
				{!! Form::text('nasabah[nama]', (isset($data['nama']) ? $data['nama'] : null), ['class' => 'form-control', 'readonly' => true]) !!}
			@else
				{!! Form::text('nasabah[nama]', (isset($data['nama']) ? $data['nama'] : null), ['class' => 'form-control']) !!}
			@endif
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Status</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('nasabah[status]', [
				'baru'	=> 'Baru',
				'lama'	=> 'Lama',
			], (isset($data['status']) ? $data['status'] : null), ['class' => 'form-control']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kredit Terdahulu</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('nasabah[kredit_terdahulu]', [
				'kurang_lancar'	=> 'Kurang Lancar',
				'lancar'		=> 'Lancar',
				'macet'			=> 'Macet',
			], (isset($data['kredit_terdahulu']) ? $data['kredit_terdahulu'] : null), ['class' => 'form-control']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jaminan Terdahulu</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('nasabah[jaminan_terdahulu]', [
				'sama'			=> 'Sama',
				'tidak_sama'	=> 'Tidak Sama',
			], (isset($data['jaminan_terdahulu']) ? $data['jaminan_terdahulu'] : null), ['class' => 'form-control']) !!}
		</div>
	</div>
</fieldset>