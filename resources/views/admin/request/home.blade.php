@extends('admin.layout.master')
@section('content')
    <style>
        .request .nav-tabs>li{
            display: inline;
            float: none;
        }
    </style>
    <div class="row request">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="{{url('/admin/news/create-news')}}" class="btn btn-sm btn-success addlink"><span
                        class="glyphicon glyphicon-new-window"></span> Create News</a>
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
                                <li class="active"><a href="#tab_vi" data-toggle="tab" aria-expanded="true">Thư chưa xem ({{count($requests1)}})</a></li>
                                <li class=""><a href="#tab_en" data-toggle="tab" aria-expanded="true">Thư đã xem ({{count($requests2)}})</a></li>
                                <li class=""><a href="#tab_seo" data-toggle="tab" aria-expanded="true">Thư đã xóa ({{count($requests3)}})</a></li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_vi">
                                    <h3 style="margin-bottom: 20px">Hộp thư đã xem</h3>
                                    <table class="table table-bordered table-responsive projecttable">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="10%">Hình ảnh</th>
                                            <th width="10%">Mã hóa đơn</th>
                                            <th width="10%">Tên sản phẩm</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($requests1 as $request1)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{asset('/images/product')}}/{{$request1->avatar}}"
                                                         style="height:150px; width:100%"/></td>
                                                <td>{{$request1->order_id}}</td>
                                                <td>{{$request1->title_vi}}</td>
                                                <td>
                                                    <a href="{{url('/admin/request')}}/{{$request1->id}}"
                                                    class="btn btn-xs btn-primary editlink"><span
                                                    class="glyphicon glyphicon-pencil"></span>
                                                        Xem chi tiết</a>

                                                    <a onclick="ftDelete('{{url('admin/request/delete-request')}}/{{$request1->id}}')"
                                                       class="btn btn-xs btn-danger deletelink"><span
                                                                class="glyphicon glyphicon-trash"></span> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_en">
                                    <h3 style="margin-bottom: 20px">Hộp thư chưa xem</h3>
                                    <table class="table table-bordered table-responsive projecttable">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="10%">Hình ảnh</th>
                                            <th width="10%">Mã hóa đơn</th>
                                            <th width="10%">Tên sản phẩm</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($requests2 as $request2)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{asset('/images/product')}}/{{$request2->avatar}}"
                                                         style="height:150px; width:100%"/></td>
                                                <td>{{$request2->order_id}}</td>
                                                <td>{{$request2->title_vi}}</td>
                                                <td>
                                                    <a href="{{url('/admin/request')}}/{{$request2->id}}"
                                                       class="btn btn-xs btn-primary editlink"><span
                                                                class="glyphicon glyphicon-pencil"></span>
                                                        Xem chi tiết</a>

                                                    <a onclick="ftDelete('{{url('admin/request/delete-request')}}/{{$request2->id}}')"
                                                       class="btn btn-xs btn-danger deletelink"><span
                                                                class="glyphicon glyphicon-trash"></span> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_seo">
                                    <h3 style="margin-bottom: 20px">Hộp thư đã xóa</h3>
                                    <table class="table table-bordered table-responsive projecttable">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="10%">Hình ảnh</th>
                                            <th width="10%">Mã hóa đơn</th>
                                            <th width="10%">Tên sản phẩm</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($requests3 as $request3)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{asset('/images/product')}}/{{$request3->avatar}}"
                                                         style="height:150px; width:100%"/></td>
                                                <td>{{$request3->order_id}}</td>
                                                <td>{{$request3->title_vi}}</td>
                                                <td>
                                                    <a href="{{url('/admin/request')}}/{{$request3->id}}"
                                                       class="btn btn-xs btn-primary editlink"><span
                                                                class="glyphicon glyphicon-pencil"></span>
                                                        Xem chi tiết</a>

                                                    {{--<a onclick="ftDelete('{{url('admin/request/delete-request')}}/{{$request3->id}}')"--}}
                                                       {{--class="btn btn-xs btn-danger deletelink"><span--}}
                                                                {{--class="glyphicon glyphicon-trash"></span> Delete</a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>

                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
@endsection