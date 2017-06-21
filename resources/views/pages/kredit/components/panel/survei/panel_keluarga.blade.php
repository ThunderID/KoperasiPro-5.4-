<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{-- panel data keluarga --}}
		<div data-panel="data-keluarga">
			@include ('pages.kredit.components.data.survei.data_keluarga', [
				'edit' => true
			])
		</div>
		
		{{-- panel form keluarga --}}
		{{-- form untuk data yg sudah ada --}}
		@if (isset($page_datas->credit['debitur']['relasi']) && !empty($page_datas->credit['debitur']['relasi']))
			@foreach ($page_datas->credit['debitur']['relasi'] as $k => $v)
				<div class="hidden" data-form="keluarga-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="text-uppercase">form keluarga</h4>
							<hr/>
						</div>
					</div>

					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}

						@include ('pages.kredit.components.form.survei.keluarga', [
							'param'	=> [
								'data' => isset($v) ? $v : null,
							]
						])
						
						{{-- button action form keluarga --}}
						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-keluarga" data-target="keluarga-{{ $k }}">Cancel</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		{{-- form untuk new data keluarga --}}
		<div class="hidden" data-form="keluarga">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form keluarga</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}

				@include ('pages.kredit.components.form.survei.keluarga', [
					'param'	=> [
						'data' => null,
					]
				])
				
				{{-- button action form keluarga --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-keluarga" data-target="keluarga">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>