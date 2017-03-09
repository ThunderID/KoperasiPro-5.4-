{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	<div class="row">
		
		{{ Form::hidden('id', $page_datas['credit']) }}

		<div class="tab-content clearfix">
		  	<div class="tab-pane" id="jaminan-tnb">

				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">TANAH & BANGUNAN</h4>
				</div>

				<fieldset class="form-group">
					<label for="">Tipe Jaminan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][tipe_jaminan]', [
								'tanah'					=> 'Tanah',
								'tanah_dan_bangunan'	=> 'Tanah dan Bangunan'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['tipe_jaminan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>

				<fieldset class="form-group">
					<div class="col-md-4">
						<label for="">Panjang Tanah</label>
						<div class="input-group">
							{!! Form::number('jaminan[tanah_bangunan][0][tanah][panjang]', $page_datas->credit['kreditur']['aset']['tanah_bangunan'[0]]['tanah']['panjang'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Masa Sewa', 'min' => '1']) !!}

							<div class="input-group-addon">M</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="">Lebar Tanah</label>
						<div class="input-group">
							{!! Form::number('jaminan[tanah_bangunan][0][tanah][lebar]', $page_datas->credit['kreditur']['aset']['tanah_bangunan'[0]]['tanah']['lebar'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Masa Sewa', 'min' => '1']) !!}

							<div class="input-group-addon">M</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="">Luas Tanah</label>
						<div class="input-group">
							{!! Form::number('jaminan[tanah_bangunan][0][tanah][luas]', $page_datas->credit['kreditur']['aset']['tanah_bangunan'[0]]['tanah']['luas'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Masa Sewa', 'min' => '1']) !!}

							<div class="input-group-addon">M<sup>2</sup></div>
						</div>
					</div>										
				</fieldset>	

				<fieldset class="form-group">
					<div class="col-md-4">
						<label for="">Panjang Bangunan</label>
						<div class="input-group">
							{!! Form::number('jaminan[tanah_bangunan][0][bangunan][panjang]', $page_datas->credit['kreditur']['aset']['tanah_bangunan'[0]]['bangunan']['panjang'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Masa Sewa', 'min' => '1']) !!}

							<div class="input-group-addon">M</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="">Lebar Bangunan</label>
						<div class="input-group">
							{!! Form::number('jaminan[tanah_bangunan][0][bangunan][lebar]', $page_datas->credit['kreditur']['aset']['tanah_bangunan'[0]]['bangunan']['lebar'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Masa Sewa', 'min' => '1']) !!}

							<div class="input-group-addon">M</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="">Luas Bangunan</label>
						<div class="input-group">
							{!! Form::number('jaminan[tanah_bangunan][0][bangunan][luas]', $page_datas->credit['kreditur']['aset']['tanah_bangunan'[0]]['bangunan']['luas'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Masa Sewa', 'min' => '1']) !!}

							<div class="input-group-addon">M<sup>2</sup></div>
						</div>
					</div>										
				</fieldset>									

				<fieldset class="form-group">
					<label for="">Bentuk Bangunan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][bentuk_bangunan]', [
								'tingkat'			=> 'Tingkat',
								'tidak_tingkat'		=> 'Tidak tingkat',
								'lainnya'			=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['bentuk_bangunan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>

				<fieldset class="form-group">
					<label for="">Konstruksi Bangunan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][konstruksi_bangunan]', [
								'permanen'				=> 'Permanen',
								'semi_permanen'			=> 'Semi Permanen',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['konstruksi_bangunan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				<fieldset class="form-group">
					<label for="">Lantai</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][lantai]', [
								'keramik'				=> 'Keramik',
								'tegel_biasa'			=> 'Tegel Biasa',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['lantai'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				<fieldset class="form-group">
					<label for="">Dinding</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][dinding]', [
								'tembok'				=> 'Tembok',
								'semi_tembok'			=> 'Semi tembok',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['dinding'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				<fieldset class="form-group">
					<label for="">Listrik</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][listrik]', [
								'450w'					=> '450W',
								'950w'					=> '950W',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['listrik'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				<fieldset class="form-group">
					<label for="">Air</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][air]', [
								'sumur'					=> 'Sumur',
								'pdam'					=> 'PDAM',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['air'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>			

				<fieldset class="form-group">
					<label for="">Fungsi Bangunan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][fungsi]', [
								'rumah'					=> 'Rumah',
								'ruko/rukan'			=> 'Ruko/Rukan',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['fungsi'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				<fieldset class="form-group">
					<label for="">Fungsi Bangunan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::text('jaminan[tanah_bangunan][0][legal][atas_nama_sertifikat]',  $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['atas_nama_sertifikat'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama Usaha']) !!}
						</div>
					</div>
				</fieldset>		

				<fieldset class="form-group">
					<label for="">Jenis Sertifikat</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][legal][jenis_sertifikat]', [
								'shm'					=> 'SHM',
								'shgb'					=> 'SHGB',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['jenis_sertifikat'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				<fieldset class="form-group">
					<label for="">Masa Berlaku Sertifikat</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::text('jaminan[tanah_bangunan][0][legal][masa_berlaku_sertifikat]', $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['masa_berlaku_sertifikat'], ['class' => 'form-control date date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
						</div>
					</div>
				</fieldset>						

				<fieldset class="form-group">
					<label for="">IMB</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][legal][imb]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['imb'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				<fieldset class="form-group">
					<label for="">Akta Jual Beli</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][legal][akta_jual_beli]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['akta_jual_beli'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				<fieldset class="form-group">
					<label for="">PBB Terakhir</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[tanah_bangunan][0][legal][pbb_terakhir]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['pbb_terakhir'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>																												

		  	</div>
		</div>

	</div>

	<div class="modal-footer">
		<a type='button' class="btn btn-default" data-dismiss='modal'>
			Cancel
		</a>
		<button type="submit" class="btn btn-success">
			Simpan
		</button>
	</div>		
{!! Form::close() !!}