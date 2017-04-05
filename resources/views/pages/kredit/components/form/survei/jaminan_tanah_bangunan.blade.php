<fieldset class="form-group">
	<label for="">Tipe</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::select('jaminan_tanah_bangunan[][tipe]', [
					'bangunan'	=> 'Bangunan',
					'tanah'		=> 'Tanah',
				], 'bangunan', ['class' => 'form-control quick-select auto-tabindex', 'data-other' => 'input-tipe-jaminan-tanah-bangunan']) !!}
			{!! Form::hidden('jaminan_tanah_bangunan[][tipe]', 'bangunan', ['class' => 'input-tipe-jaminan-tanah-bangunan input-tanah-bangunan', 'data-field' => 'tipe']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jenis Sertifikat</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::select('jaminan_tanah_bangunan[][jenis_sertifikat]', [
					'hgb'	=> 'Hak Guna Bangunan (HGB)',
					'shm'	=> 'Sertifikat Hak Milik (SHM)',
				], 'hgb', ['class' => 'form-control quick-select auto-tabindex']) !!}
			{!! Form::hidden('jaminan_tanah_bangunan[][jenis_sertifikat]', 'hgb', ['class' => 'input-tipe-jaminan-tanah-bangunan input-tanah-bangunan', 'data-field' => 'jenis_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">No. Sertifikat</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('jaminan_tanah_bangunan[][nomor_sertifikat]', null, ['class' => 'form-control auto-tabindex mask-no-sertifikat input-tanah-bangunan', 'placeholder' => 'Nomor Sertifikat', 'data-field' => 'nomor_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Masa Berlaku</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('jaminan_tanah_bangunan[][masa_berlaku_sertifikat]', null, ['class' => 'form-control auto-tabindex mask-year input-tanah-bangunan', 'placeholder' => 'Masa Berlaku', 'data-field' => 'masa_berlaku_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Atas Nama</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::text('jaminan_tanah_bangunan[][atas_nama]', null, ['class' => 'form-control auto-tabindex input-tanah-bangunan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
		</div>
	</div>
</fieldset>

@include('components.helpers.forms.address', [
	'param'		=> ['prefix'	=> 'jaminan_tanah_bangunan[]'],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'						=> 'input-tanah-bangunan'
	]
])

<fieldset class="form-group">
	<label for="">Luas Tanah</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[][luas_tanah]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[][luas_bangunan]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Fungsi Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][fungsi_bangunan]', [
				'ruko'		=> 'Ruko',
				'rumah'		=> 'Rumah',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Bentuk Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][bentuk_bangunan]', [
				'tingkat'			=> 'Tingkat',
				'tidak_tingkat'		=> 'Tidak tingkat',
				'00000'				=> 'Lainnya',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Konstruksi Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][konstruksi_bangunan]', [
				'permanen' 			=> 'Permanen',
				'semi_permanen'		=> 'Semi Permanen',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lantai Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][lantai_bangunan]', [
				'keramik'		=> 'Keramik',
				'tanah'			=> 'Tanah',
				'tegel'			=> 'Tegel',
				'Ubin'			=> 'Ubin',
				'00000'			=> 'Lainnya',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Dinding Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][dinding]', [
				'bambu'		=> 'Bambu',
				'kayu'		=> 'Kayu',
				'tembok'	=> 'Tembok',
				'00000'		=> 'Lainnya',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Listrik</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][listrik]', [
				'450_watt'		=> '450 Watt',
				'900_watt'		=> '900 Watt',
				'1300_watt'		=> '1300 Watt',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Air</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][air]', [
				'pdam'		=> 'PDAM',
				'sumur'		=> 'Sumur',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][jalan]', [
				'aspal'		=> 'Aspal',
				'batu'		=> 'Batu',
				'tanah'		=> 'Tanah',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lebar Jalan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[][luas_bangunan]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Letak Lokasi Terhadap Jalan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][letak_lokasi_terhadap_jalan]', [
				'lebih_rendah_dari_jalan'		=> 'Lebih Rendah Dari Jalan',
				'lebih_tinggi_dari_jalan'		=> 'Lebih Tinggi Dari Jalan',
				'sama_dengan_jalan'				=> 'Sama Dengan Jalan',
				'00000'							=> 'Lainnya',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lingkungan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[][lingkungan]', [
				'industri'		=> 'Industri',
				'kampung'		=> 'Kampung',
				'pasar'			=> 'Pasar',
				'perkantoran'	=> 'Perkantoran',
				'pertokoan'		=> 'Pertokoan',
				'perumahan'		=> 'Perumahan',
				'00000'			=> 'Lainnya',
			], null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nilai Jaminan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[][nilai_jaminan]', null, ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Taksasi Tanah</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[][taksasi_tanah]', null, ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Taksasi Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[][taksasi_bangunan]', null, ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Njop</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[][njop]', null, ['class' => 'form-control mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Uraian</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[][uraian]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>