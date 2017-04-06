<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<p class="text-capitalize m-b-xs"><strong>aset usaha</strong></p>
	</div>
</div>
@if (isset($page_datas->credit['aset_usaha']) && !empty($page_datas->credit['aset_usaha']))
	@forelse ($page_datas->credit['aset_usaha'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left text-capitalize text-muted">
				<p class="m-b-xs">aset usaha {{ $key+1 }}</p>
				<hr class="m-t-xs m-b-xs"/>
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
							<div class="row">
								<div class="col-sm-3">
									<p class="m-b-xs">{{ ucwords(str_replace('_', ' ', $k)) }}</p>
								</div>
								<div class="col-sm-9">
									<p class="text-capitalize m-b-xs">
										: @if ($k == 'survei')
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
@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="aset-usaha" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-">&nbsp;</div>

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
