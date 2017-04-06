<fieldset class="form-group">
	<label for="">Bidang Usaha</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[bidang_usaha]', (isset($data['bidang_usaha']) ? $data['bidang_usaha'] : null), ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nama Usaha</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[nama_usaha]', (isset($data['nama_usaha']) ? $data['nama_usaha'] : null), ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Tanggal Berdiri</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[tanggal_berdiri]', (isset($data['tanggal_berdiri']) ? $data['tanggal_berdiri'] : null), ['class' => 'form-control mask-date']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Status</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_usaha[status]', [
				'bagi_hasil'		=> 'Bagi Hasil',
				'milik_keluarga'	=> 'Milik Keluarga',
				'milik_sendiri'		=> 'Milik Sendiri',
				'lain_lain'			=> 'Lainnya',
			], (isset($data['status']) ? $data['status'] : 'bagi_hasil'), ['class' => 'form-control']) !!}
		</div>
	</div>
</fieldset>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> ['prefix'	=> 'aset_usaha'],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> ''
	]
])

<fieldset class="form-group">
	<label for="">Status Tempat Usaha</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_usaha[status_tempat_usaha]', [
				'milik_sendiri' 	=> 'Milik Sendiri',
				'sewa'				=> 'Sewa',
				'lain_lain'			=> 'Lainnya',
			], (isset($data['status_tempat_usaha']) ? $data['status_tempat_usaha'] : 'milik_sendiri'), ['class' => 'form-control']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Tempat Usaha</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::text('aset_usaha[luas_tempat_usaha]', (isset($data['luas_tempat_usaha']) ? $data['luas_tempat_usaha'] : null), ['class' => 'form-control mask-number', 'min' => '0']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jumlah Karyawan</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::text('aset_usaha[jumlah_karyawan]', (isset($data['jumlah_karyawan']) ? $data['jumlah_karyawan'] : null), ['class' => 'form-control mask-number', 'min' => '0']) !!}
				<div class="input-group-addon">Org</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nilai Aset</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[nilai_aset]', (isset($data['nilai_aset']) ? $data['nilai_aset'] : null), ['class' => 'form-control mask-money']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Perputaran Stok</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[perputaran_stok]', (isset($data['perputaran_stok']) ? $data['perputaran_stok'] : null), ['class' => 'form-control mask-number', 'min' => '0']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jumlah Konsumen Perbulan</label>
	<div class="row">
		<div class="col-md-5">
			<div class="input-group">
				{!! Form::text('aset_usaha[jumlah_konsumen_perbulan]', (isset($data['jumlah_konsumen_perbulan']) ? $data['jumlah_konsumen_perbulan'] : null), ['class' => 'form-control mask-number', 'min' => '0']) !!}
				<div class="input-group-addon">Org</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jumlah Pesaing Perkota</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[jumlah_saingan_perkota]', (isset($data['jumlah_saingan_perkota']) ? $data['jumlah_saingan_perkota'] : null), ['class' => 'form-control mask-number', 'min' => '0']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Uraian</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[uraian]', (isset($data['uraian']) ? $data['uraian'] : null), ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>