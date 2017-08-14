<div class="row m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="survei-jaminan">
			{{-- include component survei jaminan   --}}
			@include ('pages.kredit.components.data.pengajuan.data_survei_jaminan_kendaraan', [
				'edit' => true
			])

			<hr class="m-b-sm p-b-sm">

			@include ('pages.kredit.components.data.pengajuan.data_survei_jaminan_tanah_bangunan', [
				'edit' => true
			])
		</div>

		{{----------------  FORM SURVEI JAMINAN KENDARAAN  --------------}}
		@forelse ((array)$page_datas->credit['jaminan_kendaraan'] as $k => $v)
			@forelse((array)$v['survei_jaminan_kendaraan'] as $k2 => $v2)
				<div class="hidden survei-jaminan-kendaraan" data-form="survei-jaminan-kendaraan-{{ $k }}-{{ $k2 }}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form survei jaminan kendaraan</p>
							<hr/>
						</div>
					</div>
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
					
						@include ('pages.kredit.components.form.survei.jaminan_kendaraan', [
							'param'	=> [
								'data'	=> isset($v2) ? $v2 : null,
							]
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="survei-jaminan" data-target="survei-jaminan-kendaraan-{{ $k }}-{{ $k2 }}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@empty
			@endforelse
	
			@php $v['id']	= null; @endphp
			<div class="hidden survei-jaminan-kendaraan" data-form="survei-jaminan-kendaraan-{{ $k }}--1">
				<div class="row">
					<div class="col-sm-12">
						<p class="text-capitalize m-b-sm text-lg">form survei jaminan kendaraan</p>
						<hr/>
					</div>
				</div>
				{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				
					@include ('pages.kredit.components.form.survei.jaminan_kendaraan', [
						'param'	=> [
							'data'	=> isset($v) ? $v : null,
						]
					])

					<div class="clearfix">&nbsp;</div>
					<div class="text-right">
						<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="survei-jaminan" data-target="survei-jaminan-kendaraan-{{ $k }}--1">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				{!! Form::close() !!}
			</div>
		@empty
		@endforelse


		{{---------------- // FORM SURVEI JAMINAN KENDARAAN --------------}}

		{{---------------- FORM JAMINAN TANAH & BANGUNAN --------------}}
		@forelse ((array)$page_datas->credit['jaminan_tanah_bangunan'] as $k => $v)
			@forelse((array)$v['survei_jaminan_tanah_bangunan'] as $k2 => $v2)
				<div class="hidden survei-jaminan-tanah-bangunan" data-form="survei-jaminan-tanah-bangunan-{{ $k }}-{{$k2}}">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-capitalize m-b-sm text-lg">form survei tanah &amp; bangunan</p>
							<hr/>
						</div>
					</div>
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
						@include ('pages.kredit.components.form.survei.jaminan_tanah_bangunan', [
							'param'	=> [
								'data'	=> isset($v2) ? $v2 : null,
							]
						])

						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="survei-jaminan" data-target="survei-jaminan-tanah-bangunan-{{ $k }}-{{$k2}}">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@empty
			@endforelse
		
			@php $v['id']	= null; @endphp
			<div class="hidden survei-jaminan-tanah-bangunan" data-form="survei-jaminan-tanah-bangunan-{{ $k }}--1">
				<div class="row">
					<div class="col-sm-12">
						<p class="text-capitalize m-b-sm text-lg">form survei jaminan tanah &amp; bangunan</p>
						<hr/>
					</div>
				</div>
				{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
					@include ('pages.kredit.components.form.survei.jaminan_tanah_bangunan', [
						'param'	=> [
							'data'	=> isset($v) ? $v : null,
						]
					])

					<div class="clearfix">&nbsp;</div>
					<div class="text-right">
						<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="survei-jaminan" data-target="survei-jaminan-tanah-bangunan-{{ $k }}--1">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				{!! Form::close() !!}
			</div>
		@empty
		@endforelse

		{{---------------- // FORM JAMINAN TANAH & BANGUNAN --------------}}
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<hr>
	</div>
</div>