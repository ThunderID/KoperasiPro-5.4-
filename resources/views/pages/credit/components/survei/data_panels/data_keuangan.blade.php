<?php
	if(!isset($edit)){
		$edit = true;
	}
?>

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Keuangan
			@if(count($page_datas->credit['kreditur']['keuangan']) > 0)
				@if($edit == true)
					<span class="pull-right">
						<small>
							<a href="#data-keuangan" data-toggle="modal" data-target="#data_keuangan" no-data-pjax>
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

@if(count($page_datas->credit['kreditur']['keuangan']) == 0)
<!-- No data -->
<div class="row">
	<div class="col-sm-12">
		<p>Belum ada data disimpan. <a href="#data-keuangan" data-toggle="modal" data-target="#data_keuangan" no-data-pjax> Tambahkan Sekarang </a></p>
	</div>
</div>

<div class="row clearfix">&nbsp;</div>
<div class="row clearfix">&nbsp;</div>

@else
<!-- with data -->
<div class="row">

	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section light m-t-none">Penghasilan</h4>
				</hr>
			</div>
		</div>
	</div>

	@foreach($page_datas->credit['kreditur']['keuangan']['pendapatan'] as $key => $income)
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>{{ ucwords( str_replace('_', ' ', $key) ) }}</strong></p>
				<p>
					{{$income}}
				</p>
			</div>
		</div>

	</div>
	@endforeach


	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section light m-t-none">Pengeluaran</h4>
				</hr>
			</div>
		</div>
	</div>

	@foreach($page_datas->credit['kreditur']['keuangan']['pengeluaran'] as $key => $expense)
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>{{ ucwords( str_replace('_', ' ', $key) ) }}</strong></p>
				<p>
					{{$expense}}
				</p>
			</div>
		</div>

	</div>
	@endforeach

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

</div>
@endif

@push('show_modals')
	@if($edit == true)

		<!-- Data keuangan // -->
				<!-- Data kepribadian // -->
		@component('components.modal', [
			'id' 		=> 'data_keuangan',
			'title'		=> 'Data Keuangan',
			'settings'	=> [
				'hide_buttons'	=> true
			]	
		])
			@include('pages.credit.components.survei.form.data_keuangan')
		@endcomponent

	@endif
@endpush	