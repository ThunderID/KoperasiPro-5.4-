@extends('template.cms_template')

@section('kasir')
    active in
@stop

@section('billing')
    active
@stop

@push('content')
<div class="p-content">
    <div class="page-header m-t-none m-b-xl p-b-xs">
        <h2 class="m-t-none m-b-xs">{{ $page_attributes->title }}</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                {!! Form::open(['url' => '', 'class' => 'form no-enter', 'data-ajax-submit' => true]) !!}
                    {!! Form::hidden('koperasi_id', '') !!}
                    {{-- <h5 class="text-uppercase text-light">Debitur ID</h5> --}}
                    <div class="form-group">
                        <label class="text-sm">Debitur</label>
                        <div class="row ml-0 mr-0">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <select name="debitur_id" id="" class="form-control select">
                                    @foreach ($page_datas->kreditur as $k => $v)
                                        <option value="{{ $v }}" data-id="{{ $k }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-sm">Nomor Nota</label>
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::text('nomor_nota', (isset($param['data']['nomor_nota']) ? $param['data']['nomor_nota'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-sm">Tipe</label>
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::text('tipe', (isset($param['data']['tipe']) ? $param['data']['tipe'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-sm">Tanggal</label>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::text('tanggal', (isset($param['data']['tanggal']) ? $param['data']['tanggal'] : null), ['class' => 'form-control auto-tabindex mask-date', 'placeholder' => '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-sm">Status</label>
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::text('status', (isset($param['data']['status']) ? $param['data']['status'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
                            </div>
                        </div>
                    </div>
                    <h5><b>Detail Items</b></h5>
                    <div class="content-item m-b-md">
                        <div id="template-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::text('item[0]', (isset($param['data']['item']) ? $param['data']['item'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Item']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::text('deskripsi[0]', (isset($param['data']['deskripsi']) ? $param['data']['deskripsi'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Deskripsi']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::text('qty[0]', (isset($param['data']['qty']) ? $param['data']['qty'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Qty']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::text('diskon_satuan[0]', (isset($param['data']['diskon_satuan']) ? $param['data']['diskon_satuan'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Diskon Satuan']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::text('harga_satuan[0]', (isset($param['data']['harga_satuan']) ? $param['data']['harga_satuan'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Harga Satuan']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="#" class="btn btn-default btn-sm add-item"><i class="fa fa-plus-circle"></i> item</a>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group p-t-md">
                        <label class="text-sm">Subtotal</label>
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::text('subtotal', (isset($param['data']['subtotal']) ? $param['data']['subtotal'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                <div id="template-item" style="display: none;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::text('item[0]', (isset($param['data']['item']) ? $param['data']['item'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Item']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::text('deskripsi[0]', (isset($param['data']['deskripsi']) ? $param['data']['deskripsi'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Deskripsi']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::text('qty[0]', (isset($param['data']['qty']) ? $param['data']['qty'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Qty']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::text('diskon_satuan[0]', (isset($param['data']['diskon_satuan']) ? $param['data']['diskon_satuan'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Diskon Satuan']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::text('harga_satuan[0]', (isset($param['data']['harga_satuan']) ? $param['data']['harga_satuan'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Harga Satuan']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('scripts')
    
@endpush