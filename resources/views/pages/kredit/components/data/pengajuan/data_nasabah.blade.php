@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Nasabah
			@if (!empty($page_datas->credit['debitur']))
				@if ($edit == true)
					<span class="pull-right text-capitalize">
						<small>
							<a href="#" data-toggle="hidden" data-target="nasabah" data-panel="data-nasabah" no-data-pjax>
								<i class="fa fa-pencil" aria-hidden="true"></i>
								 Edit
							</a>
						</small>
					</span>
				@endif
			@endif
		</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['debitur']) && !empty($page_datas->credit['debitur']))
	<div class="row">
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info nasabah</strong></p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						Nama
					</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->credit['debitur']['nama']) && !is_null($page_datas->credit['debitur']['nama'])) ? $page_datas->credit['debitur']['nama'] : '-' }}
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						tanggal lahir
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->credit['debitur']['tanggal_lahir']) && !is_null($page_datas->credit['debitur']['tanggal_lahir'])) ? $page_datas->credit['debitur']['tanggal_lahir'] : '-' }}
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						jenis kelamin
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->credit['debitur']['jenis_kelamin']) && !is_null($page_datas->credit['debitur']['jenis_kelamin'])) ? $page_datas->credit['debitur']['jenis_kelamin'] : '-' }}
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						No. Telepon
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					@if (isset($page_datas->credit['debitur']['telepon']) && !is_null($page_datas->credit['debitur']['telepon']))
						<p class="text-capitalize text-light">
							{{ $page_datas->credit['debitur']['telepon'] }}
						</p>
					@else
						<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kontak" data-panel="data-nasabah" no-data-pjax> Tambahkan Sekarang </a></p>
					@endif
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						alamat
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					@if (isset($page_datas->credit['debitur']['alamat']) && !empty($page_datas->credit['debitur']['alamat']))
						@foreach ((array)$page_datas->credit ['debitur']['alamat'] as $k => $v)
							{{-- @if ($k == 0) --}}
								<p class="text-capitalize text-light">
									{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }}
									RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }}
									{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} 
									{!! (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik'] : '' !!}
									{!! (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] . ' <br/> ': '' !!}
									{{ (isset($v['provinsi']) && !is_null($v['provinsi'])) ? $v['provinsi'] : '' }} - 
									{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
								</p>
							{{-- @endif --}}
						@endforeach
					@else
						<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="alamat" data-panel="data-nasabah" no-data-pjax> Tambahkan Sekarang </a></p>
					@endif
				</div>
			</div>
			<div class="row p-t-sm">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>pekerjaan</strong></p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						jenis pekerjaan
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->credit['debitur']['pekerjaan']) && !is_null($page_datas->credit['debitur']['pekerjaan'])) ? str_replace('_', ' ', $page_datas->credit['debitur']['pekerjaan']) : '-' }}
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						penghasilan bersih
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->credit['debitur']['penghasilan_bersih']) && !is_null($page_datas->credit['debitur']['penghasilan_bersih'])) ? $page_datas->credit['debitur']['penghasilan_bersih'] : '-' }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			@if (isset($page_datas->credit['debitur']['foto_ktp']) && !is_null($page_datas->credit['debitur']['foto_ktp']))
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>foto KTP</strong></p>
						<img src="{{ $page_datas->credit['debitur']['foto_ktp'] }}" class="img img-responsive img-panels img-thumbnail img-rounded"/>
					</div>
				</div>
			@endif
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="nasabah" data-panel="data-nasabah" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>