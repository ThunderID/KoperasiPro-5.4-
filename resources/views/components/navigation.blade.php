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
?>

<!-- first layer -->
<nav class="navbar navbar-fixed-top layer1" style="z-index: 99">
	<div class="container-fluid p-l-none p-r-none">
		<ul class="nav navbar-nav menu-list">
			@foreach (Thunderlabid\Application\Services\NavbarService::all() as $key => $item)
			<li class="@yield($key)">
				@if (is_null($item['route']))
				<a data-toggle="tab" href="#{{ $key }}" aria-expanded="false">
					{{ ucwords(str_replace('_', ' ', $key)) }}
				</a>
				@else
				<a href="{{ $item['route'] }}">
					{{ ucwords(str_replace('_', ' ', $key)) }}
				</a>				
				@endif
			</li>
			@endforeach					
		</ul>
	</div>
</nav> 

<!-- second layer -->
<nav class="navbar navbar-fixed-top layer2" style="z-index: 100">
	<div class="container-fluid p-l-none p-r-none">
		@foreach (Thunderlabid\Application\Services\NavbarService::all() as $key => $item)
		@if (count($item['sub']) > 0)
		<ul id="{{ $key }}" class="nav navbar-nav menu-list tab-pane fade @yield($key)">
			@foreach ($item['sub'] as $caption => $route)
			<li class="@yield($caption)">
				<a href="{{ $route }}">
					{{ ucwords(str_replace('_', ' ', $caption)) }}
				</a>
			</li>
			@endforeach
		</ul>
		@endif
		@endforeach					
	</div>
</nav>