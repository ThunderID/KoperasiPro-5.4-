<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Penjamin</h4>
</div>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('warrantor[name]', null, ['class' => 'form-control', 'placeholder' => 'Nama penjamin']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('warrantor[address][street]', null, ['class' => 'form-control', 'placeholder' => 'Jalan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kota</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('warrantor[address][city]', null, ['class' => 'form-control', 'placeholder' => 'Kota']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Provinsi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('warrantor[address][province]', null, ['class' => 'form-control', 'placeholder' => 'Provinsi']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Negara</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('warrantor[address][country]', null, ['class' => 'form-control', 'placeholder' => 'Negara']) !!}
		</div>
	</div>
</fieldset>
