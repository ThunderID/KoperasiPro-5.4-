@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kredit
			@if (!empty($page_datas->credit['id']))
				@if ($edit == true)
					<span class="pull-right">
						<small>
						<a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" no-data-pjax>
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

@if (isset($page_datas->credit['id']) && !empty($page_datas->credit['id']))
		<div class="row">
			@php $i=0; @endphp
			
				{{-- foreach data --}}
				@foreach ($page_datas->credit as $k => $v)
					@php
						// dd($page_datas->credit);
					@endphp
					{{-- remove field id, survei_id, alamat_id agar tidak ditampilkan --}}
					@if (in_array($k, ['jenis_kredit', 'pengajuan_kredit', 'jangka_waktu', 'tanggal_pengajuan']))
						{{-- check ketika data 2 kasih row baru --}}
						@if ($i % 2 == 0)
							</div>
							<div class="row">
						@endif
						<div class="col-sm-6">
							<div class="row m-b-xl">
								<div class="col-sm-12">
									<p class="m-b-xs"><strong>{{ ucwords(str_replace('_', ' ', $k)) }}</strong></p>
									<p class="text-capitalize">
										@if ($k == 'jenis_kredit')
											@if ($v == 'pa') 
												Angsuran
											@elseif ($v == 'pt')
												Musiman
											@elseif ($v == 'rumah_delta')
												rumah delta
											@else
												{{ str_replace('_', ' ', $v) }}
											@endif
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
@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>