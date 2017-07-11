{!! Form::hidden('aset_usaha[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Bidang Usaha</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[bidang_usaha]', (isset($param['data']['bidang_usaha']) ? $param['data']['bidang_usaha'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Bidang Usaha']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nama Usaha</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[nama_usaha]', (isset($param['data']['nama_usaha']) ? $param['data']['nama_usaha'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Nama Usaha']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tanggal Berdiri</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[tanggal_berdiri]', (isset($param['data']['tanggal_berdiri']) ? $param['data']['tanggal_berdiri'] : null), ['class' => 'form-control date mask-date auto-tabindex', 'placeholder' => 'tanggal/bulan/tahun (dd/mm/yyyy)']) !!}
			<span class="help-block m-b-none">format pengisian (tanggal/bulan/tahun)</span>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Status</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_usaha[status]', [
				'bagi_hasil'		=> 'Bagi Hasil',
				'milik_keluarga'	=> 'Milik Keluarga',
				'milik_sendiri'		=> 'Milik Sendiri',
				'lain_lain'			=> 'Lainnya',
			], (isset($param['data']['status']) ? (in_array($param['data']['status'], ['bagi_hasil', 'milik_sendiri', 'milik_keluarga']) ? $param['data']['status'] : 'lain_lain') : 'bagi_hasil'), ['class' => 'form-control auto-tabindex quick-select select', 'data-other' => 'input-aset-usaha-status']) !!}	
			{{-- <br/> --}}
			{{-- {!! Form::text('aset_usaha[status]', (isset($param['data']['status']) ? $param['data']['status'] : 'bagi_hasil'), ['class' => 'form-control auto-tabindex m-t-sm input-aset-usaha-status ' . (isset($param['data']['status']) && (in_array($param['data']['status'], ['bagi_hasil', 'milik_sendiri', 'milik_keluarga']) ? 'hidden' : (!isset($param['data']['status']) ? 'hidden' : ''))) ]) !!} --}}
		</div>
	</div>
</fieldset>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'aset_usaha',
		'data'		=> isset($param['data']['alamat']) ? $param['data']['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> ''
	]
])

<fieldset class="form-group">
	<label class="text-sm">Status Tempat Usaha</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('aset_usaha[status_tempat_usaha]', [
				'milik_sendiri' 	=> 'Milik Sendiri',
				'sewa'				=> 'Sewa',
				'lain_lain'			=> 'Lainnya',
			], (isset($param['data']['status_tempat_usaha']) ? (in_array($param['data']['status_tempat_usaha'], ['milik_sendiri', 'sewa']) ? $param['data']['status_tempat_usaha'] : 'lain_lain') : 'milik_sendiri'), ['class' => 'form-control auto-tabindex quick-select select', 'data-other' => 'input-aset-usaha-status-tempat-usaha']) !!}
			{{-- {!! Form::text('aset_usaha[status_tempat_usaha]', (isset($param['data']['status_tempat_usaha']) ? $param['data']['status_tempat_usaha'] : 'milik_sendiri'), ['class' => 'form-control auto-tabindex m-t-sm input-aset-usaha-status-tempat-usaha ' . (isset($param['data']['status_tempat_usaha']) && (in_array($param['data']['status_tempat_usaha'], ['milik_sendiri', 'sewa']) ? 'hidden' : (!isset($param['data']['status_tempat_usahastatus']) ? 'hidden' : ''))), 'style' => 'width: 80%;']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Luas Tempat Usaha</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('aset_usaha[luas_tempat_usaha]', (isset($param['data']['luas_tempat_usaha']) ? $param['data']['luas_tempat_usaha'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '0000']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jumlah Karyawan</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('aset_usaha[jumlah_karyawan]', (isset($param['data']['jumlah_karyawan']) ? $param['data']['jumlah_karyawan'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '0000']) !!}
				<div class="input-group-addon">Orang</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nilai Aset</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[nilai_aset]', (isset($param['data']['nilai_aset']) ? $param['data']['nilai_aset'] : null), ['class' => 'form-control auto-tabindex mask-money']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Perputaran Stok</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[perputaran_stok]', (isset($param['data']['perputaran_stok']) ? $param['data']['perputaran_stok'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '0000']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jumlah Konsumen Perbulan</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('aset_usaha[jumlah_konsumen_perbulan]', (isset($param['data']['jumlah_konsumen_perbulan']) ? $param['data']['jumlah_konsumen_perbulan'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '0000']) !!}
				<div class="input-group-addon">Orang</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jumlah Pesaing Perkota</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('aset_usaha[jumlah_saingan_perkota]', (isset($param['data']['jumlah_saingan_perkota']) ? $param['data']['jumlah_saingan_perkota'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '0000']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Uraian</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('aset_usaha[uraian]', (isset($param['data']['uraian']) ? $param['data']['uraian'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Uraian']) !!}
		</div>
	</div>
</fieldset>