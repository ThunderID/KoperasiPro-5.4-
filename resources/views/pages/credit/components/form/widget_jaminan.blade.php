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
							{!! Form::select( (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan]' : 'jaminan') . '[][type]', [
								'kendaraan'			=> 'Kendaraan',
								'tanah_bangunan'	=> 'Tanah / Bangunan'
							], 'kendaraan', ['class' => 'form-control quick-select-clone quick-select-type focus']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kepemilikan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select( (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan]' : 'jaminan') . '[][type]', [
								'kendaraan'			=> 'Kendaraan',
								'tanah_bangunan'	=> 'Tanah / Bangunan'
							], 'kendaraan', ['class' => 'form-control quick-select-clone quick-select-type focus']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Legalitas</label>
					<div class="row">
						<div class="col-md-12">
							{{-- untuk legalitas tanah & bangunan --}}
							<div class="quick-select-legal tanah_bangunan" style="display:none">
								{!! Form::select('jaminan[tanah_bangunan][]', [
									'shm'		=> 'Sertifikat Hak Milik (SHM)',
									'hgb'		=> 'Hak Guna Bangunan (HGB)'
								], 'shm', ['class' => 'form-control quick-select-clone quick-select-legal']) !!}
							</div>
							{{-- untuk legalitas kendaraan --}}
							<div class="quick-select-legal kendaraan" style="display:none">
								{!! Form::select('jaminan[kendaraan][]', [
									'bpkb_r2'	=> 'BPKB R2',
									'bpkb_r4'	=> 'BPKB R4',
									'stnk_r2'	=> 'STNK R2',
									'stnk_r4'	=> 'STNK R4'
								], 'bpkb_2', ['class' => 'form-control quick-select-clone quick-select-legal']) !!}
							</div>
							{!! Form::hidden( (!is_null($param['prefix']) ? $param['prefix'] . '[jaminan]' : 'jaminan') . '[][legal]', null, ['class' => 'credit-jaminan-legal']) !!}
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