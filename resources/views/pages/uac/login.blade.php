@extends('template.uac_template')

@push('content')			
	<div class="row">
		<div class="col-xs-12">
			<div class="form-wrap">
				<h1>Chayono Group</h1> 
				</br>
				<p>Silahkan masukkan email dan password Anda!</p>
				</br>

				@include('components.alertbox')
				
				<form role="form" method="post" id="login-form" autocomplete="off" action="{{route('login.store')}}">
					<div class="form-group">
						<label for="email" class="sr-only">Email</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
					</div>
					<div class="form-group">
						<label for="key" class="sr-only">Password</label>
						<input type="password" name="key" id="key" class="form-control" placeholder="Password">
					</div>
					<?php
					/*
					<div class="checkbox">
						<span class="character-checkbox" onclick="showPassword()"></span>
						<span class="label">Show password</span>
					</div>
					*/
					?>
					<input type="submit" id="btn-login" class="btn btn-custom btn-block" value="Login">
				</form>
				<?php
				/*				
				<a class="forget" data-toggle="modal" data-target=".forget-modal" no-data-pjax>Forgot your password?</a>
				*/
				?>				
				<hr>
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