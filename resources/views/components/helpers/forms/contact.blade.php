{{-- 
	Plugin Form Contact
	Description: form untuk kontak
	Usage:
	- variable['phone']

 --}}

<div class="root-clone">
	<fieldset class="form-group">
		<label for="">No. Hp</label>
		<div class="row">
			<div class="col-md-5">
				{!! Form::text(($variable["phone"] ? $variable["phone"] : 'kontak[telepon][]'), null, ['class' => 'form-control required auto-tabindex no-hp', 'placeholder' => 'Ex. 0812 2339 9001']) !!}
			</div>
		</div>
	</fieldset>
</div>