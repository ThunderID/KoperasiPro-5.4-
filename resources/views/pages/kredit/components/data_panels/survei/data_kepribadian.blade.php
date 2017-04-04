<?php
	if(!isset($edit)){
		$edit = true;
	}
?>

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kepribadian
			@if(!empty($page_datas->credit['kreditur']['kepribadian']))
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

@if(empty($page_datas->credit['kreditur']['kepribadian']))
<?php
	$page_datas->credit['kreditur']['kepribadian'] = null;
?>
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
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Karakter</strong></p>
				<p>
					{{ ucwords(str_replace('_', ' ', $page_datas->credit['kreditur']['kepribadian']['karakter'])) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Lingkungan Tinggal</strong></p>
				<p>
					{{ ucwords($page_datas->credit['kreditur']['kepribadian']['lingkungan_tinggal']) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Lingkungan Kerja</strong></p>
				<p>
					{{ ucwords($page_datas->credit['kreditur']['kepribadian']['lingkungan_pekerjaan']) }}
				</p>
			</div>
		</div>

	</div>
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Pola Hidup</strong></p>
				<p>
					{{ ucwords($page_datas->credit['kreditur']['kepribadian']['pola_hidup']) }}
				</p>
			</div>
		</div>		

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Keterangan Lain</strong></p>
				<p>
					{{ ucwords($page_datas->credit['kreditur']['kepribadian']['keterangan']) }}
				</p>
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
			@include('pages.kredit.components.form.survei.data_kepribadian')
		@endcomponent

	@endif
@endpush