{!! Form::hidden('jaminan_kendaraan[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Jenis Kendaraan</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::select('jaminan_kendaraan[tipe]', $page_datas->select_jenis_kendaraan, (isset($param['data']['tipe']) ? $param['data']['tipe'] : 'roda_2'), ['class' => 'form-control auto-tabindex quick-select select', 'placeholder' => '', 'data-other' => 'input-tipe-jaminan-kendaraan', 'data-default' => 'roda_2']) !!}
			{{-- {!! Form::hidden('jaminan_kendaraan[tipe]', (isset($param['data']['tipe']) ? $param['data']['tipe'] : 'roda_2'), ['class' => 'input-tipe-jaminan-kendaraan input-kendaraan', 'data-field' => 'tipe']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tahun</label>
	<div class="row">
		<div class="col-md-2">
			{!! Form::text('jaminan_kendaraan[tahun]', (isset($param['data']['tahun']) ? $param['data']['tahun'] : null), ['class' => 'form-control auto-tabindex  mask-year', 'placeholder' => 'Tahun', 'data-field' => 'tahun']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Merk</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jaminan_kendaraan[merk]', $page_datas->select_merk_kendaraan, 
				(isset($param['data']['merk']) ? (in_array($param['data']['merk'], ['daihatsu', 'honda', 'isuzu', 'kawasaki', 'kia', 'mitsubishi', 'nissan', 'suzuki', 'toyota', 'yamaha']) ? $param['data']['merk'] : 'lain_lain') : 'daihatsu'), 
				['class' => 'form-control auto-tabindex quick-select select', 'placeholder' => 'Merk Kendaraan', 'data-other' => 'input-merk-kendaraan']) !!} <br/>
			{{-- {!! Form::text('jaminan_kendaraan[merk]', (isset($param['data']['merk']) ? $param['data']['merk'] : 'daihatsu'), ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan input-kendaraan ' . (isset($param['data']['merk']) && (in_array($param['data']['merk'], ['daihatsu', 'honda', 'isuzu', 'kawasaki', 'kia', 'mitsubishi', 'nissan', 'suzuki', 'toyota', 'yamaha']) ? 'hidden' : (!isset($param['data']['merk']) ? 'hidden' : ''))), 'placeholder' => 'Sebutkan', 'style' => 'width:40%;']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Warna</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::select('jaminan_kendaraan[warna]', [
					'biru'			=> 'Biru',
					'hijau'			=> 'Hijau',
					'hitam'			=> 'Hitam',
					'merah'			=> 'Merah',
					'merah_muda'	=> 'Merah Muda',
					'orange'		=> 'Orange',
					'lain_lain'		=> 'Lainnya',
				], 
				(isset($param['data']['warna']) ? (in_array($param['data']['warna'], ['biru', 'hijau', 'hitam', 'merah', 'merah_muda', 'orange']) ? $param['data']['warna'] : 'lain_lain') : 'biru'), 
				['class' => 'form-control auto-tabindex quick-select select', 'placeholder' => 'Merk Kendaraan', 'data-other' => 'input-merk-kendaraan']) !!} <br/>
			{{-- {!! Form::text('jaminan_kendaraan[warna]', (isset($param['data']['warna']) ? $param['data']['warna'] : 'biru'), ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan input-kendaraan ' . (isset($param['data']['warna']) && (in_array($param['data']['warna'], ['biru', 'hijau', 'hitam', 'merah', 'merah_muda', 'orange'])) ? 'hidden' : (!isset($param['data']['warna']) ? 'hidden' : '')), 'placeholder' => 'Sebutkan', 'style' => 'width:40%;']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Atas Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('jaminan_kendaraan[atas_nama]', (isset($param['data']['atas_nama']) ? $param['data']['atas_nama'] : null), ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
		</div>
	</div>
</fieldset>


@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'jaminan_kendaraan',
		'data'		=> isset($param['data']['alamat']) ? $param['data']['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> 'input-kendaraan'
	]
])

<fieldset class="form-group">
	<label class="text-sm">Nomor BPKB</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('jaminan_kendaraan[nomor_bpkb]', (isset($param['data']['nomor_bpkb']) ? $param['data']['nomor_bpkb'] : null), ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Nomor BPKB', 'data-field' => 'nomor_bpkb']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nomor Mesin</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('jaminan_kendaraan[nomor_mesin]', (isset($param['data']['nomor_mesin']) ? $param['data']['nomor_mesin'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Nomor Mesin']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nomor Rangka</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('jaminan_kendaraan[nomor_rangka]', (isset($param['data']['nomor_rangka']) ? $param['data']['nomor_rangka'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Nomor Rangka']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nomor Polisi</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('jaminan_kendaraan[nomor_polisi]', (isset($param['data']['nomor_polisi']) ? $param['data']['nomor_polisi'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Nomor Polisi']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Masa Berlaku STNK</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[masa_berlaku_stnk]', (isset($param['data']['masa_berlaku_stnk']) ? $param['data']['masa_berlaku_stnk'] : null), ['class' => 'form-control auto-tabindex mask-date-format']) !!}
			<span class="help-block">format pengisian tanggal hari/bulan/tahun (dd/mm/yyyy)</span>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Harga Taksasi</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('jaminan_kendaraan[harga_taksasi]', (isset($param['data']['harga_taksasi']) ? $param['data']['harga_taksasi'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Status Kepemilikan</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('jaminan_kendaraan[status_kepemilikan]', (isset($param['data']['status_kepemilikan']) ? $param['data']['status_kepemilikan'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Fungsi Sehari-hari</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[fungsi_sehari_hari]', (isset($param['data']['fungsi_sehari_hari']) ? $param['data']['fungsi_sehari_hari'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>