@php 
	$edit = false;
	if (isset($page_datas->credit))
	{
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kredit
			@if ($edit == true)
				<span class="pull-right">
					<small>
					<a class="text-capitalize" href="#" data-toggle="modal" data-target="#modal-data-kredit" no-data-pjax>
						<i class="fa fa-pencil" aria-hidden="true"></i>
						 Edit
					</a>
					</small>
				</span>
			@endif
		</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Pengajuan Kredit</strong></p>
				<p>{{ $page_datas->credit['pengajuan_kredit'] }}</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Jangka Waktu</strong></p>
				<p>{{ $page_datas->credit['jangka_waktu'] }} bulan</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Tanggal Pengajuan</strong></p>
				<p>{{ $page_datas->credit['tanggal_pengajuan'] }}</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Jenis Kredit</strong></p>
				<p>
					@php 
						switch($page_datas->credit['jenis_kredit']) 
						{
							case 'pa':
								$jenis_kredit = 'Angsuran';
								break;
							case 'pt':
								$jenis_kredit = 'Musiman';
								break;
							case 'rumah_delta':
								$jenis_kredit = 'Rumah Delta';
								break;
							default:
								$jenis_kredit = $page_datas->credit['jenis_kredit']; 
								break;
						}
					@endphp
					{{ ucwords($jenis_kredit) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Nomor Kredit</strong></p>
				<p>{{ $page_datas->credit['nomor_kredit'] }}</p>
			</div>
		</div>
	</div>
</div>

@push('show_modals')
	@if ($edit == true)
		<!-- Data kredit // -->
		{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
			@component('components.modal', [
				'id' 		=> 'modal-data-kredit',
				'title'		=> 'Data Kredit',
				'settings'	=> [
					'hide_buttons'	=> true
				]	
			])
				@include('pages.kredit.components.form.data_kredit')
				<div class="modal-footer">
					<a type='button' class="btn btn-default" data-dismiss='modal'>
						Cancel
					</a>
					<button type="submit" class="btn btn-success">
						Simpan
					</button>
				</div>	
			@endcomponent
		{!! Form::close() !!}
	@endif
@endpush	