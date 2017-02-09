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