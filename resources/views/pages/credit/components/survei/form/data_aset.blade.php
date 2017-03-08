{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	{{ Form::hidden('id', $page_datas->credit->credit->id) }}

	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">RUMAH/TANAH</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Status Rumah</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('asset[houses][0][ownership_status]', [
					'milik_sendiri'	=> 'Milik Sendiri',
					'keluarga'		=> 'Keluarga',
					'dinas'			=> 'Dinas',
					'sewa'			=> 'Sewa'
				], 'milik_sendiri', ['class' => 'form-control quick-select house-ownership_status']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Sejak</label>
		<div class="row">
			<div class="col-md-3">
				{!! Form::text('asset[houses][0][since]', null, ['class' => 'form-control date date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
			</div>
			<div class="col-md-1">
				hingga
			</div>
			<div class="col-md-3">
				{!! Form::text('asset[houses][0][to]', null, ['class' => 'form-control date date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Angsuran/KPR</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('asset[houses][0][installment]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'jumlah angsuran']) !!}
					<div class="input-group-addon">/ Bulan</div>
				</div>
			</div>
			<div class="col-md-1">
				selama
			</div>
			<div class="col-md-3">
				<div class="input-group">
					{!! Form::number('asset[houses][0][period]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Lama angsuran', 'min' => '1', 'max' => '50']) !!}
					<div class="input-group-addon">Bulan</div>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Luas Rumah/Tanah</label>
		<div class="row">
			<div class="col-md-3">
				<div class="input-group">
					{!! Form::number('asset[houses][0][size]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Luas', 'min' => '1', 'max' => '50']) !!}
					<div class="input-group-addon">m2</div>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Nilai Rumah/Tanah</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('asset[houses][0][worth]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Nilai']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<div class="clearfix">&nbsp;</div>

	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">KENDARAAN</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Jumlah Kendaraan</label>
		<div class="row">
			<div class="col-md-3">
				<div class="input-group">
					{!! Form::number('asset[vehicles][0][four_wheels]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Roda 4', 'min' => '1', 'max' => '50']) !!}
					<div class="input-group-addon">roda 4</div>
				</div>
			</div>
			<div class="col-md-1">
				/ 
			</div>
			<div class="col-md-3">
				<div class="input-group">
					{!! Form::number('asset[vehicles][0][two_wheels]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Roda 2', 'min' => '1', 'max' => '50']) !!}
					<div class="input-group-addon">roda 2</div>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Nilai Kendaraan</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('asset[vehicles][0][worth]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Nilai']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<div class="clearfix">&nbsp;</div>

	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">USAHA / PERUSAHAAN</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Nama Perusahaan / Usaha</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('asset[companies][0][name]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Bidang Usaha</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('asset[companies][0][area]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Bidang']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Berdiri Sejak</label>
		<div class="row">
			<div class="col-md-3">
				<div class="input-group">
					{!! Form::text('asset[companies][0][since]', null, ['class' => 'form-control date date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Status Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('asset[companies][0][ownership_status]', [
					'milik_sendiri'		=> 'Milik Sendiri',
					'milik_keluarga'	=> 'Milik Keluarga',
					'bagi_hasil'		=> 'Kerjasama Bagi Hasil'
				], 'milik_sendiri', ['class' => 'form-control quick-select company-ownership_status']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Kerjasama Bagi Hasil</label>
		<div class="row">
			<div class="col-md-3">
				<div class="input-group">
					{!! Form::number('asset[companies][0][share]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Bagi Hasil', 'min' => '1', 'max' => '99']) !!}
					<div class="input-group-addon">%</div>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Nilai Asset Perusahaan</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('asset[companies][0][worth]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Nilai']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<div class="modal-footer">
		<a type='button' class="btn btn-default" data-dismiss='modal'>
			Cancel
		</a>
		<button type="submit" class="btn btn-success">
			Save
		</button>
	</div>	
{!! Form::close() !!}	