{{-- 
	Plugin Form Jaminan
	Description: form untuk jaminan
	Usage:
	- Param
		$param['prefix']: prefix variable input
 --}}
<div class="root-clone">
	<div class="form-group">
		<div class="row">
			<div class="col-md-8 p-r-none">
				<b><h5>Jaminan</h5></b>
				<fieldset class="form-group">
					<label for="">Jenis</label>
					<div class="row">
						<div class="col-md-12">
							<select name="jaminan_tanah_bangunan[0][tipe]" class="form-control quick-select-clone quick-select-type focus">
								<option value="tanah_bangunan">Tanah / Bangunan</option>
							</select>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Status Kepemilikan</label>
					<div class="row">
						<div class="col-md-12">
								{!! Form::select('jaminan_tanah_bangunan[0][status_kepemilikan]', [
									'milik_sendiri'		=> 'Milik Pribadi',
									'milik_ortu'		=> 'Milik Orang Tua'
								], 'milik_sendiri', ['class' => 'form-control quick-select-clone quick-select-status_kepemilikan', ]) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Legalitas</label>
					<div class="row">
						<div class="col-md-12">
							{{-- untuk legalitas tanah & bangunan --}}
								{!! Form::select('jaminan_tanah_bangunan[0][legalitas]', [
									'shm'		=> 'Sertifikat Hak Milik (SHM)',
									'hgb'		=> 'Hak Guna Bangunan (HGB)'
								], 'shm', ['class' => 'form-control quick-select-clone quick-select-legal', ]) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
</div>