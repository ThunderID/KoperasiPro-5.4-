<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-survei-nasabah">
			{{-- include data survei nasabah --}}
			@include ('pages.kredit.components.data.pengajuan.data_survei_nasabah', [
				'edit' => true
			])
		</div>

		{{-- panel form nasabah --}}
		<div class="hidden" data-form="survei-nasabah">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize text-lg m-b-xs">form survei nasabah</p>
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
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-survei-nasabah" data-target="survei-nasabah">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<hr>
	</div>
</div>