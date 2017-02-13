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
					<form class="form" action="{{route('credit.index', Input::only('status','sort'))}}" data-pjax=true>
						<div class="input-group">
							<input class="form-control" name="q" type="text" placeholder="Cari Data Kredit" value="{{ Input::get('q') }}">
							<span class="input-group-btn group-btn-search">
								<a class="btn clear-search {{ !Input::has('q') ? 'disabled' : '' }}" href="{{route('credit.index', Input::only('status','sort'))}}" data-toggle="tooltip" title="Hapus pencarian">
									<i class="fa fa-window-close" aria-hidden="true"></i>
								</a>							
								<button class="btn" type="submit" data-toggle="tooltip" title="Cari data">
									<i class="fa fa-search" aria-hidden="true"></i>
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
								<li><a href="{{ route('credit.index', Input::only('q','sort')) }}">Semua</a></li>
								<li><a href="{{ route('credit.index', Input::only('q','sort')) }}&status=drafting">Drafting</a></li>
								<li><a href="{{ route('credit.index', Input::only('q','sort')) }}&status=analyzing">Analyzing</a></li>
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
