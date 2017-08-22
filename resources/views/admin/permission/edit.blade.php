@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                <h3>Add News</h3>
            </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="frNews" data-parsley-validate action="{{url('/admin/permission')}}/{{$permission->id}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/permission')}}" class="btn btn-primary" type="button">Cancel</a>
                    <button type="submit" id="btnSave" class="btn btn-success">Save</button>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Quyền</label>
                        <input class="form-control" value="{{$permission->name}}" required name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" required id="link" value="{{$permission->link}}">
                    </div>
                    <div class="form-group">
                        <label>Công việc</label>
                        <input class="form-control" name="note" id="note" value="{{$permission->note}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Thuộc nhóm</label>
                        <select class="form-control" name="parent_id">
                            <option value="0">Nhóm cha</option>
                            @foreach($parents as $parent)
                                @if($parent->id==$permission->parent_id)
                                    <option value="{{$parent->id}}" selected>{{$parent->name}}</option>
                                    @else
                                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                                @endif
                            @endforeach
                        </select>
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
            jQuery('#frNews').validate({
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
                    file: {
                        required: 'Hình ảnh không được trống.'
                    },
                    seo_title:{
                        required: 'Seo title không được trống.'
                    },
                    seo_keyword: {
                        required: 'Seo keyword không được trống.'
                    },
                    seo_author: {
                        required: 'Seo author không được trống.'
                    },
                    seo_description: {
                        required: 'Seo description không được trống.'
                    }
                },
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                        $('#tabNews a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show')
                }
            });

            jQuery('#btnSave').click(function(evt) {
                evt.preventDefault();

                jQuery('#frNews').submit()

            });
        });
    </script>
@endsection