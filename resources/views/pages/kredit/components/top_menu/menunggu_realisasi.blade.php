<div class="row p-r-none p-b-none">
	<div class="col-md-12 hidden-md hidden-lg" style="background-color: white; height: 37px; border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-12">
				<p class="text-muted p-t-sm ">
					<span class="p-r-xs"><i class="fa fa-id-card-o"></i> &nbsp; {{ $page_datas->credit['kreditur']['nama'] }}</span>-<span class="p-l-xs">{{ $page_datas->credit['kreditur']['nik'] }}</span>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 " style="background-color: white; height: 42px; border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-5 col-sm-6 hidden-md hidden-lg">
				<a href="{{ route('credit.index') }}" class="btn primary p-r-sm p-l-none">
					<i class="fa fa-chevron-left"></i> Kembali
				</a>
			</div>
			<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
				<p class="text-muted p-t-sm text-lg">
					<span class="p-r-xs"><i class="fa fa-id-card-o"></i> {{ $page_datas->credit['kreditur']['nama'] }}</span>-
					<span class="p-l-xs">{{ $page_datas->credit['kreditur']['nik'] }}</span>
				</p>
			</div>
			<div class="col-xs-7 col-sm-6 col-md-6 col-lg-6 text-right">
				{{-- <a href="#" data-toggle="modal" data-target="#modal-riwayat-note" class="btn p-r-sm p-l-sm">
					<i class="fa fa-info-circle"></i> Riwayat Note
				</a> --}}
				{{-- <a href="#" data-url="{{ route('credit.print', ['mode' => 'survei', 'id' => $page_datas->credit['id']]) }}" class="btn p-r-sm p-l-none primary btn-print hidden-xs hidden-sm">
				<!-- <a href="#" data-toggle="modal" data-target="#modal-riwayat-note" class="btn p-r-sm p-l-sm">
					<i class="fa fa-info-circle"></i> Riwayat Note
				</a> -->
				<a href="#" data-url="{{ route('creadit.print.realisasi', ['dokumen' => 'pernyataan_penjamin', 'id' => $page_datas->credit['id']]) }}" class="btn p-r-sm p-l-none primary btn-print hidden-xs hidden-sm">
					<i class="fa fa-print" aria-hidden="true"></i> Print
				</a> --}}
				{{-- <a href="#modal-tolak" data-toggle="modal" data-target="#modal-tolak" class="btn p-r-sm p-l-sm danger">
					<i class="fa fa-times" aria-hidden="true"></i> Tolak
				</a> --}}
				{{-- <a href="{{ route('kasir.realisasi.kredit') }}" class="btn p-r-none p-l-sm success">
					<i class="fa fa-eye" aria-hidden="true"></i> Realisasi Kredit
				</a> --}}
				{{-- <a href=""></a> --}}
				<a href="#modal-change-status" data-toggle="modal" data-target="#modal-change-status" class="btn p-r-none p-l-sm success">
					<i class="fa fa-check" aria-hidden="true"></i> Konfirmasi
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-12 " style="background-color: white;">
		<div class="row">
			<div class="col-sm-12 p-l-none p-r-none menu-tabs" style>
				<a href="#" class="arrow-left"><i class="fa fa-chevron-left"></i></a>
				<a href="#" class="arrow-right"><i class="fa fa-chevron-right"></i></a>
				<div class="lists">
					<ul class="nav nav-tabs tab-lists" role="tablist">
						<li role="presentation" class="active list-item">
							<a href="#data-kredit" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_kredit']) && ($page_datas->credit['kelengkapan_kredit'] == false)) title="Kelengkapan Data Kredit Belum Lengkap" @endif>
								Data Kredit @if (isset($page_datas->credit['kelengkapan_kredit']) && ($page_datas->credit['kelengkapan_kredit'] == false)) &nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> @endif
							</a>
						</li>
						<li role="presentation" class="list-item">
							<a href="#data-nasabah" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_nasabah']) && ($page_datas->credit['kelengkapan_nasabah'] == false)) title="Kelengkapan Data Nasabah Belum Lengkap" @endif>
								Data Nasabah @if (isset($page_datas->credit['kelengkapan_nasabah']) && ($page_datas->credit['kelengkapan_nasabah'] == false)) &nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> @endif
							</a>
						</li>
						<li role="presentation" class="list-item">
							<a href="#data-kepribadian" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_kepribadian']) && ($page_datas->credit['kelengkapan_kepribadian'] == false)) title="Kelengkapan Data Kepribadian Belum Lengkap" @endif>
								Data Kepribadian @if (isset($page_datas->credit['kelengkapan_kepribadian']) && ($page_datas->credit['kelengkapan_kepribadian'] == false)) &nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> @endif
							</a>
						</li>
						<li role="presentation" class="list-item">
							<a href="#data-keluarga" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_keluarga']) && ($page_datas->credit['kelengkapan_keluarga'] == false)) title="Kelengkapan Data Keluarga Belum Lengkap" @endif>
								Data Keluarga @if (isset($page_datas->credit['kelengkapan_keluarga']) && ($page_datas->credit['kelengkapan_keluarga'] == false)) &nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> @endif
							</a>
						</li>
						<li role="presentation" class="list-item">
							<a href="#data-aset" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_aset']) && ($page_datas->credit['kelengkapan_aset'] == false)) title="Kelengkapan Data Aset Belum Lengkap" @endif>
								Data Aset @if (isset($page_datas->credit['kelengkapan_aset']) && ($page_datas->credit['kelengkapan_aset'] == false)) &nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> @endif
							</a>
						</li>
						<li role="presentation" class="list-item">
							<a  href="#data-jaminan" data-placement="right" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_jaminan']) && ($page_datas->credit['kelengkapan_jaminan'] == false)) title="Kelengkapan Data Jaminan Belum Lengkap" @endif>
								Data Jaminan @if (isset($page_datas->credit['kelengkapan_jaminan']) && ($page_datas->credit['kelengkapan_jaminan'] == false)) &nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> @endif
							</a>
						</li>
						<li role="presentation" class="list-item">
							<a href="#data-rekening" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_rekening']) && ($page_datas->credit['kelengkapan_rekening'] == false)) title="Kelengkapan Data Rekening Belum Lengkap" @endif>
								Data Rekening @if (isset($page_datas->credit['kelengkapan_rekening']) && ($page_datas->credit['kelengkapan_rekening'] == false)) &nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> @endif
							</a>
						</li>
						<li role="presentation" class="list-item">
							<a href="#data-keuangan" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_keuangan']) && ($page_datas->credit['kelengkapan_keuangan'] == false)) title="Kelengkapan Data Keuangan Belum Lengkap" @endif>
								Data Keuangan @if (isset($page_datas->credit['kelengkapan_keuangan']) && ($page_datas->credit['kelengkapan_keuangan'] == false)) &nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> @endif
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

