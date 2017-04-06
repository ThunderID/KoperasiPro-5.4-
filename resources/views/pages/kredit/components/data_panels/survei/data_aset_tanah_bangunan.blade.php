@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Aset Tanah &amp; Bangunan
			@if(!empty($page_datas->credit['aset_tanah_bangunan']))
				@if($edit == true)
					<span class="pull-right">
						<small>
						<a href="#" data-toggle="hidden" data-target="aset-tanah-bangunan" data-panel="data-aset" no-data-pjax>
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

@if (isset($page_datas->credit['aset_tanah_bangunan']) && !empty($page_datas->credit['aset_tanah_bangunan']))
	@foreach ($page_datas->credit['aset_tanah_bangunan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				aset tanah &amp; bangunan {{ $key+1 }}
				<hr/>
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
	@endforeach
@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="aset-tanah-bangunan" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>

@push('show_modals')
	@component('components.modal', [
		'id' 		=> 'data_aset',
		'title'		=> 'Data Aset',
		'settings'	=> [
			'hide_buttons'	=> true
		]	
	])
		{{-- @include('pages.kredit.components.form.survei.data_aset') --}}
	@endcomponent
@endpush	
