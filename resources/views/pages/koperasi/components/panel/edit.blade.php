@foreach($page_datas->users as $key => $value)
<div class="row">
	<div data-form="edit_{{$value['id']}}" class="hidden">
		<div class="col-xs-12">

			<?php
				//init
				$hak_akses = array_map('current', $value['scopes']);
				// dd($value);
			?>

			{!! Form::open(['url' => route('pengguna.update',['id' => $value['id']]), 'class' => 'form', 'method' => 'PATCH']) !!}			
				<fieldset class="form-group">
					<label class="text-sm">Nama</label>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							{!! Form::text('nama', $value['petugas']['nama'], ['class' => 'form-control required focus', 'placeholder' => 'Nama Pengguna']) !!}
						</div>
					</div>
				</fieldset>

				<fieldset class="form-group">
					<label class="text-sm">Email</label>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							{!! Form::text('email', $value['petugas']['email'], ['class' => 'form-control required', 'placeholder' => 'Email Pengguna']) !!}
						</div>
					</div>
				</fieldset>

				<fieldset class="form-group">
					<label class="text-sm">Role</label>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							{!! Form::select('role', \App\Service\Helpers\UI\UserRole::lists(), $value['role'], ['class' => 'form-control quick-select','placeholder' => 'Pilih Salah Satu']) !!}
						</div> 
					</div> 
				</fieldset>

				<fieldset class="form-group">
					<label class="text-sm">Password</label>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							{!! Form::password('password', ['class' => 'form-control required', 'placeholder' => 'Password Pengguna']) !!}
						</div>
					</div>
				</fieldset>	

				<fieldset class="form-group">
					<label class="text-sm">Konfirmasi Password</label>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							{!! Form::password('confirm_password', ['class' => 'form-control required', 'placeholder' => 'Konfirmasi Password Pengguna']) !!}
						</div>
					</div>
				</fieldset>

				<fieldset class="form-group">
					<label class="text-sm">Hak Akses Pengguna</label>
					<div class="row">
						<div class="col-md-4 col-xs-6">
							<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
								{!! Form::checkbox('scope[]', 'modifikasi_koperasi', ( in_array('modifikasi_koperasi', $hak_akses) ? true : false), ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
								Modifikasi Kredit
							</label>

							<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
								{!! Form::checkbox('scope[]', 'pengajuan_kredit', ( in_array('pengajuan_kredit', $hak_akses) ? true : false), ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
								Pengajuan Kredit
							</label>

							<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
								{!! Form::checkbox('scope[]', 'survei_kredit', ( in_array('survei_kredit', $hak_akses) ? true : false), ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
								Survei Kredit
							</label>

							<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
								{!! Form::checkbox('scope[]', 'setujui_kredit', ( in_array('setujui_kredit', $hak_akses) ? true : false), ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
								Setujui Kredit
							</label>					
							<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
								{!! Form::checkbox('scope[]', 'realisasi_kredit', ( in_array('realisasi_kredit', $hak_akses) ? true : false), ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
								Realisasi Kredit
							</label>
						</div>
						<div class="col-md-4 col-xs-6">
							<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
								{!! Form::checkbox('scope[]', 'kas_harian', ( in_array('kas_harian', $hak_akses) ? true : false), ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
								Kas Harian
							</label>

							<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
								{!! Form::checkbox('scope[]', 'transaksi_harian', ( in_array('transaksi_harian', $hak_akses) ? true : false), ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
								Transaksi Harian
							</label>

							<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
								{!! Form::checkbox('scope[]', 'atur_akses', ( in_array('atur_akses', $hak_akses) ? true : false), ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
								Atur Akses
							</label>					
						</div>				
					</div>
				</fieldset>

				<div class="clearfix">&nbsp;</div>

				<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-index" data-target="edit_{{ $value['id'] }}">Batal</a>
				<button type="submit" class="btn btn-primary">Simpan</button>

				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endforeach