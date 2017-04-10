@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Aset Kendaraan</h4>
		<hr/>
	</div>
</div>

{{-- check data aset kendaraan --}}
@if (isset($page_datas->credit['aset_kendaraan']) && !empty($page_datas->credit['aset_kendaraan']))
	{{-- foreach data aset kendaraan --}}
	@foreach ($page_datas->credit['aset_kendaraan'] as $key => $value)
		<div class="row m-t-sm">
			@php $i=0; @endphp
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-sm text-uppercase">
					aset kendaraan {{ $key+1 }}
					@if(!empty($page_datas->credit['aset_kendaraan']))
						@if($edit == true)
							<span class="pull-right">
								<a href="#aset-kendaraan" data-toggle="hidden" data-target="aset-kendaraan-{{ $key }}" data-panel="data-aset" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				<hr class="m-t-sm m-b-sm"/>
			</div>

			{{-- foreach data --}}
			@foreach ($value as $k => $v)
				{{-- remove field agar tidak ditampilkan --}}
				@if (!in_array($k, ['id', 'survei_id', 'alamat_id']))
					{{-- check ketika data 2 kasih row baru --}}
					@if ($i % 2 == 0)
						</div>
						<div class="row">
					@endif

					<div class="col-sm-6">
						<div class="row m-b-lg">
							<div class="col-sm-12">
								<p class="m-b-xs"><strong>{{ ucwords(str_replace('_', ' ', $k)) }}</strong></p>
								<p class="text-capitalize">
									@if ($k == 'survei')
										{{ $v['tanggal_survei'] }} oleh {{ $v['petugas']['nama'] }} (<span class="text-muted"> {{ $v['petugas']['role'] }} </span>)
									@else
										{{ str_replace('_', ' ', $v) }}
									@endif
								</p>
							</div>
						</div>
					</div>

					@php $i++; @endphp
				@endif
			@endforeach
		</div>
	@endforeach

	<div class="row m-t-md m-b-md">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="#aset-kendaraan" data-toggle="hidden" data-target="aset-kendaraan" data-panel="data-aset" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Aset Kendaraan</a>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row m-b-md">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#aset-kendaraan" data-toggle="hidden" data-target="aset-kendaraan" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>