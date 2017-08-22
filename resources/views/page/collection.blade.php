@extends('master')
@section('main')
    {{--BANNER HEADER--}}
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for slides -->
        <div class="carousel-inner swiper-container" role="listbox">
            <div class="swiper-wrapper">
                @foreach($slides as $slide)
                    <div class="item active swiper-slide">
                        <div class="fill" style="background-image:url('images/slide/{{$slide->avatar}}');">

                        </div>
                    </div>
                @endforeach

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </header>
    <div class="text-center news-title">
        <h1>{{trans('home.collection_r')}}</h1>
    </div>
    <!--Middle content 1-->
    @foreach($collections as $key => $collection)
        @if($loop->iteration%2!=0)
            <?php
            $hinh = explode(';',$collection->images);
            ?>
            <section class="top-collects font-txt">
                <div class="container-fluid top-news-a">
                    <div class="col-lg-12">
                        <div class="col-md-6 all-pic-collect">
                            <div class="col-md-12"><h2 class="collects-title">
                                    @if(Session::get('locale')=='vi'){{$collection->title_vi}}
                                        @else {{$collection->title_en}}
                                        @endif
                                </h2></div>
                            <div class="col-md-12">
                                <img class="img-responsive" src="{{URL::asset('images/collection')}}/{{$collection->avatar}}">
                            </div>
                        </div>
                        <div class="col-md-6 all-pic-collect-1">
                            <div class="col-md-12 pic-collect-top">
                                <img class="img-responsive" src="{{URL::asset('images/collection')}}/{{array_shift($hinh)}}">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12 pic-collect-1">
                                    <img class="img-responsive" src="{{URL::asset('images/collection')}}/{{array_shift($hinh)}}">
                                </div>
                                <div class="col-md-8 pic-collect-2">
                                    <div class="col-md-8">
                                        <img class="img-responsive" src="{{URL::asset('images/collection')}}/{{array_shift($hinh)}}">
                                    </div>

                                    <div class="col-md-4 txt-pic-2">
                                        @if(Session::get('locale')=='vi')
                                        <a href="{{asset('/')}}chi-tiet-bo-suu-tap-{{$collection->id}}-{{$collection->slug_vi}}.html">{{trans('home.detail')}}</a>
                                    @else
                                            <a href="{{asset('/')}}chi-tiet-bo-suu-tap-{{$collection->id}}-{{$collection->slug_en}}.html">{{trans('home.detail')}}</a>
                                            @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <?php
            $hinh = explode(';',$collection->images);
            ?>
            <section class="middle-collect font-txt">
                <div class="container-fluid all-colls-title">
                    <div class="col-lg-12 all-pic-cont">
                        <div class="col-md-6">
                            <div class="col-md-12 collect-a">
                                <img class="img-responsive" src="{{URL::asset('images/collection')}}/{{array_shift($hinh)}}">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12 collect-b">
                                    <img class="img-responsive" src="{{URL::asset('images/collection')}}/{{array_shift($hinh)}}">
                                </div>
                                <div class="col-md-8 collect-c">
                                    <div class="col-md-4 txt-pic-2">
                                        @if(Session::get('locale')=='vi')
                                        <a href="{{asset('/')}}chi-tiet-bo-suu-tap-{{$collection->id}}-{{$collection->slug_vi}}.html">{{trans('home.detail')}}</a>
                                    @else
                                            <a href="{{asset('/')}}chi-tiet-bo-suu-tap-{{$collection->id}}-{{$collection->slug_en}}.html">{{trans('home.detail')}}</a>
                                            @endif
                                    </div>
                                    <div class="col-md-8">
                                        <img class="img-responsive" src="{{URL::asset('images/collection')}}/{{array_shift($hinh)}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12"><h2 class="collects-title-2">@if(Session::get('locale')=='vi'){{$collection->title_vi}}@else {{$collection->title_en}}@endif</h2></div>
                            <div class="col-md-12">
                                <img class="img-responsive collects-title-2" src="{{URL::asset('images/collection')}}/{{$collection->avatar}}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endforeach


    <!--PROMOTION-->
    <section class="footer-content studio font-txt">
        <div class="container-fluid con-studio">

            <div class="col-md-6 img-studio">
                <img src="images/2AngelaN_gdggdgdction_Detail.png" class="img-responsive wow fadeInLeftBig animated"
                     data-wow-delay=".5s">
            </div>
            <div class="col-md-5 info-studio info-studio-e wow zoomIn animated" data-wow-delay=".3s">
                <h2>Tin tức</h2>
                <h2>Sắc màu và kiểu dáng ấn tượng</h2>
                <p>Chuyên mục trang tin tức về các xu hướng thời trang nổi bật cùng Angela Ngô</p>
                <a href="#">Xem thêm</a>
            </div>
            <div class="col-md-6">
                <h2>ĐĂNG KÝ ƯU ĐÃI</h2>
            </div>
            <div class="col-md-4">
                <div class="">
                    <div class="mail">
                        <form>
                            <input type="text" value="" placeholder="Nhập Email">
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>

    <!--in the press-->
    <section class="container-fluit thepress font-txt">
        <h3 class="text-center">Thời trang & Cuộc sống</h3>
        <div class="container swiper-container">

            <div class="swiper-wrapper">
                <div class="row swiper-slide">
                    <div class="col-md-5 col-md-offset-1 col-xs-11 col-xs-offset-1 edit-press-1">
                        <p class="text-center">
                            “Thời trang là thứ mà các NTK đem lại cho bạn 4 lần mỗi năm. Và phong cách là thứ mà bạn lựa
                            chọn”
                        </p>

                        <p class="text-center azfoothills">Lauren Hutton</p>
                    </div>
                    <div class="col-md-5 col-md-offset-1 col-xs-11 col-xs-offset-1 edit-press-2">
                        <p>
                            “Tôi không làm ra thời trang, tôi chính là thời trang”
                        </p>
                        <p class="text-center stylefiles elles">Coco Chanel</p>
                    </div>
                </div>
                <div class="row swiper-slide">
                    <div class="col-md-5 col-md-offset-1 col-xs-11 col-xs-offset-1 edit-press-1">
                        <p class="text-center ">
                            “Thời trang là thứ mà các NTK đem lại cho bạn 4 lần mỗi năm. Và phong cách là thứ mà bạn lựa
                            chọn”
                        </p>
                        <p class="text-center azfoothills">Lauren Hutton</p>
                    </div>
                    <div class="col-md-5 col-md-offset-1 col-xs-11 col-xs-offset-1 edit-press-2">
                        <p class="text-center">
                            “Tôi không làm ra thời trang, tôi chính là thời trang”
                        </p>
                        <p class="text-center stylefiles elles">Coco Chanel</p>
                    </div>
                </div>

            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!--store-->
    <section class="container-fluid instagram font-txt">
        <div class="text-center">
            <p class="instagram-p">SẢN PHẨM</p>

        </div>

        <div class="row all-pic-near all-pic-near-e">
            <div class="col-md-4 near-pic">
                <!-- <div class="col-md-12 text-center txt-store">NỔI BẬT</div> -->
                <div class="col-md-12 edit-noibat">
                    <h2 class="text-center">NỔI BẬT</h2>
                    <img src="images/near-footer-1.png" class="img-responsive zoom-img">
                </div>

            </div>
            <div class="col-md-4 near-pic1">
                <div class="col-md-12 edit-noibat">
                    <h2 class="text-center">SẢN PHẨM MỚI</h2>
                    <img src="images/near-footer-2.png" class="img-responsive zoom-img">
                </div>
            </div>
            <div class="col-md-4 near-pic2">
                <div class="col-md-12 edit-noibat">
                    <h2 class="text-center">BÁN CHẠY NHẤT</h2>
                    <img src="images/near-footer-3.png" class="img-responsive zoom-img">
                </div>

            </div>
        </div>
    </section>

    <!--TOP-->
    <section class="container-fluid to-top font-txt">
        <div class="icon-totop text-center">
            <a href="#">TOP</a>
        </div>
    </section>

    <!--SHOP & NEWS-->
    <section class="shopnews font-txt">
        <div class="container">
            <div class="row">
                <div class="col-md-6 edit-shopnews shop-contain">
                    <img src="images/pic-shop-1.png" class="img-responsive pic1">
                    <a class="pull-right text-shopnews" href="#">SẢN PHẨM</a>
                </div>

                <div class="col-md-6 edit-shopnews shop-contain">
                    <img src="images/pic-shop-2.png" class="img-responsive pic1">
                    <a class="pull-right text-shopnews" href="#">TIN TỨC</a>
                </div>
            </div>
        </div>
    </section>


@endsection