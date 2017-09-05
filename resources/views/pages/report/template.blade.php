@inject('cservice', 'App\Service\Helpers\ACL\KewenanganKredit')

@extends('template.cms_template')


@push('content')
	<div class="row p-b-md field">
		<div class="col-md-6">
			<h2>Template Laporan</h2>
			<p class="text-muted">Deksripsi singkat dari laporan ini. Mungkin cara membaca laporan ini, analisa yang bisa dilakukan dari data laporan ini, atau hilangkan bila tidak ada.</p>
		</div>
		<div class="col-md-6 p-t-md">
			<div id="daterange" class="btn btn-default btn-sm pull-right selectbox daterange">
				<i class="fa fa-calendar"></i>&nbsp;
				<?php
					$filter_date = json_decode(Input::get('date'), true);
				?>
				<span>{{ $filter_date['start'] ? $filter_date['start'] : 'DD/MM/YYY' }} - {{ $filter_date['end'] ? $filter_date['end'] : 'DD/MM/YYY' }}</span>&nbsp;<b class="caret"></b>
			</div>
		</div>
	</div>
	<div class="row p-t-none p-b-lg field">
		<div class="col-md-12 text-right">
			<!-- filter & tools	 -->
			<div class="btn-group">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-filter" aria-hidden="true"></i>&nbsp;
					<span>Filter</span>&nbsp;<b class="caret"></b>
				</button>
				{{-- List Filter Here, please set empty the url --}}
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Tablet</a></li>
					<li><a href="#">Smartphone</a></li>
				</ul>
			</div>
			<div class="btn-group">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>&nbsp;
					<span>Sort</span>&nbsp;<b class="caret"></b>
				</button>
				{{-- List Sort Here, please set empty the url --}}
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Tablet</a></li>
					<li><a href="#">Smartphone</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row p-b-md field">
		<div class="col-md-12">
			<!-- table -->
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center" style="width: 100%;">field</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$dummy = [];
					?>
					@forelse ($dummy as $key => $data)
						<tr>
							<td class="text-center">{{ 'Data mu' }}</td>
						</tr>
					@empty
						<tr>
							<td colspan="1" class="text-center">Belum ada data</td>
						</tr>
					@endforelse
				</tbody>
			</table>
			<!-- pagination -->	
		</div>
	</div>
@endpush

@push('scripts')
	var url = window.location.href;
	url = url.substring(0, url.indexOf('?') > 0 ? url.indexOf('?') : url.length);
	
	$(document).on('click', '.cancelBtn', function(){
		window.location.href = url;
	});
	$(document).on('click', '.applyBtn', function(){
		let start = $(this).closest('.daterangepicker').find('input[name=daterangepicker_start]').val();
		let end = $(this).closest('.daterangepicker').find('input[name=daterangepicker_start]').val();
		qs = {'start': start, 'end': end};
		window.location.href= url + '?date=' + JSON.stringify(qs);
	});
@endPush