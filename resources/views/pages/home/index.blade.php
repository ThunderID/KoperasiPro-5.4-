<?php
	// init
	reset($page_attributes->content);
	$first_key = key($page_attributes->content);
?>

@extends('template.cms_template')

@push('content')
	<div class="row field beranda">
		<div class="col-sm-3">
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="sidebar-header p-b-sm">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="">
							<h4>Beranda</h4>
						</div>
					</div>
					<div class="panel-content">
						<div class="sidebar-content _window" data-padd-top="auto" data-padd-bottom="39">
							<ul class="list-group">
								@foreach($page_attributes->content as $key => $value)
								<li class="{{ $key == $first_key ? 'active' : '' }}">
							        <a data-toggle="tab" href="#{{$key}}" class="list-group-item">
							            <h5 class="list-group-item-heading">
							                {{ $key }}
							                <span class="pull-right">
								                <i class="fa fa-angle-right" aria-hidden="true"></i>
							                </span>
							            </h5>
							        </a>
						        </li>
						        @endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-9 p-l-none">
			<div class="clearfix">&nbsp;</div>
			<div class="tab-content _window" data-padd-top="auto" data-padd-bottom="0">
				@foreach($page_attributes->content as $key => $value)
				<div id="{{$key}}" class="tab-pane fade in {{ $key == $first_key ? 'active' : '' }}">
					@foreach($value as $key2 => $value2)
						@include($value2)
					@endforeach
				</div>
				@endforeach
			</div>
		</div>
	</div>		
@endpush

@push('scripts')
@endpush
