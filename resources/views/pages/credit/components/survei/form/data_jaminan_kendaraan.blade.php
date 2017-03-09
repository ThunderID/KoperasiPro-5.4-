{!! Form::open(['url' => route('survey.store'), 'class' => '']) !!}

	<div class="row">

		{{ Form::hidden('id', $page_datas->credit->credit->id) }}

		<div class="tab-content clearfix">
		  	<div class="tab-pane">

				<div class="m-t-none m-b-md">
					<h4 class="m-t-none m-b-xs">KENDARAAN</h4>
				</div>

				{{-- Merk --}}
				<fieldset class="form-group">
					<label for="">Merk</label>
					<div class="row">

						<div class="col-md-12">
							{!! Form::text('jaminan[kendaraan][0][merk]',  $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['merk'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Merk Kendaraan']) !!}
						</div>

					</div>
				</fieldset>	

				{{-- Jenis, Warna, Tahun kendaraan --}}
				<fieldset class="form-group">
					<div class="row">

						<div class="col-md-5">
							<div class="input-group">
								<label for="">Jenis</label>
								{!! Form::text('jaminan[kendaraan][0][jenis]',  $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['jenis'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Jenis Kendaraan']) !!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<label for="">Warna</label>
								{!! Form::text('jaminan[kendaraan][0][warna]',  $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['warna'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Warna Kendaraan']) !!}
							</div>
						</div>

						<div class="col-md-3">
							<div class="input-group">
								<label for="">Tahun Kendaraan</label>
								{!! Form::number('jaminan[kendaraan][0][tahun]',  $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['tahun'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Tahun Kendaraan', 'min' => '1900']) !!}
							</div>
						</div>
						
					</div>
				</fieldset>			

	
				{{-- Nopol, Atas nama --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-4">
							<div class="input-group">
								<label for="">Nomor Polisi</label>
								{!! Form::text('jaminan[kendaraan][0][legal][atas_nama]',  $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['atas_nama'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nomor Polisi']) !!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group">
								<label for="">Atas Nama</label>
								{!! Form::text('jaminan[kendaraan][0][legal][atas_nama]',  $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['atas_nama'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Atas Nama']) !!}
							</div>
						</div>
					</div>
				</fieldset>		

				{{-- Nomor BPKB --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Nomor BPKB</label>
							{!! Form::text(jaminan[kendaraan][0][legal][no_bpkb]', $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['no_bpkb'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nomor BPKB']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Nomor Mesin --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Nomor Mesin</label>
							{!! Form::text(jaminan[kendaraan][0][legal][no_mesin]', $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['no_mesin'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nomor Mesin']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Nomor Rangka --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Nomor Rangka</label>
							{!! Form::text(jaminan[kendaraan][0][legal][no_rangka]', $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['no_rangka'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Nomor Rangka']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Masa Berlaku STNK --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Berlaku Hingga</label>
							{!! Form::text('jaminan[kendaraan][0][legal][masa_berlaku_stnk]', $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['masa_berlaku_stnk'], ['class' => 'form-control date mask-date-format auto-tabindex', 'placeholder' => 'Ex. 19/03/1987']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Faktur --}}
				<fieldset class="form-group">
					<label for="">Faktur Kendaraan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[kendaraan][0][legal][faktur]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada'
							], $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['faktur'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- Kuitansi Jual Beli Kendaraan --}}
				<fieldset class="form-group">
					<label for="">Kuitansi Jual Beli Kendaraan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[kendaraan][0][legal][kuitansi_jual_beli]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada'
							], $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['kuitansi_jual_beli'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>									

				{{-- Kuitansi Kosong BPKB --}}
				<fieldset class="form-group">
					<label for="">Kuitansi Kosong BPKB</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[kendaraan][0][legal][kuitansi_kosong_bpkb]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada'
							], $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['kuitansi_kosong_bpkb'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>		

				{{-- KTP BPKB --}}
				<fieldset class="form-group">
					<label for="">KTP Atas Nama BPKB</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[kendaraan][0][legal][ktp_bpkb]', [
								'ada'					=> 'Ada',
								'tidak_ada'				=> 'Tidak Ada'
							], $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['ktp_bpkb'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- Status Kepemilikan --}}
				<fieldset class="form-group">
					<label for="">Status Kepemilikan</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[kendaraan][0][legal][status_kepemilikan]', [
								'a/n_sendiri'						=> 'a/n Sendiri',
								'a/n_orang_lain_milik_sendiri'		=> 'a/n Orang Lain Milik Sendiri',
								'a/n_orang_lain_dengan_surat_kuasa'	=> 'a/n Orang Lain Dengan Surat Kuasa',
							], $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['legal']['status_kepemilikan'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>									

				{{-- Fungsi --}}
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label for="">Fungsi Sehari-hari</label>
							{!! Form::text(jaminan[kendaraan][0][nilai][fungsi]', $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['nilai']['fungsi'], ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Fungsi Sehari-hari']) !!}
						</div>
					</div>
				</fieldset>

				{{-- Kondisi --}}
				<fieldset class="form-group">
					<label for="">Kondisi</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[kendaraan][0][nilai][kondisi]', [
								'baik'					=> 'baik',
								'cukup_baik'			=> 'Cukup Baik',
								buruk'					=> 'Buruk'
							], $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['nilai']['kondisi'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>	

				{{-- Asuransi --}}
				<fieldset class="form-group">
					<label for="">Asuransi</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('jaminan[kendaraan][0][nilai][suransi]', [
								'all_risk'				=> 'All Risk',
								'tlo'					=> 'TLO',
								'tidak_ada'				=> 'Tidak Ada',
							], $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['nilai']['suransi'], ['class' => 'form-control quick-select']) !!}
						</div>
					</div>
				</fieldset>			

				{{-- Nilai Taksasi --}}
				<fieldset class="form-group">
					<label for="">Nilai Taksasi</label>
					<div class="row">
						<div class="col-md-5">
							<div class="input-group">
								{!! Form::number('jaminan[kendaraan][0][nilai][harga_taksasi]', $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['nilai']['harga_taksasi'], ['class' => 'form-control number auto-tabindex', 'placeholder' => '% taksasi', 'min' => '1']) !!}
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

				{{-- Nilai Bank --}}
				<fieldset class="form-group">
					<label for="">Nilai Bank</label>
					<div class="row">
						<div class="col-md-5">
							<div class="input-group">
								{!! Form::number('jaminan[kendaraan][0][nilai][harga_bank]', $page_datas->credit['kreditur']['jaminan'][kendaraan][0]['nilai']['harga_bank'], ['class' => 'form-control number auto-tabindex', 'placeholder' => '% bank', 'min' => '1']) !!}
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

	<div class="modal-footer">
		<a type='button' class="btn btn-default" data-dismiss='modal'>
			Cancel
		</a>
		<button type="submit" class="btn btn-success">
			Save
		</button>
	</div>		
{!! Form::close() !!}