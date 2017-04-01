<div class="row m-t-sm-m-print">
	<div class="col-sm-12">
		<h4 class="text-uppercase m-b-sm-m-print">DATA JAMINAN</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['jaminan']['kendaraan']))
<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl m-t-xs-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Kendaraan</strong></p>
				@foreach ($page_datas->credit['jaminan']['kendaraan'] as $kendaraan)
					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Jenis</strong></p>
							<p>
								{{ strtoupper($kendaraan['jenis']) }}
							</p>
						</div>
				
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Status Kepemilikan</strong></p>
							<p>
								{{ ucwords(str_replace('_', ' ', $kendaraan['legal']['status_kepemilikan'])) }}
							</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>

	</div>
</div>
@elseif (isset($page_datas->credit['jaminan']['tanah_bangunan']))
<div class="row">
	<div class="col-sm-12">
		<div class="row m-t-xs-print">
			<div class="col-sm-12">
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<h4 class="title-section light m-t-none">Tanah/Bangunan</h4>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				@foreach ($page_datas->credit['jaminan']['tanah_bangunan'] as $tanah_bangunan)
					<div class="row m-b-xl m-t-xs-print">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Tipe Jaminan</strong></p>
							<p>
								{{ strtoupper($tanah_bangunan['tipe_jaminan']) }}
							</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>

	</div>
</div>
@else
	<div class="row">
		<div class="col-sm-6">
			<div class="row m-b-xl m-t-xs-print">
				<div class="col-sm-12">
					<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#data_jaminan" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		</div>
	</div>
@endif

@push('show_modals')
	@component('components.modal', [
		'id' 		=> 'data_keuangan',
		'title'		=> 'Data Keuangan',
		'settings'	=> [
			'hide_buttons'	=> true
		]	
	])
		@include ('pages.kredit.components.form.data_jaminan', [
			'param'	=> [
				'target'	=> 'template-jaminan-credit',
				'prefix'	=> 'credit',
				'class'		=> [
					'init_add'		=> 'init-add-one'
		]]])
	@endcomponent
@endpush