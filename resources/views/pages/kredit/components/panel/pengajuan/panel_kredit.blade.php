<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{-- panel data kredit --}}
		<div data-panel="data-kredit">
			@include ('pages.kredit.components.data.pengajuan.data_kredit', [
				'edit' => (in_array($page_datas->credit['status'], ['pengajuan', 'survei'])) ? true : false
			])
		</div>
		
		{{-- panel form kredit --}}
		<div class="hidden" data-form="kredit">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form kredit</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form kredit --}}
				@include ('pages.kredit.components.form.pengajuan.kredit', [
					'data'	=> [
						'select_jenis_kredit'	=> $page_datas->select_jenis_kredit,
						'select_jangka_waktu'	=> $page_datas->select_jangka_waktu
					],
					'param'	=> [
						'data'		=> isset($page_datas->credit) ? $page_datas->credit : null,
					]
				])
				
				{{-- button action form kredit --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default btn-sm" data-dismiss="panel" data-panel="data-kredit" data-target="kredit">Cancel</a>
					<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>