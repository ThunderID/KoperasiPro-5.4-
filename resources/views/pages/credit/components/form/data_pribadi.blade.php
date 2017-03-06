<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Pribadi</h4>
</div>
{{-- informasi umum --}}
<b><h5>Info Umum</h5></b>

<fieldset class="form-group">
	<label for="">NIK</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('person[nik]', null, ['class' => 'form-control required auto-tabindex focus id-card', 'placeholder' => 'Ex. 11 00 36 08 76 0001']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Nama</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('person[name]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. Suena Morn']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Tempat Lahir</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('person[place_of_birth]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. Surabaya']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label>Tanggal Lahir</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('person[date_of_birth]', null, ['class' => 'form-control date date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Jenis Kelamin</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('person[gender]', [
				'male'		=> 'Laki-laki',
				'female'	=> 'Perempuan'
			], 'male', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Agama</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('person[religion]', [
				'buddha' 	=> 'Buddha', 
				'hindu' 	=> 'Hindu',
				'islam'		=> 'Islam',
				'protestan'	=> 'Kristen Protestan',
				'katolik'	=> 'Kristen Katolik',
				'konghucu'	=> 'Konghucu'
			], 'buddha', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Pendidikan Terakhir</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('person[highest_education]', [
				'tk'			=> 'TK',
				'sd'			=> 'SD',
				'smp'			=> 'SMP',
				'sma'			=> 'SMA/Sederajat',
				'sarjana'		=> 'S1',
				'magister'		=> 'S2',
				'doctor'		=> 'S3'
			], 'tk', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Status Pernikahan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('person[marital_status]', [
				'married' 		=> 'Menikah',
				'single'		=> 'Belum Menikah',
			], 'kawin', ['class' => 'form-control quick-select']) !!}
		</div>
	</div>
</fieldset>

{{-- informasi alamat --}}
<br />
<b><h5>Alamat</h5></b>
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('address[street]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. Jln. Blimbing No. 8']) !!}
		</div>
		<div class="col-md-3 p-l-none">
			<a href="#" class="btn btn-link btn-sm p-l-none p-r-none open-modal" data-toggle="modal" data-target=".modal"><i class="fa fa-search"></i> Cari Alamat yg Ada</a>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Negara</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('address[country]', 'Indonesia', ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. Indonesia']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Provinsi</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('address[province]', $page_datas->province, null, ['class' => 'form-control required auto-tabindex select select-province', 'placeholder' => 'Pilih Provinsi', 'data-placeholder' => 'Pilih Provinsi', 'data-url' => route('cities.index')]) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Kota</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('address[city]', $page_datas->cities, null, ['class' => 'form-control required auto-tabindex select select-cities', 'placeholder' => 'Pilih Kota', 'data-placeholder' => 'Pilih Kota']) !!}
		</div>
	</div>
</fieldset>

{{-- informasi kontak --}}
{{-- don't forget to include widget_no_telp --}}
<br />
<strong><h5>Kontak</h5></strong>
<div class="content-clone-contact">
	<div id="section-clone-contact"></div>
	<fieldset class="form-group">
		<a href="javascript:void(0);" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add" data-active="contact"><i class="fa fa-plus"></i> No. Handphone</a>
	</fieldset>
</div>
