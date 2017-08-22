@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate action="{{url('admin/discount/edit-discount')}}/{{$discount->id}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/discount')}}" class="btn btn-primary" type="button">Hủy bỏ</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
                
                <div class="col-md-8">
                    <div class="form-group" id="ngayhethankm">
                        <label class="control-label">Hạn khuyến mãi</label>
                        <div class="">
                            <input class="form-control" name="ngaykm" type="date" value="{!! old('ngaykm',isset($discount) ? date( "Y-m-d", strtotime($discount->date)): null) !!}">
                        </div>
                        <span class="text-aqua"> Định dạng: <strong>ngày/tháng/năm</strong></span>
                    </div>
                    <div class="form-group">
                        <label for="introduce">Giá khuyến mãi</label>
                        <input type="text" class="form-control" name="price_discount" id="price_discount"  required value="{!! old('price_discount',isset($discount) ? $discount->price_discount: null) !!}">
                    </div>
                </div>
            </form>
            </div>
        </div>

@endsection
