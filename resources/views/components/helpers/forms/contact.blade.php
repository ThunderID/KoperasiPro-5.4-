{{-- 
	Plugin Form Contact
	Description: form untuk kontak
	Usage:
	- Param
		$param['prefix']: prefix variable input
 --}}

<div class="root-clone">
	<fieldset class="form-group">
		<label for="">No. Hp</label>
		<div class="row">
			<div class="col-md-5">
				{!! Form::text( (!is_null($param['prefix']) ? $param['prefix'] . '[kontak]' : 'kontak') . '[telepon][]', null, ['class' => 'form-control required auto-tabindex no-hp', 'placeholder' => 'Ex. 0812 2339 9001']) !!}
			</div>
		</div>
	</fieldset>
</div>