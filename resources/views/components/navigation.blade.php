<!-- first layer -->
<nav class="navbar navbar-fixed-top layer1">
	<div class="container-fluid p-l-none p-r-none">
		<ul class="nav navbar-nav menu-list">
			@foreach(App\Web\Services\Navbar::all() as $key => $item)
			<li class="@yield($key)">
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

<!-- second layer -->
<nav class="navbar navbar-fixed-top layer2">
	<div class="container-fluid p-l-none p-r-none">
		@foreach(App\Web\Services\Navbar::all() as $key => $item)
		@if(count($item['sub']) > 0)
		<ul id="{{ $key }}" class="nav navbar-nav menu-list tab-pane fade @yield($key)">
			@foreach($item['sub'] as $caption => $route)
			<li class="@yield($caption)">
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