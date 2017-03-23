{{-- 
	Plugin Form Contact
	Description: form untuk kontak
	Usage:
	- Param
		$param['prefix']: prefix variable input
 --}}
<div class="root-clone">
	<fieldset class="form-group">
	  	<label for="">No. Telp</label>
		<div class="row">
			<div class="col-md-5 p-r-none">
				{!! Form::text( (!is_null($param['prefix']) ? $param['prefix'] . '[telepon]' : 'telepon'), (isset($param['telepon']) ? $param['telepon'] : null), ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. 0341 2339 9001', 'disabled' => 'disabled']) !!}
			</div>
			<div class="col-md-2 p-l-none">
			  	{{-- <a href="#" class="btn btn-link remove"><i class="fa fa-times"></i> Hapus</a> --}}
			</div>
		</div>
	</fieldset>
</div>