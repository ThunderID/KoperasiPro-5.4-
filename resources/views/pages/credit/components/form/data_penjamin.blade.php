<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Penjamin</h4>
</div>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('warrantor[name]', null, ['class' => 'form-control auto-tabindex focus', 'placeholder' => 'Ex. Sudarsono']) !!}
		</div>
	</div>
</fieldset>
<br />

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'province' 		=> $page_datas->province,
		'cities'		=> $page_datas->cities
	]
])