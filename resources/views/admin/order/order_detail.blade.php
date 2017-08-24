@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('admin/order')}}" class="btn btn-primary" type="button">Trở về</a>
        </div>
        <div class="col-md-12 div-order">
            <h3>Thông tin đơn hàng</h3>
            <div class="col-md-4">
                <p>Mã hóa đơn: {{$order->order_id}}</p>
                <p>Ngày tạo: {{$order->created_at}}</p>
                <p>Ngày cập nhật: {{$order->updated_at}}</p>
            </div>

            <div class="col-md-3">
                <p>Số lượng: {{$order->total_item}}</p>
                <p>Phí ship: {{$order->shipping_costs}}</p>
                <p>Tổng tiền: {{number_format($order->total_price)}} VNĐ</p>
            </div>
            <div class="col-md-5">
                <p>Tên khách hàng: {{$order->fullname}}</p>
                <p>Số điện thoại: {{$order->phone}}</p>
                <p>Địa chỉ: {{$order->address}}</p>
            </div>
        </div>
        <div class="col-md-12 div-request">
            <h3>Thông tin chi tiết đơn hàng</h3>
            <div class="col-md-4 div-status-order">
                <p>Trạng thái đơn hàng: {{$order->status_name}}</p>
                <div class="form-group">
                    <label>Cập nhật trạng thái đơn hàng</label>
                    <form method="POST" action="{{url('admin/order/update-status-order')}}/{{$order->id}}">
                    <select class="form-control" name="status">
                        @if($status!=null)
                            @foreach($status as $statu)
                                @if($statu->id==$order->status_id)
                                    <option value="{{$statu->id}}" selected>{{$statu->title_vi}}</option>
                                @else
                                    <option value="{{$statu->id}}">{{$statu->title_vi}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                    <input type="submit" class="btn btn-info" style="margin-top: 20px" value="Cập nhật">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered table-responsive projecttable">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Hình ảnh</th>
                        <th width="10%">Sản phẩm</th>
                        <th width="10%">Số lượng</th>
                        <th width="10%">Giá</th>
                        <th width="10%">Size</th>
                        <th width="15%">Màu</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_details as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{asset('images/product')}}/{{$item->avatar}}" style="width:100%;"></td>
                            <td>{{$item->title_vi}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->size}}</td>
                            <td><label style="background-color: {{$item->color}}; width: 20px; height: 20px"></label> <label>(Mã màu {{$item->color}})</label></td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>

        </div>
    </div>
@endsection