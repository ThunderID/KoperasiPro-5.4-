@php 
	if (!isset($edit))
	{
		$edit = true;
	}
	// dd($page_datas);
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Jaminan
			@if (!is_null($page_datas->credit['jaminan_kendaraan']) || !is_null($page_datas->credit['jaminan_tanah_bangunan']))
				@if ($edit == true)
					<span class="pull-right">
						<small>
						<a class="text-capitalize" href="#" data-toggle="modal" data-target="#data_aset" no-data-pjax>
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
@if ((isset($page_datas->credit['jaminan_kendaraan'])) && (!empty($page_datas->credit['jaminan_kendaraan'])))
	<div class="row">
		<div class="col-sm-12">
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
					@php $i=1; @endphp
					@forelse ($page_datas->credit['jaminan_kendaraan'] as $v)
						<tr>
							<td>{{ $i }}</td>
							<td>{{ ucwords(str_replace('_', ' ', $v['tipe'])) }}</td>
							<td>{{ $v['tahun'] }}</td>
							<td>{{ ucwords($v['merk']) }}</td>
							<td>{{ $v['nomor_bpkb'] }}</td>
							<td>{{ ucwords($v['atas_nama']) }}</td>
							<td>
								<a href="{{ route('jaminan.kendaraan.destroy', ['kredit_id' => $page_datas->credit['id'], 'nomor_bpkb' => $v['nomor_bpkb']]) }}" class="text-danger">Hapus</a>
							</td>
							
						</tr>
						@php $i++; @endphp
					@empty
					@endforelse
					
				</tbody>
			</table>
		</div>
	</div>
@endif

@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
	<div class="row">
		<div class="col-sm-12">
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
						@php $i=1; @endphp
						@forelse ($page_datas->credit['jaminan_tanah_bangunan'] as $v)
							<tr>
								<td>{{ $i }}</td>
								<td>{{ ucwords(str_replace('_', ' ', $v['tipe'])) }}</td>
								<td>{{ ucwords(str_replace('_', ' ', $v['jenis_sertifikat'])) }}</td>
								<td>{{ $v['nomor_sertifikat'] }}</td>
								<td>{{ isset($v['masa_berlaku']) ? $v['masa_berlaku'] : '---------' }}</td>
								<td>{{ ucwords($v['atas_nama']) }}</td>
								<td>
									<a href="{{ route('jaminan.tanah.bangunan.destroy', ['kredit_id' => $page_datas->credit['id'], 'nomor_sertifikat' => $v['nomor_sertifikat']]) }}" class="text-danger">Hapus</a>
								</td>
							</tr>
						@empty
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endif

@if (((!isset($page_datas->credit['jaminan_kendaraan'])) && (empty($page_datas->credit['jaminan_kendaraan']))) && (!isset($page_datas->credit['jaminan_tanah_bangunan']) && empty($page_datas->credit['jaminan_tanah_bangunan'])))
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
	
	@endcomponent
@endpush