@if (isset($page_datas->credit['aset_kendaraan']) && !empty($page_datas->credit['aset_kendaraan']))
	@foreach ($page_datas->credit['aset_kendaraan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right text-capitalize text-muted">
				aset kendaraan {{ $key+1 }}
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
			<p>Belum ada data disimpan. </p>
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
