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
						<li role="presentation" class="active list-item"><a href="#data-kredit" data-toggle="tab" role="tab">Data Kredit</a></li>
						<li role="presentation" class="list-item"><a href="#data-nasabah" data-toggle="tab" role="tab">Data Nasabah</a></li>
						<li role="presentation" class="list-item"><a href="#data-kepribadian" data-toggle="tab" role="tab">Data Kepribadian</a></li>
						<li role="presentation" class="list-item"><a href="#data-keluarga" data-toggle="tab" role="tab">Data Keluarga</a></li>
						<li role="presentation" class="list-item"><a href="#data-aset" data-toggle="tab" role="tab">Data Aset</a></li>
						<li role="presentation" class="list-item"><a href="#data-jaminan" data-toggle="tab" role="tab">Data Jaminan</a></li>
						<li role="presentation" class="list-item"><a href="#data-rekening" data-toggle="tab" role="tab">Data Rekening</a></li>
						<li role="presentation" class="list-item"><a href="#data-keuangan" data-toggle="tab" role="tab">Data Keuangan</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>