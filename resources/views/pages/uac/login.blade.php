@extends('template.uac_template')

@push('content')			
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<div class="form-wrap p-b-sm m-b-md">
				<h1 class="m-b-xl">GO-Kredit.com</h1>
				<p class="m-b-lg">Silahkan masukkan Email dan Password Anda.</p>

				@include('components.alertbox')

				{!! Form::open(['url' => route('login.store'), 'id' => 'login-form', 'class' => 'form', 'role' => 'form', 'autocomplete' => 'off', 'data-pjax' => 'true', 'data-ajax-submit' => 'true']) !!}
					<div class="form-group">
						<label for="email" class="sr-only">Email</label>
						{!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control set-focus auto-tabindex', 'placeholder' => 'somebody@example.com']) !!}
					</div>
					<div class="form-group">
						<label for="key" class="sr-only">Password</label>
						{!! Form::password('key', ['id' => 'key', 'class' => 'form-control auto-tabindex', 'placeholder' => 'type your password']) !!}
					</div>
					{!! Form::submit('Login', ['id' => 'btn-login', 'class' => 'btn btn-custom btn-block auto-tabindex']) !!}
					{{-- <input type="submit" id="btn-login" class="btn btn-custom btn-block" value="Login"> --}}
				{!! Form::close() !!}

				{{-- <a class="forget" data-toggle="modal" data-target=".forget-modal" no-data-pjax>Forgot your password?</a> --}}
			</div>
		</div>
	</div>
@endpush

@push('modals')
	<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">×</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Recovery password</h4>
				</div>
				<div class="modal-body">
					<p>Type your email account</p>
					<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-custom">Recovery</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div> <!-- /.modal -->
@endpush