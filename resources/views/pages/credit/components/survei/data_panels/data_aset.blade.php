<?php
	if(!isset($edit)){
		$edit = true;
	}
?>

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Aset
			@if(!empty($page_datas->credit['kreditur']['aset']))
				@if($edit == true)
					<span class="pull-right">
						<small>
						<a href="#data-aset" data-toggle="modal" data-target="#data_aset" no-data-pjax>
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


<div class="row">

	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section light m-t-none">Rumah</h4>
				</hr>
			</div>
		</div>

	</div>


	{{-- @foreach((array)$page_datas->credit['kreditur']['aset'] as $value) --}}
		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Status Kepemilikan</strong></p>
					<p>
						{{ str_replace('_', ' ', $page_datas->credit['kreditur']['aset']['rumah']['status']) }}
					</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Sejak</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['rumah']['sejak'] }}
					</p>
				</div>
			</div>
		</div>	

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Luas</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['rumah']['luas'] }}
					</p>
				</div>
			</div>
		</div>	

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Nilai Rumah</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['rumah']['nilai_rumah'] }}
					</p>
				</div>
			</div>
		</div>	

	{{-- @endforeach --}}


	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section light m-t-none">Kendaraan</h4>
				</hr>
			</div>
		</div>
	</div>


	{{-- @foreach((array)$page_datas->credit->asset->vehicles as $value) --}}

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Roda 2</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['kendaraan']['jumlah_kendaraan_r2'] }}
					</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Roda 4</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['kendaraan']['jumlah_kendaraan_r4'] }}
					</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Nilai Kendaraan</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['kendaraan']['nilai_kendaraan'] }}
					</p>
				</div>
			</div>
		</div>

	{{-- @endforeach --}}


	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section light m-t-none">Perusahaan</h4>
				</hr>
			</div>
		</div>
	</div>


	{{-- @foreach((array)$page_datas->credit->asset->companies as $value) --}}

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Nama</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['usaha']['nama'] }}
					</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Status Usaha</strong></p>
					<p>
						{{ str_replace('_', ' ', $page_datas->credit['kreditur']['aset']['usaha']['status_usaha']) }}
					</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Berdirinya Usaha</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['usaha']['sejak'] }}
					</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Saham Usaha</strong></p>
					<p>
						{{ $page_datas->credit['kreditur']['aset']['usaha']['saham_usaha'] }}
					</p>
				</div>
			</div>
		</div>

	{{-- @endforeach --}}

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

</div>

@push('show_modals')
	@if($edit == true)

		<!-- Data keuangan // -->
				<!-- Data kepribadian // -->
		@component('components.modal', [
			'id' 		=> 'data_aset',
			'title'		=> 'Data Aset',
			'settings'	=> [
				'hide_buttons'	=> true
			]	
		])
			@include('pages.credit.components.survei.form.data_aset')
		@endcomponent

	@endif
@endpush	
