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
			<a class="navbar-brand" href="#">{{ Config::get('app.name') }}</a>
			
			<!-- HERE SHOULD BE MODIFIED OFFICE SELECTOR -->
			<span class="pull-right m-l-xs">
				<div class="dropdown p-t-xs">
					<a href="#modal-change-koperasi" data-toggle="modal" data-target="#modal-change-koperasi" class="btn btn-link">
						<i class="fa fa-building"></i>&nbsp;&nbsp; {{ TAuth::activeOffice()['koperasi']['nama'] }} &nbsp;&nbsp;<span class="caret"></span>
					</a>
				</div>
			</span>
			<!-- END OF SHOULD BE MODIFIED OFFICE SELECTOR -->
		
		</div>
		<!-- right section -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="nav navbar-nav navbar-right">

				<div class="profile">
					<div class="col-xs-2 p-l-none p-r-none p-t-xs">
						@include('components.notification')
					</div >
					<div class="col-xs-6 p-r-none" style="padding-top: 1px;">
						<p class="name">{{TAuth::loggedUser()['nama']}}</p>
						<p class="role">{{TAuth::activeOffice()['role']}}</p>
					</div >
					<div class="col-xs-4 text-left p-t-xs">
						<a class="btn btn-link text-" href="#modal-logout" data-target="#modal-logout" data-toggle="modal" no-data-pjax >
							<i class="fa fa-power-off fa-lg" aria-hidden="true" ></i>
						</a>
					</div>
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
					<i class="fa fa-building"></i>&nbsp;&nbsp; {{ TAuth::activeOffice()['koperasi']['nama'] }} &nbsp;&nbsp;<span class="caret"></span>
				</a>
				<div class="pull-right" style="margin-right: -20px;">
					@include('components.notification')
				</div>
			</div>
		</div>
	</div>
</nav>