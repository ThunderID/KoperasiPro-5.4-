{!! Form::open(['url' => route('credit.updating', ['id' => $page_datas->credit['id']]), 'class' => '']) !!}

@if(empty($page_datas->credit['kreditur']['aset']['rumah']))
	<?php $page_datas->credit['kreditur']['aset']['rumah'] = null ;?>
@endif
@if(empty($page_datas->credit['kreditur']['aset']['kendaraan']))
	<?php $page_datas->credit['kreditur']['aset']['kendaraan'] = null ;?>
@endif
@if(empty($page_datas->credit['kreditur']['aset']['usaha']))
	<?php $page_datas->credit['kreditur']['aset']['usaha'] = null ;?>
@endif
	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">RUMAH</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Status Rumah</label>
		<div class="row">
			<div class="col-md-8">
				{!! Form::select('aset[rumah][status]', [
					'milik_sendiri'	=> 'Milik Sendiri',
					'keluarga'		=> 'Keluarga',
					'dinas'			=> 'Dinas',
					'sewa'			=> 'Sewa'
				], $page_datas->credit['kreditur']['aset']['rumah']['status'] , ['class' => 'form-control quick-select house-ownership_status']) !!}
			</div>
			<div class="col-md-8">
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<div class="row">
			<div class="col-md-6">
				<label for="">Angsuran Rumah</label>
				<div class="input-group">
					{!! Form::text("aset[rumah][angsuran]", (!empty($page_datas->credit['kreditur']['aset']['rumah']['angsuran']) ? $page_datas->credit['kreditur']['aset']['rumah']['angsuran'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Angsuran Rumah']) !!}
					<div class="input-group-addon">/ Bulan</div>
				</div>					
			</div>

			<div class="col-md-4">
				<label for="">Tenor Angsuran Rumah</label>
				<div class="input-group">
					{!! Form::number('aset[rumah][tenor_angsuran]', $page_datas->credit['kreditur']['aset']['rumah']['tenor_angsuran'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Lama angsuran', 'min' => '0']) !!}
					<div class="input-group-addon">Bulan</div>
				</div>				
			</div>
		</div>
	</fieldset>	

	<fieldset class="form-group">
		<div class="row">
			<div class="col-md-6">
				<label for="">Ditinggali Sejak</label>
				{!! Form::text('aset[rumah][sejak]', $page_datas->credit['kreditur']['aset']['rumah']['sejak'], ['class' => 'form-control date mask-date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
			</div>		
			<div class="col-md-4">
				<label for="">Masa Sewa</label>
				<div class="input-group">
					{!! Form::number('aset[rumah][masa_sewa]', $page_datas->credit['kreditur']['aset']['rumah']['masa_sewa'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Masa Sewa', 'min' => '0']) !!}

					<div class="input-group-addon">Tahun</div>
				</div>					
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<div class="row">
			<div class="col-md-4">
				<label for="">Luas Rumah</label>
				<div class="input-group">
					{!! Form::number('aset[rumah][luas]', $page_datas->credit['kreditur']['aset']['rumah']['luas'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Luas', 'min' => '0']) !!}
					<div class="input-group-addon">M<sup>2</sup></div>
				</div>					
			</div>
		</div>
	</fieldset>	

	<fieldset class="form-group">
		<div class="row">
			<div class="col-md-12">
				<label for="">Nilai Rumah</label>
				{!! Form::text("aset[rumah][nilai_rumah]", (!empty($page_datas->credit['kreditur']['aset']['rumah']['nilai_rumah']) ? $page_datas->credit['kreditur']['aset']['rumah']['nilai_rumah'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Angsuran Rumah']) !!}
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
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::number('aset[kendaraan][jumlah_kendaraan_r4]', $page_datas->credit['kreditur']['aset']['kendaraan']['jumlah_kendaraan_r2'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Roda 2', 'min' => '0']) !!}
					<div class="input-group-addon">Roda 2</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::number('aset[kendaraan][jumlah_kendaraan_r2]', $page_datas->credit['kreditur']['aset']['kendaraan']['jumlah_kendaraan_r4'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Roda 4', 'min' => '0']) !!}
					<div class="input-group-addon">Roda 4</div>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<div class="row">
			<div class="col-md-12">
				<label for="">Nilai Kendaraan</label>
				{!! Form::text("aset[kendaraan][nilai_kendaraan]", (!empty($page_datas->credit['kreditur']['aset']['kendaraan']['nilai_kendaraan']) ? $page_datas->credit['kreditur']['aset']['kendaraan']['nilai_kendaraan'] : ''), ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Nilai Kendaraan']) !!}
			</div>
		</div>
	</fieldset>

	<div class="clearfix">&nbsp;</div>

	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">USAHA</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Nama Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('aset[usaha][nama]',  $page_datas->credit['kreditur']['aset']['usaha']['nama'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama Usaha']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<div class="row">
			<div class="col-md-4">
				<label for="">Bidang Usaha</label>
				<div class="input-group">
					{!! Form::text('aset[usaha][bidang_usaha]',  $page_datas->credit['kreditur']['aset']['usaha']['bidang_usaha'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Bidang Usaha']) !!}
				</div>
			</div>

			<div class="col-md-4">
				<label for="">Didirkan Sejak</label>
				<div class="input-group">
					{!! Form::text('aset[usaha][sejak]', $page_datas->credit['kreditur']['aset']['usaha']['sejak'], ['class' => 'form-control date mask-date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Status Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('aset[usaha][status_usaha]', [
					'milik_sendiri'		=> 'Milik Sendiri',
					'milik_keluarga'	=> 'Milik Keluarga',
					'bagi_hasil'		=> 'Kerjasama Bagi Hasil'
				], $page_datas->credit['kreditur']['aset']['usaha']['status_usaha'], ['class' => 'form-control quick-select company-ownership_status']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Saham Usaha</label>
		<div class="row">
			<div class="col-md-3">
				<div class="input-group">
					{!! Form::number('aset[usaha][saham_usaha]', $page_datas->credit['kreditur']['aset']['usaha']['saham_usaha'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Saham Yang Dimiliki', 'min' => '0', 'max' => '100']) !!}
					<div class="input-group-addon">%</div>
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