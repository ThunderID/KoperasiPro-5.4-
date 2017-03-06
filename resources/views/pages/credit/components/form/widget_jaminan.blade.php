<div id="template-clone-jaminan">
	<div class="root-clone">
		<fieldset class="form-group">
			<label for="">Jenis</label>
			<div class="row">
				<div class="col-md-12">
					{!! Form::select('credit[collaterals][0][type]', [
						'kendaraan'			=> 'Kendaraan',
						'tanah_bangunan'	=> 'Tanah / Bangunan'
					], 'kendaraan', ['class' => 'form-control quick-select-clone quick-select-type focus']) !!}
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<label for="">Kepemilikan</label>
			<div class="row">
				<div class="col-md-6">
					{!! Form::text('credit[collaterals][0][ownership_status]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Pemilik jaminan']) !!}
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<label for="">Legalitas</label>
			<div class="row">
				<div class="col-md-12">
					{{-- untuk legalitas tanah & bangunan --}}
					<div class="quick-select-legal tanah_bangunan" style="display:none">
						{!! Form::select('legal', [
							'hak_milik'		=> 'Hak Milik / HGB',
							'sertifikat'	=> 'Sertifikat'
						], 'hak_milik', ['class' => 'form-control quick-select-clone quick-select-legal']) !!}
					</div>
					{{-- untuk legalitas kendaraan --}}
					<div class="quick-select-legal kendaraan" style="display:none">
						{!! Form::select('legal', [
							'bpkb_r2'	=> 'BPKB R2',
							'bpkb_r4'	=> 'BPKB R4',
							'stnk_r2'	=> 'STNK R2',
							'stnk_r4'	=> 'STNK R4'
						], 'bpkb_2', ['class' => 'form-control quick-select-clone quick-select-legal']) !!}
					</div>
					{!! Form::hidden('credit[collaterals][0][legal]', null, ['class' => 'credit-collaterals-legal']) !!}
				</div>
			</div>
		</fieldset>
	</div>
</div>