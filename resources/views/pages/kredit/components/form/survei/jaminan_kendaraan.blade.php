<fieldset class="form-group">
	<label for="">Jenis Kendaraan</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::select('jaminan_kendaraan[][tipe]', $page_datas->select_jenis_kendaraan, 'roda_2', ['class' => 'form-control quick-select  auto-tabindex', 'placeholder' => '', 'data-other' => 'input-tipe-jaminan-kendaraan', 'data-default' => 'roda_2']) !!}
			{!! Form::hidden('jaminan_kendaraan[][tipe]', 'roda_2', ['class' => 'input-tipe-jaminan-kendaraan input-kendaraan', 'data-field' => 'tipe']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Tahun</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('jaminan_kendaraan[][tahun]', null, ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Tahun Pembuatan', 'data-field' => 'tahun']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Merk</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('jaminan_kendaraan[][merk]', $page_datas->select_merk_kendaraan, 'daihatsu', ['class' => 'form-control quick-select auto-tabindex', 'placeholder' => 'Merk Kendaraan', 'data-other' => 'input-merk-kendaraan']) !!} <br/>
			{!! Form::hidden('jaminan_kendaraan[][merk]', 'daihatsu', ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan input-kendaraan', 'placeholder' => 'Sebutkan', 'data-field' => 'merk', 'style' => 'width:40%']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">No. BPKB</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[][nomor_bpkb]', null, ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Nomor BPKB', 'data-field' => 'nomor_bpkb']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Atas Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('jaminan_kendaraan[][atas_nama]', null, ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Nomor Mesin</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[][nomor_mesin]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nomor Rangka</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[][nomor_rangka]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Masa Berlaku STNK</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[][masa_berlaku_stnk]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nomor Polisi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[][nomor_polisi]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Harga Taksasi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[][harga_taksasi]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Fungsi Sehari-hari</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_kendaraan[][fungsi_sehari_hari]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>