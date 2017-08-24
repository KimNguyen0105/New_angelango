@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>Add Product</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="demo-form2" data-parsley-validate action="{{url('admin/product/create-product')}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/product')}}" class="btn btn-primary" type="button">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" style="margin-bottom: 20px;">
                            <li class="active"><a href="#tab_vi" data-toggle="tab" aria-expanded="true">Tiếng Việt</a></li>
                            <li class=""><a href="#tab_en" data-toggle="tab" aria-expanded="true">English</a></li>
                            <li class=""><a href="#tab_seo" data-toggle="tab" aria-expanded="true">Seo</a></li>
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
                                    <input type="text" class="form-control" name="title_en" id="title_en" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Content
                                    </label>
                                    <textarea class="form-control editors" name="content_en" required id="introduce_en" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_seo">
                                <div class="form-group">
                                    <label for="introduce">
                                        Seo Title
                                    </label>
                                    <input type="text" class="form-control" name="seo_title" id="seo_title" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Seo Keyword
                                    </label>
                                    <input type="text" class="form-control" name="seo_keyword" id="seo_keyword" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Seo Author
                                    </label>
                                    <input type="text" class="form-control" name="seo_author" id="seo_author" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Seo Description
                                    </label>
                                    <textarea class="form-control editors" name="seo_description" required id="seo_description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Ảnh đại diện(360 x 460)</label>
                        <input id="file" accept="image/*" name="file" required type="file" style="padding-bottom: 20px" onchange="readURL(this);">
                        <img id="imgF" src="{{asset('images/product')}}" class="img-responsive" style="width:  100px;">
                    </div>

                     <div class="form-group">
                                    <label for="introduce">
                                        Giá sản phẩm
                                    </label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <input type="text" class="form-control numeral" name="price" id="price"  required placeholder="Nhập giá sản phẩm">
                                             <span style="padding: 4px 12px;font-size: 23px;" class="input-group-addon">₫</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="introduce">
                                        Chọn danh mục sản phẩm
                                    </label>
                                    <select id="heard" name="menu_product" class="form-control" required="">
                                    <option value="">Choose..</option>
                                    @foreach($menu_product as $item)
                                    <option value="{{$item->id}}">{{$item->title_vi}}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label for="introduce">Chọn Size</label>
                                    <select class="selectpicker form-control" name="size[]" multiple>
                                        @foreach($size as $item)
                                            <option value="{{$item->id}}">{{$item->size}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Có khuyến mãi không
                                    </label>
                                    <select id="mySelect" name="is_discount" class="form-control" required="" onchange="myFunction()">
                                    <option value="">Choose..</option>
                                    <option id="khuyenmai" value="1">Có khuyến mãi</option>
                                    <option id = "khongkhuyenmai" value="0">Không khuyến mãi</option>
                                  </select>
                                </div>

                                <div id="km" style="display: none; transition: all 2s;">
                                    <div class="form-group" id="ngayhethankm">
                                        <label class="control-label">Hạn khuyến mãi</label>
                                        <div class="">
                                            <input class="form-control" name="ngaykm" type="date" value="">
                                        </div>
                                        <span class="text-aqua"> Định dạng: <strong>ngày/tháng/năm</strong></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="introduce">
                                            Giá khuyến mãi
                                        </label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control numeral12" name="pricekm" id="price"  required placeholder="Nhập giá sản phẩm">
                                                 <span style="padding: 4px 12px;font-size: 23px;" class="input-group-addon">₫</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   
                                </div>
                                

                                
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="introduce">Chọn màu sản phẩm</label>
                        <div class="input-group demo1 colorpicker-element">
                            <input name="mau[]" type="text" value="#e01ab5" class="form-control">
                            <span class="input-group-addon">
                                <i style="background-color: rgb(224, 26, 181);"></i>
                            </span>
                        </div>
                        <label for="introduce">Chọn hình sản phẩm theo màu (135 x 200)</label><input class="file-multi" type="file" required name="file-multi'+i+'[]" class="file" multiple data-preview-file-type="text" >
                    </div>
                    <label style="padding-top: 8px;" class="col-md-2 pull-left">Hình sản phẩm</label>
                    <button type="button" class="btn btn-primary col-md-2" id="addImage">Thêm hình sản phẩm</button>

                   <div class="col-md-12" id ="insert">
                       
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
     $('.file-multi').fileinput();
    var i =0;
        $(document).ready(function(){
            $("#addImage").click(function(e){
                $("#insert").append('<div class="form-group"><label for="introduce">Chọn màu sản phẩm</label><div class="input-group demo1 colorpicker-element"><input name="mau[]" type="text" value="#e01ab5" class="form-control"><span class="input-group-addon"><i style="background-color: rgb(224, 26, 181);"></i></span></div><label for="introduce">Chọn hình sản phẩm theo màu (135 x 200)</label><input class="file-multi" type="file" required name="file-multi'+i+'[]" class="file" multiple data-preview-file-type="text" ></div>');
                $('.colorpicker-element').colorpicker();
                $('.file-multi').fileinput();
                i++;

            });
        });
        $('.editors').each( function () {

            CKEDITOR.replace(this.id, {
                filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=News',
                filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=News',
                filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=News'
            });
        });
        {{--CKEDITOR.replace('.editors', {--}}
            {{--filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',--}}
            {{--filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=News',--}}
            {{--filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',--}}
            {{--filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=News'--}}
        {{--});--}}

    function myFunction() {
        var cleaveNumeral = new Cleave('.numeral12', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
    var x = document.getElementById("mySelect").value;
    if(x==1)
    {
        $("#km").show();
         
    }
    if(x==0)
    {
        $("#km").hide();
    }
    
}

    </script>
    <script src="{{URL::asset('')}}js/cleave.min.js"></script>
    <script src="{{URL::asset('')}}js/cleave-phone.i18n.js"></script>
    <script>
        var cleaveNumeral = new Cleave('.numeral', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endsection
