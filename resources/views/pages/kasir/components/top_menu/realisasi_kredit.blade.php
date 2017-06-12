<div class="row p-r-none p-b-none">
	<div class="col-md-12 hidden-md hidden-lg" style="background-color: white; height: 37px;  border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-12">
				<p class="text-muted p-t-sm">
					<span class="p-r-xs"><i class="fa fa-id-card-o"></i> &nbsp;</span>-<span class="p-l-xs"></span>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 " style="background-color: white; height: 42px; border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-5 col-sm-6  hidden-md hidden-lg">
				<a href="{{ route('kasir.kas.index') }}" class="btn primary p-r-sm p-l-none">
					<i class="fa fa-chevron-left"></i> Kembali
				</a>
			</div>
			<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
				<p class="text-muted text-lg p-t-sm">
					<i class="fa fa-id-card-o"></i> 
				</p>
			</div>
			<div class="col-xs-7 col-sm-6 col-md-6 col-lg-6 text-right">
				<a href="#" data-url="{{ route('kasir.kas.index', ['mode' => 'pengajuan', 'id' => $page_datas->kas['id']]) }}" class="btn p-r-sm p-l-none primary btn-print hidden-xs hidden-sm">
					<i class="fa fa-print" aria-hidden="true"></i> Print
				</a>
				<a href="#modal-change-status" data-toggle="modal" data-target="#modal-change-status" class="btn p-r-none p-l-sm success">
					<i class="fa fa-check" aria-hidden="true"></i> Konfirmasi
				</a>					
			</div>
		</div>
	</div>
</div>

@section('page_modals')
	@component('components.modal', [
			'id'			=> 'modal-confirm',
			'title'			=> 'Konfirmasi Realisasi Kredit',
			'settings'		=> [
				'hide_buttons'	=> true
			]
		])
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['url' => route('kasir.kas.index', ['id' => $page_datas->kas['id'], 'status' => '']), 'class' => 'form', 'role' => 'form', 'autocomplete' => 'off', 'data-pjax' => 'true', 'data-ajax-submit' => 'true']) !!}
					<div class="form-group">
						<label for="password">Password</label>
						{!! Form::password('password', ['class' => 'form-control set-focus auto-tabindex', 'placeholder' => 'Masukkan Password Anda', 'required' => 'required']) !!}
					</div>
					<div class="form-group">
						<label for="notes">Catatan</label>
						{!! Form::textarea('notes', null, ['class' => 'form-control auto-tabindex', 'placeholder' => 'Masukan Catatan Tambahan']) !!}
					</div>
					<div class="form-group text-right">
						<a type="button" class="btn btn-default" data-dismiss="modal" no-data-pjax="">
							Batal
						</a>
						{!! Form::submit('Survei', ['id' => 'btn-login', 'class' => 'btn btn-custom auto-tabindex']) !!}
					</div>
				{!! Form::close() !!}		
			</div>
		</div>

	@endcomponent
@append