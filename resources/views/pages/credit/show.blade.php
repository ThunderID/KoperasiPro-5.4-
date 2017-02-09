@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('pengajuan_kredit_baru')
    active
@stop

@push('content')
	<div class="row" style="padding-top: 20px;">
        <div class="col-sm-3">
            @include('pages.credit.helper.lists')
        </div>
        <div class="col-sm-9">
            <h3 style="margin-top: 5px">Data Kredit</h3>
            <hr/>
            <table>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Kreditur</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{App\Web\Services\Credit::detailed($id)->creditor->name}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Penjamin</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{App\Web\Services\Credit::detailed($id)->credit->warrantor->name}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Pengajuan Kredit</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{App\Web\Services\Credit::detailed($id)->credit->credit_amount->IDR()}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Kemampuan Angsur</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{App\Web\Services\Credit::detailed($id)->credit->installment->IDR()}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Lama Angsuran</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{App\Web\Services\Credit::detailed($id)->credit->period}}</h4>
                    </td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Tujuan Kredit</small></h4></td>
                    <td class="col-sm-9">
                        <h4>{{App\Web\Services\Credit::detailed($id)->credit->purpose}}</h4>
                    </td>
                </tr>
                @foreach(App\Web\Services\Credit::detailed($id)->credit->collaterals as $key => $value)
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
@endpush

@push('scripts')
@endpush