@section('page_modals')
	@component('components.modal', [
			'id'			=> 'modal-riwayat-note',
			'title'			=> 'Riwayat Note',
			'settings'		=> [
				'hide_buttons'	=> true
			]
		])
		<div class="row">
			<div class="col-md-12">
				<div class="form-group text-right">
					<a type="button" class="btn btn-default" data-dismiss="modal" no-data-pjax="">
						Tutup
					</a>
				</div>
			</div>
		</div>
	@endcomponent

	@component('components.modal', [
			'id'			=> 'modal-change-status',
			'title'			=> 'Setujui Kredit',
			'settings'		=> [
				'hide_buttons'	=> true
			]
		])
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['url' => route('credit.status', ['id' => $page_datas->credit['id'], 'status' => $page_datas->credit['status_berikutnya']]), 'class' => 'form', 'role' => 'form', 'autocomplete' => 'off', 'data-pjax' => 'true', 'data-ajax-submit' => 'true']) !!}
					<div class="form-group">
						<label for="password">Password</label>
						{!! Form::password('password', ['class' => 'form-control set-focus auto-tabindex', 'placeholder' => 'Masukkan Password Anda', 'required' => 'required']) !!}
					</div>
					<div class="form-group">
						<label for="notes">Catatan</label>
						{!! Form::textarea('notes', null, ['class' => 'form-control auto-tabindex', 'placeholder' => 'Masukan Catatan Tambahan']) !!}
					</div>
					<div class="form-group text-right">
						<a type="button" class="btn btn-default" data-dismiss="modal" no-data-pjax="">
							Batal
						</a>
						{!! Form::submit('Setujui', ['id' => 'btn-login', 'class' => 'btn btn-custom auto-tabindex']) !!}
					</div>
				{!! Form::close() !!}		
			</div>
		</div>

	@endcomponent


	@component('components.modal', [
			'id'			=> 'modal-tolak',
			'title'			=> 'Tolak Kredit',
			'settings'		=> [
				'hide_buttons'	=> true
			]
		])
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['url' => route('credit.status', ['id' => $page_datas->credit['id'], 'status' => 'tolak']), 'class' => 'form', 'role' => 'form', 'autocomplete' => 'off', 'data-pjax' => 'true', 'data-ajax-submit' => 'true']) !!}
					<div class="form-group">
						<label for="password">Password</label>
						{!! Form::password('password', ['class' => 'form-control set-focus auto-tabindex', 'placeholder' => 'Masukkan Password Anda', 'required' => 'required']) !!}
					</div>
					<div class="form-group">
						<label for="notes">Catatan</label>
						{!! Form::textarea('notes', null, ['class' => 'form-control auto-tabindex', 'placeholder' => 'Masukan Catatan Tambahan']) !!}
					</div>
					<div class="form-group text-right">
						<a type="button" class="btn btn-default" data-dismiss="modal" no-data-pjax="">
							Batal
						</a>
						{!! Form::submit('Tolak', ['class' => 'btn btn-danger auto-tabindex']) !!}
					</div>
				{!! Form::close() !!}		
			</div>
		</div>

	@endcomponent	
@append