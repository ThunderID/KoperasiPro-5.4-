<div class="m-t-none m-b-md">
	<h4 class="m-t-none m-b-xs">Data Jaminan</h4>
</div>

<div class="content-clone">
	<div id="section-clone"></div>
	<fieldset class="form-group">
		<a href="javascript:void(0);" class="btn btn-link p-l-none p-r-none p-t-none p-b-none add"><i class="fa fa-plus"></i> Jaminan</a>
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
					], 'kendaraan', ['class' => 'form-control quick-select collateral-type']) !!}
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
				<div class="col-md-12 hidden">
					{{-- untuk legalitas tanah & bangunan --}}
					{!! Form::select('credit[collaterals][][legal]', [
						'hak_milik'		=> 'Hak Milik / HGB',
						'sertifikat'	=> 'Sertifikat'
					], 'hak_milik', ['class' => 'form-control quick-select collaterals-legal-tanah hide']) !!}
				</div>
				<div class="col-md-12">
					{{-- untuk legalitas kendaraan --}}
					{!! Form::select('credit[collaterals][][legal]', [
						'bpkb_r2'	=> 'BPKB R2',
						'bpkb_r4'	=> 'BPKB R4',
						'stnk_r2'	=> 'STNK R2',
						'stnk_r4'	=> 'STNK R4'
					], 'bpkb_2', ['class' => 'form-control quick-select collaterals-legal-kendaraan']) !!}
				</div>
			</div>
		</fieldset>
	</div>
</div>