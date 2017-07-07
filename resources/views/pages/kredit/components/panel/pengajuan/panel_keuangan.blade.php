<div class="row m-l-none m-r-none">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-keuangan">
			@include ('pages.kredit.components.data.pengajuan.data_rekening_new', [
				'edit' => true
			])

			<hr class="m-b-sm p-b-sm">

			@include ('pages.kredit.components.data.pengajuan.data_keuangan_new',[
				'edit' => true
			])
		</div>

		{{---------------- FORM REKENING --------------}}
		@if (isset($page_datas->credit['survei_rekening']))
			@foreach ($page_datas->credit['survei_rekening'] as $k => $v)
				<div class="hidden" data-form="rekening-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form rekening</p>
							<hr/>
						</div>
					</div>
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
						@include ('pages.kredit.components.form.survei.rekening', [
							'param'	=> [
								'data'	=> isset($v) ? $v : null,
							]
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-keuangan" data-target="rekening-{{ $k }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		<div class="hidden" data-form="rekening">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form rekening</p>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.survei.rekening', [
					'param'	=> [
						'data'	=> null,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-keuangan" data-target="rekening">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM REKENING --------------}}

		{{---------------- FORM KEUANGAN --------------}}
		{{-- form untuk data yg sudah ada --}}
		@if (isset($page_datas->credit['survei_keuangan']))
			@foreach ($page_datas->credit['survei_keuangan'] as $k => $v)
				<div class="hidden" data-form="keuangan-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form keuangan</p>
							<hr/>
						</div>
					</div>
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
						@include ('pages.kredit.components.form.survei.keuangan', [
							'param'	=> [
								'data'	=> isset($v) ? $v : null,
							]
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-keuangan" data-target="keuangan-{{ $k }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif
		
		{{-- form untuk new data keuangan --}}
		<div class="hidden" data-form="keuangan">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form keuangan</p>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.survei.keuangan', [
					'param'	=> [
						'data'	=> null,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-keuangan" data-target="keuangan">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM KEUANGAN --------------}}
	</div>
</div>