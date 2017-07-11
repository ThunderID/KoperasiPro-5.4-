<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{-- DATA ASET --}}
		<div data-panel="data-aset">
			@include ('pages.kredit.components.data.pengajuan.data_aset_usaha_new',[
				'edit' => true
			])
			
			<hr class="m-b-sm p-b-sm">

			@include ('pages.kredit.components.data.pengajuan.data_aset_kendaraan_new',[
				'edit' => true
			])

			<hr class="m-b-sm p-b-sm">

			@include ('pages.kredit.components.data.pengajuan.data_aset_tanah_bangunan_new',[
				'edit' => true
			])
		</div>

		{{----------------  FORM ASET USAHA --------------}}
		{{-- form untuk data yg sudah ada --}}
		@if (isset($page_datas->credit['survei_aset_usaha']))
			@foreach ($page_datas->credit['survei_aset_usaha'] as $k => $v)
				<div class="hidden" data-form="aset-usaha-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form aset usaha</p>
							<hr/>
						</div>
					</div>

					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}

						@include ('pages.kredit.components.form.survei.aset_usaha', [
							'param'	=> [
								'data' => isset($v) ? $v : null,
							]
						])
						
						{{-- button action form aset usaha --}}
						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-usaha-{{ $k }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		{{-- form untuk new data usaha --}}
		<div class="hidden" data-form="aset-usaha">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form aset usaha</p>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}

				@include ('pages.kredit.components.form.survei.aset_usaha', [
					'param'	=> [
						'data' => null,
					]
				])
				
				{{-- button action form aset usaha --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-usaha">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM ASET USAHA --------------}}

		{{----------------  FORM ASET KENDARAAN  --------------}}
		{{-- form untuk data yang sudah ada --}}
		@if (isset($page_datas->credit['survei_aset_kendaraan']))
			@foreach ($page_datas->credit['survei_aset_kendaraan'] as $k => $v)
				<div class="hidden" data-form="aset-kendaraan-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form aset kendaraan</p>
							<hr/>
						</div>
					</div>

					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}

						@include ('pages.kredit.components.form.survei.aset_kendaraan', [
							'param'	=> [
								'data'	=> isset($v) ? $v : null,
							]
						])

						{{-- button action form aset kendaraan --}}
						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-kendaraan-{{ $k }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		{{-- form untuk new data aset kendaraan --}}
		<div class="hidden" data-form="aset-kendaraan">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form aset kendaraan</p>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.survei.aset_kendaraan', [
					'param'	=> [
						'data'	=> null,
					]
				])

				{{-- button action form aset kendaraan --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-kendaraan">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM ASET KENDARAAN --------------}}

		{{----------------  FORM ASET TANAH & BANGUNAN  --------------}}
		{{-- form untuk data yg sudah ada --}}
		@if (isset($page_datas->credit['survei_aset_tanah_bangunan']))
			@foreach ($page_datas->credit['survei_aset_tanah_bangunan'] as $k => $v)
				<div class="hidden" data-form="aset-tanah-bangunan-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form aset tanah &amp; bangunan</p>
							<hr/>
						</div>
					</div>

					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
						@include ('pages.kredit.components.form.survei.aset_tanah_bangunan', [
							'param'	=> [
								'data'	=> isset($v) ? $v : null,
							]
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-tanah-bangunan-{{ $k }}">Batal</a>
							<button type="submit" href="#" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		{{-- form untuk new data aset tanah & bangunan --}}
		<div class="hidden" data-form="aset-tanah-bangunan">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form aset tanah &amp; bangunan</p>
					<hr/>
				</div>
			</div>
			
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.survei.aset_tanah_bangunan', [
					'param'	=> [
						'data'	=> null,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-tanah-bangunan">Batal</a>
					<button type="submit" href="#" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM ASET TANAH & BANGUNAN  --------------}}
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<hr>
	</div>
</div>