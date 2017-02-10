<form class="form">
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3" style="padding: 0px">
            <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                @if(Input::has('status'))
                    draft
                @elseif(Input::has('wanita'))
                    Wanita
                @else
                    Semua
                @endif
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="{{route('credit.index', ['status' => true])}}">status</a></li>
                <li><a href="{{route('credit.index', ['wanita' => true])}}">Wanita</a></li>
                <li><a href="{{route('credit.index')}}">Semua</a></li>
            </ul>
        </span>
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
    </div>
</form>

<div class="clearfix">&nbsp;</div>
<div class="list-group">
    @foreach(App\Web\Services\Credit::all() as $key => $value)
        <a href="{{route('credit.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item">
            <h4 class="list-group-item-heading">{{$value->creditor->name}} <span class="badge">Pending</span></h4>
            <p class="list-group-item-text text-right">{{$value->credit_amount->IDR()}}</p>
        </a>
        {!! Form::open(['url' => route('credit.destroy', [$value->id]), 'method' => 'DELETE']) !!}
            <button class="btn btn-xs">DELETE</button>
        {!!Form::close()!!}
    @endforeach
</div>