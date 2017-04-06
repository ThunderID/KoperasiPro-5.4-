{{-- Check apakah sudah ada data apa belum, agar bisa di edit --}}
@php 
$edit = false;

if (isset($page_datas->credit['kreditur']) && !empty($page_datas->credit['kreditur']))
{
	$edit = true;
}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kreditur
			@if(!empty($page_datas->credit['kreditur']))
				@if($edit == true)
					<span class="pull-right">
						<small>
						<a href="#data-kepribadian" data-toggle="modal" data-target="#data_kepribadian" no-data-pjax>
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

@if ( empty($page_datas->credit['kreditur']) && (!isset($page_datas->credit['kreditur'])) )
	<!-- no data -->
	<div class="row">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#data-kepribadian" data-toggle="modal" data-target="#data_kepribadian" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div> 
	<div class="row clearfix">&nbsp;</div>
	<div class="row clearfix">&nbsp;</div>
@else
	<!-- with data -->
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Status Nasabah</strong></p>
					<p>{{ (isset($page_datas->credit['kreditur']['status']) ? ucwords($page_datas->credit['kreditur']['status']) : '-')  }}</p>
				</div>
			</div>
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Record Kredit Sebelumnya</strong></p>
					<p>{{ (isset($page_datas->credit['kreditur']['lingkungan_tinggal']) ? ucwords($page_datas->credit['kreditur']['lingkungan_tinggal']) : '-')  }}</p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Jaminan Kredit Sebelumnya</strong></p>
					<p>{{ (isset($page_datas->credit['kreditur']['lingkungan_pekerjaan']) ? ucwords($page_datas->credit['kreditur']['lingkungan_pekerjaan']) : '-') }}</p>
				</div>
			</div>
		</div>
	</div>
@endif

@push('show_modals')
	@if($edit == true)

		<!-- Data kepribadian // -->
		@component('components.modal', [
			'id' 		=> 'data_kepribadian',
			'title'		=> 'Data Kepribadian',
			'settings'	=> [
				'hide_buttons'	=> true
			]	
		])
			{{-- @include('pages.kredit.components.form.survei.data_kreditur') --}}
		@endcomponent

	@endif
@endpush