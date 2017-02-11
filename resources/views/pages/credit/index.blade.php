@extends('template.cms_template')

@section('kredit')
	active in
@stop

@section('daftar_kredit')
	active
@stop

@push('content')
	<div class="row">
		<div class="col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				<div class="title">
					<h2>Data Kredit</h2>
				</div>
				<div class="search">
					<form class="form" action="{{route('credit.index', Input::all())}}">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Search">
							<span class="input-group-btn group-btn-search">
								<button class="btn" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</span>                        
						</div>
					</form>
				</div>
				<div class="row filters">
					<div class="col-sm-6 left">
						<div class="dropdown">
							<a class="btn" type="button" data-toggle="dropdown">
								@if(Input::has('status'))
						           {{ ucwords(Input::get('status')) }}
								@else
									Semua
								@endif
								<span>
									<i class="fa fa-angle-down" aria-hidden="true"></i>
								</span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('credit.index') }}">Semua</a></li>
								<li><a href="{{ route('credit.index', Input::only('q','sort')) }}status=drafting">Drafting</a></li>
								<li><a href="{{ route('credit.index', Input::only('q','sort')) }}status=analyzing">Analyzing</a></li>
							</ul>
						</div>
					
					</div>
					<div class="col-sm-6 right">
					</div>
				</div>
			</div>

			<div class="sidebar-content">
				@include('pages.credit.helper.lists')
			</div>
		</div>
		<div class="col-sm-9">
			<h3 style="margin-top: 5px">Data credits</h3>
			<hr/>
		</div>
	</div>  
@endpush

@push('scripts')
@endpush
