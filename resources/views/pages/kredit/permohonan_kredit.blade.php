@extends('template.cms_template')

@push('content')
	<form>
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
							{!! Form::text('no_credit', null, ['class' => 'form-control', 'placeholder' => 'Ex. 09913365']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kemampuan Jumlah Angsuran</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('value_angsuran', null, ['class' => 'form-control', 'placeholder' => 'Kemampuan jumlah angsuran']) !!}
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
							{!! Form::text('lama_angsuran', null, ['class' => 'form-control', 'placeholder' => 'Lama angsuran']) !!}
						</div>
						<div class="col-md-2">Bulan</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jumlah Pinjaman</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('jumlah_pinjaman', null, ['class' => 'form-control', 'placeholder' => 'Jumlah pinjaman']) !!}
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
							{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ex. Suena Morn']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jenis Kelamin</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('gender', null, ['class' => 'form-control', 'placeholder' => 'Jenis kelamin']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Tempat & Tgl Lahir</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'placeholder' => 'Tempat lahir']) !!}
						</div>
						<div class="col-md-5">
							{!! Form::text('tgl_lahir', null, ['class' => 'form-control', 'placeholder' => 'Tanggal lahir']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Agama</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('agama', null, ['class' => 'form-control', 'placeholder' => 'agama']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Pendidikan terakhir</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pendidikan_terakhir', null, ['class' => 'form-control', 'placeholder' => 'Pendidikan terakhir']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Nama Ibu Kandung</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('name_mother', null, ['class' => 'form-control', 'placeholder' => 'Nama ibu kandung']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Status</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => 'Status Pernikahan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jumlah Tanggungan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('jumlah_tanggungan', null, ['class' => 'form-control', 'placeholder' => 'Jumlah tanggungan']) !!}
						</div>
					</div>
				</fieldset>
				<br />
				<strong><h5>Alamat</h5></strong>
				<fieldset class="form-group">
					<label for="">Alamat KTP</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('alamat', null, ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kelurahan/Kecematan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kelurahan_kecamatan', null, ['class' => 'form-control', 'placeholder' => 'Kelurahan/Kecematan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kota/Kabupaten</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('kota_kabupaten', null, ['class' => 'form-control', 'placeholder' => 'Kota/Kabupaten']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Telp/HP</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('telp', null, ['class' => 'form-control', 'placeholder' => 'Telp/HP']) !!}
						</div>
					</div>
				</fieldset>
				<br />
				<strong><h5>Pekerjaan</h5></strong>
				<fieldset class="form-group">
					<label for="">Jenis Pekerjaan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pekerjaan', null, ['class' => 'form-control', 'placeholder' => 'Jenis pekerjaan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Pekerjaan/Jabatan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pekerjaan_jabatan', null, ['class' => 'form-control', 'placeholder' => 'Pekerjaan/Jabatan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Awal mulai Kerja/Usaha</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('awal_kerja', null, ['class' => 'form-control', 'placeholder' => 'Awal mulai kerja/usaha']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Alamat Kantor/Usaha</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('alamat_kantor', null, ['class' => 'form-control', 'placeholder' => 'Alamat Kantor/Usaha']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Bidang Usaha Kantor</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('bidang_usaha_kantor', null, ['class' => 'form-control', 'placeholder' => 'Bidang usaha kantor']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Telp/HP Kantor</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('telp_kantor', null, ['class' => 'form-control', 'placeholder' => 'Telp/HP kantor']) !!}
						</div>
					</div>
				</fieldset>
			</div>
			<div class="col-md-6">
				<strong><h5>Data Suami/Istri/Orang Tua</h5></strong>
				<fieldset class="form-group">
					<label for="">Nama</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('name_relasi', null, ['class' => 'form-control', 'placeholder' => 'Nama relasi']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Alamat</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('alamat_relasi', null, ['class' => 'form-control', 'placeholder' => 'Alamat relasi']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Telp/HP</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('telp_relasi', null, ['class' => 'form-control', 'placeholder' => 'Telp relasi']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Pekerjaan/Jabatan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pekerjaan_relasi', null, ['class' => 'form-control', 'placeholder' => 'Pekerjaan relasi']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Alamat Kantor</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('alamat_kantor_relasi', null, ['class' => 'form-control', 'placeholder' => 'Alamat kantor relasi']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Telp Kantor</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('telp_kantor_relasi', null, ['class' => 'form-control', 'placeholder' => 'Telp kantor relasi']) !!}
						</div>
					</div>
				</fieldset>

				{{-- referenesi --}}
				<fieldset class="form-group">
					<label for="">Hubungan Sebagai</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('referensi_sebagai', null, ['class' => 'form-control', 'placeholder' => 'Relasi sebagai']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Nama</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('name_referensi', null, ['class' => 'form-control', 'placeholder' => 'Nama referensi']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Alamat</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('alamat_referensi', null, ['class' => 'form-control', 'placeholder' => 'Alamat referensi']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Telp/Hp Referensi</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('telp_referensi', null, ['class' => 'form-control', 'placeholder' => 'No. telp kantor referensi']) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="page-header text-center">
				  	<h2>Keuangan</h2>
				</div>
			</div>
			<div class="col-md-6">
				<br />
				<strong><h5>Pendapatan Perbulan</h5></strong>
				<fieldset class="form-group">
					<label for="">Pokok</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pendapatan_pokok', null, ['class' => 'form-control', 'placeholder' => 'Lama angsuran']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Suami/Istri*</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pendapatan_suami_istri', null, ['class' => 'form-control', 'placeholder' => 'Pendapatan dari suami/istri']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Dari Usaha</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pendapatan_dari_usaha', null, ['class' => 'form-control', 'placeholder' => 'Pendapatan dari usaha']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Total Pendapatan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pendapatan_dari_usaha', null, ['class' => 'form-control', 'placeholder' => 'Pendapatan dari usaha']) !!}
						</div>
					</div>
				</fieldset>
				<br />
				<strong><h5>Pengeluaran perBulan</h5></strong>
				<fieldset class="form-group">
					<label for="">Rumah Tangga</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pengeluaran_rumah_tangga', null, ['class' => 'form-control', 'placeholder' => 'Pengeluaran rumah tangga']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Listrik/PDAM/Telp</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pengeluaran_listrik', null, ['class' => 'form-control', 'placeholder' => 'Pengeluarang Listrik/PDAM/Telp']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Biaya Pendidikan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('pengeluaran_pendidikan', null, ['class' => 'form-control', 'placeholder' => 'Pengeluaran pendidikan']) !!}
						</div>
					</div>
				</fieldset>
			</div>
			<div class="col-md-6">
				<br />
				<strong><h5>Jaminan</h5></strong>
				<fieldset class="form-group">
					<label for="">Status Jaminan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('status_jaminan', null, ['class' => 'form-control', 'placeholder' => 'Status jaminan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jaminan</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('jaminan', null, ['class' => 'form-control', 'placeholder' => 'Jaminan']) !!}
						</div>
					</div>
				</fieldset>
				<br />
			</div>
		</div>
		<div class="text-right">
			<a href="" class="btn btn-default">Batal</a>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</form>
@endpush

@push('scripts')
	'hi'
@endpush