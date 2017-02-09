<div class="page-header m-t-none m-b-xl p-b-xs">
	<h2 class="m-t-none m-b-xs">Data Jaminan</h2>
</div>
<fieldset class="form-group">
	<label for="">Jenis</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan[jenis]', null, ['class' => 'form-control', 'placeholder' => 'Jenis jaminan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kepemilikan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan[Kepemilikan]', null, ['class' => 'form-control', 'placeholder' => 'Pemilik jaminan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<div class="row">
		<div class="col-md-5">
			<a href="javascript:void(0);" class="btn btn-link"><i class="fa fa-plus"></i> Jaminan</a>
		</div>
	</div>
</fieldset>