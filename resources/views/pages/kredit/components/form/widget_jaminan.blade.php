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
				<h5 class="text-uppercase text-light">Jaminan Kendaraan</h5>
				<fieldset class="form-group">
					<label for="">Jenis Kendaraan</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::select('jaminan_kendaraan[tipe]', $page_datas->select_jenis_kendaraan, 'roda_2', ['class' => 'form-control quick-select  auto-tabindex', 'placeholder' => '', 'data-other' => 'input-tipe-jaminan-kendaraan']) !!}
							{!! Form::hidden('jaminan_kendaraan[tipe]', 'roda_2', ['class' => 'input-tipe-jaminan-kendaraan', 'disabled' => 'disabled']) !!}
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
							{!! Form::select('jaminan_kendaraan[merk]', $page_datas->select_merk_kendaraan, 'daihatsu', ['class' => 'form-control quick-select auto-tabindex ', 'placeholder' => 'Merk Kendaraan', 'data-other' => 'input-merk-kendaraan']) !!} <br/>
							{!! Form::hidden('jaminan_kendaraan[merk]', 'daihatsu', ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan', 'placeholder' => 'Sebutkan', 'style' => 'width:40%', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. BPKB</label>
					<div class="row">
						<div class="col-md-6">
							{!! Form::text('jaminan_kendaraan[nomor_bpkb]', null, ['class' => 'form-control auto-tabindex ', 'placeholder' => 'Nomor BPKB', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Atas Nama</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_kendaraan[atas_nama]', null, ['class' => 'form-control auto-tabindex ', 'placeholder' => 'Atas Nama', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>

		<hr/>
		<div class="clearfix">&nbsp;</div>

		<div class="row p-b-md">
			<div class="col-md-12">
				<h5 class="text-uppercase text-light">Jaminan Tanah &amp; Bangunan</h5>
				<fieldset class="form-group">
					<label for="">Jenis Sertifikat</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::select('jaminan_tanah_bangunan[tipe]', [
									'bangunan'	=> 'Bangunan',
									'tanah'		=> 'Tanah',
								], 'bangunan', ['class' => 'form-control quick-select auto-tabindex', 'data-other' => 'input-tipe-jaminan-tanah-bangunan']) !!}
							{!! Form::hidden('jaminan_tanah_bangunan[tipe]', 'bangunan', ['class' => 'input-tipe-jaminan-tanah-bangunan', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Jenis Sertifikat</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::select('jaminan_tanah_bangunan[jenis_sertifikat]', [
									'hgb'	=> 'Hak Guna Bangunan (HGB)',
									'shm'	=> 'Sertifikat Hak Milik (SHM)',
								], 'hgb', ['class' => 'form-control quick-select auto-tabindex']) !!}
							{!! Form::hidden('jaminan_tanah_bangunan[jenis_sertifikat]', 'hbg', ['class' => 'input-tipe-jaminan-tanah-bangunan', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">No. Sertifikat</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_tanah_bangunan[nomor_sertifikat]', null, ['class' => 'form-control auto-tabindex mask-no-sertifikat', 'placeholder' => 'Nomor Sertifikat', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Masa Berlaku</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_tanah_bangunan[masa_berlaku_sertifikat]', null, ['class' => 'form-control auto-tabindex mask-year', 'placeholder' => 'Masa Berlaku', 'disabled' => 'disabled']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Atas Nama</label>
					<div class="row">
						<div class="col-md-7">
							{!! Form::text('jaminan_tanah_bangunan[atas_nama]', null, ['class' => 'form-control auto-tabindex', 'placeholder' => 'Atas Nama', 'disabled' => 'disabled']) !!}
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
				'provinsi' 	=> $page_datas->provinsi,
			]
		])
	</div>
	{{-- <hr /> --}}
</div>