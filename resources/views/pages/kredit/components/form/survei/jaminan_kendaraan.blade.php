{!! Form::hidden('jaminan_kendaraan[id]', (isset($data['id']) ? $data['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Jenis Kendaraan</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::select('jaminan_kendaraan[tipe]', $page_datas->select_jenis_kendaraan, (isset($data['tipe']) ? $data['tipe'] : 'roda_2'), ['class' => 'form-control auto-tabindex quick-select', 'placeholder' => '', 'data-other' => 'input-tipe-jaminan-kendaraan', 'data-default' => 'roda_2']) !!}
			{!! Form::hidden('jaminan_kendaraan[tipe]', (isset($data['tipe']) ? $data['tipe'] : 'roda_2'), ['class' => 'input-tipe-jaminan-kendaraan input-kendaraan', 'data-field' => 'tipe']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tahun</label>
	<div class="row">
		<div class="col-md-2">
			{!! Form::text('jaminan_kendaraan[tahun]', (isset($data['tahun']) ? $data['tahun'] : null), ['class' => 'form-control auto-tabindex  mask-year', 'placeholder' => 'Tahun', 'data-field' => 'tahun']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Merk</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('jaminan_kendaraan[merk]', $page_datas->select_merk_kendaraan, 
				(isset($data['merk']) ? (in_array($data['merk'], ['daihatsu', 'honda', 'isuzu', 'kawasaki', 'kia', 'mitsubishi', 'nissan', 'suzuki', 'toyota', 'yamaha']) ? $data['merk'] : 'lain_lain') : 'daihatsu'), 
				['class' => 'form-control auto-tabindex quick-select', 'placeholder' => 'Merk Kendaraan', 'data-other' => 'input-merk-kendaraan']) !!} <br/>
			{!! Form::text('jaminan_kendaraan[merk]', (isset($data['merk']) ? $data['merk'] : 'daihatsu'), ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan input-kendaraan ' . (in_array($data['merk'], ['daihatsu', 'honda', 'isuzu', 'kawasaki', 'kia', 'mitsubishi', 'nissan', 'suzuki', 'toyota', 'yamaha']) ? 'hidden' : (!isset($data['merk']) ? 'hidden' : '')), 'placeholder' => 'Sebutkan', 'style' => 'width:40%;']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">No. BPKB</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[nomor_bpkb]', (isset($data['nomor_bpkb']) ? $data['nomor_bpkb'] : null), ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Nomor BPKB', 'data-field' => 'nomor_bpkb']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Atas Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('jaminan_kendaraan[atas_nama]', (isset($data['atas_nama']) ? $data['atas_nama'] : null), ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label class="text-sm">Nomor Mesin</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[nomor_mesin]', (isset($data['nomor_mesin']) ? $data['nomor_mesin'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nomor Rangka</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[nomor_rangka]', (isset($data['nomor_rangka']) ? $data['nomor_rangka'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Masa Berlaku STNK</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[masa_berlaku_stnk]', (isset($data['masa_berlaku_stnk']) ? $data['masa_berlaku_stnk'] : null), ['class' => 'form-control auto-tabindex mask-date-format', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nomor Polisi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[nomor_polisi]', (isset($data['nomor_polisi']) ? $data['nomor_polisi'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Harga Taksasi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[harga_taksasi]', (isset($data['harga_taksasi']) ? $data['harga_taksasi'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Fungsi Sehari-hari</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[fungsi_sehari_hari]', (isset($data['fungsi_sehari_hari']) ? $data['fungsi_sehari_hari'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>

@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'jaminan_kendaraan',
		'data'		=> isset($data['alamat']) ? $data['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> 'input-kendaraan'
	]
])