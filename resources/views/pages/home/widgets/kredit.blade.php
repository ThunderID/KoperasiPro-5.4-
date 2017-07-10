@inject('dokcab', '\App\Service\Analis\LaciKasir')

@php
	$pemasukan 		= $dokcab->pemasukan([], $acl_logged_user);
	$pengeluaran 	= $dokcab->pengeluaran([], $acl_logged_user);
	$total_kas 		= $dokcab->formatMoneyTo($dokcab->formatMoneyFrom($pemasukan) - $dokcab->formatMoneyFrom($pengeluaran));
	$list_pemasukan		= $dokcab->list_pemasukan([], $acl_logged_user);
	$list_pengeluaran	= $dokcab->list_pengeluaran([], $acl_logged_user);
	$flag1 	= 0;
	$flag2 	= 0;
@endphp
	<div class="clearfix">&nbsp;</div>

	<div class="row field">
		<div class="col-sm-12 text-center">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				@foreach((array)$sub as $key2 => $value2)
					<li class="nav-item @if(!$flag1) active @php $flag1 = 1; @endphp @endif">
						<a class="nav-link" data-toggle="tab" href="#{{$key2}}" role="tab">{{ucwords(str_replace('_', ' ', $key2))}}</a>
					</li>
				@endforeach
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">

				@foreach((array)$sub as $key2 => $value2)
					<div class="tab-pane @if(!$flag2) active @php $flag2 = 1; @endphp @endif" id="{{$key2}}" role="tabpanel">
						<!-- <div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
									<div class="panel-body">								

										<div class="panel-title p-t-sm p-b-lg text-left" style="border-bottom: 1px solid #DDDDDD"> -->
											@include($value2)
										<!-- </div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				@endforeach

			</div>

		</div>
	</div>	