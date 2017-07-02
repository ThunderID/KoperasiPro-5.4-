{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => '']) !!}

	<fieldset class="form-group">
		<label for="">Dilingkungan Tinggal</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('kepribadian[lingkungan_tinggal]', [
					'dikenal'			=> 'Dikenal',
					'kurang_dikenal'	=> 'Kurang Dikenal',
					'tidak_dikenal'		=> 'Tidak Dikenal'
				], $page_datas->credit['debitur']['kepribadian']['lingkungan_tinggal'], ['class' => 'form-control quick-select residence-acquinted']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Dilingkungan Kerja</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('kepribadian[lingkungan_pekerjaan]', [
					'dikenal'			=> 'Dikenal',
					'kurang_dikenal'	=> 'Kurang Dikenal',
					'tidak_dikenal'		=> 'Tidak Dikenal'
				], $page_datas->credit['debitur']['kepribadian']['lingkungan_pekerjaan'], ['class' => 'form-control quick-select workplace-acquinted']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Karakter</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('kepribadian[karakter]', [
					'baik'			=> 'Baik',
					'cukup_baik'	=> 'Cukup Baik',
					'tidak_baik'	=> 'Tidak Baik'
				], $page_datas->credit['debitur']['kepribadian']['karakter'] , ['class' => 'form-control quick-select karakter']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Pola Hidup</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('kepribadian[pola_hidup]', [
					'sederhana'		=> 'Sederhana',
					'mewah'			=> 'Mewah'
				], $page_datas->credit['debitur']['kepribadian']['pola_hidup'], ['class' => 'form-control quick-select pola_hidup']) !!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Keterangan Lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('kepribadian[keterangan]', $page_datas->credit['debitur']['kepribadian']['keterangan'], ['class' => 'form-control no-resize required auto-tabindex', 'placeholder' => 'Keterangan Lain']) !!}
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