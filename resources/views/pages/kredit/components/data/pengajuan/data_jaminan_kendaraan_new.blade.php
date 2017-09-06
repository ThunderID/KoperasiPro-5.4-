@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize m-b-sm text-lg">data jaminan kendaraan</p>
	</div>
</div>

@if (isset($page_datas->credit['jaminan_kendaraan']) && !empty($page_datas->credit['jaminan_kendaraan']))
	@forelse($page_datas->credit['jaminan_kendaraan'] as $key => $value)
		<p class="m-t-sm m-b-xs text-capitalize">
			@if (!empty($page_datas->credit['jaminan_kendaraan']) && count($page_datas->credit['jaminan_kendaraan']) != 0)
				<span class="text-regular text-muted text-sm">kendaraan {{ $key+1 }}</span>
				@if ($page_datas->credit['status'] == 'pengajuan')
					<span class="pull-right">
						<a class="text-danger m-r-md" href="#" data-url="{{ route('jaminan.kendaraan.destroy', ['kredit_id' => $page_datas->credit['id'], 'jaminan_kendaraan_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
							<i class="fa fa-trash" aria-hidden="true"></i>
							 Hapus
						</a> &nbsp;
						<a href="#" class="button-edit" data-toggle="hidden" data-target="jaminan-kendaraan-{{ $key }}" data-panel="data-jaminan" data-flag="data-jaminan-kendaraan" data-index="{{ $key }}" no-data-pjax>
							<i class="fa fa-pencil" aria-hidden="true"></i>
							 Edit
						</a>
					</span>
				@endif
			@endif
		</p>
		
		<p class="text-capitalize text-light m-b-xs">
			{{ (isset($value['merk']) && !is_null($value['merk'])) ? $value['merk'] : '-' }} 
			Th. {{ (isset($value['tahun']) && !is_null($value['tahun'])) ? $value['tahun'] : '-' }}
			({{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }})
		</p>
		
		<p class="text-capitalize text-light m-b-xs">
			No. BPKB {{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? $value['nomor_bpkb'] : '-' }}
		</p>

		<p class="text-capitalize text-light m-b-md">
			{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
		</p>
		
		@if (count($page_datas->credit['jaminan_kendaraan']) - 1 != $key)
			<hr class="m-b-md">
		@endif
	@empty
		<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-kendaraan" data-panel="data-jaminan" no-data-pjax> Tambahkan Sekarang </a></p>	
	@endforelse

	@if ((count($page_datas->credit['jaminan_kendaraan']) < 2) && (count($page_datas->credit['jaminan_kendaraan']) != 0))
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@if ($page_datas->credit['status'] == 'pengajuan')
					<a href="#" data-toggle="hidden" data-target="jaminan-kendaraan" data-panel="data-jaminan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Jaminan Kendaraan</a>
				@endif
			</div>
		</div>
	@endif
@else
	<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-kendaraan" data-panel="data-jaminan" no-data-pjax> Tambahkan Sekarang </a></p>	
@endif

{{-- @if (isset($page_datas->credit['jaminan_kendaraan']) && !empty($page_datas->credit['jaminan_kendaraan']))
	@forelse($page_datas->credit['jaminan_kendaraan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-md text-capitalize">
					jaminan kendaraan {{ $key+1 }}

					@if(!empty($page_datas->credit['jaminan_kendaraan']))
						@if($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('jaminan.kendaraan.destroy', ['kredit_id' => $page_datas->credit['id'], 'jaminan_kendaraan_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;
								<a href="#" data-toggle="hidden" data-target="jaminan-kendaraan-{{ $key }}" data-panel="data-jaminan" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				<hr class="m-t-sm m-b-sm"/>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info jaminan</strong></p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					Tipe
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light">
					{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					Merk
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light">
					{{ (isset($value['merk']) && !is_null($value['merk'])) ? $value['merk'] : '-' }}
					( {{ (isset($value['tahun']) && !is_null($value['tahun'])) ? $value['tahun'] : '-' }} )
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					No. BPKB
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light">
					{{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? $value['nomor_bpkb'] : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					atas nama
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light">
					{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
				</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@empty
	@endforelse
	
	<div class="row m-t-md m-b-md">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			@if (count($page_datas->credit['jaminan-kendaraan']) !=0)
				@if (count($page_datas->credit['jaminan_kendaraan']) < 2)
					<a href="#" data-toggle="hidden" data-target="jaminan-kendaraan" data-panel="data-jaminan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Jaminan Kendaraan</a>
				@else
					<p class="text-muted text-capitalize text-sm"><em><i class="fa fa-exclamation-circle"></i> tidak bisa menambahkan jaminan kendaraan lebih dari 2</em></p>
				@endif
			@endif
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-kendaraan" data-panel="data-jaminan" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif --}}