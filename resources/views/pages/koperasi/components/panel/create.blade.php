
<div class="col-xs-12">

	{!! Form::open(['url' => route('pengguna.store'), 'class' => 'form', 'method' => 'STORE']) !!}			
		<fieldset class="form-group">
			<label class="text-sm">Nama</label>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					{!! Form::text('nama', null, ['class' => 'form-control required focus', 'placeholder' => 'Nama Pengguna']) !!}
				</div>
			</div>
		</fieldset>

		<fieldset class="form-group">
			<label class="text-sm">Email</label>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					{!! Form::text('email', null, ['class' => 'form-control required', 'placeholder' => 'Email Pengguna']) !!}
				</div>
			</div>
		</fieldset>

		<fieldset class="form-group">
			<label class="text-sm">Role</label>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					{!! Form::select('role', [
						'komisaris'			=> 'Komisaris',
						'Pimpinan'			=> 'Pimpinan',
						'Kasir'				=> 'Kasir',
						'Marketing' 		=> 'Marketing',
						'Surveyor' 			=> 'Surveyor',
					], null, ['class' => 'form-control quick-select','placeholder' => 'Pilih Salah Satu']) !!}
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
						{!! Form::checkbox('scope[]', 'modifikasi_koperasi', false, ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
						Modifikasi Kredit
					</label>

					<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
						{!! Form::checkbox('scope[]', 'pengajuan_kredit', false, ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
						Pengajuan Kredit
					</label>

					<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
						{!! Form::checkbox('scope[]', 'survei_kredit', false, ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
						Survei Kredit
					</label>

					<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
						{!! Form::checkbox('scope[]', 'setujui_kredit', false, ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
						Setujui Kredit
					</label>					
					<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
						{!! Form::checkbox('scope[]', 'realisasi_kredit', false, ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
						Realisasi Kredit
					</label>
				</div>
				<div class="col-md-4 col-xs-6">
					<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
						{!! Form::checkbox('scope[]', 'kas_harian', false, ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
						Kas Harian
					</label>

					<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
						{!! Form::checkbox('scope[]', 'transaksi_harian', false, ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
						Transaksi Harian
					</label>

					<label class="checkbox" style="margin-left: 20px;font-weight: 100;">
						{!! Form::checkbox('scope[]', 'atur_akses', false, ['style' => 'margin: 0px;top: -10px;left: -20px;font-size: 26px;']) !!}
						Atur Akses
					</label>					
				</div>				
			</div>
		</fieldset>

		<div class="clearfix">&nbsp;</div>

		<div class="text-right">
			<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-index" data-target="create">Cancel</a>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>

		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		
	{!! Form::close() !!}
</div>