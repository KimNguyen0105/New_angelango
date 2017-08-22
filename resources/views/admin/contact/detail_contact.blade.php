@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('admin/contact')}}" class="btn btn-primary" type="button">Trở về</a>
        </div>
        <div class="col-md-12 div-order">
            <h3>Thông tin liên hệ</h3>
            <div class="col-md-5">
                <p>Tên khách hàng: {{$contact->name}}</p>
                <p>Email: {{$contact->email}}</p>
                <p>Số điện thoại: {{$contact->phone}}</p>
                <p>Địa chỉ: {{$contact->address}}</p>
            </div>

            <div class="col-md-7">
                <p>Tiêu đề: {{$contact->title}}</p>
                <p>Ngày gửi: {{$contact->created_at}}</p>
                <p>Nội dung tin nhắn: {{$contact->message}}</p>
            </div>
        </div>
        <div class="col-md-12 div-request">
            <div class="col-md-4 div-status-order">
                <p>Trạng thái liên hệ:
                    @if($contact->status==0)
                        Chưa trả lời
                    @else
                        Đã trả lời
                    @endif
                </p>
                <div class="form-group">
                    <label>Cập nhật trạng thái đơn hàng</label>
                    <form method="POST" action="{{url('admin/contact')}}/{{$contact->id}}">
                        <select class="form-control" name="status">
                            @if($contact->status==0)
                                <option value="0" selected>Chưa trả lời</option>
                                <option value="1">Đã trả lời</option>
                            @else
                                <option value="0">Chưa trả lời</option>
                                <option value="1" selected>Đã trả lời</option>
                            @endif
                        </select>
                        <input type="submit" class="btn btn-info" style="margin-top: 20px" value="Cập nhật">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection