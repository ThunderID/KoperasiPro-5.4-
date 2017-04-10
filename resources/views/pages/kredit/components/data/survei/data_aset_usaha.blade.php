@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Aset Usaha</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['aset_usaha']) && !empty($page_datas->credit['aset_usaha']))
	@forelse ($page_datas->credit['aset_usaha'] as $key => $value)
	
		<div class="row m-t-sm">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left text-capitalize text-muted">
				<p class="m-b-sm text-uppercase">
					aset usaha {{ $key+1 }}

					@if(!empty($page_datas->credit['aset_usaha']))
						@if($edit == true)
							<span class="pull-right">
								<a class="text-danger" href="{{ route('survei.aset.usaha.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_aset_usaha_id' => $value['id']]) }}" no-data-pjax>
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;

								<a href="#aset-usaha" data-toggle="hidden" data-target="aset-usaha-{{ $key }}" data-panel="data-aset" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif

				</p>
				<hr class="m-t-sm m-b-sm"/>
			</div>
			@php $i=0; @endphp
			
			{{-- foreach data --}}
			@foreach ($value as $k => $v)
				{{-- remove field id, survei_id, alamat_id agar tidak ditampilkan --}}
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
									@elseif ($k == 'alamat')
										{{ $v['alamat'] }} <br/>
										RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} {{ $v['desa'] }} {{ $v['distrik'] }} <br/>
										{{ $v['regensi'] }} - {{ $v['provinsi'] }} - {{ $v['negara'] }}
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
	@empty
	@endforelse

	<div class="row m-t-md m-b-md">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="#aset-usaha" data-toggle="hidden" data-target="aset-usaha" data-panel="data-aset" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Aset Usaha</a>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row m-b-md">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="aset-usaha" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>