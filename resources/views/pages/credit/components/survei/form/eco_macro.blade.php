{!! Form::open(['url' => route('credit.updating', ['id' => $page_datas->credit['id']]), 'class' => '']) !!}

	{{ Form::hidden('id', $page_datas->credit['id']) }}

	<fieldset class="form-group">
		<label for="">Persaingan Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[persaingan_usaha]', [
					'padat'			=> 'Padat',
					'sedang'		=> 'Sedang',
					'biasa'			=> 'Biasa'
				], $page_datas->credit['kreditur']['makro']['persaingan_usaha'], ['class' => 'form-control quick-select persaingan_usaha']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Prospek Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[prospek_usaha]', [
					'padat'			=> 'Padat',
					'sedang'		=> 'Sedang',
					'biasa'			=> 'Biasa'
				], $page_datas->credit['kreditur']['makro']['prospek_usaha'], ['class' => 'form-control quick-select prospek_usaha']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Perputaran Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[perputaran_usaha]', [
					'padat'			=> 'Padat',
					'sedang'		=> 'Sedang',
					'lambat'		=> 'Lambat'
				], $page_datas->credit['kreditur']['makro']['perputaran_usaha'], ['class' => 'form-control quick-select perputaran_usaha']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Pengalaman Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[pengalaman_usaha]', [
					'< 2 tahun'		=> '< 2 tahun',
					'2 - 3 tahun'	=> '2 - 3 tahun',
					'3 - 5 tahun'	=> '3 - 5 tahun',
					'> 5 tahun'		=> '> 5 tahun'
				], $page_datas->credit['kreditur']['makro']['pengalaman_usaha'], ['class' => 'form-control quick-select pengalaman_usaha']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Resiko Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[resiko_usaha]', [
					'bagus'			=> 'Bagus',
					'biasa'			=> 'Biasa',
					'suram'			=> 'Suram'
				], $page_datas->credit['kreditur']['makro']['resiko_usaha'], ['class' => 'form-control quick-select resiko_usaha']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Jumlah Pelanggan Harian</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[jumlah_pelanggan_harian]', [
					'0 - 10'		=> '0 - 10',
					'10 - 50'		=> '10 - 50',
					'50 - 100'		=> '50 - 100',
					'> 100'			=> '> 100'
				], $page_datas->credit['kreditur']['makro']['jumlah_pelanggan_harian'], ['class' => 'form-control quick-select jumlah_pelanggan_harian']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Keterangan Lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('makro[keterangan]', $page_datas->credit['kreditur']['makro']['keterangan'] , ['class' => 'form-control no-resize required auto-tabindex', 'placeholder' => 'Keterangan Lain']) !!}
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