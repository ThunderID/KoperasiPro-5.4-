@php
/**
 * ===================================================================
 * Readme
 * ===================================================================
 * component name:		widget jaminan kendaraan
 * author:				Agil M (agil.mahendra@gmail.com)
 * description:			form untuk jaminan kendaraan
 * 
 * ===================================================================
 * Usage
 * ===================================================================
 * include this file
 * 
 * ===================================================================
 * Parameters
 * ===================================================================
 * list parameters:
 *
 * 1. data
 * 		required: 			yes
 * 		description:		diperlukan untuk menampilkan parameters data
 *
 * 		a. select_jenis_kendaraan
 * 			required:		yes
 * 			value:			array list
 * 			description:	untuk menampilkan data jenis_kendaraan select option
 *
 * 		b. select_merk_kendaraan
 * 			required:		yes
 * 			value:			array list
 * 			description:	untuk menampilkan data jenis_kendaraan select option
 * 
 */
@endphp
<div class="root-clone">
	<div class="form-group">
		<div class="row p-b-sm">
			<div class="col-md-12">
				<h5 class="text-uppercase text-light">Jaminan Kendaraan</h5>
				<fieldset class="form-group">
					<label for="">Jenis Kendaraan</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::select('jaminan_kendaraan[tipe][]', $data['select_jenis_kendaraan'], '', ['class' => 'form-control quick-select  auto-tabindex', 'placeholder' => 'Pilih', 'data-placeholder' => 'Pilih', 'data-other' => 'input-tipe-jaminan-kendaraan']) !!}
							{!! Form::hidden('jaminan_kendaraan[tipe][]', 'roda_2', ['class' => 'input-tipe-jaminan-kendaraan input-kendaraan', 'data-field' => 'tipe']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Tahun</label>
					<div class="row">
						<div class="col-md-3">
							{!! Form::text('jaminan_kendaraan[tahun][]', null, ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Tahun Pembuatan', 'data-field' => 'tahun']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Merk</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan_kendaraan[merk][]', $data['select_merk_kendaraan'], 
								(isset($param['data']['merk']) ? (in_array($param['data']['merk'], ['daihatsu', 'honda', 'isuzu', 'kawasaki', 'kia', 'mitsubishi', 'nissan', 'suzuki', 'toyota', 'yamaha']) ? $param['data']['merk'] : 'lain_lain') : ''), 
								['class' => 'form-control auto-tabindex quick-select', 'placeholder' => 'Pilih', 'data-placeholder' => 'Pilih', 'data-other' => 'input-merk-kendaraan']) !!} <br/>
							{!! Form::text('jaminan_kendaraan[merk][]', (isset($param['data']['merk']) ? $param['data']['merk'] : 'daihatsu'), ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan input-kendaraan ' . (in_array($param['data']['merk'], ['daihatsu', 'honda', 'isuzu', 'kawasaki', 'kia', 'mitsubishi', 'nissan', 'suzuki', 'toyota', 'yamaha']) ? 'hidden' : (!isset($param['data']['merk']) ? 'hidden' : '')), 'placeholder' => 'Sebutkan', 'style' => 'width:40%;', 'data-field' => 'merk']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. BPKB</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('jaminan_kendaraan[nomor_bpkb][]', null, ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Nomor BPKB', 'data-field' => 'nomor_bpkb']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Atas Nama</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_kendaraan[atas_nama][]', null, ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>
</div>