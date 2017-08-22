@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>Thông tin Hướng dẫn</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="frGuide" data-parsley-validate action="{{url('admin/guide/0')}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/guide')}}" class="btn btn-primary" type="button">Cancel</a>
                    <button type="submit" id="btnSave" class="btn btn-success">Save</button>
                </div>
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabGuide" style="margin-bottom: 20px;">
                            <li class="active"><a href="#tab_vi" data-toggle="tab" aria-expanded="true">Tiếng Việt</a></li>
                            <li class=""><a href="#tab_en" data-toggle="tab" aria-expanded="true">English</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_vi">
                                <div class="form-group">
                                    <label for="introduce">
                                        Tiêu đề
                                    </label>
                                    <input type="text" class="form-control" name="title_vi" id="title_vi"  required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Nội dung
                                    </label>
                                    <textarea class="form-control editors" name="content_vi" required id="introduce_vi" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_en">
                                <div class="form-group">
                                    <label for="introduce">
                                        Title
                                    </label>
                                    <input type="text" class="form-control" name="title_en" id="title_en"  required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Content
                                    </label>
                                    <textarea class="form-control editors" name="content_en" required id="introduce_en" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="introduce">
                            Thứ tự
                        </label>
                        <input type="text" class="form-control" name="sort_order" id="sort_order" required maxlength="255">
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
                filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=News',
                filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=News'
            });
        });
        jQuery(document).ready(function() {
            jQuery('#frGuide').validate({
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
                    content_vi: {
                        required: 'Nội dung vi không được trống.'
                    },
                    content_en: {
                        required: 'Nội dung vi không được trống.'
                    },
                    file: {
                        required: 'Hình ảnh không được trống.'
                    },
                    sort_order:{
                        required: 'Thứ tự không được trống.',
                        number: 'Thứ tự phải là số'
                    }
                },
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                        $('#tabGuide a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show')
                }
            });

            jQuery('#btnSave').click(function(evt) {
                evt.preventDefault();

                jQuery('#frGuide').submit()

            });
        });

    </script>
@endsection