<div class="row m-l-none m-r-none">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-keuangan">
			@include('pages.kredit.components.data.survei.data_keuangan',[
				'edit' => true
			])
		</div>
		<div class="hidden" data-form="keuangan">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form keuangan</h4>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.survei.keuangan', [
					'param'	=> [
						'data'	=> isset($page_datas->credit['keuangan']) ? $page_datas->credit['keuangan'] : null,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-keuangan" data-target="keuangan">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>