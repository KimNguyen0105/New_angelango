@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>@if($banner->type==1){{"Banner sản phẩm"}}@elseif($banner->type==2){{"Banner tin tức"}}@elseif($banner->type==3){{"Banner giới thiệu"}}@elseif($banner->type==4){{"Banner liên hệ"}}@endif</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate action="{{url('admin/banner/edit-banner')}}/{{$banner->id}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/banner')}}" class="btn btn-primary" type="button">Hủy bỏ</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
                
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Hình ảnh(1350 x 560)</label>
                        <input id="file" accept="image/*" name="file" type="file" style="padding-bottom: 20px" onchange="readURL(this);" class="file-loading">
                        <img id="imgF" src="{{asset('images/banner')}}/{{$banner->image}}" class="img-responsive" style="height: 200px;">
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
        {{--CKEDITOR.replace('.editors', {--}}
            {{--filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',--}}
            {{--filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=News',--}}
            {{--filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',--}}
            {{--filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=News'--}}
        {{--});--}}

    </script>
@endsection