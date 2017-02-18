<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Jaminan</h4>
</div>

<div class="template-content">
	<div id="content-clone"></div>
	<fieldset class="form-group">
		<a href="javascript:void(0);" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add"><i class="fa fa-plus"></i> Jaminan</a>
	</fieldset>
</div>

{{-- template clone --}}
<div class="hidden">
	<div id="template-clone">
		<fieldset class="form-group">
			<label for="">Jenis</label>
			<div class="row">
				<div class="col-md-5">
					{!! Form::text('credit[collaterals][][type]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Jenis jaminan']) !!}
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<label for="">Kepemilikan</label>
			<div class="row">
				<div class="col-md-6">
					{!! Form::text('credit[collaterals][][ownership_status]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Pemilik jaminan']) !!}
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<label for="">Legalitas</label>
			<div class="row">
				<div class="col-md-5">
					{!! Form::text('credit[collaterals][][legal]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'ex BPKB']) !!}
				</div>
			</div>
		</fieldset>
	</div>
</div>