@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('pengajuan_baru')
    active
@stop

@push('content')
	<div class="p-content">
		<div class="page-header m-t-none m-b-xl p-b-xs">
			<h2 class="m-t-none m-b-xs">Pengajuan Baru</h2>
		</div>
		{!! Form::open(['url' => route('credit.store'), 'class' => 'form wizard', 'data-ajax-submit' => true, 'files' => true]) !!}
			{{-- untuk data kredit --}}
			<h3>Data Kredit</h3>
			<section>
				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">Data Kredit</h4>
				</div>

				@include ('pages.kredit.components.form.pengajuan.kredit', [
					'param'	=> [
						'data'	=> null,
					],
					'data'	=> [
						'select_jenis_kredit'	=> $page_datas->select_jenis_kredit,
						'select_jangka_waktu'	=> $page_datas->select_jangka_waktu,
					]
				])
			</section>
			<h3>Data Nasabah</h3>
			<section id="input-nasabah">
				<div class="m-t-none m-b-md p-b-md">
					<h4 class="m-t-none m-b-xs">Data Nasabah</h4>
				</div>

				@include ('pages.kredit.components.form.pengajuan.nasabah', [
					'param'	=> [
						'data'	=> null,
					]
				])

				<hr>

				<div class="m-t-none">
					<h5 class="text-uppercase text-light">Data Pekerjaan</h5>
				</div>

				@include ('pages.kredit.components.form.pengajuan.pekerjaan', [
					'param'	=> [
						'data'	=> null,
					],
					'data'	=> [
						'select_jenis_pekerjaan'	=> $page_datas->select_jenis_pekerjaan,
					]
				])				
			</section>
			
			<h3>Data Jaminan</h3>
			<section>
				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">Data Jaminan</h4>
				</div>
				
				@include ('pages.kredit.components.form.pengajuan.jaminan', [
					'param'	=> [
						'data'	=> null,
					]
				])
			</section>
		{!! Form::close() !!}
	</div>
@endpush

@push('scripts')

	/* Not This Time: Due to API Support
	function autofillsertifikat() 
	{
		var jt = document.getElementById("jaminan_tanah_bangunan[nomor_sertifikat]").value;
		console.log(jt);
		$.ajax({url: "{{route('ajax.jaminan.tb')}}?nomor_sertifikat="+jt, success: function(result)
		{
			document.getElementById("jaminan_tanah_bangunan[tipe]").value = result.tipe;
			document.getElementById("jaminan_tanah_bangunan[jenis_sertifikat]").value 			= result.jenis_sertifikat;
			document.getElementById("jaminan_tanah_bangunan[masa_berlaku_sertifikat]").value 	= result.masa_berlaku_sertifikat;
			document.getElementById("jaminan_tanah_bangunan[atas_nama]").value 					= result.atas_nama;
			document.getElementById("jaminan_tanah_bangunan[luas_tanah]").value 				= result.luas_bangunan;

			document.getElementById("jaminan_tanah_bangunan[alamat][0][alamat]").value 		= result.alamat.alamat;
			document.getElementById("jaminan_tanah_bangunan[alamat][0][rt]").value 			= result.alamat.rt;
			document.getElementById("jaminan_tanah_bangunan[alamat][0][rw]").value 			= result.alamat.rw;
			document.getElementById("jaminan_tanah_bangunan[alamat][0][provinsi]").value 	= result.alamat.provinsi;
			document.getElementById("jaminan_tanah_bangunan[alamat][0][regensi]").value 	= result.alamat.regensi;
			document.getElementById("jaminan_tanah_bangunan[alamat][0][distrik]").value 	= result.alamat.distrik;
			document.getElementById("jaminan_tanah_bangunan[alamat][0][desa]").value 		= result.alamat.desa;
			document.getElementById("jaminan_tanah_bangunan[alamat][0][negara]").value 		= result.alamat.negara;
		}});
	}

	function autofillbpkb() 
	{
		var jt = document.getElementById("jaminan_kendaraan[nomor_bpkb]").value;
		console.log(jt);
		$.ajax({url: "{{route('ajax.jaminan.k')}}?nomor_bpkb="+jt, success: function(result)
		{
			document.getElementById("jaminan_kendaraan[tipe]").value 		= result.tipe;
			document.getElementById("jaminan_kendaraan[tahun]").value 		= result.tahun;
			document.getElementById("jaminan_kendaraan[merk]").value 		= result.merk;
			document.getElementById("jaminan_kendaraan[atas_nama]").value 	= result.atas_nama;
		}});
	}
	*/
@endpush