<fieldset class="form-group">
	<label for="">Tanggal Pengajuan</label>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4">
			{!! Form::text('tanggal_pengajuan', Carbon\Carbon::now()->format('d/m/Y'), ['class' => 'form-control required mask-date-format auto-tabindex focus', 'placeholder' => 'Contoh: 25/12/2015 (dd/mm/yyyy)']) !!}
			<span class="help-block">format pengisian tanggal hari/bulan/tahun (dd/mm/yyyy)</span>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jumlah Pinjaman</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('pengajuan_kredit', null, ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Jumlah pinjaman']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jenis Kredit</label>
	<div class="row">
		<div class="col-md-8">
			{!! Form::select('jenis_kredit', $page_datas->select_jenis_kredit, 'pa', ['class' => 'form-control quick-select required auto-tabindex focus', 'placeholder' => 'Jumlah pinjaman', 'data-other' => 'input-jenis-kredit']) !!} <br/>
			{!! Form::hidden('jenis_kredit', 'pa', ['class' => 'form-control m-t-sm auto-tabindex input-jenis-kredit', 'placeholder' => 'Sebutkan', 'style' => 'width:60%']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lama Angsuran</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jangka_waktu', $page_datas->select_jangka_waktu, null, ['class' => 'form-control select select-lama-angsuran required auto-tabindex mask-number-xs', 'placeholder' => 'Lama angsuran', 'data-placeholder' => 'Lama angsuran', 'style' => 'width:100%']) !!}
		</div>
	</div>
</fieldset>