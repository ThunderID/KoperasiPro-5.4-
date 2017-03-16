<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Kredit</h4>
</div>
<fieldset class="form-group">
	<label for="">Jumlah Pinjaman</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('pengajuan_kredit', null, ['class' => 'form-control required mask-money auto-tabindex focus', 'placeholder' => 'Jumlah pinjaman']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jenis Kredit</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('jenis_kredit', $page_datas->select_jenis_kredit, 'pa', ['class' => 'form-control quick-select required auto-tabindex focus', 'placeholder' => 'Jumlah pinjaman', 'data-other' => 'input-jenis-kredit']) !!} <br/>
			{!! Form::hidden('jenis_kredit', 'pa', ['class' => 'form-control m-t-sm auto-tabindex input-jenis-kredit', 'placeholder' => 'Sebutkan']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lama Angsuran</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jangka_waktu', $page_datas->select_jangka_waktu, null, ['class' => 'form-control select select-lama-angsuran number auto-tabindex mask-number-xs', 'placeholder' => 'Lama angsuran', 'data-placeholder' => 'Lama angsuran']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Tujuan Kredit</label>
	<div class="row">
		<div class="col-md-12">
			{!! Form::text('tujuan_kredit', null, ['class' => 'form-control no-resize required auto-tabindex input-tujuan-kredit', 'placeholder' => 'Tujuan kredit']) !!}
		</div>
	</div>
</fieldset>