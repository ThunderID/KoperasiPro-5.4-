@extends('pages.kredit.templates.index_show_template')

@section('page_content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="data-nasabah" role="tabpanel">
					<div class="row m-l-none m-r-none m-b-md">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							{{-- DATA NASABAH --}}
							<div data-panel="data-nasabah">
								@include ('pages.kredit.components.data_panels.survei.data_nasabah', [
									'edit' => true
								])
							</div>

							<div class="hidden" data-form="nasabah">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="text-uppercase">form nasabah</h4>
										<hr/>
									</div>
								</div>
								{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
									@include ('pages.kredit.components.form.survei.nasabah', [
										'data'	=> isset($page_datas->credit['nasabah']) ? $page_datas->credit['nasabah'] : null,
									])

									<div class="clearfix">&nbsp;</div>
									<div class="text-right">
										<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-nasabah" data-target="nasabah">Cancel</a>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="data-aset" role="tabpanel">
					<div class="row m-l-none m-r-none m-b-md">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							{{-- DATA ASET --}}
							<div data-panel="data-aset">
								@include ('pages.kredit.components.data_panels.survei.data_aset_usaha',[
									'edit' => true
								])

								@include ('pages.kredit.components.data_panels.survei.data_aset_kendaraan',[
									'edit' => true
								])

								@include ('pages.kredit.components.data_panels.survei.data_aset_tanah_bangunan',[
									'edit' => true
								])
							</div>
							
							{{----------------  FORM ASET USAHA --------------}}
							@if (isset($page_datas->credit['aset_usaha']))
								@foreach ($page_datas->credit['aset_usaha'] as $k => $v)
									<div class="hidden" data-form="aset-usaha-{{ $k }}">
										<div class="row">
											<div class="col-sm-12">
												<h4 class="text-uppercase">form aset usaha</h4>
												<hr/>
											</div>
										</div>
										{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
											@include ('pages.kredit.components.form.survei.aset_usaha', [
												'data' => isset($v) ? $v : null,
											])
											
											<div class="clearfix">&nbsp;</div>
											<div class="text-right">
												<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-usaha-{{ $k }}">Cancel</a>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										{!! Form::close() !!}
									</div>
								@endforeach
							@endif

							<div class="hidden" data-form="aset-usaha">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="text-uppercase">form aset usaha</h4>
										<hr/>
									</div>
								</div>
								{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
									@include ('pages.kredit.components.form.survei.aset_usaha', [
										'data' => null,
									])
									
									<div class="clearfix">&nbsp;</div>
									<div class="text-right">
										<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-usaha">Cancel</a>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								{!! Form::close() !!}
							</div>
							{{---------------- // FORM ASET USAHA --------------}}

							{{----------------  FORM ASET KENDARAAN  --------------}}
							@if (isset($page_datas->credit['aset_kendaraan']))
								@foreach ($page_datas->credit['aset_kendaraan'] as $k => $v)
									<div class="hidden" data-form="aset-kendaraan-{{ $k }}">
										<div class="row">
											<div class="col-sm-12">
												<h4 class="text-uppercase">form aset kendaraan</h4>
												<hr/>
											</div>
										</div>
										{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
											@include ('pages.kredit.components.form.survei.aset_kendaraan', [
												'data'	=> isset($v) ? $v : null,
											])

											<div class="clearfix">&nbsp;</div>
											<div class="text-right">
												<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-kendaraan-{{ $k }}">Cancel</a>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										{!! Form::close() !!}
									</div>
								@endforeach
							@endif

							<div class="hidden" data-form="aset-kendaraan">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="text-uppercase">form aset kendaraan</h4>
										<hr/>
									</div>
								</div>
								{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
									@include ('pages.kredit.components.form.survei.aset_kendaraan', [
										'data'	=> null,
									])

									<div class="clearfix">&nbsp;</div>
									<div class="text-right">
										<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-kendaraan">Cancel</a>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								{!! Form::close() !!}
							</div>
							{{---------------- // FORM ASET KENDARAAN --------------}}

							{{----------------  FORM ASET TANAH & BANGUNAN  --------------}}
							@if (isset($page_datas->credit['aset_tanah_bangunan']))
								@foreach ($page_datas->credit['aset_tanah_bangunan'] as $k => $v)
									<div class="hidden" data-form="aset-tanah-bangunan-{{ $k }}">
										<div class="row">
											<div class="col-sm-12">
												<h4 class="text-uppercase">form aset tanah &amp; bangunan</h4>
												<hr/>
											</div>
										</div>
										{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
											@include ('pages.kredit.components.form.survei.aset_tanah_bangunan', [
												'data'		=> isset($v) ? $v : null,
											])

											<div class="clearfix">&nbsp;</div>
											<div class="text-right">
												<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-tanah-bangunan-{{ $k }}">Cancel</a>
												<button type="submit" href="#" class="btn btn-primary">Simpan</button>
											</div>
										{!! Form::close() !!}
									</div>
								@endforeach
							@endif

							<div class="hidden" data-form="aset-tanah-bangunan">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="text-uppercase">form aset tanah &amp; bangunan</h4>
										<hr/>
									</div>
								</div>
								{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
									@include ('pages.kredit.components.form.survei.aset_tanah_bangunan', [
										'data'		=> null,
									])

									<div class="clearfix">&nbsp;</div>
									<div class="text-right">
										<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-aset" data-target="aset-tanah-bangunan">Cancel</a>
										<button type="submit" href="#" class="btn btn-primary">Simpan</button>
									</div>
								{!! Form::close() !!}
							</div>
							{{---------------- // FORM ASET TANAH & BANGUNAN  --------------}}
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="data-jaminan" role="tabpanel">
					<div class="row m-l-none m-r-none m-b-md">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div data-panel="data-jaminan">
								@include('pages.kredit.components.data_panels.survei.data_jaminan_kendaraan',[
									'edit' => true
								])
								@include('pages.kredit.components.data_panels.survei.data_jaminan_tanah_bangunan',[
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
												'data'		=> isset($v) ? $v : null,
											])

											<div class="clearfix">&nbsp;</div>
											<div class="text-right">
												<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-jaminan-{{ $k }}" data-target="jaminan-kendaraan">Cancel</a>
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
										'data'		=> null,
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
												'data'		=> isset($v) ? $v : null,
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
										'data'		=> null,
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
				</div>
				<div class="tab-pane fade" id="data-rekening" role="tabpanel">
					<div class="row m-l-none m-r-none">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div data-panel="data-rekening">
								@include('pages.kredit.components.data_panels.survei.data_rekening',[
									'edit' => true
								])
							</div>

							{{---------------- FORM REKENING --------------}}
							@if (isset($page_datas->credit['rekening']))
								@foreach ($page_datas->credit['rekening'] as $k => $v)
									<div class="hidden" data-form="rekening-{{ $k }}">
										<div class="row">
											<div class="col-sm-12">
												<h4 class="text-uppercase">form rekening</h4>
												<hr/>
											</div>
										</div>
										{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
											@include ('pages.kredit.components.form.survei.rekening', [
												'data'		=> isset($v) ? $v : null,
											])

											<div class="clearfix">&nbsp;</div>
											<div class="text-right">
												<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-rekening" data-target="rekening-{{ $k }}">Cancel</a>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										{!! Form::close() !!}
									</div>
								@endforeach
							@endif

							<div class="hidden" data-form="rekening">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="text-uppercase">form rekening</h4>
										<hr/>
									</div>
								</div>
								{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
									@include ('pages.kredit.components.form.survei.rekening', [
										'data'		=> null,
									])

									<div class="clearfix">&nbsp;</div>
									<div class="text-right">
										<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-rekening" data-target="rekening">Cancel</a>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								{!! Form::close() !!}
							</div>
							{{---------------- // FORM REKENING --------------}}
						</div>
					</div>	
				</div>
				<div class="tab-pane fade" id="data-keuangan" role="tabpanel">
					<div class="row m-l-none m-r-none">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div data-panel="data-keuangan">
								@include('pages.kredit.components.data_panels.survei.data_keuangan',[
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
										'data'		=> isset($page_datas->credit['keuangan']) ? $page_datas->credit['keuangan'] : null,
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
				</div>
			</div>
		</div>
	</div>

	<!-- BLOCK 2 Display Data Kreditur // -->
	{{-- <div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_kreditur',[
				'edit' => true
			])
		</div>
	</div>		 --}}

	<!-- BLOCK 3 Display Data karakter & kepribadian // -->
	{{-- <div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_kepribadian',[
				'edit' => true
			])
		</div>
	</div>	 --}}	
	
	<!-- BLOCK 6 Display Data Keuangan // -->
	{{-- <div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_keuangan',[
				'edit' => true
			])
		</div>
	</div> --}}
@stop

@section('page_modals')
	@stack('show_modals')
@append

@section('page_scripts')
@append