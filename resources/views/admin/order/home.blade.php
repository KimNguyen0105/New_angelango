@extends('admin.layout.master')
@section('content')
    <style>

    </style>
    <div class="row request">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Quản lý đơn hàng</h3>
            <div class="dashboard_graph">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('failed'))
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="row x_title">
                    <div class="nav-tabs-custom">

                        <div class="col-md-4">
                            <ul class="nav nav-tabs" style="margin-bottom: 20px;">
                                @if($status!=null)
                                      @foreach($status as $statu)
                                        @if($loop->iteration==1)
                                            <li class="active"><a href="#tab_{{$loop->iteration}}" data-toggle="tab" aria-expanded="true">{{$statu->title_vi}}</a></li>
                                        @else
                                            <li class=""><a href="#tab_{{$loop->iteration}}" data-toggle="tab" aria-expanded="true">{{$statu->title_vi}}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content">
                                @if($orders!=null)
                                    @foreach($orders as $order)
                                        @if($loop->iteration==1)
                                            <div class="tab-pane active" id="tab_{{$loop->iteration}}">
                                                {{--<h3 style="margin-bottom: 20px">{{$statu->title_vi}}</h3>--}}
                                                <table class="table table-bordered table-responsive projecttable">
                                                    <thead>
                                                    <tr>
                                                        <th width="5%">#</th>
                                                        <th width="10%">Mã hóa đơn</th>
                                                        <th width="10%">Khách hàng</th>
                                                        <th width="10%">Ngày tạo</th>
                                                        <th width="10%">Số lượng</th>
                                                        <th width="10%">Tổng tiền</th>
                                                        <th width="15%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($order as $item)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$item->order_id}}</td>
                                                                <td>{{$item->fullname}}</td>
                                                                <td>{{$item->created_at}}</td>
                                                                <td>{{$item->total_item}}</td>
                                                                <td>{{number_format($item->total_price)}} VNĐ</td>
                                                                <td>
                                                                    <a href="{{url('/admin/order')}}/{{$item->id}}"
                                                                       class="btn btn-xs btn-primary editlink"><span
                                                                                class="glyphicon glyphicon-pencil"></span>
                                                                        Xem chi tiết</a>

                                                                    <a onclick="ftDelete('{{url('admin/order/delete-order')}}/{{$item->id}}')"
                                                                       class="btn btn-xs btn-danger deletelink"><span
                                                                                class="glyphicon glyphicon-trash"></span> Delete</a>
                                                                </td>
                                                            </tr>

                                                    @endforeach
                                                    </tbody>
                                                    <tfoot></tfoot>
                                                </table>
                                            </div>
                                        @else
                                            <div class="tab-pane" id="tab_{{$loop->iteration}}">
                                                {{--<h3 style="margin-bottom: 20px">{{$statu->title_vi}}</h3>--}}
                                                <table class="table table-bordered table-responsive projecttable">
                                                    <thead>
                                                    <tr>
                                                        <th width="5%">#</th>
                                                        <th width="10%">Mã hóa đơn</th>
                                                        <th width="10%">Khách hàng</th>
                                                        <th width="10%">Ngày tạo</th>
                                                        <th width="10%">Số lượng</th>
                                                        <th width="10%">Tổng tiền</th>
                                                        <th width="15%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($order as $item)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$item->id}}</td>
                                                            <td>{{$item->fullname}}</td>
                                                            <td>{{$item->created_at}}</td>
                                                            <td>{{$item->total_item}}</td>
                                                            <td>{{number_format($item->total_price)}} VNĐ</td>
                                                            <td>
                                                                <a href="{{url('/admin/order')}}/{{$item->id}}"
                                                                   class="btn btn-xs btn-primary editlink"><span
                                                                            class="glyphicon glyphicon-pencil"></span>
                                                                    Xem chi tiết</a>

                                                                <a onclick="ftDelete('{{url('admin/order/delete-order')}}/{{$item->id}}')"
                                                                   class="btn btn-xs btn-danger deletelink"><span
                                                                            class="glyphicon glyphicon-trash"></span> Delete</a>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                    <tfoot></tfoot>
                                                </table>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>

                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
@endsection