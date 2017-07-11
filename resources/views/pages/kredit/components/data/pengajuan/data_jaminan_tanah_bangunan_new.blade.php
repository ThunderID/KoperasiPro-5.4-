@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize m-b-sm text-lg">data jaminan tanah &amp; bangunan</p>
	</div>
</div>

@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
	@forelse ($page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
		<p class="m-t-sm m-b-xs text-capitalize text-sm">
			<strong>tanah &amp; bangunan {{ $key+1 }}</strong>
			@if (!empty($page_datas->credit['jaminan_tanah_bangunan']))
				@if ($page_datas->credit['status'] == 'pengajuan')
					<span class="pull-right">
						<a class="text-danger m-r-md" href="#" data-url="{{ route('jaminan.tanah.bangunan.destroy', ['kredit_id' => $page_datas->credit['id'], 'jaminan_tanah_bangunan_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
							<i class="fa fa-trash" aria-hidden="true"></i>
							 Hapus
						</a> &nbsp;
						<a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan-{{ $key }}" data-panel="data-jaminan" no-data-pjax>
							<i class="fa fa-pencil" aria-hidden="true"></i>
							 Edit
						</a>
					</span>
				@endif
			@endif
		</p>
		<p class="text-capitalize text-light m-b-xs">
			{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}
			<span> ( {{ (isset($value['jenis_sertifikat']) && !is_null($value['jenis_sertifikat'])) ? str_replace('_', ' ', $value['jenis_sertifikat']) : '-' }} )</span>
		</p>
		<p class="text-capitalize text-light m-b-xs">
			No. Sertifikat {{ (isset($value['nomor_sertifikat']) && !is_null($value['nomor_sertifikat'])) ? $value['nomor_sertifikat'] : '-' }}
		</p>
		<p class="text-capitalize text-light m-b-xs">
			{{ (isset($value['luas_bangunan']) && !is_null($value['luas_bangunan'])) ? str_replace('_', ' ', $value['luas_bangunan']) : '-'  }} M<sup>2</sup> / 
			{{ (isset($value['luas_tanah']) && !is_null($value['luas_tanah'])) ? str_replace('_', ' ', $value['luas_tanah']) : '-'  }} M<sup>2</sup> 
			<span class="text-capitalize text-muted" style="font-size: 11px;"><em>( bangunan / tanah )</em></span>
		</p>
		<p class="text-capitalize text-light m-b-xs">
			{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
		</p>
		<p class="text-capitalize text-light m-b-xs">
			@foreach ($value['alamat'] as $k => $v)
				@if ($k == 0)
					{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }}
					RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} <br/>
					{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} 
					{{ (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik'] .'<br/>' : '' }}
					{{ (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] : '' }} - 
					{{ (isset($v['provinsi']) && !is_null($v['provinsi'])) ? $v['provinsi'] : '' }} - 
					{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
				@endif
			@endforeach
		</p>
		<p class="text-capitalize text-light m-b-xs">
			Sertifikat berlaku sampai th. {{ (isset($value['masa_berlaku_sertifikat']) && !is_null($value['masa_berlaku_sertifikat'])) ? $value['masa_berlaku_sertifikat'] : '-' }}
		</p>

		@if (count($page_datas->credit['jaminan_tanah_bangunan']) - 1 != $key)
			<hr class="m-b-md">
		@endif
	@empty
		@if ($page_datas->credit['status'] != 'pengajuan')
			<p class="text-light">Belum ada data disimpan.</p>
		@else
			<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan" data-panel="data-jaminan" no-data-pjax> Tambahkan Sekarang </a></p>
		@endif
	@endforelse

	@if ((count($page_datas->credit['jaminan_tanah_bangunan']) < 3) && count($page_datas->credit['jaminan_tanah_bangunan']) != 0)
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@if ($page_datas->credit['status'] == 'pengajuan')
					<a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan" data-panel="data-jaminan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Jaminan Tanah &amp; Bangunan</a>
				@endif
			</div>
		</div>
	@endif
@else
	@if ($page_datas->credit['status'] != 'pengajuan')
		<p class="text-light">Belum ada data disimpan.</p>
	@else
		<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan" data-panel="data-jaminan" no-data-pjax> Tambahkan Sekarang </a></p>
	@endif
@endif