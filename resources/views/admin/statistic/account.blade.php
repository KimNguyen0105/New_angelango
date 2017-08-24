@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Khách hàng tiềm năng (mua sản phẩm nhiều nhất)</h3>
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
                                <th width="15%">Tên khách hàng</th>
                                <th width="15%">Email</th>
                                <th width="10%">Số điện thoại</th>
                                <th width="10%">Số sản phẩm đã mua</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->total}}</td>
                                    <td>
                                        <a href="{{url('/admin/statistic/account')}}/{{$user->id}}"
                                                   class="btn btn-xs btn-primary editlink"><span
                                                    class="glyphicon glyphicon-eye-open"></span>
                                            Danh sách hóa đơn</a>
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