{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	{{ Form::hidden('id', $page_datas->credit->credit->id) }}

	<fieldset class="form-group">
		<label for="">Persaingan Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[competition]', [
					'padat'			=> 'Padat',
					'sedang'		=> 'Sedang',
					'biasa'			=> 'Biasa'
				], $page_datas->credit->survey->macro->competition, ['class' => 'form-control quick-select competition']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Prospek Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[prospect]', [
					'padat'			=> 'Padat',
					'sedang'		=> 'Sedang',
					'biasa'			=> 'Biasa'
				], $page_datas->credit->survey->macro->prospect, ['class' => 'form-control quick-select prospect']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Perputaran Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[turn_over]', [
					'padat'			=> 'Padat',
					'sedang'		=> 'Sedang',
					'lambat'		=> 'Lambat'
				], $page_datas->credit->survey->macro->turn_over, ['class' => 'form-control quick-select turn_over']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Pengalaman Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[experience]', [
					'lt-2'			=> '< 2 tahun',
					'lt-3'			=> '2 - 3 tahun',
					'lt-5'			=> '3 - 5 tahun',
					'gt-5'			=> '> 5 tahun'
				], $page_datas->credit->survey->macro->experience, ['class' => 'form-control quick-select experience']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Resiko Usaha</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[risk]', [
					'bagus'			=> 'Bagus',
					'biasa'			=> 'Biasa',
					'suram'			=> 'Suram'
				], $page_datas->credit->survey->macro->risk, ['class' => 'form-control quick-select risk']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Jumlah Pelanggan Harian</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('makro[daily_customer]', [
					'le-10'			=> '0 - 10',
					'le-50'			=> '10 - 50',
					'le-100'		=> '50 - 100',
					'gt-100'		=> '> 100'
				], 'le-10', ['class' => 'form-control quick-select daily_customer']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Keterangan Lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('makro[others][0]', (!empty($page_datas->credit->survey->macro->others[0]) ? $page_datas->credit->survey->macro->others[0] : '') , ['class' => 'form-control no-resize required auto-tabindex', 'placeholder' => 'Keterangan Lain']) !!}
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