<div class="row m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-checklist-survei">
			{{-- include component data checklist survei --}}
			Suku Bunga
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{!! Form::text('pengajuan[suku_bunga]', (isset($page_datas->credit['suku_bunga']) ? $page_datas->credit['suku_bunga'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Suku Bunga', 'data-field' => 'suku_bunga']) !!}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>