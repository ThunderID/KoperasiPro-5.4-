<div class="col-sm-6 col-xs-12">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-10">
			<h4>Input Data</h4>
			<p>Isi form dibawah ini untuk menambahkan Koperasi baru.</p>
			<br/>
		</div>
	</div>

	{!! Form::open(['url' => route('pengguna.store'), 'class' => 'form', 'method' => 'STORE']) !!}			
		<fieldset class="form-group">
			<label class="text-sm">Nama</label>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-11">
					{!! Form::text('nama', null, ['class' => 'form-control required focus', 'placeholder' => 'Nama Pengguna']) !!}
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<label class="text-sm">Email</label>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-11">
					{!! Form::text('email', null, ['class' => 'form-control required', 'placeholder' => 'Email Pengguna']) !!}
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<label class="text-sm">Role</label>
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-11">
					{!! Form::select('role', \App\Service\Helpers\ACL\KewenanganKredit::lists(), null, ['id' => 'penggunarole', 'class' => 'form-control quick-select','placeholder' => 'Pilih Salah Satu', 'onchange' => 'check_scope()']) !!}
				</div> 
			</div> 
		</fieldset>

		<fieldset class="form-group">
			<label class="text-sm">Hak Akses Pengguna</label>
			<div class="row">
				<div class="col-md-5 col-xs-6">
					<div id="scopelists">
						<i>Pilih Role terlebih dahulu</i>
					</div>
				<!-- 
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
				<div class="col-md-5 col-xs-6">
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
					</label> -->					
				</div>				
			</div>
		</fieldset>

		<fieldset class="form-group">
			<label class="text-sm">Password</label>
			<div class="row">
				<div class="col-xs-12 col-sm-11 col-md-11">
					{!! Form::password('password', ['class' => 'form-control required', 'placeholder' => 'Password Pengguna']) !!}
				</div>
			</div>
		</fieldset>	

		<fieldset class="form-group">
			<label class="text-sm">Konfirmasi Password</label>
			<div class="row">
				<div class="col-xs-12 col-sm-11 col-md-11">
					{!! Form::password('confirm_password', ['class' => 'form-control required', 'placeholder' => 'Konfirmasi Password Pengguna']) !!}
				</div>
			</div>
		</fieldset>

		<div class="clearfix">&nbsp;</div>

			<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-index" data-target="create">Batal</a>
			<button type="submit" class="btn btn-primary">Simpan</button>

		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		
	{!! Form::close() !!}
</div>

<div class="col-sm-6 hidden-xs">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-11">
			<h4>Impor Data CSV</h4>
			<p>Gunakan impor data untuk memudahkan Anda menambahkan data Pengguna dalam jumlah banyak dengan lebih cepat. <a href="#modal-batch-input" data-target="#modal-batch-input" data-toggle="modal" no-data-pjax>
				Pelajari Selanjutnya
			</a></p>
			<br/>
			<br/>
		</div>
	</div>	

	{!! Form::open(['url' => route('pengguna.batch'), 'files' => true]) !!}
	
	<fieldset class="form-group">
		<label class="text-sm">Upload File</label>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 p-b-md">
			    {!! Form::file('pengguna') !!}
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::submit('Impor Data', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	</fieldset>

	{!! Form::close() !!}

</div>

@push('modals')
	@component('components.modal', [
			'id'			=> 'modal-batch-input',
			'title'			=> 'Impor Data CSV',
			'settings'		=> [
				'hide_buttons' => 'false'
			]
		])
			<div class="row p-t-sm">
				<div class="col-xs-12 text-light">
					<p class="text-muted">
						Impor Data CSV mudahkan Anda untuk melakukan proses input data pengguna dalam jumlah banyak. Anda hanya perlu mengikuti 3 langkah mudah berikut.
					</p>
					<br/>
					<p class="p-b-md">
						<strong>1. Persiapkan Template</strong><br/><span class="text-muted">
						Tenang, kami sudah menyiapkan template yang siap Anda gunakan dengan mengunduh tautan dibawah ini.<br/> 
						</span>
						<a target="_blank" href="{{ route('home.download', ['filename' => 'template_pengguna.csv']) }}" no-data-pjax>
							<i class="fa fa-download" aria-hidden="true"></i>
							Mulai Unduh Template
						</a>
					</p>
					<p class="p-b-md">
						<strong>2. Isikan Data</strong><br/><span class="text-muted">
						Setelah template ter-unduh, buka dokumen dan isikan data pengguna sesuai dengan inputan yang telah tersedia. Setelah Anda selesai mengisikan data, simpan dokumen tersebut.
						</span>
					</p>
					<p class="p-b-md">
						<strong>3. Impor Data</strong><br/><span class="text-muted">
						Pilih dokumen yang akan Anda unggah pada section <strong>Upload File</strong>. Tekan Impor Data, dan tunggu proses hingga selesai.
						</span>
					</p>						
				</div>
			</div>
	@endcomponent
@endpush