<?php
// <form class="form" action="{{route('credit.index', Input::all())}}">
//     <div class="input-group">
//         <span class="input-group-addon" id="basic-addon3" style="padding: 0px">
//             <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
//                 @if(Input::has('status'))
//                     {{ucwords(Input::get('status'))}}
//                 @else
//                     Drafting
//                 @endif
//                 <span class="caret"></span>
//             </button>
//             <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
//                 @foreach($page_datas->credit_filters as $key => $value)
//                     <li><a href="{{route('credit.index', array_merge(Input::all(), ['status' => $key]))}}">{{$value}}</a></li>
//                 @endforeach
//             </ul>
//         </span>
//         <input type="text" class="form-control" name="q" id="basic-url" aria-describedby="basic-addon3">
//     </div>
// </form>

// <div class="clearfix">&nbsp;</div>
?>

<div class="list-group">
    @foreach($page_datas->credits as $key => $value)
        <a href="{{route('credit.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item {{$key == 0? 'first': ''}}">
            <h4 class="list-group-item-heading">
                {{$value->creditor->name}} 
                <span class="badge pull-right">{{$value->status}}</span>
            </h4>
            <p>{{$value->id}}</p>
            <p class="list-group-item-text p-t-xs">{{$value->credit_amount->IDR()}}</p>
        </a>
    @endforeach
</div>