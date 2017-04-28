{{-- 
	Plugin Panel Jaminan
	Description: panel jaminan add more jaminan with include
	Usage:
	- Param
		$param['prefix']: prefix variable input
		$param['target']: untuk nama id template
		$param['class']['init_add']: untuk initial on load page add single clone
 --}}
 {{-- Jaminan untuk kendaraan --}}
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h5 class="text-uppercase text-light">Jaminan Kendaraan</h5>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Jenis Kendaraan</th>
					<th>Tahun</th>
					<th>Merk</th>
					<th>No. BPKB</th>
					<th>Atas Nama</th>
					<th></th>
				</tr>
			</thead>
			<tbody class="root-template-kendaraan">
				<tr class="template-clone-default">
					<td class="text-center" colspan="7">Belum ada jaminan kendaraan</td>
				</tr>

				<tr class="template-clone-kendaraan hidden">
					<td class="nomor text-capitalize"></td>
					<td class="tipe text-capitalize"></td>
					<td class="tahun text-capitalize"></td>
					<td class="merk text-capitalize"></td>
					<td class="nomor_bpkb text-uppercase"></td>
					<td class="atas_nama text-capitalize"></td>
					<td class="action text-capitalize"></td>
				</tr>
			</tbody>
		</table>
		<fieldset class="form-group">
			<a href="#" class="p-t-md p-b-md modal-add-jaminan" data-toggle="modal" data-target="#modal-jaminan-kendaraan"><i class="fa fa-plus"></i> Tambah Jaminan Kendaraan</a>
			<span class="text-muted text-capitalize text-sm p-l-lg p-t-md p-b-md text-info hidden info-add"><em><i class="fa fa-exclamation-circle"></i> tidak bisa menambahkan jaminan kendaraan lebih dari 2</em></span>
		</fieldset>
	</div>
</div>
<div class="row p-t-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h5 class="text-uppercase text-light">Jaminan Tanah &amp; Bangunan</h5>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Jenis Jaminan</th>
						<th>Jenis Sertifikat</th>
						<th>No. Sertifikat</th>
						<th>Masa Berlaku</th>
						<th>Atas Nama</th>
						{{-- <th>Alamat</th> --}}
						<th></th>
					</tr>
				</thead>
				<tbody class="root-template-tanah-bangunan">
					<tr class="template-clone-default">
						<td class="text-center" colspan="8">Belum ada jaminan tanah &amp; Bangunan</td>
					</tr>
					<tr class="template-clone-tanah-bangunan hidden">
						<td class="nomor text-capitalize"></td>
						<td class="tipe text-capitalize"></td>
						<td class="jenis_sertifikat text-capitalize"></td>
						<td class="nomor_sertifikat text-capitalize"></td>
						<td class="masa_berlaku_sertifikat text-capitalize"></td>
						<td class="atas_nama text-capitalize"></td>
						{{-- <td class="alamat text-capitalize"></td> --}}
						<td class="action text-capitalize"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<fieldset class="form-group">
			<a href="#" class="p-t-md p-b-md modal-add-jaminan" data-toggle="modal" data-target="#modal-jaminan-tanah-bangunan"><i class="fa fa-plus"></i> Tambah Jaminan Tanah &amp; Bangunan</a>
			<span class="text-muted text-capitalize text-sm p-l-lg p-t-md p-b-md text-info hidden info-add"><em><i class="fa fa-exclamation-circle"></i> tidak bisa menambahkan jaminan kendaraan lebih dari 3</em></span>
		</fieldset>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>

@push('modals')
	{!! Form::open(['url' => '', 'class' => 'form no-enter']) !!}
		@component('components.modal', [
			'id' 		=> 'modal-jaminan-kendaraan',
			'title'		=> 'Tambah Jaminan Kendaraan',
			'settings'	=> [
				'modal_class'	=> 'modal-lg',
				'hide_buttons'	=> true
			]	
		])
			@include('pages.kredit.components.form.pengajuan.jaminan_kendaraan', [
				'data'	=> [
					'select_jenis_kendaraan'	=> $page_datas->select_jenis_kendaraan,
					'select_merk_kendaraan'		=> $page_datas->select_merk_kendaraan, 
				]
			])
			<div class="modal-footer">
				<a type='button' class="btn btn-default" data-dismiss='modal'>
					Cancel
				</a>
				<a href="#" class="btn btn-success add" data-type-clone="table" data-template-clone="template-clone-kendaraan" data-root-template="root-template-kendaraan" data-available-add="2" data-input-get=".input-kendaraan" data-input-prefix="jaminan_kendaraan">
					Simpan
				</a>
			</div>	
		@endcomponent
	{!! Form::close() !!}

	{!! Form::open(['url' => '', 'class' => 'form no-enter']) !!}
		@component('components.modal', [
			'id' 		=> 'modal-jaminan-tanah-bangunan',
			'title'		=> 'Tambah Jaminan Tanah &amp; Bangunan',
			'settings'	=> [
				'modal_class'	=> 'modal-lg',
				'hide_buttons'	=> true
			]	
		])
			@include('pages.kredit.components.form.pengajuan.jaminan_tanah_bangunan', [
				'param'	=> [
					'data'		=> null,
				]
			])
			<div class="modal-footer">
				<a type='button' class="btn btn-default" data-dismiss='modal'>
					Cancel
				</a>
				<a href="#" class="btn btn-success add" data-type-clone="table" data-template-clone="template-clone-tanah-bangunan" data-root-template="root-template-tanah-bangunan" data-available-add="3" data-input-get=".input-tanah-bangunan" data-input-prefix="jaminan_tanah_bangunan">
					Simpan
				</a>
			</div>	
		@endcomponent
	{!! Form::close() !!}
@endpush