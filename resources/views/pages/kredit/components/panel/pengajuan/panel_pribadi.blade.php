<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-pribadi">
			{{-- NASABAH --}}
			@include ('pages.kredit.components.data.pengajuan.data_nasabah_new', [
				'edit' => true
			])
			
			<hr class="m-b-sm p-b-sm">

			{{-- KELUARGA --}}
			@include ('pages.kredit.components.data.pengajuan.data_keluarga_new', [
				'edit' => true
			])

			<hr class="m-b-sm p-b-sm">

			{{-- KEPRIBADIAN --}}
			@include ('pages.kredit.components.data.pengajuan.data_kepribadian_new', [
				'edit' => true
			])
		</div>
		
		{{-- FORM UNTUK DATA NASABAH --}}
		<div class="hidden" data-form="nasabah">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form nasabah</p>
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
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-pribadi" data-target="nasabah">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>

		{{-- FORM UNTUK EDIT DATA KELUARGA --}}
		@if (isset($page_datas->credit['debitur']['relasi']) && !empty($page_datas->credit['debitur']['relasi']))
			@foreach ($page_datas->credit['debitur']['relasi'] as $k => $v)
				<div class="hidden" data-form="keluarga-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form keluarga</p>
							<hr/>
						</div>
					</div>

					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}

						@include ('pages.kredit.components.form.pengajuan.keluarga', [
							'param'	=> [
								'data' => isset($v) ? $v : null,
							]
						])
						
						{{-- button action form keluarga --}}
						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-pribadi" data-target="keluarga-{{ $k }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		{{-- FORM UNTUK TAMBAH DATA KELUARGA --}}
		<div class="hidden" data-form="keluarga">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form keluarga</p>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}

				@include ('pages.kredit.components.form.pengajuan.keluarga', [
					'param'	=> [
						'data' => null,
					]
				])
				
				{{-- button action form keluarga --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-pribadi" data-target="keluarga">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>

		{{-- FORM UNTUK EDIT DATA KEPRIBADIAN --}}
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
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-pribadi" data-target="kepribadian-{{ $k }}">Batal</a>
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
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-pribadi" data-target="kepribadian">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM KEPRIBADIAN --------------}}
	</div>
</div>