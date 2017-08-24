@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('admin/statistic/account')}}" class="btn btn-primary" type="button">Trở về</a>
        </div>
        <div class="col-md-12 div-info">
            <h3>Thông tin người dùng</h3>
            <div class="col-md-6">
                <p>Tên khách hàng: {{$user->name}}</p>
                <p>Ngày sinh: {{$user->birthday}}</p>
            </div>
            <div class="col-md-6">
                <p>Email: {{$user->email}}</p>
                <p>Số điện thoại: {{$user->phone_number}}</p>
            </div>
        </div>
        <div class="col-md-12 div-order">
            <h3>Danh sách hóa đơn đã mua hàng</h3>
            @if($orders!=null)
                @foreach($orders as $order)
                    <div class="col-md-12">
                        <div class="" style=" margin-bottom: 10px">
                        <div class="col-md-12" style="border: 1px #eee solid;padding-top: 10px; background-color: #F7F7F7">
                            <div class="col-md-6">
                                <p>Mã hóa đơn: {{$order->order_id}}</p>
                                <p>Trạng thái: {{$order->status}}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Ngày mua: {{$order->created_at}}</p>
                            </div>
                        </div>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="15%">Hình ảnh</th>
                                <th width="40%">Tên sản phẩm</th>
                                <th width="10%">Số lượng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($order->detail !=null)
                                @foreach($order->detail as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img src="{{asset('images/product')}}/{{$item->avatar}}" style="height: 80px;"></td>
                                        <td>{{$item->title_vi}}</td>
                                        <td>{{$item->quantity}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                        </div>
                    </div>
                @endforeach
            @endif


                <div class="clearfix"></div>
            </div>
    </div>
@endsection