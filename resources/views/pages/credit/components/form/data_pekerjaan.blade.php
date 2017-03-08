<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Pekerjaan</h4>
</div>

<fieldset class="form-group">
	<label for="">Jenis Pekerjaan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('pekerjaan[jenis]', [
				'peg_negeri'		=> 'Pegawai Negeri',
				'peg_swasta'		=> 'Pegawai Swasta',
				'wiraswasta'		=> 'Wiraswasta',
				'petani'			=> 'Petani',
				'nelayan'			=> 'Nelayan',
				'tni'				=> 'TNI',
				'polri'				=> 'Polri',
				'lainnya'			=> 'Lainnya'
			], 'peg_negeri', ['class' => 'form-control select auto-tabindex focus select-pekerjaan']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Instansi</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('pekerjaan[instansi]', null, ['class' => 'form-control auto-tabindex input-instansi', 'placeholder' => 'Instansi']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Jabatan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('pekerjaan[jabatan]', null, ['class' => 'form-control auto-tabindex input-jabatan', 'placeholder' => 'Jabatan']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Bekerja Sejak</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('pekerjaan[sejak]', null, ['class' => 'form-control required auto-tabindex required mask-date-format', 'placeholder' => 'Bekerja Sejak']) !!}
		</div>
	</div>
</fieldset>

<div class="clearfix">&nbsp;</div>
<hr />
<div class="clearfix">&nbsp;</div>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'		=> 'person[pekerjaan]',
		'province' 		=> $page_datas->province,
		'cities'		=> $page_datas->cities
	]
])

<div class="clearfix">&nbsp;</div>
<hr />
<div class="clearfix">&nbsp;</div>

{{-- panel contact --}}
@include('components.helpers.panels.contact', [ 
	'param'	=> [
		'target'		=> 'template-contact-pekerjaan',
		'prefix'		=> 'pekerjaan'
]])