@extends('admin.layout.master')
@section('content')
    <style>

    </style>
    <div class="row request">
        <div class="col-md-12 col-sm-12 col-xs-12">
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
                                <li class="active"><a href="#tab_unseen" data-toggle="tab" aria-expanded="true">Chưa trả lời ({{count($contact1)}})</a></li>
                                <li class=""><a href="#tab_seen" data-toggle="tab" aria-expanded="true">Đã trả lời ({{count($contact2)}})</a></li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_unseen">
                                    <h3 style="margin-bottom: 20px">Liên hệ chưa trả lời</h3>
                                    <table class="table table-bordered table-responsive projecttable">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="15%">Tiêu đề</th>
                                            <th width="10%">Khách hàng</th>
                                            <th width="10%">email</th>
                                            <th width="10%">Số điện thoại</th>

                                            <th width="15%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contact1 as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>

                                                <td>{{$item->phone}}</td>
                                                <td>
                                                    <a href="{{url('/admin/contact')}}/{{$item->id}}"
                                                       class="btn btn-xs btn-primary editlink"><span
                                                                class="glyphicon glyphicon-pencil"></span>
                                                        Xem chi tiết</a>

                                                    <a onclick="ftDelete('{{url('admin/contact/delete-contact')}}/{{$item->id}}')"
                                                       class="btn btn-xs btn-danger deletelink"><span
                                                                class="glyphicon glyphicon-trash"></span> Delete</a>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>

                                <div class="tab-pane" id="tab_seen">
                                    <h3 style="margin-bottom: 20px">Liên hệ đã trả lời</h3>
                                    <table class="table table-bordered table-responsive projecttable">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="15%">Tiêu đề</th>
                                            <th width="10%">Khách hàng</th>
                                            <th width="10%">email</th>
                                            <th width="10%">Số điện thoại</th>

                                            <th width="15%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contact2 as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>

                                                <td>{{$item->phone}}</td>
                                                <td>
                                                    <a href="{{url('/admin/contact')}}/{{$item->id}}"
                                                       class="btn btn-xs btn-primary editlink"><span
                                                                class="glyphicon glyphicon-pencil"></span>
                                                        Xem chi tiết</a>

                                                    <a onclick="ftDelete('{{url('admin/contact/delete-contact')}}/{{$item->id}}')"
                                                       class="btn btn-xs btn-danger deletelink"><span
                                                                class="glyphicon glyphicon-trash"></span> Delete</a>
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