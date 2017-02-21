<fieldset class="form-group">
	<label for="">Persaingan Usaha</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('ecomacro[competition]', [
				'padat'			=> 'Padat',
				'sedang'		=> 'Sedang',
				'biasa'			=> 'Biasa'
			], 'padat', ['class' => 'form-control quick-select competition']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Prospek Usaha</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('ecomacro[prospect]', [
				'padat'			=> 'Padat',
				'sedang'		=> 'Sedang',
				'biasa'			=> 'Biasa'
			], 'padat', ['class' => 'form-control quick-select prospect']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Perputaran Usaha</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('ecomacro[turn_over]', [
				'padat'			=> 'Padat',
				'sedang'		=> 'Sedang',
				'lambat'		=> 'Lambat'
			], 'padat', ['class' => 'form-control quick-select turn_over']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Pengalaman Usaha</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('ecomacro[experience]', [
				'lt-2'			=> '< 2 tahun',
				'lt-3'			=> '2 - 3 tahun',
				'lt-5'			=> '3 - 5 tahun',
				'gt-5'			=> '> 5 tahun'
			], 'lt-2', ['class' => 'form-control quick-select experience']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Resiko Usaha</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('ecomacro[risk]', [
				'bagus'			=> 'Bagus',
				'biasa'			=> 'Biasa',
				'suram'			=> 'Suram'
			], 'bagus', ['class' => 'form-control quick-select risk']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Jumlah Pelanggan Harian</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('ecomacro[daily_customer]', [
				'le-10'			=> '0 - 10',
				'le-50'			=> '10 - 50',
				'le-100'		=> '50 - 100',
				'gt-100'		=> '> 100'
			], 'le-10', ['class' => 'form-control quick-select daily_customer']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Keterangan Lain</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::text('ecomacro[others][0]', null, ['class' => 'form-control no-resize required auto-tabindex', 'placeholder' => 'Keterangan Lain']) !!}
		</div>
	</div>
</fieldset>