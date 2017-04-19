{!! Form::hidden('rekening[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group p-b-md">
	<label text-sm="">Nama Bank</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('rekening[nama_bank]', [
				'bca'		=> 'BCA',
				'bni'		=> 'BNI',
				'bri'		=> 'BRI',
				'danamon'	=> 'Danamon',
				'mandiri'	=> 'Mandiri',
				'lain_lain'	=> 'Lainnya',
			], (isset($param['data']['nama_bank']) ? (in_array($param['data']['nama_bank'], ['bca', 'bni', 'bri', 'danamon', 'mandiri']) ? $param['data']['nama_bank'] : 'lain_lain') : 'bca'), 
			['class' => 'form-control auto-tabindex quick-select', 'data-other' => 'input-rekening-nama-bank']) !!} <br/>
			{!! Form::text('rekening[nama_bank]', (isset($param['data']['nama_bank']) ? $param['data']['nama_bank'] : 'bca'), ['class' => 'form-control auto-tabindex m-t-sm input-rekening-nama-bank ' . 
			(isset($param['data']['nama_bank']) && (in_array($param['data']['nama_bank'], ['bca', 'bni', 'bri', 'danamon', 'mandiri']) ? 'hidden' : !isset($param['data']['nama_bank']) ? 'hidden' : ''))]) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label text-sm="">Atas Nama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('rekening[atas_nama]', (isset($param['data']['atas_nama']) ? $param['data']['atas_nama'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'atas nama']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label text-sm="">Saldo Awal</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('rekening[saldo_awal]', (isset($param['data']['saldo_awal']) ? $param['data']['saldo_awal'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label text-sm="">Saldo Akhir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('rekening[saldo_akhir]', (isset($param['data']['saldo_akhir']) ? $param['data']['saldo_akhir'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>