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
			<section>
				<div class="m-t-none m-b-md p-b-md">
					<h4 class="m-t-none m-b-xs">Data Nasabah</h4>
				</div>

				@include ('pages.kredit.components.form.pengajuan.nasabah', [
					'param'	=> [
						'data'	=> null,
					]
				])
			</section>
			<h3>Data Pekerjaan</h3>
			<section>
				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">Data Pekerjaan</h4>
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
	function autofilldebitur() 
	{
		var nik = '35-'+document.getElementById("debitur_id").value;

		$.ajax({url: "{{route('ajax.debitur')}}?nik="+nik, success: function(result)
		{
			document.getElementById("debitur_nama").value = result.nama;
			document.getElementById("debitur_tanggal_lahir").value = result.tanggal_lahir;
			document.getElementById("debitur_jenis_kelamin").value = result.jenis_kelamin;
			document.getElementById("debitur_status_perkawinan").value = result.status_perkawinan;
			document.getElementById("debitur[alamat][0][alamat]").value = result.alamat.alamat;
			document.getElementById("debitur[alamat][0][rt]").value = result.alamat.rt;
			document.getElementById("debitur[alamat][0][rw]").value = result.alamat.rw;
			document.getElementById("debitur[alamat][0][provinsi]").value = result.alamat.provinsi;
			document.getElementById("debitur[alamat][0][regensi]").value = result.alamat.regensi;
			document.getElementById("debitur[alamat][0][distrik]").value = result.alamat.distrik;
			document.getElementById("debitur[alamat][0][desa]").value = result.alamat.desa;
			document.getElementById("debitur[alamat][0][negara]").value = result.alamat.negara;
			document.getElementById("debitur[telepon]").value = result.telepon;
			document.getElementById("debitur_pekerjaan").value = result.pekerjaan;
			document.getElementById("debitur_penghasilan_bersih").value = result.penghasilan_bersih;
		}});
	}
@endpush