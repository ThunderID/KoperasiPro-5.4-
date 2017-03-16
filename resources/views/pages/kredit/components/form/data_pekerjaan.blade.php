<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Pekerjaan</h4>
</div>

<fieldset class="form-group p-b-md">
	<label for="">Jenis Pekerjaan</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::select('kreditur[pekerjaan]', [
				'tidak_bekerja'		=> 'Belum / Tidak Bekerja',
				'karyawan_swasta'	=> 'Karyawan Swasta',
				'nelayan'			=> 'Nelayan',
				'pegawai_negeri'	=> 'Pegawai Negeri',
				'petani'			=> 'Petani',
				'polri'				=> 'Polri',
				'wiraswasta'		=> 'Wiraswasta',
				'00000'				=> 'Lainnya'
			], 'tidak_bekerja', ['class' => 'form-control quick-select auto-tabindex focus select-pekerjaan', 'data-other' => 'input-jenis-pekerjaan']) !!} <br/>
			{!! Form::hidden('kreditur[pekerjaan]', null, ['class' => 'form-control m-t-sm auto-tabindex input-jenis-pekerjaan', 'placeholder' => 'Sebutkan', 'style' => 'width:40%']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Penghasilan Bersih</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('penghasilan_bersih', null, ['class' => 'form-control mask-money required auto-tabindex', 'placeholder' => 'Penghasilan bersih']) !!}
		</div>
	</div>
</fieldset>
<div class="clearfix">&nbsp;</div>