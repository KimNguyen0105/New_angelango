@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>Chi tiết tin tức</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate action="{{url('admin/menu-product/edit-menu-product')}}/{{$menu_product->id}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/menu-product')}}" class="btn btn-primary" type="button">Hủy bỏ</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" style="margin-bottom: 20px;">
                            <li class="active"><a href="#tab_vi" data-toggle="tab" aria-expanded="true">Tiếng Việt</a></li>
                            <li class=""><a href="#tab_en" data-toggle="tab" aria-expanded="true">English</a></li>
                           
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_vi">
                                <div class="form-group">
                                    <label for="introduce">
                                        Tiêu đề
                                    </label>
                                    <input type="text" class="form-control" name="title_vi" id="title_vi" value="{{$menu_product->title_vi}}" required maxlength="255">
                                </div>
                               
                            </div>
                            <div class="tab-pane" id="tab_en">
                                <div class="form-group">
                                    <label for="introduce">
                                        Title
                                    </label>
                                    <input type="text" class="form-control" name="title_en" id="title_en" value="{{$menu_product->title_en}}" required maxlength="255">
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    
                </div>
            </form>
            </div>
        </div>

    
@endsection
