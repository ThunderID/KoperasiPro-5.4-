@extends('notification::master')

@section('content')
    <div class="row" style="padding-top: 20px;">
        <div class="col-sm-3">
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
                    <a href="{{route('notification.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$value->notificationor->name}} <span class="badge">Pending</span></h4>
                        <p class="list-group-item-text text-right">{{$value->notification_amount->IDR()}}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-sm-9">
            <h3 style="margin-top: 5px">Data notifications</h3>
            <hr/>
            <table>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Kreditur</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{$notification_detail->notificationor->name}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Penjamin</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{$notification_detail->warrantor->name}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Pengajuan Kredit</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{$notification_detail->notification_amount->IDR()}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Kemampuan Angsur</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{$notification_detail->installment->IDR()}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Lama Angsuran</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{$notification_detail->period}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Tujuan Kredit</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{$notification_detail->purpose}}</h4>
                    </td>
                </tr>
                @foreach($notification_detail->collaterals as $key => $value)
                    <tr class="row">
                        <td class="col-sm-3"><h4><small>Jaminan {{($key + 1)}}</small></h4></td>
                        <td class="col-sm-9">
                            <h4>{{$value->legal}} <small>{{$value->type}}</small></h4>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection