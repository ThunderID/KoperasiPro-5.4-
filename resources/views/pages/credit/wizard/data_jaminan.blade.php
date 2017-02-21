<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Jaminan</h4>
</div>

<div class="content-clone">
	<div id="section-clone"></div>
	<fieldset class="form-group">
		<a href="javascript:void(0);" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add" data-with="quick-select"><i class="fa fa-plus"></i> Jaminan</a>
	</fieldset>
</div>

{{-- template clone --}}
<div class="hidden">
	<div id="template-clone">
		<fieldset class="form-group">
			<label for="">Jenis</label>
			<div class="row">
				<div class="col-md-12">
					{!! Form::select('credit[collaterals][][type]', [
						'kendaraan'			=> 'Kendaraan',
						'tanah_bangunan'	=> 'Tanah / Bangunan'
					], 'kendaraan', ['class' => 'form-control quick-select-clone quick-select-type']) !!}
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<label for="">Kepemilikan</label>
			<div class="row">
				<div class="col-md-6">
					{!! Form::text('credit[collaterals][][ownership_status]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Pemilik jaminan']) !!}
				</div>
			</div>
		</fieldset>
		<fieldset class="form-group">
			<label for="">Legalitas</label>
			<div class="row">
				<div class="col-md-12">
					<div class="quick-select-legal tanah_bangunan" style="display:none">
						{{-- untuk legalitas tanah & bangunan --}}
						{!! Form::select('legal', [
							'hak_milik'		=> 'Hak Milik / HGB',
							'sertifikat'	=> 'Sertifikat'
						], 'hak_milik', ['class' => 'form-control quick-select-clone quick-select-legal']) !!}
					</div>
					<div class="quick-select-legal kendaraan" style="display:none">
						{{-- untuk legalitas kendaraan --}}
						{!! Form::select('legal', [
							'bpkb_r2'	=> 'BPKB R2',
							'bpkb_r4'	=> 'BPKB R4',
							'stnk_r2'	=> 'STNK R2',
							'stnk_r4'	=> 'STNK R4'
						], 'bpkb_2', ['class' => 'form-control quick-select-clone quick-select-legal']) !!}
					</div>
					{!! Form::hidden('credit[collaterals][][legal]', null, ['class' => 'credit-collaterals-legal']) !!}
			</div>
		</fieldset>
	</div>
</div>