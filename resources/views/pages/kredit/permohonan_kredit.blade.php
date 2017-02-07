@extends('template.cms_template')

@push('content')
	{!! Form::open(['url' => route('kredit.pengajuan.store'), 'class' => 'form']) !!}
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="page-header">
				  	<h2>Data Kredit</h2>
				</div>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="">No. Permohonan Kredit</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('nomor_kredit', null, ['class' => 'form-control', 'placeholder' => 'Ex. 09913365']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kemampuan Jumlah Angsuran</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kemampuan_angsuran', null, ['class' => 'form-control', 'placeholder' => 'Kemampuan jumlah angsuran']) !!}
						</div>
						<div class="col-md-2">/ Bulan</div>
					</div>
				</fieldset>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="">Lama Angsuran</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('jangka_waktu', null, ['class' => 'form-control', 'placeholder' => 'Lama angsuran']) !!}
						</div>
						<div class="col-md-2">Bulan</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jumlah Pinjaman</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pengajuan_kredit', null, ['class' => 'form-control', 'placeholder' => 'Jumlah pinjaman']) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="page-header text-center">
					<h2>Data Pribadi</h2>
				</div>
			</div>
			<div class="col-md-6">
				<strong><h5>Info Pribadi</h5></strong>
				<fieldset class="form-group">
					<label for="">Nama</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[nama]', null, ['class' => 'form-control', 'placeholder' => 'Ex. Suena Morn']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Rekening</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[nomor_rekening]', null, ['class' => 'form-control', 'placeholder' => 'Jenis kelamin']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Tempat Lahir</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[tempat_lahir]', null, ['class' => 'form-control', 'placeholder' => 'Tempat lahir']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label>Tanggal Lahir</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[tanggal_lahir]', null, ['class' => 'form-control', 'placeholder' => 'Tanggal lahir']) !!}
						</div>
					</div>
				</fieldset>
				<br />
				<strong><h5>Alamat</h5></strong>
				<fieldset class="form-group">
					<label for="">Jalan</label>
					<div class="row">
						<div class="col-md-8">
							{!! Form::text('kreditur[alamat][jalan]', null, ['class' => 'form-control', 'placeholder' => 'Nama Jalan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kelurahan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[alamat][kelurahan]', null, ['class' => 'form-control', 'placeholder' => 'Kelurahan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kecamatan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[alamat][kecamatan]', null, ['class' => 'form-control', 'placeholder' => 'Kecamatan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kota</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[alamat][kota]', null, ['class' => 'form-control', 'placeholder' => 'Kota']) !!}
						</div>
					</div>
				</fieldset>
				<br />
				<strong><h5>Kontak</h5></strong>
				<fieldset class="form-group">
					<label for="">No. Telp</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[kontak][telp]', null, ['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Hp</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[kontak][handphone]', null, ['class' => 'form-control', 'placeholder' => 'Nomor Handphone']) !!}
						</div>
					</div>
				</fieldset>
				<br />
				<strong><h5>Pekerjaan</h5></strong>
				<fieldset class="form-group">
					<label for="">Jabatan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][jabatan]', null, ['class' => 'form-control', 'placeholder' => 'Nomor Handphone']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Mulai Bekerja</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][mulai_bekerja]', null, ['class' => 'form-control', 'placeholder' => 'Tanggal Mulai Bekerja']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Bidang Usaha</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][bidang_usaha]', null, ['class' => 'form-control', 'placeholder' => 'Bidang Usaha']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jalan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][alamat][jalan]', null, ['class' => 'form-control', 'placeholder' => 'Nama Jalan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kelurahan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][alamat][kelurahan]', null, ['class' => 'form-control', 'placeholder' => 'Nama Kelurahan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kecamatan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][alamat][kecamatan]', null, ['class' => 'form-control', 'placeholder' => 'Nama Kecamatan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kota</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][alamat][kota]', null, ['class' => 'form-control', 'placeholder' => 'Nama Kota']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Telp</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][kontak][telepon]', null, ['class' => 'form-control', 'placeholder' => 'No Telepon']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Handphone</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pekerjaan][kontak][handphone]', null, ['class' => 'form-control', 'placeholder' => 'No Handphone']) !!}
						</div>
					</div>
				</fieldset>
				<br />
				<strong><h5>Keluarga</h5></strong>
				<fieldset class="form-group">
					<label for="">Hubungan Sebagai</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[keluarga][][hubungan]', null, ['class' => 'form-control', 'placeholder' => 'Hubungan sebagai']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Nama</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[keluarga][][nama]', null, ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Alamat</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[keluarga][][alamat][jalan]', null, ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kelurahan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[keluarga][][alamat][kelurahan]', null, ['class' => 'form-control', 'placeholder' => 'Kelurahan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kecamatan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[keluargah][][alamat][kecamatan]', null, ['class' => 'form-control', 'placeholder' => 'Kecamatan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kota</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[keluarga][][alamat][kota]', null, ['class' => 'form-control', 'placeholder' => 'Kota']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Telp</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[keluarga][][kontak][telepon]', null, ['class' => 'form-control', 'placeholder' => 'No. Telp']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Handphone</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[keluarga][][kontak][handphone]', null, ['class' => 'form-control', 'placeholder' => 'No Handphone']) !!}
						</div>
					</div>
				</fieldset>
				<strong><h5>Pendapatan</h5></strong>
				<fieldset class="form-group">
					<label for="">Jenis</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pendapatan][][jenis]', null, ['class' => 'form-control', 'placeholder' => 'Jenis pendapatan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jumlah</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pendapatan][][jumlah]', null, ['class' => 'form-control', 'placeholder' => 'Jumlah pendapatan']) !!}
						</div>
					</div>
				</fieldset>
				<strong><h5>Pengeluaran</h5></strong>
				<fieldset class="form-group">
					<label for="">Jenis</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pengeluaran][][jenis]', null, ['class' => 'form-control', 'placeholder' => 'Jenis pengeluaran']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jumlah</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kreditur[pengeluaran][][jumlah]', null, ['class' => 'form-control', 'placeholder' => 'Jumlah pengeluaran']) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				{{-- penjamin  --}}
				<div class="page-header text-center">
				  	<h2>Penjamin</h2>
				</div>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="">Hubungan Sebagai</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('penjamin[hubungan]', null, ['class' => 'form-control', 'placeholder' => 'Penjamin hubungan sebagai']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Nama</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('penjamin[nama]', null, ['class' => 'form-control', 'placeholder' => 'Nama penjamin']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Alamat</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('penjamin[alamat][jalan]', null, ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kelurahan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('penjamin[alamat][kelurahan]', null, ['class' => 'form-control', 'placeholder' => 'kelurahan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kecamatan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('penjamin[alamat][kecamatan]', null, ['class' => 'form-control', 'placeholder' => 'kecamatan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kota</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('penjamin[alamat][kota]', null, ['class' => 'form-control', 'placeholder' => 'kota']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Telp</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('penjamin[kontak][telepon]', null, ['class' => 'form-control', 'placeholder' => 'Nomor telepon']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Handphone</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('penjamin[kontak][handphone]', null, ['class' => 'form-control', 'placeholder' => 'Nomor handphone']) !!}
						</div>
					</div>
				</fieldset>

				{{-- jaminan --}}
				<fieldset class="form-group">
					<label for="">Jenis</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('jaminan[jenis]', null, ['class' => 'form-control', 'placeholder' => 'Jenis jaminan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kepemilikan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('jaminan[Kepemilikan]', null, ['class' => 'form-control', 'placeholder' => 'Pemilik jaminan']) !!}
						</div>
					</div>
				</fieldset>

				{{-- koperasi --}}
				{!! Form::hidden('koperasi[kode]', 'ksu_tt') !!}
				{!! Form::hidden('koperasi[nama]', 'tanjung terang') !!}

				{{-- status --}}
				{!! Form::hidden('status[][status]', 'drafting') !!}
				{!! Form::hidden('status[][keterangan]', 'dalam proses drafting') !!}
				{!! Form::hidden('status[][tanggal]', 'today') !!}
				{!! Form::hidden('status[][petugas][nip]', '1234567890') !!}
				{!! Form::hidden('status[][petugas][nama]', 'Benedict Cumberbatch') !!}
			</div>
		</div>
		<div class="text-right">
			<a href="" class="btn btn-default">Batal</a>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	{!! Form::close() !!}
@endpush

@push('scripts')
	'hi'
@endpush