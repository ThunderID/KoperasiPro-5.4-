<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{-- panel data nasabah --}}
		<div data-panel="data-nasabah">
			@include ('pages.kredit.components.data.pengajuan.data_nasabah', [
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
				@include ('pages.kredit.components.form.pengajuan.nasabah', [
					'param'	=> [
						'data'		=> isset($page_datas->credit['debitur']) ? $page_datas->credit['debitur'] : null,
					]
				])
				<hr/>
				
				{{-- content form pekerjaan nasabah --}}
				<h5 class="text-uppercase text-light">Pekerjaan</h5>
				@include('pages.kredit.components.form.pengajuan.pekerjaan', [
					'param'		=> [
						'data'		=> isset($page_datas->credit['debitur']) ? $page_datas->credit['debitur'] : null,
					],
					'data'		=> [
						'select_jenis_pekerjaan' 	=> $page_datas->select_jenis_pekerjaan
					],
				])
				
				{{-- button action form nasabah --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-nasabah" data-target="nasabah">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>

		{{-- panel form kontak --}}
		<div class="hidden" data-form="kontak">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form kontak</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form kontak debitur --}}
				@include('components.helpers.forms.contact', [ 
					'param'		=> [
						'prefix'	=> 'debitur',
						'data'		=> null,
					],
				])
				
				{{-- button action form debitur --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-nasabah" data-target="kontak">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>

		{{-- panel form alamat --}}
		<div class="hidden" data-form="alamat">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form alamat</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form alamat nasabah --}}
				@include('components.helpers.forms.address', [
					'param'		=> [
						'prefix'	=> 'debitur',
						'data'		=> null,
					],
					'data'		=> [
						'provinsi' 	=> $page_datas->provinsi
					],
				])
				
				{{-- button action form nasabah --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-nasabah" data-target="alamat">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>

		{{-- panel form pekerjaan --}}
		<div class="hidden" data-form="pekerjaan">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form pekerjaan</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form pekerjaan nasabah --}}
				@include('pages.kredit.components.form.pengajuan.pekerjaan', [
					'param'		=> [
						'data'		=> null,
					],
					'data'		=> [
						'select_jenis_pekerjaan' 	=> $page_datas->select_jenis_pekerjaan
					],
				])
				
				{{-- button action form nasabah --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-nasabah" data-target="pekerjaan">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>