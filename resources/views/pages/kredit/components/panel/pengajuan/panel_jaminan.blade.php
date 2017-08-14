<div class="row m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-jaminan">
			@include('pages.kredit.components.data.pengajuan.data_jaminan_kendaraan_new',[
				'edit' => true
			])

			<hr class="m-b-sm p-b-sm">

			@include('pages.kredit.components.data.pengajuan.data_jaminan_tanah_bangunan_new',[
				'edit' => true
			])
		</div>

		{{----------------  FORM JAMINAN KENDARAAN  --------------}}
		@if (isset($page_datas->credit['jaminan_kendaraan']) && !empty($page_datas->credit['jaminan_kendaraan']))
			@foreach ($page_datas->credit['jaminan_kendaraan'] as $k => $v)
				<div class="hidden" data-form="jaminan-kendaraan-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form jaminan kendaraan</p>
							<hr/>
						</div>
					</div>
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
					
						@include ('pages.kredit.components.form.pengajuan.jaminan_kendaraan', [
							'param'		=> [
								'data'		=> isset($v) ? $v : null,
								'prefix'	=> 'pengajuan',
							],
							'data'		=> [
								'select_jenis_kendaraan'	=> $page_datas->select_jenis_kendaraan,
								'select_merk_kendaraan'		=> $page_datas->select_merk_kendaraan,
							]
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan" data-target="jaminan-kendaraan-{{ $k }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif
		
		<div class="hidden" data-form="jaminan-kendaraan">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form jaminan kendaraan</p>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
			
				@include ('pages.kredit.components.form.pengajuan.jaminan_kendaraan', [
					'param'		=> [
						'prefix'	=> 'pengajuan',
						'data'		=> null,
					],
					'data'		=> [
						'select_jenis_kendaraan'	=> $page_datas->select_jenis_kendaraan,
						'select_merk_kendaraan'		=> $page_datas->select_merk_kendaraan,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan" data-target="jaminan-kendaraan">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM JAMINAN KENDARAAN --------------}}

		{{---------------- FORM JAMINAN TANAH & BANGUNAN --------------}}
		@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
			@foreach ($page_datas->credit['jaminan_tanah_bangunan'] as $k => $v)
				<div class="hidden" data-form="jaminan-tanah-bangunan-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form jaminan tanah &amp; bangunan</p>
							<hr/>
						</div>
					</div>
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
						@include ('pages.kredit.components.form.pengajuan.jaminan_tanah_bangunan', [
							'param' 	=> [
								'data'		=> isset($v) ? $v : null,
								'prefix'	=> 'pengajuan',
							]
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan" data-target="jaminan-tanah-bangunan-{{ $k }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		<div class="hidden" data-form="jaminan-tanah-bangunan">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">form jaminan tanah &amp; bangunan</p>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.pengajuan.jaminan_tanah_bangunan', [
					'param'		=> [
						'prefix'	=> 'pengajuan',
						'data'		=> null,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan" data-target="jaminan-tanah-bangunan">Batal</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM JAMINAN TANAH & BANGUNAN --------------}}
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<hr>
	</div>
</div>