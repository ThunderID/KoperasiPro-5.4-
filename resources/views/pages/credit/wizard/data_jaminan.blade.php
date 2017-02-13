<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Jaminan</h4>
</div>
<fieldset class="form-group">
	<label for="">Jenis</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('credit[collaterals][0][type]', null, ['class' => 'form-control', 'placeholder' => 'Jenis jaminan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kepemilikan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('credit[collaterals][0][ownership_status]', null, ['class' => 'form-control', 'placeholder' => 'Pemilik jaminan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Legalitas</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('credit[collaterals][0][legal]', null, ['class' => 'form-control', 'placeholder' => 'ex BPKB']) !!}
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