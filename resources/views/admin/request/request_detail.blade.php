@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('admin/request')}}" class="btn btn-primary" type="button">Hủy bỏ</a>
        </div>
        <div class="col-md-12 div-order">
            <div class="col-md-3">
                <img src="{{asset('images/product')}}/{{$request->avatar}}">
            </div>
            <div class="col-md-9">
                <h4>Tên sản phẩm: {{$request->title_vi}}</h4>
                <h5>Mã hóa đơn: {{$request->order_id}}</h5>
            </div>
        </div>
        <div class="col-md-12 div-request">
            @if($request_details!=null)
                @foreach($request_details as $detail)
                    @if($detail->type==0)
                        <div class="col-md-8 div-account">
                            <p style="font-weight: bold"><img src="{{URL::asset('')}}images/users/default.png" width="3%">  {{$request->name}}</p>
                            <p>{{$detail->message}}</p>
                            <i>Ngày: {{$detail->updated_at}}</i>
                        </div>
                    @else
                        <div class="col-md-8 div-user">
                            <p style="font-weight: bold"><img src="{{URL::asset('')}}images/users/default.png" width="3%">  {{$detail->username}}</p>
                            <p>{{$detail->message}}</p>
                            <i>Ngày: {{$detail->updated_at}}</i>
                        </div>
                    @endif
                @endforeach
            @endif
            @if($request->status!=0)
                    <div class="col-md-8 div-message">
                        <form id="demo-form2" action="{{url('admin/request/create-request')}}/{{$request->id}}"
                              method="post" enctype="multipart/form-data">
                            <textarea name="message" class="form-control" rows="4" placeholder="Nhập nội dung trả lời"></textarea>
                            <input type="submit" class="btn btn-info" value="Gửi">
                        </form>
                    </div>
                @endif
        </div>
    </div>
@endsection