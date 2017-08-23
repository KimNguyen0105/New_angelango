@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="{{url('/admin/account/create-account')}}" class="btn btn-sm btn-success addlink"><span
                        class="glyphicon glyphicon-new-window"></span> Create Account</a>
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
                    <div class="col-md-12">
                        <table class="table table-bordered table-responsive projecttable">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="15%">Email</th>
                                <th width="15%">Name</th>
                                <th width="15%">Số điện thoại</th>
                                <th width="15%">Ngày sinh</th>
                                <th width="15%">Giới tính</th>
                                <th width="15%">Ngày đăng ký</th>
                                <th width="15%">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($account as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone_number}}</td>
                                    <td>{{date( "d-m-Y", strtotime($item->birthday))}}</td>
                                    <td>@if($item->gender==1){{"Nam"}}@else{{"Nữ"}}@endif</td>
                                    <td>{{date( "d-m-Y", strtotime($item->created_at))}}</td>
                                    <td>
                                        <a href="{{url('/admin/account/edit-account')}}/{{$item->id}}"
                                           class="btn btn-xs btn-primary editlink"><span
                                                    class="glyphicon glyphicon-pencil"></span>
                                            Edit</a>
                                       
                                            <a onclick="ftDelete('{{url('admin/account/delete-account')}}/{{$item->id}}')"
                                               class="btn btn-xs btn-danger deletelink"><span
                                                        class="glyphicon glyphicon-trash"></span> Delete</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
@endsection