<div class="row p-b-sm" style="border-bottom: 1px solid #eee;">
	<div class="col-xs-2">
	</div>
	<div class="col-xs-12 text-center">
		<span class="pull-left">
			<a href="#" class="text-muted" data-dismiss="modal" style="font-size: 30px;">&times;</a>
		</span>
		<span class="pull-right">
			<a class="text-muted" href="#modal-logout" data-target="#modal-logout" data-toggle="modal" no-data-pjax style="font-size: 20px;">
				<i class="fa fa-power-off" aria-hidden="true" style="margin-top: 8px;"></i>
			</a>
		</span>
		<p class="name text-capitalize m-t-xs m-b-none"><b>{{ TAuth::loggedUser()['nama'] }}</b></p>		
		<p class="role text-capitalize text-muted m-b-none" style="font-size: 12px;">{{ TAuth::activeOffice()['role'] }}</p>
	</div>
	<div class="col-xs-2 text-right">
	</div>
</div>
<div class="row p-t-xl">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="list-group">
			@foreach(Thunderlabid\Web\Queries\Navigation\NavbarService::all() as $key => $item)
				@if (is_null($item['route']))
					<a class="list-group-item p-t-md p-b-md" href="#{{ $key }}">{{ ucwords(str_replace('_', ' ', $key)) }}</a>
						{{-- <ul>
							@foreach ($item['sub'] as $caption => $route)
								<li class="@yield($caption)">
									<a href="{{ $route }}">
										{{ ucwords(str_replace('_', ' ', $caption)) }}
									</a>
								</li>
							@endforeach
						</ul> --}}
					@else
						<a class="list-group-item p-t-md p-b-md" href="{{ $item['route'] }}">
							{{ ucwords(str_replace('_', ' ', $key)) }}
						</a>				
					@endif
				</li>
			@endforeach
		</ul>
	</div>
</div>