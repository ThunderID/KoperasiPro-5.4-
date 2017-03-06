<?php
	if(!isset($edit)){
		$edit = true;
	}
?>

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Ekonomi Makro
			@if(!is_null($page_datas->credit->survey->macro->prospect))
				@if($edit == true)
					<span class="pull-right">
						<small>
						<a href="#ekonomi-macro" data-toggle="modal" data-target="#eco_macro" no-data-pjax>
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

@if(is_null($page_datas->credit->survey->macro->prospect))
<!-- No Data -->
<div class="row">
	<div class="col-sm-12">
		<p>Belum ada data disimpan. <a href="#ekonomi-makro" data-toggle="modal" data-target="#eco_macro" no-data-pjax> Tambahkan Sekarang </a></p>
	</div>
</div>
<div class="row clearfix">&nbsp;</div>
<div class="row clearfix">&nbsp;</div>
@else
<!-- With Data -->
<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Prospek Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->prospect) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Persaingan Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->competition) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Perputaran Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->turn_over) }}
				</p>
			</div>
		</div>	
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Jumlah Pelanggan Harian</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->daily_customer) }}
				</p>
			</div>
		</div>	

	</div>


	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Resiko Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->risk) }}
				</p>
			</div>
		</div>	
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Pengalaman Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->experience) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Keterangan Lain</strong></p>
				<ul>
					@foreach($page_datas->credit->survey->macro->others as $other)
						<li>
							{{ ucfirst($other) }}
						</li>
					@endforeach
				</ul>
			</div>
		</div>		

	</div>
</div>
@endif

@push('show_modals')
	@if($edit == true)

		<!-- Data ekonomi makro // -->
		@component('components.modal', [
			'id' 		=> 'eco_macro',
			'title'		=> 'Ekonomi Makro',
			'settings'	=> [
				'hide_buttons'	=> true
			]
		])
			@include('pages.survey.components.form.eco_macro')
		@endcomponent

	@endif
@endpush	