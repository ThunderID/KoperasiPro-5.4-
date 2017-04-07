<div class="row m-l-none m-r-none">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-rekening">
			@include('pages.kredit.components.data.survei.data_rekening',[
				'edit' => true
			])
		</div>

		{{---------------- FORM REKENING --------------}}
		@if (isset($page_datas->credit['rekening']))
			@foreach ($page_datas->credit['rekening'] as $k => $v)
				<div class="hidden" data-form="rekening-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="text-uppercase">form rekening</h4>
							<hr/>
						</div>
					</div>
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
						@include ('pages.kredit.components.form.survei.rekening', [
							'data'		=> isset($v) ? $v : null,
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-rekening" data-target="rekening-{{ $k }}">Cancel</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		<div class="hidden" data-form="rekening">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form rekening</h4>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.survei.rekening', [
					'data'		=> null,
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-rekening" data-target="rekening">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM REKENING --------------}}
	</div>
</div>