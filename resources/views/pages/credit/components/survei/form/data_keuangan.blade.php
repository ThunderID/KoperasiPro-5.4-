{!! Form::open(['url' => route('credit.updating', ['id' => $page_datas->credit['id']]), 'class' => 'no-enter']) !!}

	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">PENGHASILAN</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Penghasilan Gaji</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pendapatan][penghasilan_gaji]", (!empty($page_datas->credit['kreditur']['keuangan']['pendapatan']['penghasilan_gaji']) ? $page_datas->credit['kreditur']['keuangan']['pendapatan']['penghasilan_gaji'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Penghasilan Gaji']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Penghasilan Non Gaji</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pendapatan][penghasilan_non_gaji]", (!empty($page_datas->credit['kreditur']['keuangan']['pendapatan']['penghasilan_non_gaji']) ? $page_datas->credit['kreditur']['keuangan']['pendapatan']['penghasilan_non_gaji'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Penghasilan Non Gaji']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Penghasilan Lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pendapatan][penghasilan_lain]", (!empty($page_datas->credit['kreditur']['keuangan']['pendapatan']['penghasilan_lain']) ? $page_datas->credit['kreditur']['keuangan']['pendapatan']['penghasilan_lain'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Penghasilan Lain']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Sumber Penghasilan Lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pendapatan][sumber_penghasilan_lain]", (!empty($page_datas->credit['kreditur']['keuangan']['pendapatan']['sumber_penghasilan_lain']) ? $page_datas->credit['kreditur']['keuangan']['pendapatan']['sumber_penghasilan_lain'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Sumber Penghasilan Lain']) !!}
			</div>
		</div>
	</fieldset>


	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">PENGELUARAN</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Biaya Rumah Tangga</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pengeluaran][biaya_rumah_tangga]", (!empty($page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_rumah_tangga']) ? $page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_rumah_tangga'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Biaya Rumah Tangga']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya Pendidikan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pengeluaran][biaya_pendidikan]", (!empty($page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_pendidikan']) ? $page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_pendidikan'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Biaya Pendidikan']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya Telepon</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pengeluaran][biaya_telepon]", (!empty($page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_telepon']) ? $page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_telepon'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Biaya Telepon']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya PDAM</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pengeluaran][biaya_pdam]", (!empty($page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_pdam']) ? $page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_pdam'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Biaya PDAM']) !!}
			</div>
		</div>
	</fieldset>	

	<fieldset class="form-group">
		<label for="">Biaya Listrik</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pengeluaran][biaya_listrik]", (!empty($page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_listrik']) ? $page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_listrik'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Biaya Listrik']) !!}
			</div>
		</div>
	</fieldset>	

	<fieldset class="form-group">
		<label for="">Biaya Produksi</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pengeluaran][biaya_produksi]", (!empty($page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_produksi']) ? $page_datas->credit['kreditur']['keuangan']['pengeluaran']['biaya_produksi'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Biaya Produksi']) !!}
			</div>
		</div>
	</fieldset>	

	<fieldset class="form-group">
		<label for="">Pengeluaran Lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("keuangan[pengeluaran][pengeluaran_lain]", (!empty($page_datas->credit['kreditur']['keuangan']['pengeluaran']['pengeluaran_lain']) ? $page_datas->credit['kreditur']['keuangan']['pengeluaran']['pengeluaran_lain'] : ''), ['class' => 'form-control required mask-year auto-tabindex', 'placeholder' => 'Pengeluaran Lain']) !!}
			</div>
		</div>
	</fieldset>				


	<div class="modal-footer">
		<a type='button' class="btn btn-default" data-dismiss='modal'>
			Cancel
		</a>
		<button type="submit" class="btn btn-success">
			Simpan
		</button>
	</div>	
{!! Form::close() !!}	