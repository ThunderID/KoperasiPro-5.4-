@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Rekening
			@if(!empty($page_datas->credit['rekening']))
				@if($edit == true)
					<span class="pull-right">
						<small>
						<a href="#rekening" data-toggle="hidden" data-target="rekening" data-panel="data-rekening" no-data-pjax>
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

@if (isset($page_datas->credit['rekening']) && !empty($page_datas->credit['rekening']))
	@php $x=1; @endphp
	@foreach ($page_datas->credit['rekening'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right text-capitalize">
				rekening {{ $x }}
				<hr/>
			</div>
			@php $i=0; @endphp

				@foreach ($value as $k => $v)
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
				@endforeach
			@php $x++; @endphp
		</div>
	@endforeach
@else
	<!-- No data -->
	<div class="row">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#rekening" data-toggle="hidden" data-target="rekening" data-panel="data-rekening" no-data-pjax> Tambahkan Sekarang </a></p>
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
