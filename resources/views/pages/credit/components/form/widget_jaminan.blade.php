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
							<select name="{{ (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan]' : 'jaminan') . '[][type]' }}" class="form-control quick-select-clone quick-select-type focus">
								<option value="kendaraan" data-name="{{ (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[]' }}">Kendaraan</option>
								<option value="tanah_bangunan" data-name="{{ (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[]' }}">Tanah / Bangunan</option>
							</select>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Status Kepemilikan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::text( (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[][status_kepemilikan]', null, ['class' => 'form-control required auto-tabindex credit-jaminan-kepemilikan', 'placeholder' => 'Status Jaminan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Legalitas</label>
					<div class="row">
						<div class="col-md-12">
							{{-- untuk legalitas tanah & bangunan --}}
							<div class="quick-select-legal tanah_bangunan" style="display:none">
								{!! Form::select('legalitas', [
									'shm'		=> 'Sertifikat Hak Milik (SHM)',
									'hgb'		=> 'Hak Guna Bangunan (HGB)'
								], 'shm', ['class' => 'form-control quick-select-clone quick-select-legal', 
								'data-name' => (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan_tanah_bangunan]' : 'jaminan_tanah_bangunan') . '[][legalitas]']) !!}
							</div>
							{{-- untuk legalitas kendaraan --}}
							<div class="quick-select-legal kendaraan" style="display:none">
								{!! Form::select('legalitas', [
									'bpkb_r2'	=> 'BPKB R2',
									'bpkb_r4'	=> 'BPKB R4',
									'stnk_r2'	=> 'STNK R2',
									'stnk_r4'	=> 'STNK R4'
								], 'bpkb_2', ['class' => 'form-control quick-select-clone quick-select-legal',
								'data-name' => (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[][legalitas]']) !!}
							</div>
							{!! Form::hidden( (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan_kendaraan]' : 'jaminan_kendaraan') . '[][legalitas]', null, ['class' => 'credit-jaminan-legal']) !!}
						</div>
					</div>
				</fieldset>
			</div>
			<div class="col-md-2 p-l-none">
				<a href="#" class="btn btn-link remove"><i class="fa fa-times"></i> Hapus</a>
			</div>
		</div>
	</div>
	<hr />
</div>