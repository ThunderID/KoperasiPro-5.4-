@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-md m-b-sm">Informasi Pribadi
			@if (!empty($page_datas->credit['debitur']))
				@if ($edit == true)
					<span class=" text-md pull-right text-capitalize">
						{{-- <small> --}}
							<a href="#" data-toggle="hidden" data-target="nasabah" data-panel="data-pribadi" no-data-pjax>
								<i class="fa fa-pencil" aria-hidden="true"></i>
								 Edit
							</a>
						{{-- </small> --}}
					</span>
				@endif
			@endif
		</p>
	</div>
</div>

@if (isset($page_datas->credit['debitur']) && !empty($page_datas->credit['debitur']))
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<p class="text-capitalize text-light m-b-xs m-t-xs">
				{{ (isset($page_datas->credit['debitur']['nama']) && !is_null($page_datas->credit['debitur']['nama'])) ? $page_datas->credit['debitur']['nama'] : '-' }}
				&nbsp; ( {{ (isset($page_datas->credit['debitur']['jenis_kelamin']) && !is_null($page_datas->credit['debitur']['jenis_kelamin'])) ? $page_datas->credit['debitur']['jenis_kelamin'] : '-' }} )
			</p>
			<p class="text-capitalize text-light m-b-xs">
				Tgl Lahir 
				{{ (isset($page_datas->credit['debitur']['tanggal_lahir']) && !is_null($page_datas->credit['debitur']['tanggal_lahir'])) ? $page_datas->credit['debitur']['tanggal_lahir'] : '-' }}
			</p>
			<p class="text-capitalize text-light m-b-xs">
				@if (isset($page_datas->credit['debitur']['alamat']) && !empty($page_datas->credit['debitur']['alamat']))
					{{-- @foreach ($page_datas->credit ['debitur']['alamat'] as $k => $v) --}}
					<p class="text-capitalize text-light">
						@foreach ($page_datas->credit['debitur']['alamat'] as $k => $v)
							@if ($k == 0)
								{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }}
								RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} <br/>
								{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} 
								{{ (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik'] .'<br/>' : '' }}
								{{ (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] : '' }} - 
								{{ (isset($v['provinsi']) && !is_null($v['provinsi'])) ? $v['provinsi'] : '' }} - 
								{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
							@endif
						@endforeach
					</p>
				@else
					<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="alamat" data-panel="data-pribadi" no-data-pjax> Tambahkan Sekarang </a></p>
				@endif
			</p>
			<p class="text-capitalize text-light m-b-xs">
				@if (isset($page_datas->credit['debitur']['telepon']) && !is_null($page_datas->credit['debitur']['telepon']))
					<p class="text-capitalize text-light">
						{{ $page_datas->credit['debitur']['telepon'] }}
					</p>
				@else
					<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kontak" data-panel="data-pribadi" no-data-pjax> Tambahkan Sekarang </a></p>
				@endif
			</p>
			<div class="clearfix">&nbsp;</div>
			<p class="text-capitalize text-light m-b-xs">
				Pekerjaan 
				{{ (isset($page_datas->credit['debitur']['pekerjaan']) && !is_null($page_datas->credit['debitur']['pekerjaan'])) ? str_replace('_', ' ', $page_datas->credit['debitur']['pekerjaan']) : '-' }}
			</p>
			<p class="text-capitalize text-light m-b-xs">
				Penghasilan bersih 
				{{ (isset($page_datas->credit['debitur']['penghasilan_bersih']) && !is_null($page_datas->credit['debitur']['penghasilan_bersih'])) ? $page_datas->credit['debitur']['penghasilan_bersih'] : '-' }}
			</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<p class="m-b-xs text-capitalize text-sm"><strong>foto KTP</strong></p>
			@if (isset($page_datas->credit['foto_ktp']) && !is_null($page_datas->credit['foto_ktp']))
				<img src="{{ $page_datas->credit['foto_ktp'] }}" class="img img-responsive img-panels img-thumbnail img-rounded" style="width: 350px; height: 240px"/>
			@else
				<img src="http://via.placeholder.com/350x200?text=Belum+ada" class="img img-responsive img-panels img-thumbnail img-rounded"/>
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