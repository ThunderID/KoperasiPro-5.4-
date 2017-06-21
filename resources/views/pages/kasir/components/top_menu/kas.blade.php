<div class="row p-r-none p-b-none">
	<div class="col-md-12 hidden-md hidden-lg" style="background-color: white; height: 37px;  border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-12">
				<p class="text-muted p-t-sm">
					<span class="p-r-xs"><i class="fa fa-file-o"></i> &nbsp;</span>-<span class="p-l-xs"></span>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 " style="background-color: white; height: 42px; border-bottom: 1px solid #e6e8e6;">
		<div class="row">
			<div class="col-xs-5 col-sm-6  hidden-md hidden-lg">
				<a href="{{ route('kasir.kas.index') }}" class="btn primary p-r-sm p-l-none">
					<i class="fa fa-chevron-left"></i> Kembali
				</a>
			</div>
			<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
				<p class="text-muted text-lg p-t-sm">
					<i class="fa fa-file-o"></i>  {{ (isset($page_datas->cash['id']) && !empty($page_datas->cash['id'])) ? $page_datas->cash['nomor_transaksi'] : '-' }}
				</p>
			</div>
			<div class="col-xs-7 col-sm-6 col-md-6 col-lg-6 text-right">
				{{-- <a href="#" data-url="{{ route('kasir.kas.index', ['mode' => 'pengajuan', 'id' => $page_datas->cash['id']]) }}" class="btn p-r-sm p-l-none primary btn-print hidden-xs hidden-sm">
					<i class="fa fa-print" aria-hidden="true"></i> Print
				</a>	 --}}
				<a href="{{ route('credit.status', ['id' => $page_datas->cash['pengajuan']['id'], 'status' => 'terealisasi']) }}" class="btn p-r-sm p-l-none success hidden-xs hidden-sm">
					<i class="fa fa-check" aria-hidden="true"></i> Konfirmasi
				</a>	
			</div>
		</div>
	</div>
</div>