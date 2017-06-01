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
				<a href="#" data-url="{{ route('credit.print', ['mode' => 'survei', 'id' => $page_datas->credit['id']]) }}" class="btn p-r-sm p-l-none primary btn-print hidden-xs hidden-sm">
					<i class="fa fa-print" aria-hidden="true"></i> Print
				</a>
				<a href="{{ route('credit.status', ['id' => $page_datas->credit['id'], 'status' => 'tolak']) }}" class="btn p-r-sm p-l-sm danger">
					<i class="fa fa-times" aria-hidden="true"></i> Tolak
				</a>
				<a href="{{ route('credit.status', ['id' => $page_datas->credit['id'], 'status' => $page_datas->credit['status_berikutnya']]) }}" class="btn p-r-none p-l-sm success">
					<i class="fa fa-check" aria-hidden="true"></i> Setujui Persetujuan
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-12 " style="background-color: white;">
		<div class="row">
			<div class="col-sm-12 p-l-none p-r-none">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#data-nasabah" data-toggle="tab" role="tab">Data Nasabah</a></li>
					<li role="presentation"><a href="#data-kepribadian" data-toggle="tab" role="tab">Data Kepribadian</a></li>
					<li role="presentation"><a href="#data-aset" data-toggle="tab" role="tab">Data Aset</a></li>
					<li role="presentation"><a href="#data-jaminan" data-toggle="tab" role="tab">Data Jaminan</a></li>
					<li role="presentation"><a href="#data-rekening" data-toggle="tab" role="tab">Data Rekening</a></li>
					<li role="presentation"><a href="#data-keuangan" data-toggle="tab" role="tab">Data Keuangan</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>