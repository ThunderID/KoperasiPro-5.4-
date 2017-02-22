@extends('notification::master')

@section('content')
    <div class="row" style="padding-top: 20px;">
        <div class="col-sm-4">
            <form class="form">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
                        Cari
                    </span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
            </form>

            <div class="clearfix">&nbsp;</div>

            <div class="list-group">
                @foreach($notification as $key => $value)
                    <a href="{{$value->link}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$value->description}} </h4>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-sm-6">
            <h3 style="margin-top: 5px">Data notifications</h3>
            <hr/>
        </div>
    </div>
@endsection