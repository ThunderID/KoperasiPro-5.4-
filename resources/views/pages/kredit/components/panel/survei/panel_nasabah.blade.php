<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{-- panel data nasabah --}}
		<div data-panel="data-nasabah">
			@include ('pages.kredit.components.data.survei.data_nasabah', [
				'edit' => true
			])
		</div>
		
		{{-- panel form nasabah --}}
		<div class="hidden" data-form="nasabah">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form nasabah</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form nasabah --}}
				@include ('pages.kredit.components.form.survei.nasabah', [
					'param'	=> [
						'data'	=> isset($page_datas->credit['survei_nasabah']) ? $page_datas->credit['survei_nasabah'] : null,
					]
				])
				
				{{-- button action form nasabah --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-nasabah" data-target="nasabah">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>