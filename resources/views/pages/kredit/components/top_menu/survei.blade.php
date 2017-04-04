<div class="row p-r-none p-b-none">
	<div class="col-md-12 " style="background-color: white; height: 37px;    border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-6 col-sm-6 hidden-md hidden-lg">
				<a href="{{ route('credit.index') }}" class="btn primary p-r-sm p-l-none">
					<i class="fa fa-chevron-left"></i> Kembali
				</a>
				<p style="">{{ $page_datas->credit['kreditur']['nama'] }}</p>
			</div>
			<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
				<p class="text-muted p-t-sm">
					<span class="p-r-sm"><i class="fa fa-id-card-o"></i> {{ $page_datas->credit['kreditur']['nama'] }}</span>-
					<span class="p-l-sm">{{ $page_datas->credit['kreditur']['nik'] }}</span>
				</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
				<a href="#" data-url="{{ route('credit.print', ['mode' => 'permohonan', 'id' => $page_datas->credit['id']]) }}" class="btn p-r-sm p-l-none primary btn-print">
					<i class="fa fa-print" aria-hidden="true"></i> Print
				</a>
				<a href="{{ route('credit.status', ['id' => $page_datas->credit['id'], 'status' => 'tolak']) }}" class="btn p-r-sm p-l-sm danger">
					<i class="fa fa-times" aria-hidden="true"></i> Tolak
				</a>
				<a href="{{ route('credit.status', ['id' => $page_datas->credit['id'], 'status' => $page_datas->credit['status_berikutnya']])
				 }}" class="btn p-r-none p-l-sm success">
					<i class="fa fa-check" aria-hidden="true"></i> Setujui
				</a>
			</div>
		</div>
	</div>
</div>