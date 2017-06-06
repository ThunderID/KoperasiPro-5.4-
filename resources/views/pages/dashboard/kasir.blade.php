@extends('template.cms_template')

@section('dashboard')
	active in
@stop

@push('content')
	<div class="row field">
		<div class="col-sm-12">
			<h3>Dashboard</h3>
			<div class="clearfix">&nbsp;</div>
		</div>	
		<div class="col-sm-12 text-center">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#rekap" role="tab">Rekap</a>
				</li>			
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pemasukan" role="tab">Pemasukan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pengeluaran" role="tab">Pengeluaran</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#kas" role="tab">Laporan Kas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#calculator" role="tab">Calculator</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">

				<div class="tab-pane active" id="rekap" role="tabpanel">

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
								<div class="panel-body">								

									<div class="panel-title p-t-sm p-b-lg text-left" style="border-bottom: 1px solid #DDDDDD">
										Pemasukan<span class="pull-right">IDR 123.123</span>
									</div>

									<div class="panel-title p-t-lg p-b-lg text-left" style="border-bottom: 1px solid #DDDDDD">
										Pengeluaran<span class="pull-right">IDR 123.123</span>
									</div>

									<div class="panel-title p-t-lg p-b-md text-left" >
										Kas<span class="pull-right">IDR 123.123</span>
									</div>

								</div>
							</div>									
						</div>										
					</div>											

				</div>

				<div class="tab-pane" id="pemasukan" role="tabpanel">

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
								<div class="panel-body">
									<div class="panel-title p-t-sm p-b-lg text-left" style="border-bottom: 1px solid #DDDDDD">
										Pemasukan Hari Ini : {{ date("d/m/Y") }}
									</div>						
									<table class="table">
										<thead>
											<tr>
												<th class="text-left">Tanggal Transaksi</th>
												<th class="text-left">Nomor Kuitansi</th>
												<th class="text-right">Total</th>
												<th>&nbsp;</th>
											</tr>
										</thead>
										<tbody>

											{{-- Dummy --}}
											<tr>
												<td class="text-left">6/1/2017 12:00:10</td>
												<td class="text-left">01283718</td>
												<td class="text-right">IDR 1.200.000</td>
												<td>
													<a href="#" style="text-decoration: none;">
														Detail
													</a>
												</td>	
											</tr>

											{{--
											@forelse($page_datas as $key => $value)
												<tr>
												<td class="text-left"></td>
												<td class="text-left"></td>
												<td class="text-right"></td>
													<td>
														<a href="#" style="text-decoration: none;">
															Detail
														</a>
													</td>	
												</tr>
											@empty
												<tr>
													<td colspan="3" class="text-center"><i>Belum Ada</i></td>
												</tr>
											@endforelse
											--}}	

											<tr>
												<td colspan="2" class="text-right">Total Kas</td>
												<td class="text-right">IDR</td>
												<td class="text-right">&nbsp;</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="tab-pane" id="pengeluaran" role="tabpanel">
					
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
								<div class="panel-body">
									<div class="panel-title p-t-sm p-b-lg text-left" style="border-bottom: 1px solid #DDDDDD">
										Pengeluaran Hari Ini : {{ date("d/m/Y") }}
									</div>					
									<table class="table">
										<thead>
											<tr>
												<th class="text-left">Tanggal Transaksi</th>
												<th class="text-left">Nomor Kuitansi</th>
												<th class="text-right">Total</th>
												<th>&nbsp;</th>
											</tr>
										</thead>
										<tbody>

											{{-- Dummy --}}
											<tr>
												<td class="text-left">6/1/2017 14:00:10</td>
												<td class="text-left">91213718</td>
												<td class="text-right">IDR 1.100.000</td>
												<td>
													<a href="#" style="text-decoration: none;">
														Detail
													</a>
												</td>	
											</tr>

											{{--
											@forelse($page_datas as $key => $value)
												<tr>
												<td class="text-left"></td>
												<td class="text-left"></td>
												<td class="text-right"></td>
													<td>
														<a href="#" style="text-decoration: none;">
															Detail
														</a>
													</td>	
												</tr>
											@empty
												<tr>
													<td colspan="3" class="text-center"><i>Belum Ada</i></td>
												</tr>
											@endforelse
											--}}	

											<tr>
												<td colspan="2" class="text-right">Total Kas</td>
												<td class="text-right">IDR</td>
												<td class="text-right">&nbsp;</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>					

				</div>

				<div class="tab-pane" id="kas" role="tabpanel">

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
								<div class="panel-body">	
									<div class="panel-title p-t-sm p-b-lg text-left" style="border-bottom: 1px solid #DDDDDD">
										Laporan Kas Hari Ini : {{ date("d/m/Y") }}
									</div>														
									<table class="table">
										<thead>
											<tr>
												<th class="text-left">Tanggal Transaksi</th>
												<th class="text-left">Nomor Kuitansi</th>
												<th class="text-left">Tipe</th>
												<th class="text-right">Total</th>
												<th>&nbsp;</th>
											</tr>
										</thead>
										<tbody>

											{{-- Dummy --}}
											<tr>
												<td class="text-left">6/1/2017 12:00:10</td>
												<td class="text-left">01283718</td>
												<td class="text-left">Pemasukan</td>
												<td class="text-right">IDR 1.200.000</td>
												<td>
													<a href="#" style="text-decoration: none;">
														Detail
													</a>
												</td>	
											</tr>
											<tr>
												<td class="text-left">6/1/2017 14:00:10</td>
												<td class="text-left">91213718</td>
												<td class="text-left">Pengeluaran</td>
												<td class="text-right">IDR 1.100.000</td>
												<td>
													<a href="#" style="text-decoration: none;">
														Detail
													</a>
												</td>	
											</tr>

											{{--
											@forelse($page_datas as $key => $value)
												<tr>
												<td class="text-left"></td>
												<td class="text-left"></td>
												<td class="text-left"></td>
												<td class="text-right"></td>
													<td>
														<a href="#" style="text-decoration: none;">
															Detail
														</a>
													</td>	
												</tr>
											@empty
												<tr>
													<td colspan="4" class="text-center"><i>Belum Ada</i></td>
												</tr>
											@endforelse
											--}}	

											<tr>
												<td colspan="3" class="text-right">Total Kas</td>
												<td class="text-right">IDR</td>
												<td class="text-right">&nbsp;</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="tab-pane" id="calculator" role="tabpanel">
					
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
								<div class="panel-body">
									<div class="panel-title p-t-sm p-b-lg text-left" style="border-bottom: 1px solid #DDDDDD">
										Calculator
									</div>					

								</div>
							</div>
						</div>
					</div>					

				</div>

			</div>

		</div>
	</div>	
@endpush

@push('scripts')
@endpush
