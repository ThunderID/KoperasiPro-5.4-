<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Pekerjaan</h4>
</div>

<fieldset class="form-group">
	<label for="">Jenis Pekerjaan</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('pekerjaan[area]', [
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
	<label for="">Jabatan</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::text('pekerjaan[position]', null, ['class' => 'form-control auto-tabindex required input-jabatan', 'placeholder' => 'Jabatan']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label for="">Bekerja Sejak</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('pekerjaan[since]', null, ['class' => 'form-control required auto-tabindex required date-format', 'placeholder' => 'Bekerja Sejak']) !!}
		</div>
	</div>
</fieldset>

{{-- form address --}}
@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'		=> 'pekerjaan',
		'province' 		=> $page_datas->province,
		'cities'		=> $page_datas->cities
	]
])
<br />

{{-- panel contact --}}
@include('components.helpers.panels.contact', [ 
	'param'	=> [
		'target'		=> 'template-contact-pekerjaan',
		'prefix'		=> 'pekerjaan'
]])