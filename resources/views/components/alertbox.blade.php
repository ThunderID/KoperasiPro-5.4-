<?php
	// dd(key(Session::get('msg')));
	// dd( Session::get('msg')[key(Session::get('msg'))] );
?>
@if(Session::has('msg'))
	<div class="card-block" style="padding-top:0px;padding-bottom:0px;">
		<div class="row">
		    <div class="col-lg-12">
		        <div class="alert alert-{{ key(Session::get('msg')) }} alert-dismissable m-b-none" style="margin-top: 0px;margin-bottom:0px">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	            @foreach (Session::get('msg')[key(Session::get('msg'))] as $error)
		                <p>{!! $error !!}</p>
		            @endforeach
		        </div>
		    </div>
		</div>
	</div>
@endif