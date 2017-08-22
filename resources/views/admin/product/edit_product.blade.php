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
            <form id="demo-form2" data-parsley-validate action="{{url('admin/product/edit-product')}}/{{$product->id}}"
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
                                    <input type="text" class="form-control" name="title_vi" id="title_vi"  required maxlength="255" value="{!! old('title_vi',isset($product) ? $product->title_vi: null) !!}">
                                </div>

                                <div class="form-group">
                                    <label for="introduce">
                                        Nội dung
                                    </label>
                                    <textarea class="form-control editors" name="content_vi" required id="introduce_vi" rows="3">{!! old('content_vi',isset($product) ? $product->content_vi: null) !!}</textarea>
                                </div>

                               

                            </div>


                            <div class="tab-pane" id="tab_en">
                                <div class="form-group">
                                    <label for="introduce">
                                        Title
                                    </label>
                                    <input type="text" class="form-control" name="title_en" id="title_en" required maxlength="255" value="{!! old('title_en',isset($product) ? $product->title_en: null) !!}">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Content
                                    </label>
                                    <textarea class="form-control editors" name="content_en" required id="introduce_en" rows="3">{!! old('content_en',isset($product) ? $product->content_en: null) !!}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_seo">
                                <div class="form-group">
                                    <label for="introduce">
                                        Seo Title
                                    </label>
                                    <input type="text" class="form-control" name="seo_title" id="seo_title" required maxlength="255" value="{!! old('seo_title',isset($product) ? $product->seo_title: null) !!}">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Seo Keyword
                                    </label>
                                    <input type="text" class="form-control" name="seo_keyword" id="seo_keyword" required maxlength="255" value="{!! old('seo_keyword',isset($product) ? $product->seo_keyword: null) !!}">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Seo Author
                                    </label>
                                    <input type="text" class="form-control" name="seo_author" id="seo_author" required maxlength="255" value="{!! old('seo_author',isset($product) ? $product->seo_author: null) !!}">
                                </div>
                                <div class="form-group">
                                    <label for="introduce">
                                        Seo Description
                                    </label>
                                    <textarea class="form-control editors" name="seo_description" required id="seo_description" rows="3">{!! old('seo_description',isset($product) ? $product->seo_description: null) !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Ảnh đại diện(360 x 460)</label>
                        <input id="file" accept="image/*" name="file"  type="file" style="padding-bottom: 20px" onchange="readURL(this);">
                        <img id="imgF" src="{{asset('images/product')}}/{{$product->avatar}}" class="img-responsive" style="width:  100px;">
                    </div>

                     <div class="form-group">
                                    <label for="introduce">
                                        Giá sản phẩm
                                    </label>
                                    <input type="text" class="form-control" name="price" id="price" value="{!! old('price',isset($product) ? $product->price: null) !!}" required >
                                </div>

                                <div class="form-group">
                                    <label for="introduce">
                                        Chọn danh mục sản phẩm
                                    </label>
                                    <select id="heard" name="menu_product" class="form-control" required="">
                                    <option value="">Choose..</option>
                                    @foreach($menu_product as $item)
                                    @if($product->menu_product_id == $item->id)
                                    <option value="{{$item->id}}" selected="">{{$item->title_vi}}</option>
                                     @else
                                     <option value="{{$item->id}}">{{$item->title_vi}}</option>
                                    @endif
                                    
                                    @endforeach
                                  </select>
                                </div>

                                

                                <div class="form-group">
                                    <label for="introduce">Chọn Size</label>
                                    <select class="selectpicker form-control" name="size[]" multiple>
                                        @foreach($size as $item)
                                            @if ($product_size->contains('id',$item['id'])))
                                            <option selected value="{{$item['id']}}">{{$item['size']}}</option>
                                            @else
                                            <option value="{{$item['id']}}">{{$item['size']}}</option>
                                             @endif
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                        <label for="introduce">
                                            Điểm đánh giá
                                        </label>
                                        <input type="text" class="form-control" name="rating" id="price" value="{!! old('rating',isset($product) ? $product->rating: null) !!}">
                                    </div>

                                <div class="form-group">
                                    <label for="introduce">
                                        Có khuyến mãi không
                                    </label>
                                    <select id="mySelect" name="is_discount" class="form-control" required="" onchange="myFunction()">
                                    <option value="">Choose..</option>
                                    @if($product->is_discount==1)
                                    <option selected value="1">Có khuyến mãi</option>
                                    <option value="0">Không khuyến mải</option>
                                    @else
                                    <option value="1">Có khuyến mải</option>
                                    <option selected value="0">Không khuyến mải</option>
                                   @endif

                                  </select>
                                </div>
                                
                                <div id="km" style="@if($product->is_discount==0)display: none; transition: all 2s;@elseif($product->is_discount==1) display: block; transition: all 2s;@endif">
                                    <div class="form-group" id="ngayhethankm">
                                        <label class="control-label">Hạn khuyến mãi</label>
                                        <div class="">
                                            <input class="form-control" name="ngaykm" type="date" value="{!! old('ngaykm',isset($discount) ? date( "Y-m-d", strtotime($discount->date)): null) !!}"
                                            >

                                            
                                        </div>
                                        <span class="text-aqua"> Định dạng: <strong>ngày/tháng/năm</strong></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="introduce">
                                            Giá khuyến mãi
                                        </label>
                                        <input type="text" class="form-control" name="pricekm" id="price" value="{!! old('pricekm',isset($discount) ? $discount->price_discount: null) !!}">
                                    </div>
                                    
                                </div>
                               
                </div>
                
                 @foreach($product_color as $item)
                <div class="col-md-12" id="color{{$item->id}}">

                    <div class="form-group">
                        <label for="introduce">Chọn màu sản phẩm</label>
                        <div class="input-group demo1 colorpicker-element">
                             
                            <input name="color{{$item->id}}" type="text" value="{{$item->color}}" class="form-control">
                                <span class="input-group-addon">
                                    <i style="background-color: rgb(224, 26, 181);"></i>
                                    <a style="color: red;" title="Xóa màu" class="xoa_mau" href="{{URL::asset('')}}admin/remove-color/{{$item->id}}/{{$product->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a>
                                </span>
                        </div>
                        <label for="introduce">Chọn hình sản phẩm theo màu (135 x 200)</label>
                        @if(count($product_img)>0)
                        <div class="col-md-12">
                            @foreach($product_img as $image)
                                <div class="img_product" style="width: 14%;float: left;">
                                    @if($image->color==$item->id)
                                    <div style="position: relative;" id="image{{$image->id}}">
                                        <img style="padding-bottom: 15px;"  src="{{asset('images/product_image')}}/{{$image->link}}">
                                        <a style="position: absolute;left: 0px;bottom:21px;" class="btn btn-danger btn-xs xoa_hinh" href="{{URL::asset('')}}admin/remove-img/{{$image->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a>
                                    </div>
                                    @endif
                                </div> 
                            @endforeach
                        </div>
                        @endif

                        <input class="file-multi" type="file" name="file-multi{{$item->id}}[]"  multiple data-preview-file-type="text" >
                    </div>
                </div>
                @endforeach

                <div class="col-md-12">
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
                 var url = '{{URL::asset('')}}'+'admin/add-color/'+'{{$product->id}}'
                $.ajax({
                    type:'GET',
                    url:url,
                    success:function (data) {
                        // alert('#image'+data);
                        $("#insert").append('<div class="form-group"><label for="introduce">Chọn màu sản phẩm</label><div class="input-group demo1 colorpicker-element"><input name="color'+data+'" type="text" value="#e01ab5" class="form-control"><span class="input-group-addon"><i style="background-color: rgb(224, 26, 181);"></i><a style="color: red;" title="Xóa màu" class="xoa_mau" href="{{URL::asset('')}}admin/remove-color/'+data+'/{{$product->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></span></div><label for="introduce">Chọn hình sản phẩm theo màu (135 x 200)</label><input class="file-multi" type="file" required name="file-multi'+data+'[]" class="file" multiple data-preview-file-type="text" ></div>');
                        $('.colorpicker-element').colorpicker();
                        $('.file-multi').fileinput();
                       
                    }

                });
                

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




    </script>
    <script>
        $('.xoa_hinh').click(function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type:'GET',
                url:url,
                success:function (data) {
                    // alert('#image'+data);
                    $('#image'+data).css("display","none");
                }

            });

        });
    </script>
    <script>
        $('.xoa_mau').click(function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type:'GET',
                url:url,
                success:function (data) {
                    // alert('#image'+data);
                    $('#color'+data).css("display","none");
                }

            });

        });

        function myFunction() {
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
@endsection