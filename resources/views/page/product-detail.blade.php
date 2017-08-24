@extends('master')
@section('main')
    <!--     <header id="myCarousel" class="carousel slide sua-header">

    </header> -->

    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="{{URL::asset('')}}images/banner-product.png"
             class="img-responsive">
    </section>

    <section class="products-form /chi-tiet-san-pham">
        <h2 class="text-center">@if(app()->getLocale()=='vi') {{$product->title_vi}} @else {{$product->title_en}} @endif</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-xs-12">
                    @foreach($image as $item)
                        <div class="edit-pic-dtprd col-md-12 col-xs-4">
                            <center><img src="{{URL::asset('')}}images/product/{{$item->link}}" class="img-responsive">
                            </center>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-6 col-md-8">
                    <center><img src="{{URL::asset('')}}images/product/{{$product->avatar}}" class="img-responsive">
                    </center>
                </div>

                <div class="col-lg-4 col-md-12 edit-info-product-dt">
                    <h2>{{$product->price}} VNĐ</h2>
                    <div class="rate">
                        <input id="input-4" name="input-4" data-min="0" data-max="5" data-step="1" data-size="xs"
                               class="rating rating-input" data-show-clear="false" data-show-caption="false"
                               value="{{$product->rating}}">
                        <span style="color: #e1e1e1">Tình trạng: Còn hàng</span>
                    </div>
                    <!--  <p>Select size:
                         <a href="#">S</a>
                         <a href="#">M</a>
                         <a href="#">L</a>
                         <a href="#">XL</a>
                     </p> -->

                    <div class="well-sm">
                        <span> Kích cỡ: </span>
                        <div class="btn-group select-size" data-toggle="buttons">
                            @foreach($size as $item )
                                <label class="btn">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    {{\App\Models\AglSizeProduct::find($item->size_id)->size}}
                                    <span class="glyphicon glyphicon-ok"></span>
                                </label>
                            @endforeach

                        </div>
                    </div>

                    <div class="well-sm">
                        <span> Chọn màu: </span>
                        <div class="btn-group" data-toggle="buttons">
                            @foreach($color as $item)
                                <label class="btn" style="background: {{$item->color}}">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </label>
                            @endforeach

                        </div>
                    </div>

                    <div class="add-product">
                        <p>Số lượng:
                            <span id="soluong" style="padding: 5px 1px;"><input style="border: none;width: 48px;" class="input-quantity" min="1" type="number" value="1"></span>
                            <span id="btn-addtocart"><a href="javascript:void(0)" data-id="1" class="btn-add-to-cart" >Thêm vào giỏ hàng</a></span>
                        </p>
                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab1" role="tab" data-toggle="tab"> MÔ TẢ</a></li>
                        <li><a href="#tab2" role="tab" data-toggle="tab">BÌNH LUẬN</a></li>
                        <li><a href="#tab3" role="tab" data-toggle="tab">SỐ ĐO</a></li>
                    </ul>
                    <!-- TAB CONTENT -->
                    <div class="tab-content">
                        <div class="active tab-pane fade in" id="tab1">
                            @if(app()->getLocale()=='vi'){!! $product->content_vi !!} @else {!! $product->content_en !!} @endif
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <p><span style="font-weight: bold;">Hoa Phạm:</span> đầm đẹp quá chị.</p>
                            <p><span style="font-weight: bold;">Huệ Nghĩa:</span> Chúc shop thành công.</p>
                            <p><span style="font-weight: bold;">My Trần:</span>đồ rất đẹp ạ <3.</p>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea class="form-control" rows="4" placeholder="Comment..."></textarea>
                                </div>
                                <div class="col-sm-4 pull-right" id="sent-comment">
                                    <input type="submit" name="" value="Gửi">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-xs-4" for="id">Vòng ngực:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control text-center" id="id"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Đo quanh vòng ngực chỗ lớn nhất">
                                    </div>
                                    <div class="dropdown col-xs-3">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            cm
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">inch</a></li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-xs-4" for="id">Vòng eo:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control text-center" id="id"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Đo quanh vòng eo chỗ nhỏ nhất">
                                    </div>
                                    <div class="dropdown col-xs-3">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            cm
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">inch</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4" for="id">Vòng mông:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control text-center" id="id"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Đo vòng quanh mông chỗ lớn nhất">
                                    </div>
                                    <div class="dropdown col-xs-3">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            cm
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">inch</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4" for="id">Ngang vai:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control text-center" id="id"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Đo từ đầu vai này sang đầu vai bên kia">
                                    </div>
                                    <div class="dropdown col-xs-3">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            cm
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">inch</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4" for="id">Dài đầm:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control text-center" id="id"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Đo từ eo lưng quần xuống chân gót giày">
                                    </div>
                                    <div class="dropdown col-xs-3">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            cm
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">inch</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4" for="id">Vòng đùi:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control text-center" id="id"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Đo vòng quanh đùi chỗ lớn nhất">
                                    </div>
                                    <div class="dropdown col-xs-3">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            cm
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">inch</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4" for="id">Chiều cao:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control text-center" id="id"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Đo từ bàn chân đến đỉnh đầu ở tư thế đứng thẳng">
                                    </div>
                                    <div class="dropdown col-xs-3">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            cm
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">inch</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-4 pull-right" id="sent-comment">
                                    <input type="submit" name="" value="Gửi">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>


    <section class="products-form">
        <h2 class="text-center">SẢN PHẨM TƯƠNG TỰ</h2>
        <div class="container">
            <div class="row">
                @foreach($relation as $item)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail edit-thumbnail">
                            <img src="{{URL::asset('')}}images/product/{{$item->avatar}}" alt="...">
                            <div class="caption edit-caption">
                                <h3>@if(app()->getLocale()=='vi'){{$item->title_vi}} @else {{$item->title_en}} @endif</h3>
                                <p>
                                    <a href="{{URL::asset('')}}san-pham/{{$item->id}}-{{str_slug($item->title_vi)}}.html">Xem
                                        thêm.</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="container-fluid to-top font-txt edit-totop-contact">
        <div class="icon-totop text-center edit-icon-totop-contact totop-register">
            <a href="#">TOP</a>
        </div>
    </section>

@endsection
@section('scripts')
    <script src="{{URL::asset('')}}js/star-rating.js" type="text/javascript"></script>
@endsection