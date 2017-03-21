<div class="root-clone">
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