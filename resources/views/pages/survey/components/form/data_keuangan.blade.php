{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	{{ Form::hidden('id', $page_datas->credit->credit->id) }}	
	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">PENGHASILAN</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Gaji / Upah Kerja</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[incomes][0][amount]', $page_datas->credit->survey->finance->incomes[0]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Gaji']) !!}
				{!!Form::hidden('keuangan[incomes][0][description]', 'Gaji Pokok')!!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Suami / Istri</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[incomes][1][amount]', $page_datas->credit->survey->finance->incomes[1]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Penghasilan pasangan']) !!}
				{!!Form::hidden('keuangan[incomes][1][description]', 'Penghasilan Pasangan')!!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Penghasilan usaha/dagang/tani</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[incomes][2][amount]', $page_datas->credit->survey->finance->incomes[2]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Penghasilan usaha']) !!}
				{!!Form::hidden('keuangan[incomes][2][description]', 'Penghasilan Usaha')!!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Lain lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[incomes][3][amount]', $page_datas->credit->survey->finance->incomes[3]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Lainnya']) !!}
				{!!Form::hidden('keuangan[incomes][3][description]', 'Penghasilan Lain')!!}
			</div>
		</div>
	</fieldset>


	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">PENGELUARAN</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Biaya produksi</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[expenses][0][amount]', $page_datas->credit->survey->finance->expenses[0]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Biaya']) !!}
				{!!Form::hidden('keuangan[expenses][0][description]', 'Biaya Produksi')!!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya Rumah Tangga</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[expenses][1][amount]',  $page_datas->credit->survey->finance->expenses[1]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Biaya rumah tangga']) !!}
				{!!Form::hidden('keuangan[expenses][1][description]', 'Biaya Rumah Tangga')!!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya Listrik/PDAM/Telepon</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[expenses][2][amount]',  $page_datas->credit->survey->finance->expenses[2]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Biaya fixed']) !!}
				{!!Form::hidden('keuangan[expenses][2][description]', 'Biaya Fixed')!!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya Pendidikan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[expenses][3][amount]',  $page_datas->credit->survey->finance->expenses[3]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Biaya pendidikan']) !!}
				{!!Form::hidden('keuangan[expenses][3][description]', 'Biaya Pendidikan')!!}
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Lain lain</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('keuangan[expenses][4][amount]',  $page_datas->credit->survey->finance->expenses[4]->amount, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Lainnya']) !!}
				{!!Form::hidden('keuangan[expenses][4][description]', 'Biaya Lainnya')!!}
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