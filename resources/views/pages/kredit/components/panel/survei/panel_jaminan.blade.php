<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-jaminan">
			@include('pages.kredit.components.data.survei.data_jaminan_kendaraan',[
				'edit' => true
			])
			@include('pages.kredit.components.data.survei.data_jaminan_tanah_bangunan',[
				'edit' => true
			])
		</div>

		{{----------------  FORM JAMINAN KENDARAAN  --------------}}
		@if (isset($page_datas->credit['jaminan_kendaraan']))
			@foreach ($page_datas->credit['jaminan_kendaraan'] as $k => $v)
				<div class="hidden" data-form="jaminan-kendaraan-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="text-uppercase">form jaminan kendaraan</h4>
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
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan" data-target="jaminan-kendaraan-{{ $k }}">Cancel</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		<div class="hidden" data-form="jaminan-kendaraan">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form jaminan kendaraan</h4>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
			
				@include ('pages.kredit.components.form.survei.jaminan_kendaraan', [
					'param'	=> [
						'data'	=> null,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan" data-target="jaminan-kendaraan">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM JAMINAN KENDARAAN --------------}}

		{{---------------- FORM JAMINAN TANAH & BANGUNAN --------------}}
		@if (isset($page_datas->credit['jaminan_tanah_bangunan']))
			@foreach ($page_datas->credit['jaminan_tanah_bangunan'] as $k => $v)
				<div class="hidden" data-form="jaminan-tanah-bangunan-{{ $k }}">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="text-uppercase">form jaminan tanah bangunan</h4>
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
							<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan" data-target="jaminan-tanah-bangunan-{{ $k }}">Cancel</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					{!! Form::close() !!}
				</div>
			@endforeach
		@endif

		<div class="hidden" data-form="jaminan-tanah-bangunan">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form jaminan tanah bangunan</h4>
					<hr/>
				</div>
			</div>
			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				@include ('pages.kredit.components.form.survei.jaminan_tanah_bangunan', [
					'param'	=> [
						'data'	=> null,
					]
				])

				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan" data-target="jaminan-tanah-bangunan">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{---------------- // FORM JAMINAN TANAH & BANGUNAN --------------}}
	</div>
</div>