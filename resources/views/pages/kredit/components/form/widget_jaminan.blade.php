{{-- 
	Plugin Form Jaminan
	Description: form untuk jaminan
	Usage:
	- Param
		$param['prefix']: prefix variable input
 --}}
<div class="root-clone">
	<div class="form-group">
		<div class="row p-b-sm">
			<div class="col-md-12">
				<b><h5>Jaminan Kendaraan</h5></b>
				<fieldset class="form-group">
					<label for="">Jenis Kendaraan</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::select('jaminan_kendaraan[tipe_jaminan]', $page_datas->select_jenis_kendaraan, 'roda_2', ['class' => 'form-control quick-select  auto-tabindex', 'placeholder' => '', 'data-other' => 'input-jenis-kendaraan', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Tahun</label>
					<div class="row">
						<div class="col-md-3">
							{!! Form::text('jaminan_kendaraan[tahun]', null, ['class' => 'form-control auto-tabindex  mask-year', 'placeholder' => 'Tahun Pembuatan', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Merk</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan_kendaraan[merk]', $page_datas->select_merk_kendaraan, 'daihatsu', ['class' => 'form-control quick-select auto-tabindex ', 'placeholder' => 'Merk Kendaraan', 'data-other' => 'input-merk-kendaraan', 'disabled' => 'disabled']) !!} <br/>
							{!! Form::hidden('jaminan_kendaraan[merk]', 'daihatsu', ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan', 'placeholder' => 'Sebutkan', 'style' => 'width:40%', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Tipe</label>
					<div class="row">
						<div class="col-md-6">
							{!! Form::text('jaminan_kendaraan[tipe]', null, ['class' => 'form-control auto-tabindex ', 'placeholder' => 'Tipe Kendaraan', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. BPKB</label>
					<div class="row">
						<div class="col-md-6">
							{!! Form::text('jaminan_kendaraan[legal][nomor_bpkb]', null, ['class' => 'form-control auto-tabindex ', 'placeholder' => 'Nomor BPKB', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Polisi</label>
					<div class="row">
						<div class="col-md-3">
							{!! Form::text('jaminan_kendaraan[legal][nomor_polisi]', null, ['class' => 'form-control auto-tabindex ', 'placeholder' => 'Nomor Polisi', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Atas Nama</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_kendaraan[legal][atas_nama]', null, ['class' => 'form-control auto-tabindex ', 'placeholder' => 'Atas Nama', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>

		<hr/>
		<div class="clearfix">&nbsp;</div>

		<div class="row p-b-md">
			<div class="col-md-12">
				<b><h5>Jaminan Tanah &amp; Bangunan</h5></b>

				{!! Form::hidden('jaminan_tanah_bangunan[tipe_jaminan]', 'tanah_bangunan', ['class' => '', 'placeholder' => '', 'disabled' => 'disabled']) !!}

				<fieldset class="form-group">
					<label for="">Jenis Sertifikat</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::select('jaminan_tanah_bangunan[legal][jenis_sertifikat]', [
									'hgb'	=> 'Hak Guna Bangunan (HGB)',
									'shm'	=> 'Sertifikat Hak Milik (SHM)',
								], 'hgb', ['class' => 'form-control quick-select auto-tabindex', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Sertifikat</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_tanah_bangunan[legal][nomor_sertifikat]', null, ['class' => 'form-control auto-tabindex ', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Masa Berlaku</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_tanah_bangunan[legal][masa_berlaku_sertifikat]', null, ['class' => 'form-control auto-tabindex', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Atas Nama</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_tanah_bangunan[legal][atas_nama]', null, ['class' => 'form-control auto-tabindex', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>

		<hr/>
		<div class="clearfix">&nbsp;</div>

		{{-- form address --}}
		@include('components.helpers.forms.address', [
			'param'		=> [
				'prefix'	=> 'jaminan_tanah_bangunan',
				'province' 	=> $page_datas->province,
				'cities'	=> $page_datas->cities
			]
		])
	</div>
	{{-- <hr /> --}}
</div>