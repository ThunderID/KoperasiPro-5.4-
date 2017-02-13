<!-- topbar -->
<nav class="navbar navbar-fixed-top navbar-default topbar">
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
			
			<!-- HERE SHOULD BE MODIFIED OFFICE SELECTOR -->
			<span class="pull-right m-l-xs">
				<div class="dropdown p-t-xs">
					<button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
						<i class="fa fa-building"></i>&nbsp;&nbsp; {{ App\Web\Services\TAuth::activeOffice()->office->name }}
						&nbsp;&nbsp;<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						@foreach(App\Web\Services\TAuth::loggedUser()->accesses as $key => $value)
							<li><a href="{{route('office.activate', ['idx' => $key])}}">{{$value->office->name}}</a></li>
						@endforeach
					</ul>
				</div>
			</span>
			<!-- END OF SHOULD BE MODIFIED OFFICE SELECTOR -->
		
		</div>
		<!-- right section -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="nav navbar-nav navbar-right">


				<div class="profile">
					<div class="col-xs-9 p-r-none">
						<p class="name">{{App\Web\Services\TAuth::loggedUser()->owner->name}}</p>
						<p class="role">{{App\Web\Services\TAuth::activeOffice()->role}}</p>
						
					</div >
					<div class="col-xs-3 p-r-none p-t-md">
						<p>
							<a href="{{route('login.destroy')}}">
								<i class="fa fa-power-off" aria-hidden="true"></i>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>