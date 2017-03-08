@if(Session::has('msg'))
	<div class="card-block" style="padding-top:0px;padding-bottom:0px;">
		<div class="row p-b-md">
		    <div class="col-lg-12">
		        <div class="alert alert-{{ key(Session::get('msg')) }} alert-dismissable m-b-none" style="margin-top: 0px;margin-bottom:0px">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	            @foreach (Session::get('msg')[key(Session::get('msg'))] as $msg)
		                <p>{!! $msg !!}</p>
		            @endforeach
    	            @foreach ($errors->all('<p>:message</p>') as $error)
		                {!! $error !!}
		            @endforeach
		        </div>
		    </div>
		</div>
	</div>
@endif