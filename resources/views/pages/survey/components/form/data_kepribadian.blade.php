{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	{{ Form::hidden('id', $page_datas->credit->credit->id) }}

	<fieldset class="form-group">
		<label for="">Dilingkungan Tinggal</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('kepribadian[residence][acquinted]', [
					'dikenal'			=> 'Dikenal',
					'kurang_dikenal'	=> 'Kurang Dikenal',
					'tidak_dikenal'		=> 'Tidak Dikenal'
				], $page_datas->credit->survey->personality->residence['acquinted'], ['class' => 'form-control quick-select residence-acquinted']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Dilingkungan Kerja</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('kepribadian[workplace][acquinted]', [
					'dikenal'			=> 'Dikenal',
					'kurang_dikenal'	=> 'Kurang Dikenal',
					'tidak_dikenal'		=> 'Tidak Dikenal'
				], $page_datas->credit->survey->personality->workplace['acquinted'], ['class' => 'form-control quick-select workplace-acquinted']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Karakter</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('kepribadian[character]', [
					'baik'			=> 'Baik',
					'cukup_baik'	=> 'Cukup Baik',
					'tidak_baik'	=> 'Tidak Baik'
				], $page_datas->credit->survey->personality->character , ['class' => 'form-control quick-select character']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Pola Hidup</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('kepribadian[lifestyle]', [
					'sederhana'		=> 'Sederhana',
					'mewah'			=> 'Mewah'
				], $page_datas->credit->survey->personality->lifestyle, ['class' => 'form-control quick-select lifestyle']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Keterangan Lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('kepribadian[notes][0]', (!empty($page_datas->credit->survey->personality->notes) ? $page_datas->credit->survey->personality->notes[0]['description'] : ''), ['class' => 'form-control no-resize required auto-tabindex', 'placeholder' => 'Keterangan Lain']) !!}
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