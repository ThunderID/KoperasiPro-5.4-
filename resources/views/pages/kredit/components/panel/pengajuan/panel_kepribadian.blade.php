<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-kepribadian">
			@include('pages.kredit.components.data.pengajuan.data_kepribadian_new',[
				'edit' => true
			])
		</div>

		{{---------------- FORM KEPRIBADIAN --------------}}
		@if (isset($page_datas->credit['survei_kepribadian']))
			@foreach ($page_datas->credit['survei_kepribadian'] as $k => $v)
				<div class="hidden" data-form="kepribadian-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form kepribadian</p>
							<hr/>
						</div>
					</div>
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
						@include ('pages.kredit.components.form.survei.kepribadian', [
							'param'	=> [
								'data'	=> isset($v) ? $v : null,
							]
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kepribadian" data-target="kepribadian-{{ $k }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		<div class="hidden" data-form="kepribadian">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form kepribadian</p>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.survei.kepribadian', [
					'param'	=> [
						'data'	=> null,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kepribadian" data-target="kepribadian">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM KEPRIBADIAN --------------}}
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<hr>
	</div>
</div>