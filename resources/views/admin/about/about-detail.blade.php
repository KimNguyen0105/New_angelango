@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>Chi tiết Giới thiệu</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="frAbout" data-parsley-validate action="{{url('admin/about-us')}}/{{$about->id}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/about-us')}}" class="btn btn-primary" type="button">Hủy bỏ</a>
                    <button type="submit" id="btnSave" class="btn btn-success">Lưu</button>
                </div>
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabAbout" style="margin-bottom: 20px;">
                            <li class="active"><a href="#tab_vi" data-toggle="tab" aria-expanded="true">Tiếng Việt</a></li>
                            <li class=""><a href="#tab_en" data-toggle="tab" aria-expanded="true">English</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_vi">
                                <div class="form-group">
                                    <label for="introduce">
                                        Tiêu đề
                                    </label>
                                    <input type="text" class="form-control" name="title_vi" id="title_vi" value="{{$about->title_vi}}" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Nội dung
                                    </label>
                                    <textarea class="form-control editors" name="content_vi" required id="introduce_vi" rows="3">{{$about->content_vi}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_en">
                                <div class="form-group">
                                    <label for="introduce">
                                        Title
                                    </label>
                                    <input type="text" class="form-control" name="title_en" id="title_en" value="{{$about->title_en}}" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Content
                                    </label>
                                    <textarea class="form-control editors" name="content_en" required id="introduce_en" rows="3">{{$about->content_en}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Hình ảnh(300 x 200)</label>
                        <input id="file" accept="image/*" name="file" type="file" style="padding-bottom: 20px" onchange="readURL(this);">
                        <img id="imgF" src="{{asset('images/about-us')}}/{{$about->avatar}}" class="img-responsive" style="height: 200px;">
                    </div>
                </div>
                @if($about->id==4)
                    @if(count($images)!=0)
                        <div class="col-md-12">
                            <h5>Hình ảnh thêm  <a onclick="DeleteImage()" class="btn btn-danger" id="btn-DeleteImage" type="submit" value="Xóa hình ảnh đã chọn">Xóa hình ảnh</a></h5>
                            @foreach($images as $image)
                                <div class="col-md-4">
                                    <img src="{{asset('images/about-us')}}/{{$image}}" style="width: 100%;">
                                    <label style="position: absolute;top: 0;background: rgb(228, 43, 43);padding: 10px 20px;color: #fff;"><input type="checkbox" value="{{$image}}">Xóa ảnh</label>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Hình ảnh thêm(300 x 200)</label>
                            <input id="file-multi" type="file" name="file-multi[]" class="file" multiple data-preview-file-type="text" >
                        </div>
                    </div>
                @endif
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
        function DeleteImage() {
            var yourArray=[];
            $("input[type=checkbox]:checked").each(function(){
                yourArray.push($(this).val());
            });
            $.ajax({
                url: "{{url('admin/about-us/delete-images')}}/{{$about->id}}",
                type: 'get',
                data: {'images': yourArray},
                success: function(result){
                        if(result==1)
                        {
                            location.href="{{url('admin/about-us')}}/{{$about->id}}"
                        }
                }});
        }

    </script>

@endsection
@section('scripts')
    <script src="{{URL::asset('')}}ckeditor/ckeditor.js"></script>
    {{--<script src="{{URL::asset('')}}ckfinder/ckfinder.js"></script>--}}
    <script>
        $('.editors').each( function () {

            CKEDITOR.replace(this.id, {
            });
        });
        jQuery(document).ready(function() {
            jQuery('#frAbout').validate({
                ignore: ".ignore",
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",
                messages: {
                    title_vi: {
                        required: 'Tiêu đề không được trống.'
                    },
                    title_en: {
                        required: 'Title không được trống.'
                    },
                    content_vi: {
                        required: 'Nội dung vi không được trống.'
                    },
                    content_en: {
                        required: 'Nội dung vi không được trống.'
                    }
                },
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                        $('#tabAbout a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show')
                }
            });

            jQuery('#btnSave').click(function(evt) {
                evt.preventDefault();

                jQuery('#frAbout').submit()

            });
        });
    </script>
@endsection