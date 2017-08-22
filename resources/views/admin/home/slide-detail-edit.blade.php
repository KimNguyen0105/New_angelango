@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>Chi tiết Slider</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="frSlide" data-parsley-validate action="{{url('admin/slide')}}/{{$slide->id}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/slide')}}" class="btn btn-primary" type="button">Hủy bỏ</a>
                    <button type="submit" id="btnSave" class="btn btn-success">Lưu</button>
                </div>
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabSlide" style="margin-bottom: 20px;">
                            <li class="active"><a href="#tab_vi" data-toggle="tab" aria-expanded="true">Tiếng Việt</a></li>
                            <li class=""><a href="#tab_en" data-toggle="tab" aria-expanded="true">English</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_vi">
                                <div class="form-group">
                                    <label for="introduce">
                                        Tiêu đề
                                    </label>
                                    <input type="text" class="form-control" name="title_vi" id="title_vi" value="{{$slide->title_vi}}" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Nội dung
                                    </label>
                                    <textarea class="form-control editors" name="content_vi" required id="introduce_vi" rows="3">{{$slide->content_vi}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_en">
                                <div class="form-group">
                                    <label for="introduce">
                                        Title
                                    </label>
                                    <input type="text" class="form-control" name="title_en" id="title_en" value="{{$slide->title_en}}" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Content
                                    </label>
                                    <textarea class="form-control editors" name="content_en" required id="introduce_en" rows="3">{{$slide->content_en}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Link liên kết</label>
                        <input class="form-control" name="link" id="link" value="{{$slide->link}}">
                    </div>
                    <div class="form-group">
                        <label>Thứ tự</label>

                        <input class="form-control" name="sort_order" id="sort_order" value="{{$slide->sort_order}}">
                    </div>
                    <div class="form-group">
                        <label>Hiển thị</label>
                        @if($slide->is_show==1)
                            <input type="checkbox" class="form-control" checked name="is_show" id="is_show" value="{{$slide->is_show}}">
                        @else
                            <input type="checkbox" class="form-control" name="is_show" id="is_show" value="{{$slide->is_show}}">
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="control-label">Hình ảnh(300 x 200)</label>
                        <input id="file" accept="image/*" name="file" type="file" style="padding-bottom: 20px" onchange="readURL(this);">
                        <img id="imgF" src="{{asset('images/slide')}}/{{$slide->avatar}}" class="img-responsive" style="height: 200px;">
                    </div>
                </div>
            </form>
            </div>
        </div>

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgF').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

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
        jQuery(document).ready(function() {
            jQuery('#frSlide').validate({
                ignore: ".ignore",
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",
                rules: {
                    "sort_order": {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    title_vi: {
                        required: 'Tiêu đề không được trống.'
                    },
                    title_en: {
                        required: 'Title không được trống.'
                    },
                    sort_order:{
                        required: 'Thứ tự không được trống.',
                        number: 'Thứ tự phải là số'
                    }
                },
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                        $('#tabSlide a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show')
                }
            });

            jQuery('#btnSave').click(function(evt) {
                evt.preventDefault();

                jQuery('#frSlide').submit()

            });
        });
    </script>
@endsection