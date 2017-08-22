@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>Chi tiết thời trang và cuộc sống</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate action="{{url('admin/style-life')}}/{{$style->id}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/style-life')}}" class="btn btn-primary" type="button">Hủy bỏ</a>
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
                                        Nội dung
                                    </label>
                                    <textarea class="form-control editors" name="content_vi" required id="introduce_vi" rows="3">{{$style->content_vi}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_en">
                                <div class="form-group">
                                    <label for="introduce">
                                        Content
                                    </label>
                                    <textarea class="form-control editors" name="content_en" required id="introduce_en" rows="3">{{$style->content_en}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{URL::asset('')}}ckeditor/ckeditor.js"></script>
    <script src="{{URL::asset('')}}ckfinder/ckfinder.js"></script>
    <script>
        $('.editors').each( function () {

            CKEDITOR.replace(this.id, {
                filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=News',
                filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=News'
            });
        });
        {{--CKEDITOR.replace('.editors', {--}}
            {{--filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',--}}
            {{--filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=News',--}}
            {{--filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',--}}
            {{--filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=News'--}}
        {{--});--}}

    </script>
@endsection