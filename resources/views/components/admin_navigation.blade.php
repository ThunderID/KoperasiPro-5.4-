<?php
	// Menu navigation manifests
	// Build your sitemap using this data structure bellow

	// Structure
	/*
		$nav =	[
					$nav_caption	=> 	[
											route 	=> $nav_routing,
											sub 	=> 	[
															$sub_nav_caption => $sub_nav_routing
														]
										]
				]
	*/

	// note: if menu have sub's, route parameter should be assigned with null. this will prevent menu from redirecting rather than showing it's sub's navigation menu.


	// Build your sitemap structure here
	$nav = 	[
				'dashboard' => 	[
									'route' => '#',
									'sub'	=> []
								],
				'tabungan'	=>	[
									'route' => '#',
									'sub'	=> []				
								],
				'nasabah'	=> 	[
									'route' => null,
									'sub'	=> 	[
													'dummy1' => '',			
													'dummy2' => '',			
													'dummy3' => '',			
												]				
								],
				'kredit'	=>	[
									'route' => null,
									'sub'	=> 	[
													'pengajuan_kredit_baru' => '',
													'daftar_kredit' 		=> '',
													'pembayaran_angsuran' 	=> '',
													'perpanjangan_angsuran' => '',
													'pelunasan_angsuran' 	=> '',
												]				
								],
			]; 
?>


<!-- navbar first layer -->
<nav class="navbar navbar-fixed-top navbar-default layer1">
	<div class="container-fluid">
		<!-- left section -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">KoperasiPRO</a>
			<span class="pull-right">
			</span>
		</div>
		<!-- right section -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="nav navbar-nav navbar-right">
				<a class="profile" href="#">
					<div class="col-xs-3">
						<img src="https://lh3.ggpht.com/tQOw8-NUQPfJdBCPdMw10ub69krfnHUbtHYD9Z3FzoEuw_PdSleXgUaZl29CSobSGg=h900" class="img-circle avatar" alt="Profile">
					</div>
					<div class="col-xs-9 p-r-none">
						<p class="name">Sunarto</p>
						<p class="role">Marketing</p>
						<span class="pull-right dropdown">
							<p>
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</p>
						</span>
					</div >
				</a>
			</div>
		</div>
	</div>
</nav>

<!-- second layer -->
<nav class="navbar navbar-fixed-top layer2">
	<div class="container-fluid p-l-none p-r-none">
		<ul class="nav navbar-nav menu-list">
			@foreach($nav as $key => $item)
			<li>
				@if(is_null($item['route']))
				<a data-toggle="tab" href="#{{ $key }}" aria-expanded="false">
					{{ ucWords(str_replace('_', ' ', $key)) }}
				</a>
				@else
				<a href="{{ $item['route'] }}">
					{{ ucWords(str_replace('_', ' ', $key)) }}
				</a>				
				@endif
			</li>
			@endforeach					
		</ul>
	</div>
</nav> 

<!-- third layer -->
<nav class="navbar navbar-fixed-top layer3">
	<div class="container-fluid p-l-none p-r-none">
		@foreach($nav as $key => $item)
		@if(count($item['sub']) > 0)
		<ul id="{{ $key }}" class="nav navbar-nav menu-list tab-pane fade">
			@foreach($item['sub'] as $caption => $route)
			<li>
				<a href="{{ $route }}">
					{{ ucWords(str_replace('_', ' ', $caption)) }}
				</a>
			</li>
			@endforeach
		</ul>
		@endif
		@endforeach					
	</div>
</nav> 
