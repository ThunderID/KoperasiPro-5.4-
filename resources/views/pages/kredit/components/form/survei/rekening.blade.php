{!! Form::hidden('rekening[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Nama Bank</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('rekening[rekening]', [
				'bca'		=> 'BCA',
				'bni'		=> 'BNI',
				'bri'		=> 'BRI',
				'danamon'	=> 'Danamon',
				'mandiri'	=> 'Mandiri',
				'lain_lain'	=> 'Lainnya',
			], (isset($param['data']['rekening']) ? (in_array($param['data']['rekening'], ['bca', 'bni', 'bri', 'danamon', 'mandiri']) ? $param['data']['rekening'] : 'lain_lain') : 'bca'), 
			['class' => 'form-control auto-tabindex quick-select select', 'data-other' => 'input-rekening-nama-bank']) !!} 
			{{-- <br/> --}}
			{{-- {!! Form::text('rekening[rekening]', (isset($param['data']['rekening']) ? $param['data']['rekening'] : 'bca'), ['class' => 'form-control auto-tabindex m-t-sm input-rekening-nama-bank ' . 
			(isset($param['data']['rekening']) && (in_array($param['data']['rekening'], ['bca', 'bni', 'bri', 'danamon', 'mandiri']) ? 'hidden' : !isset($param['data']['rekening']) ? 'hidden' : ''))]) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nomor Rekening</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('rekening[nomor_rekening]', (isset($param['data']['nomor_rekening']) ? $param['data']['nomor_rekening'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'nomor rekening']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label class="text-sm">Tanggal Saldo Awal</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('rekening[tanggal_awal]', (isset($param['data']['tanggal_awal']) ? $param['data']['tanggal_awal'] : null), ['class' => 'form-control date mask-date auto-tabindex', 'placeholder' => 'tanggal/bulan/tahun (dd/mm/yyyy)']) !!}
			<span class="help-block m-b-none">format pengisian (tanggal/bulan/tahun)</span>
		</div>
	</div>
</fieldset>


<fieldset class="form-group">
	<label class="text-sm">Saldo Awal</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('rekening[saldo_awal]', (isset($param['data']['saldo_awal']) ? $param['data']['saldo_awal'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label class="text-sm">Tanggal Saldo Akhir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('rekening[tanggal_akhir]', (isset($param['data']['tanggal_akhir']) ? $param['data']['tanggal_akhir'] : null), ['class' => 'form-control date mask-date auto-tabindex', 'placeholder' => 'tanggal/bulan/tahun (dd/mm/yyyy)']) !!}
			<span class="help-block m-b-none">format pengisian (tanggal/bulan/tahun)</span>
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label class="text-sm">Saldo Akhir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('rekening[saldo_akhir]', (isset($param['data']['saldo_akhir']) ? $param['data']['saldo_akhir'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
