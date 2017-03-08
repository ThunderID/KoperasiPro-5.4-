{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#jaminan-kendaraan" data-toggle="tab">Kendaraan</a></li>
				<li><a href="#jaminan-tnb" data-toggle="tab">Tanah & Bangunan</a></li>
			</ul>
		</div>

		<div class="col-md-9 p-l-none">
		
			{{ Form::hidden('id', $page_datas->credit->credit->id) }}

			<div class="tab-content clearfix">
			  	<div class="tab-pane active" id="jaminan-kendaraan">

					<div class="m-t-none m-b-md">
						<h4 class="m-t-none m-b-xs">KENDARAAN</h4>
					</div>

					<fieldset class="form-group">
						<label for="">Merk</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][merk]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Merk']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Jenis</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][type]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'tipe']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nomor Polisi</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][police_number]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'nomor polisi']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Warna</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][color]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'warna']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Tahun</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][year]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'tahun']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nama</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][name]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'nama']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Alamat</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][address]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'alamat']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nomor BPKB</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][bpkb_number]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'nomor BPKB']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nomor Mesin</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][machine_number]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'nomor Mesin']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nomor Rangka</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][frame_number]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'nomor rangka']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Berlaku Hingga</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('asset[vehicles][0][valid_until]', null, ['class' => 'form-control date date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Fungsi Sehari - hari</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][functions]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'fungsi sehari - hari']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Faktur</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[vehicles][0][invoice]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select vehicle-invoice']) !!}
							</div>
						</div>
					</fieldset>		

					<fieldset class="form-group">
						<label for="">Kwitansi Jual Beli</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[vehicles][0][purchase_memo]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select vehicle-purchase_memo']) !!}
							</div>
						</div>
					</fieldset>		

					<fieldset class="form-group">
						<label for="">Kwitansi Kosong a/n BPKB</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[vehicles][0][memo]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select vehicle-memo']) !!}
							</div>
						</div>
					</fieldset>	

					<fieldset class="form-group">
						<label for="">KTP a/n BPKB</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[vehicles][0][valid_ktp]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select vehicle-valid_ktp']) !!}
							</div>
						</div>
					</fieldset>	

					<fieldset class="form-group">
						<label for="">Kondisi Kendaraan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[vehicles][0][physical_condition]', [
									'baik'			=> 'baik',
									'cukup_baik'	=> 'cukup baik',
									'buruk'			=> 'buruk'
								], 'baik', ['class' => 'form-control quick-select vehicle-physical_condition']) !!}
							</div>
						</div>
					</fieldset>	

					<fieldset class="form-group">
						<label for="">Status Kepemilikan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[vehicles][0][ownership_status]', [
									'sendiri'							=> 'a/n sendiri',
									'orang_lain_milik_sendiri'			=> 'a/n orang lain milik sendiri',
									'orang_lain_dengan_surat_kuasa'		=> 'a/n orang lain dengan surat kuasa'
								], 'sendiri', ['class' => 'form-control quick-select vehicles-ownership_status']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Asuransi</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[vehicles][0][insurance]', [
									'all_risk'		=> 'All Risk',
									'tlo'			=> 'TLO',
									'tidak_ada'		=> 'tidak ada'
								], 'all_risk', ['class' => 'form-control quick-select vehicle-insurance']) !!}
							</div>
						</div>
					</fieldset>	

					<fieldset class="form-group">
						<label for="">Harga Pasar</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[vehicles][0][market_value]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'harga pasar']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai Taksasi</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[vehicles][0][assessed]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => '% taksasi', 'min' => '1', 'max' => '99']) !!}
									<div class="input-group-addon">%</div>
								</div>
							</div>
							<div class="col-md-4">
								* harga pasar = 
							</div>
							<div class="col-md-3">
								<div class="input-group">
									{!! Form::label('0')!!}
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai Bank</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[vehicles][0][bank]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => '% bank', 'min' => '1', 'max' => '99']) !!}
									<div class="input-group-addon">%</div>
								</div>
							</div>
							<div class="col-md-4">
								* harga pasar = 
							</div>
							<div class="col-md-3">
								<div class="input-group">
									{!! Form::label('0')!!}
								</div>
							</div>
						</div>
					</fieldset>
			  	</div>

			  	<div class="tab-pane" id="jaminan-tnb">

					<div class="m-t-none m-b-md">
						<h4 class="m-t-none m-b-xs">TANAH</h4>
					</div>

					<fieldset class="form-group">
						<label for="">Atas Nama Sertifikat</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[lands][0][name]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Alamat</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::textarea('collateral[lands][0][address]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Alamat']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Jenis Sertifikat Tanah</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[lands][0][certification]', [
									'hm'		=> 'HM',
									'hgb'		=> 'HGB'
								], 'milik_sendiri', ['class' => 'form-control quick-select lands-certification']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Luas Tanah</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[lands][0][surface_area]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Luas', 'min' => '1', 'max' => '50']) !!}
									<div class="input-group-addon">m2</div>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Jalan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[lands][0][road]', [
									'tanah'		=> 'Tanah',
									'batu'		=> 'Batu',
									'aspal'		=> 'Aspal'
								], 'milik_sendiri', ['class' => 'form-control quick-select lands-road']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Lebar Jalan</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[lands][0][road_wide]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Lebar', 'min' => '1', 'max' => '50']) !!}
									<div class="input-group-addon">meter</div>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Letak Lokasi Terhadap Jalan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[lands][0][location_by_street]', [
									'sama'				=> 'sama',
									'lebih_rendah'		=> 'lebih rendah',
									'lebih_tinggi'		=> 'lebih tinggi'
								], 'milik_sendiri', ['class' => 'form-control quick-select lands-location_by_street']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Lingkungan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[lands][0][environment]', [
									'perumahan'		=> 'Perumahan',
									'perkantoran'	=> 'Perkantoran',
									'kampung'		=> 'Kampung',
									'pertokoan'		=> 'Pertokoan',
									'pasar'			=> 'Pasar',
									'industri'		=> 'Ondustri'
								], 'milik_sendiri', ['class' => 'form-control quick-select lands-environment']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Akta Jual/Beli</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[lands][0][deed]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select lands-deed']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">PBB Terakhir</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[lands][0][lastest_pbb]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select lands-lastest_pbb']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Asuransi</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[lands][0][insurance]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select lands-insurance']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai PBB (NJOB)</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[lands][0][pbb_value]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'nilai pbb']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Harga Likuidasi</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[lands][0][liquidation_value]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'harga likuidasi']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai Tanah</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[lands][0][land_value]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'nilai tanah']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai Taksasi</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[lands][0][assessed]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => '% taksasi', 'min' => '1', 'max' => '99']) !!}
									<div class="input-group-addon">%</div>
								</div>
							</div>
							<div class="col-md-4">
								* harga pasar = 
							</div>
							<div class="col-md-3">
								<div class="input-group">
									{!! Form::label('0')!!}
								</div>
							</div>
						</div>
					</fieldset>

			  	</div>
			  	<div class="tab-pane" id="jaminan-bangunan">

					<div class="m-t-none m-b-md">
						<h4 class="m-t-none m-b-xs">BANGUNAN</h4>
					</div>

					<fieldset class="form-group">
						<label for="">Atas Nama Sertifikat</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[buildings][0][name]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nama']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Alamat</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::textarea('collateral[buildings][0][address]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Alamat']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Jenis Sertifikat Tanah</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][certification]', [
									'hm'		=> 'HM',
									'hgb'		=> 'HGB'
								], 'milik_sendiri', ['class' => 'form-control quick-select buildings-certification']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Luas Tanah</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[buildings][0][surface_area]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Luas', 'min' => '1', 'max' => '50']) !!}
									<div class="input-group-addon">m2</div>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Luas Bangunan</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[buildings][0][building_area]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Luas', 'min' => '1', 'max' => '50']) !!}
									<div class="input-group-addon">m2</div>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Fungsi Bangunan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][building_function]', [
									'rumah'		=> 'Rumah',
									'ruko'		=> 'Ruko',
									'rukan'		=> 'Rukan'
								], 'rumah', ['class' => 'form-control quick-select buildings-building_function']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Bentuk Bangunan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][building_shape]', [
									'tingkat'		=> 'Tingkat',
									'tidak_tingkat'	=> 'Tidak Tingkat'
								], 'tingkat', ['class' => 'form-control quick-select buildings-building_shape']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Konstruksi Bangunan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][building_construction]', [
									'permanent'			=> 'Permanen',
									'semi_permanent'	=> 'Semi Permanen'
								], 'permanent', ['class' => 'form-control quick-select buildings-building_construction']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Lantai Bangunan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][floor]', [
									'keramik'		=> 'Keramik',
									'tegel_biasa'	=> 'Tegel Biasa'
								], 'keramik', ['class' => 'form-control quick-select buildings-floor']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Dinding</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][wall]', [
									'tembok'		=> 'Tembok',
									'semi_tembok'	=> 'Semi Tembok'
								], 'tembok', ['class' => 'form-control quick-select buildings-wall']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Listrik</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][electricity]', [
									'450_watt'		=> '450 Watt',
									'900_watt'		=> '900 Watt'
								], '450_watt', ['class' => 'form-control quick-select buildings-electricity']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Air</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][water]', [
									'pdam'		=> 'PDAM',
									'sumur'		=> 'Sumur'
								], 'pdam', ['class' => 'form-control quick-select buildings-water']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Telepon</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][telephone]', [
									1		=> 'Ada',
									0		=> 'Tidak ada'
								], 1, ['class' => 'form-control quick-select buildings-telephone']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">AC</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][air_conditioner]', [
									1		=> 'Ada',
									0		=> 'Tidak ada'
								], 1, ['class' => 'form-control quick-select buildings-air_conditioner']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Lainnya</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[buildings][0][others]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Lainnya']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Jalan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][road]', [
									'tanah'		=> 'Tanah',
									'batu'		=> 'Batu',
									'aspal'		=> 'Aspal'
								], 'milik_sendiri', ['class' => 'form-control quick-select lands-road']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Lebar Jalan</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[buildings][0][road_wide]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => 'Lebar', 'min' => '1', 'max' => '50']) !!}
									<div class="input-group-addon">meter</div>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Letak Lokasi Terhadap Jalan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][location_by_street]', [
									'sama'				=> 'sama',
									'lebih_rendah'		=> 'lebih rendah',
									'lebih_tinggi'		=> 'lebih tinggi'
								], 'milik_sendiri', ['class' => 'form-control quick-select lands-location_by_street']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Lingkungan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][environment]', [
									'perumahan'		=> 'Perumahan',
									'perkantoran'	=> 'Perkantoran',
									'kampung'		=> 'Kampung',
									'pertokoan'		=> 'Pertokoan',
									'pasar'			=> 'Pasar',
									'industri'		=> 'Ondustri'
								], 'milik_sendiri', ['class' => 'form-control quick-select lands-environment']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Akta Jual/Beli</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][deed]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select lands-deed']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">PBB Terakhir</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][lastest_pbb]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select lands-lastest_pbb']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Asuransi</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::select('collateral[buildings][0][insurance]', [
									1	=> 'ada',
									0	=> 'tidak ada',
								], 1, ['class' => 'form-control quick-select lands-insurance']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai PBB (NJOB)</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[buildings][0][pbb_value]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'nilai pbb']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Harga Likuidasi</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[buildings][0][liquidation_value]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'harga likuidasi']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai Tanah</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[buildings][0][land_value]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'nilai tanah']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai Bangunan</label>
						<div class="row">
							<div class="col-md-12">
								{!! Form::text('collateral[buildings][0][building_value]', null, ['class' => 'form-control required money auto-tabindex', 'placeholder' => 'nilai bangunan']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label for="">Nilai Taksasi</label>
						<div class="row">
							<div class="col-md-5">
								<div class="input-group">
									{!! Form::number('collateral[buildings][0][assessed]', null, ['class' => 'form-control number auto-tabindex', 'placeholder' => '% taksasi', 'min' => '1', 'max' => '99']) !!}
									<div class="input-group-addon">%</div>
								</div>
							</div>
							<div class="col-md-4">
								* harga pasar = 
							</div>
							<div class="col-md-3">
								<div class="input-group">
									{!! Form::label('0')!!}
								</div>
							</div>
						</div>
					</fieldset>

				</div>
			</div>

		</div>
	</div>

	<div class="modal-footer">
		<a type='button' class="btn btn-default" data-dismiss='modal'>
			Cancel
		</a>
		<button type="submit" class="btn btn-success">
			Save
		</button>
	</div>		
{!! Form::close() !!}