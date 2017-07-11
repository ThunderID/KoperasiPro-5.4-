<!-- topbar -->
<nav class="navbar navbar-fixed-top navbar-default topbar">
	<div class="container-fluid hidden-xs">
		<!-- left section -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand m-b-none" href="{{route('home.index')}}">{{ Config::get('app.name') }}</a>
			<a class="navbar-brand m-b-none m-l-xs p-r-lg" style="font-size: 14px;" href="{{route('home.index')}}"><i class="fa fa-home"></i> Beranda</a>
			<!-- HERE SHOULD BE MODIFIED OFFICE SELECTOR -->
			<span class="list-organisation pull-left m-l-xs">
				<div class="dropdown p-t-xs">
					<a href="#modal-change-koperasi" data-toggle="modal" data-target="#modal-change-koperasi" class="btn btn-link">
						<i class="fa fa-building" style="font-size: 15px;"></i>
						<span class="text-capitalize">&nbsp; {{ $acl_active_office['koperasi']['nama'] }} &nbsp;&nbsp;</span>
						<span class="caret"></span>
					</a>
				</div>
			</span>
			<!-- END OF SHOULD BE MODIFIED OFFICE SELECTOR -->
		
		</div>
		<!-- right section -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="nav navbar-nav navbar-right">
				<div class="profile">
					<ul class="list-inline m-b-none">
						<li>
							@include('components.notification')
						</li>
						<li>
							<p class="name m-b-none">{{$acl_logged_user['nama']}}</p>
							<p class="role text-muted">{{ucwords($acl_active_office['role'])}}</p>
						</li>
						<li>
							<a class="primary" href="#modal-logout" data-target="#modal-logout" data-toggle="modal" no-data-pjax >
								<i class="fa fa-power-off" aria-hidden="true" style="font-size: 15px;"></i>&nbsp;Logout
							</a>
						</li>
					</ul>
					{{-- <div class="col-xs-2 p-l-none p-r-none p-t-xs">
					</div >
					<div class="col-xs-6 p-r-none" style="padding-top: 1px;">
					</div >
					<div class="col-sm-4 col-md-4 col-lg-4 text-left p-t-xs">
					</div> --}}
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid hidden-sm hidden-md hidden-lg">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed pull-left no-border" data-toggle="modal" data-target="#menu" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-brand text-center">
				{{ Config::get('app.name') }}
				<a href="#modal-change-koperasi" data-toggle="modal" data-target="#modal-change-koperasi" class="btn btn-link">
					<i class="fa fa-building"></i>&nbsp;&nbsp; {{ $acl_active_office['koperasi']['nama'] }} &nbsp;&nbsp;<span class="caret"></span>
				</a>
				<div class="pull-right" style="margin-right: -20px;">
					@include('components.notification')
				</div>
			</div>
		</div>
	</div>
</nav>