{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	{{ Form::hidden('id', $id_kredit) }}

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
				], $tanah_bangunan['tipe_jaminan'], ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>

	{{-- Panjang Tanah, Lebar Tanah, Luas Tanah --}}
	<fieldset class="form-group">
		<div class="row">
			<div class="col-md-4">
				<label for="">Panjang Tanah</label>
				<div class="input-group">
					{!! Form::number('jaminan[tanah_bangunan][0][tanah][panjang]', $tanah_bangunan['tanah']['panjang'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Panjang tanah', 'min' => '1']) !!}

					<div class="input-group-addon">M</div>
				</div>
			</div>
			<div class="col-md-4">
				<label for="">Lebar Tanah</label>
				<div class="input-group">
					{!! Form::number('jaminan[tanah_bangunan][0][tanah][lebar]', $tanah_bangunan['tanah']['lebar'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Lebar Tanah', 'min' => '1']) !!}

					<div class="input-group-addon">M</div>
				</div>
			</div>
			<div class="col-md-4">
				<label for="">Luas Tanah</label>
				<div class="input-group">
					{!! Form::number('jaminan[tanah_bangunan][0][tanah][luas]', $tanah_bangunan['tanah']['luas'], ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Luas tanah', 'min' => '1']) !!}

					<div class="input-group-addon">M<sup>2</sup></div>
				</div>
			</div>										
		</div>										
	</fieldset>	

	{{-- Panjang Bangunan, Lebar Bangunan, Luas Bangunan --}}
	<fieldset class="form-group">
		<div class="row">
			<div class="col-md-4">
				<label for="">Panjang Bangunan</label>
				<div class="input-group">
					{!! Form::number('jaminan[tanah_bangunan][0][bangunan][panjang]', isset($tanah_bangunan['bangunan']['panjang']) ? $tanah_bangunan['bangunan']['panjang'] : '', ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Panjang Bangunan', 'min' => '1']) !!}

					<div class="input-group-addon">M</div>
				</div>
			</div>
			<div class="col-md-4">
				<label for="">Lebar Bangunan</label>
				<div class="input-group">
					{!! Form::number('jaminan[tanah_bangunan][0][bangunan][lebar]', isset($tanah_bangunan['bangunan']['lebar']) ? $tanah_bangunan['bangunan']['lebar'] : '', ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Lebar Bangunan', 'min' => '1']) !!}

					<div class="input-group-addon">M</div>
				</div>
			</div>
			<div class="col-md-4">
				<label for="">Luas Bangunan</label>
				<div class="input-group">
					{!! Form::number('jaminan[tanah_bangunan][0][bangunan][luas]', isset($tanah_bangunan['bangunan']['luas']) ? $tanah_bangunan['bangunan']['luas'] : '', ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Luas bangunan', 'min' => '1']) !!}

					<div class="input-group-addon">M<sup>2</sup></div>
				</div>
			</div>
		</div>
	</fieldset>									

	{{-- Bentuk Bangunan --}}
	<fieldset class="form-group">
		<label for="">Bentuk Bangunan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][bentuk_bangunan]', [
					'tingkat'			=> 'Tingkat',
					'tidak_tingkat'		=> 'Tidak tingkat',
					'lainnya'			=> 'Lainnya'
				], isset($tanah_bangunan['spesifikasi_bangunan']['bentuk_bangunan']) ? $tanah_bangunan['spesifikasi_bangunan']['bentuk_bangunan'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>

	{{-- Konstruksi Bangunan --}}
	<fieldset class="form-group">
		<label for="">Konstruksi Bangunan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][konstruksi_bangunan]', [
					'permanen'				=> 'Permanen',
					'semi_permanen'			=> 'Semi Permanen',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['spesifikasi_bangunan']['konstruksi_bangunan']) ? $tanah_bangunan['spesifikasi_bangunan']['konstruksi_bangunan'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>	

	{{-- lantai --}}
	<fieldset class="form-group">
		<label for="">Lantai</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][lantai]', [
					'keramik'				=> 'Keramik',
					'tegel_biasa'			=> 'Tegel Biasa',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['spesifikasi_bangunan']['lantai']) ? $tanah_bangunan['spesifikasi_bangunan']['lantai'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- Dinding --}}
	<fieldset class="form-group">
		<label for="">Dinding</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][dinding]', [
					'tembok'				=> 'Tembok',
					'semi_tembok'			=> 'Semi tembok',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['spesifikasi_bangunan']['dinding']) ? $tanah_bangunan['spesifikasi_bangunan']['dinding'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>	

	{{-- Listrik --}}
	<fieldset class="form-group">
		<label for="">Listrik</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][listrik]', [
					'450w'					=> '450W',
					'950w'					=> '950W',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['spesifikasi_bangunan']['listrik']) ? $tanah_bangunan['spesifikasi_bangunan']['listrik'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- Air --}}
	<fieldset class="form-group">
		<label for="">Air</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][air]', [
					'sumur'					=> 'Sumur',
					'pdam'					=> 'PDAM',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['spesifikasi_bangunan']['air']) ? $tanah_bangunan['spesifikasi_bangunan']['air'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>			

	{{-- Fungsi --}}
	<fieldset class="form-group">
		<label for="">Fungsi Bangunan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][spesifikasi_bangunan][fungsi]', [
					'rumah'					=> 'Rumah',
					'ruko/rukan'			=> 'Ruko/Rukan',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['spesifikasi_bangunan']['fungsi']) ? $tanah_bangunan['spesifikasi_bangunan']['fungsi'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- A/n Sertifikat --}}
	<fieldset class="form-group">
		<label for="">Atas Nama Sertifikat</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text('jaminan[tanah_bangunan][0][legal][atas_nama_sertifikat]',  isset($tanah_bangunan['legal']['atas_nama_sertifikat']) ? $tanah_bangunan['legal']['atas_nama_sertifikat'] : '', ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Atas Nama Sertifikat']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- Jenis Sertifikat --}}
	<fieldset class="form-group">
		<label for="">Jenis Sertifikat</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][legal][jenis_sertifikat]', [
					'shm'					=> 'SHM',
					'shgb'					=> 'SHGB',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['legal']['jenis_sertifikat']) ? $tanah_bangunan['legal']['jenis_sertifikat'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- Masa Berlaku Sertifikat --}}
	<fieldset class="form-group">
		<div class="col-md-12">
		<div class="row">
				<label for="">Masa Berlaku Sertifikat</label>
				{!! Form::text('jaminan[tanah_bangunan][0][legal][masa_berlaku_sertifikat]', isset($tanah_bangunan['legal']['masa_berlaku_sertifikat']) ? $tanah_bangunan['legal']['masa_berlaku_sertifikat'] : '', ['class' => 'form-control date date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
			</div>
		</div>
	</fieldset>						

	{{-- IMB --}}
	<fieldset class="form-group">
		<label for="">IMB</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][legal][imb]', [
					'ada'					=> 'Ada',
					'tidak_ada'				=> 'Tidak Ada',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['legal']['imb']) ? $tanah_bangunan['legal']['imb'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>	

	{{-- Akta Jual Beli --}}
	<fieldset class="form-group">
		<label for="">Akta Jual Beli</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][legal][akta_jual_beli]', [
					'ada'					=> 'Ada',
					'tidak_ada'				=> 'Tidak Ada',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['legal']['akta_jual_beli']) ? $tanah_bangunan['legal']['akta_jual_beli'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- PBB  Terakhir --}}
	<fieldset class="form-group">
		<label for="">PBB Terakhir</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][legal][pbb_terakhir]', [
					'ada'					=> 'Ada',
					'tidak_ada'				=> 'Tidak Ada',
					'lainnya'				=> 'Lainnya'
				], isset($tanah_bangunan['legal']['pbb_terakhir']) ? $tanah_bangunan['legal']['pbb_terakhir'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>

	{{-- Jalan --}}
	<fieldset class="form-group">
		<label for="">Akses Jalan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][nilai][jalan]', [
					'tanah'					=> 'Tanah',
					'batu'					=> 'Batu',
					'aspal'					=> 'Aspal',
				], isset($tanah_bangunan['nilai']['jalan']) ? $tanah_bangunan['nilai']['jalan'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>	

	{{-- Letak Lokasi --}}
	<fieldset class="form-group">
		<label for="">Letak Lokasi</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][nilai][letak_lokasi]', [
					'sama_dari_alan'			=> 'Sama dari Jalan',
					'lebih_rendah_dari_jalan'	=> 'Lebih Rendah dari Jalan',
					'lebih_tinggi_dari_jalan'	=> 'Lebih Tinggi dari Jalan',
				], isset($tanah_bangunan['nilai']['letak_lokasi']) ? $tanah_bangunan['nilai']['letak_lokasi'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- Lingkungan --}}
	<fieldset class="form-group">
		<label for="">Lingkungan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][nilai][lingkungan]', [
					'perumahan'			=> 'Perumahan',
					'kampung'			=> 'Kampung',
					'pertokoan/pasar'	=> 'Pertokoan/Pasar',
					'perkantoran'		=> 'Perkantoran',
					'industri'			=> 'Industri',
					'lainnya'			=> 'Lainnya',
				], isset($tanah_bangunan['nilai']['lingkungan']) ? $tanah_bangunan['nilai']['lingkungan'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>	

	{{-- Asuransi --}}
	<fieldset class="form-group">
		<label for="">Asuransi</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::select('jaminan[tanah_bangunan][0][nilai][asuransi]', [
					'ada'					=> 'Ada',
					'tidak_ada'				=> 'Tidak Ada',
				], isset($tanah_bangunan['nilai']['asuransi']) ? $tanah_bangunan['nilai']['asuransi'] : '', ['class' => 'form-control quick-select']) !!}
			</div>
		</div>
	</fieldset>

	{{-- Harga NJOP --}}
	<fieldset class="form-group">
		<label for="">Harga NJOP</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_njop]", isset($tanah_bangunan['nilai']['harga_njop']) ? $tanah_bangunan['nilai']['harga_njop'] : '' , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga NJOP']) !!}
			</div>
		</div>
	</fieldset>					

	{{-- Harga Tanah --}}
	<fieldset class="form-group">
		<label for="">Harga Tanah</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_tanah]", isset($tanah_bangunan['harga_tanah']) ? $tanah_bangunan['harga_tanah'] : '' , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga Tanah']) !!}
			</div>
		</div>
	</fieldset>	

	{{-- Harga Bangunan --}}
	<fieldset class="form-group">
		<label for="">Harga Bangunan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_bangunan]", isset($tanah_bangunan['harga_bangunan']) ? $tanah_bangunan['harga_bangunan'] : '' , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga Bangunan']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- Harga Tanah & Bangunan --}}
	<fieldset class="form-group">
		<label for="">Harga Tanah & Bangunan</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_tanah_bangunan]", isset($tanah_bangunan['harga_tanah_bangunan']) ? $tanah_bangunan['harga_tanah_bangunan'] : '' , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga Tanah & Bangunan']) !!}
			</div>
		</div>
	</fieldset>		

	{{-- Harga taksasi --}}
	<fieldset class="form-group">
		<label for="">Harga Taksasi</label>
		<div class="row">
			<div class="col-md-12">
				{!! Form::text("jaminan[tanah_bangunan][0][nilai][harga_taksasi]", isset($tanah_bangunan['harga_taksasi']) ? $tanah_bangunan['harga_taksasi'] : '' , ['class' => 'form-control required mask-money auto-tabindex', 'placeholder' => 'Harga Taksasi']) !!}
			</div>
		</div>
	</fieldset>												

	<div class="modal-footer">
		<a type='button' class="btn btn-default" data-dismiss='modal'>
			Cancel
		</a>
		<button type="submit" class="btn btn-success">
			Simpan
		</button>
	</div>		
{!! Form::close() !!}