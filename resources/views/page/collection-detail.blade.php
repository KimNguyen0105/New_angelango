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
                        <div class="fill" style="background-image:url('images/{{$slide->avatar}}');">

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

    <!--Header content -->
    <section class="middle-collect-detail font-txt">
        <div class="container-fluid all-detail-title">
            <div class="col-lg-12 txt-head-1">
                <h1 class="text-center font-txt">{{$collections_detail->title_vi}}</h1>
            </div>
            <div class="col-md-8 col-md-offset-2 txt-head-2">

            </div>
            <div class=" text-center col-md-12 txt-detail-a font-txt">
                <p>{!! $collections_detail->content_vi !!}</p>

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!--Middle content 1-->
    <section class="top-collects-detail font-txt">


        <div class="container">
            <div class="am-container" id="am-container">
                <?php
                $hinh = explode(';', $collections_detail->images);
//                            var_dump($hinh);die()
                ?>
                @foreach($hinh as $key => $collect)

                    <figure>
                        <a class="@if($key==0) {{'fadeInDown'}} @elseif($key==1) {{'fadeInLeftBig'}} @endif animated"
                           data-wow-delay=".3s">
                            <img src="{{URL::asset('')}}images/collection-detail/{{$collect}}">
                        </a>
                    </figure>
                @endforeach

            </div>
        </div>
        <script>
            // For Demo purposes only (show hover effect on mobile devices)
            [].slice.call(document.querySelectorAll('a[href="#"')).forEach(function (el) {
                el.addEventListener('click', function (ev) {
                    ev.preventDefault();
                });
            });
        </script>
    </section>
    <div class="clearfix"></div>

    <section class="mid-detail-3 font-txt">
        <div class="container-fluid mid-colls-detail-3" style="text-align: -webkit-center;padding-bottom: 5%;">
            <button class="btn-lg btn-default text-center"><a href="{{asset('/bo-suu-tap.html')}}">Tiếp</a></button>
        </div>
    </section>

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