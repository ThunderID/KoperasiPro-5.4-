{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	<div class="row">
		
		{{ Form::hidden('id', $page_datas['credit']) }}

		<div class="tab-content clearfix">
		  	<div class="tab-pane" id="jaminan-tnb">

				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">TANAH & BANGUNAN</h4>
				</div>

				{{-- Tipe Jaminan --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Tipe Jaminan</label>
							{!! Form::select('jaminan[tanah_bangunan][0][tipe_jaminan]', [
								'tanah'					=> 'Tanah',
								'tanah_dan_bangunan'	=> 'Tanah dan Bangunan'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['tipe_jaminan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Panjang Tanah, Lebar Tanah, Luas Tanah --}}
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

				{{-- Panjang Bangunan, Lebar Bangunan, Luas Bangunan --}}
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

				{{-- Bentuk Bangunan --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Bentuk Bangunan</label>
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][bentuk_bangunan]', [
								'tingkat'			=> 'Tingkat',
								'tidak_tingkat'		=> 'Tidak tingkat',
								'lainnya'			=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['bentuk_bangunan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Konstruksi Bangunan --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Konstruksi Bangunan</label>
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][konstruksi_bangunan]', [
								'permanen'				=> 'Permanen',
								'semi_permanen'			=> 'Semi Permanen',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['konstruksi_bangunan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- lantai --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Lantai</label>
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][lantai]', [
								'keramik'				=> 'Keramik',
								'tegel_biasa'			=> 'Tegel Biasa',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['lantai'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- Dinding --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Dinding</label>
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][dinding]', [
								'tembok'				=> 'Tembok',
								'semi_tembok'			=> 'Semi tembok',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['dinding'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- Listrik --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Listrik</label>
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][listrik]', [
								'450w'					=> '450W',
								'950w'					=> '950W',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['listrik'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- Air --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Air</label>
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][air]', [
								'sumur'					=> 'Sumur',
								'pdam'					=> 'PDAM',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['air'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>			

				{{-- Fungsi --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Fungsi Bangunan</label>
							{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][fungsi]', [
								'rumah'					=> 'Rumah',
								'ruko/rukan'			=> 'Ruko/Rukan',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['spesifikasi_bangunan']['fungsi'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- A/n Sertifikat --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Atas Nama Sertifikat</label>
							{!! Form::text('jaminan[tanah_bangunan][0][legal][atas_nama_sertifikat]',  $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['atas_nama_sertifikat'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Atas Nama Sertifikat']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- Jenis Sertifikat --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Jenis Sertifikat</label>
							{!! Form::select('jaminan[tanah_bangunan][0][legal][jenis_sertifikat]', [
								'shm'					=> 'SHM',
								'shgb'					=> 'SHGB',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['jenis_sertifikat'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- Masa Berlaku Sertifikat --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Masa Berlaku Sertifikat</label>
							{!! Form::text('jaminan[tanah_bangunan][0][legal][masa_berlaku_sertifikat]', $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['masa_berlaku_sertifikat'], ['class' => 'form-control date date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
						</div>
					</div>
				</fieldset>						

				{{-- IMB --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">IMB</label>
							{!! Form::select('jaminan[tanah_bangunan][0][legal][imb]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['imb'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- Akta Jual Beli --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Akta Jual Beli</label>
							{!! Form::select('jaminan[tanah_bangunan][0][legal][akta_jual_beli]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['akta_jual_beli'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- PBB  Terakhir --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">PBB Terakhir</label>
							{!! Form::select('jaminan[tanah_bangunan][0][legal][pbb_terakhir]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada',
								'lainnya'				=> 'Lainnya'
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['legal']['pbb_terakhir'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Jalan --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Akses Jalan</label>
							{!! Form::select('jaminan[tanah_bangunan][0][nilai][jalan]', [
								'tanah'					=> 'Tanah',
								'batu'					=> 'Batu',
								'aspal'					=> 'Aspal',
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['jalan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- Letak Lokasi --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Letak Lokasi</label>
							{!! Form::select('jaminan[tanah_bangunan][0][nilai][letak_lokasi]', [
								'sama_dari_alan'			=> 'Sama dari Jalan',
								'lebih_rendah_dari_jalan'	=> 'Lebih Rendah dari Jalan',
								'lebih_tinggi_dari_jalan'	=> 'Lebih Tinggi dari Jalan',
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['letak_lokasi'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- Lingkungan --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Lingkungan</label>
							{!! Form::select('jaminan[tanah_bangunan][0][nilai][lingkungan]', [
								'perumahan'			=> 'Perumahan',
								'kampung'			=> 'Kampung',
								'pertokoan/pasar'	=> 'Pertokoan/Pasar',
								'perkantoran'		=> 'Perkantoran',
								'industri'			=> 'Industri',
								'lainnya'			=> 'Lainnya',
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['lingkungan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- Asuransi --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Asuransi</label>
							{!! Form::select('jaminan[tanah_bangunan][0][nilai][asuransi]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada',
							], $page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['asuransi'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Harga NJOP --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Harga NJOP</label>
							{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_njop]", (page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['harga_njop']) , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga NJOP']) !!}
						</div>
					</div>
				</fieldset>					

				{{-- Harga Tanah --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Harga Tanah</label>
							{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_tanah]", (page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['harga_tanah']) , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga Tanah']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- Harga Bangunan --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Harga Bangunan</label>
							{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_bangunan]", (page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['harga_bangunan']) , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga Bangunan']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- Harga Tanah & Bangunan --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Harga Tanah & Bangunan</label>
							{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_tanah_bangunan]", (page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['harga_tanah_bangunan']) , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga Tanah & Bangunan']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- Harga taksasi --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Harga Taksasi</label>
							{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_taksasi]", (page_datas->credit['kreditur']['jaminan'][tanah_bangunan][0]['nilai']['harga_taksasi']) , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga Taksasi']) !!}
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