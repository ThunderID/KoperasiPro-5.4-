{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	{{ Form::hidden('id', $page_datas->credit->credit->id) }}	
	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">PENGHASILAN</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Gaji / Upah Kerja</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[incomes][0][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Gaji']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Suami / Istri</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[incomes][1][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Penghasilan pasangan']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Penghasilan usaha/dagang/tani</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[incomes][2][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Penghasilan usaha']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Lain lain</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[incomes][3][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Lainnya']) !!}
				</div>
			</div>
		</div>
	</fieldset>


	<div class="m-t-none m-b-md">
		<h4 class="m-t-none m-b-xs">PENGELUARAN</h4>
	</div>

	<fieldset class="form-group">
		<label for="">Biaya produksi</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[expenses][0][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Biaya']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya Rumah Tangga</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[expenses][1][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Biaya rumah tangga']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya Listrik/PDAM/Telepon</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[expenses][2][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Biaya fixed']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Biaya Pendidikan</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[expenses][3][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Biaya pendidikan']) !!}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<label for="">Lain lain</label>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					{!! Form::text('keuangan[expenses][4][amount]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'Lainnya']) !!}
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