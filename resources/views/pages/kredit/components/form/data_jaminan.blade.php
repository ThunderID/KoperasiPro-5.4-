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
		<table class="table table-hover root-jaminan-kendaraan">
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
			<tbody class="content-jaminan">
				<tr>
					<td class="text-center" colspan="7">Belum ada jaminan kendaraan</td>
				</tr>
			</tbody>
		</table>
		<fieldset class="form-group">
			<a href="#" class="btn btn-link modal-add" data-toggle="modal" data-target="#modal-jaminan-kendaraan">Tambah Jaminan Kendaraan</a>
		</fieldset>
	</div>
</div>
<div class="row p-t-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h5 class="text-uppercase text-light">Jaminan Tanah &amp; Bangunan</h5>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Jenis Jaminan</th>
					<th>Jenis Sertifikat</th>
					<th>No. Sertifikat</th>
					<th>Masa Berlaku</th>
					<th>Atas Nama</th>
					<th>Alamat</th>
					<th></th>
				</tr>
			</thead>
			<tbody class="content-jaminan">
				<tr>
					<td class="text-center" colspan="8">Belum ada jaminan tanah &amp; Bangunan</td>
				</tr>
			</tbody>
		</table>
		<fieldset class="form-group">
			<a href="#" class="btn btn-link modal-add" data-toggle="modal" data-target=".modal-jaminan-tanah-bangunan">Tambah Jaminan Tanah &amp; Bangunan</a>
		</fieldset>
	</div>
</div>

@push('modals')
	{!! Form::open(['url' => '', 'class' => 'form no-enter']) !!}
		@component('components.modal', [
			'id' 		=> 'modal-jaminan-kendaraan',
			'title'		=> 'Tambah Jaminan Kendaraan',
			'settings'	=> [
				'modal_size'	=> 'modal-lg',
				'hide_buttons'	=> true
			]	
		])
			@include('pages.kredit.components.form.widget_jaminan_kendaraan')
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
@endpush