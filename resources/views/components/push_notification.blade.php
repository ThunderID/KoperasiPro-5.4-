@if(Session::has('msg'))
	<div id="push-notification" class="hidden">
        @foreach (Session::get('msg')[key(Session::get('msg'))] as $msg)
            <p class="message" data-type="{{ key(Session::get('msg')) }}">{!! $msg !!}</p>
        @endforeach
        @foreach ($errors->all('<p>:message</p>') as $error)
            <p class="message" data-type="error">{!! $error !!}</p>
        @endforeach
    </div>
@endif