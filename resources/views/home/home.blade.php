@extends('master')
@section('main')
    {{--BANNER HEADER--}}
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

    <!-- Page Content -->
    <section class="top-content font-txt">
        <div class="container">
            <!-- Marketing Icons Section -->

            <div class="col-lg-12">
                <h2 class="page-header text-center wow fadeInDown animated" data-wow-delay=".3s" style="color: gray; ">
                    @if(Session::get('locale')=='vi'){{$abouts[0]->title_vi}}@else{{$abouts[0]->title_en}}@endif

                </h2>
            </div>
            <div class="col-md-8 col-md-offset-2 text-center wow fadeInDown animated" data-wow-delay=".3s">
                @if(Session::get('locale')=='vi')
                <h3>{!! $abouts[0]->content_vi !!}</h3>
                    @else
                    <h3>{!! $abouts[0]->content_en !!}</h3>
                    @endif
            </div>

        </div>
        <!-- /.row -->
    </section>
    <div class="container">
        <div class="col-md-12 " style="text-align: -webkit-center;">
            <img src="{{URL::asset('')}}images/about-us/{{$abouts[0]->images_other}}" class="img-responsive img-setting wow zoomIn animated"
                 data-wow-delay=".3s">
        </div>
    </div>
    <section class="top-middle-content font-txt">
        <div class="container-fluid abc">
            <!-- Marketing Icons Section -->
            <div class="">
                <div class="col-lg-12 gray-row">
                    <div class="col-md-6 col-sm-6">
                        <img src="{{URL::asset('')}}images/about-us/{{$abouts[1]->images_other}}" class="img-responsive img-news wow zoomIn animated"
                             data-wow-delay=".3s" alt="">
                    </div>
                    @if(Session::get('locale')=='vi')
                    <div class="col-md-6 col-sm-6 text-field wow fadeInDown animated" data-wow-delay=".3s">
                        <h1 style="color:#000">{{$abouts[1]->title_vi}}</h1>
                        <p>{!! $abouts[1]->content_vi !!}</p>
                        <a href="{{asset('/gioi-thieu.html')}}" class="read-more">{{trans('home.read_more')}} <span
                                    class="glyphicon glyphicon-play"
                                    style="font-size: 0.9em"></span></a>
                    </div>
                        @else
                        <div class="col-md-6 col-sm-6 text-field wow fadeInDown animated" data-wow-delay=".3s">
                            <h1 style="color:#000">{{$abouts[1]->title_en}}</h1>
                            <p>{!! $abouts[1]->content_en !!}</p>
                            <a href="{{asset('/gioi-thieu.html')}}" class="read-more">{{trans('home.read_more')}} <span
                                        class="glyphicon glyphicon-play"
                                        style="font-size: 0.9em"></span></a>
                        </div>
                        @endif

                </div>
            </div>
            <div>
                <div class="col-md-12 txt-right">
                    <div class="collect collect-e wow fadeInLeftBig animated" data-wow-delay=".3s">
                        <h1>{{trans('home.collection')}}</h1>
                        <h3 class="font-collect">{{trans('home.coll_1')}}<br>{{trans('home.coll_2')}} </h3>
                    </div>

                    <img src="{{URL::asset('')}}images/collection/project-pic.png"
                         class="img-responsive pull-right img-coll wow fadeInRightBig animated"
                         data-wow-delay=".3s" alt="">
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>

    <section class="bottom-content font-txt">
        <div class="container-fluid">
            <div class="col-md-4 col-lg-offset-1 col-sm-8">
                <div class="col-md-12">
                    <img src="images/product-2.png" class="img-responsive zoom-img" alt="">
                </div>

                <div class="col-md-12 txt-galery-a">
                    <h3 style="color: black">Kiểu áo lệch, trễ vai</h3>
                    <p>Bộ quần áo jumpsuit với găng tay dài 3/4 được làm từ vải polyester spandex. Đối với một phong
                        cách trang bị tuyệt vời, thiết kế bao gồm dây đai dải và đai thắt lưng đàn hồi.</p>
                </div>

            </div>

            <div class="col-md-6 col-sm-6 product-a">
                <div class="col-md-12">
                    <img src="images/product-2-1.png" class="img-responsive zoom-img" alt="">
                </div>

                <div class="col-md-12 txt-galery-b">
                    <h3 style="color: black">Váy voan</h3>
                    <p>Những chiếc váy voan mềm điểm họa tiết hoa xinh xắn thích hợp cho dạo phố.</p>
                </div>

            </div>

            <div class="col-md-6 col-sm-6 product-b product-b-e">
                <div class="col-md-12">
                    <img src="images/product-1.png" class="img-responsive zoom-img" alt="">
                </div>
                <div class="col-md-6">
                    <h3 style="color: black">Đầm ren</h3>
                    <p class="txt-product">Đầm ren là một trong những chất liệu gợi cảm nhất thế giới thời trang nhất là
                        những chiếc đầm ren bởi vẻ đẹp sang trọng.</p>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="col-md-6 col-sm-6 product-c">
                <img src="images/product-1-1.png" class="img-responsive zoom-img" alt="">
            </div>


        </div>
    </section>

    <!--collection-->
    <section class="bottom-content-bottom font-txt">

        <div class="container-fluid con-collect">
            <div class="col-md-12">
                <img class="img-responsive pull-right wow fadeInLeftBig animated" data-wow-delay=".3s"
                     src="{{URL::asset('')}}images/collection/collection.png">
            </div>

            <div class="pull-right wow fadeInRightBig animated txt-collect" data-wow-delay=".2s"
                 style="margin-right: 1%">
                <h3><a href="{{asset('/bo-suu-tap.html')}}">{{trans('home.coll_new')}}</a></h3>
                <p>{{trans('home.coll_new_d')}}</p>
            </div>
        </div>
    </section>

    <!--PROMOTION-->
    <section class="footer-content studio font-txt">
        <div class="container-fluid con-studio">

            <div class="col-md-6 img-studio">
                <img src="{{URL::asset('')}}images/news/2AngelaN_gdggdgdction_Detail.png" class="img-responsive wow fadeInLeftBig animated"
                     data-wow-delay=".5s">
            </div>
            <div class="col-md-5 info-studio info-studio-e wow zoomIn animated" data-wow-delay=".3s">
                <h1>Tin tức</h1>
                <h2>Sắc màu và kiểu dáng ấn tượng</h2>
                <p>Chuyên mục trang tin tức về các xu hướng thời trang nổi bật cùng Angela Ngo</p>
                <a href="{{asset('/tin-tuc.html')}}">{{trans('home.read_more')}}</a>
            </div>
            <div class="col-md-6">
                <h2>ĐĂNG KÝ ƯU ĐÃI</h2>
            </div>
            <div class="col-md-4">
                <div class="">
                    <div class="mail">
                        <form>
                            <input type="text" value="" placeholder="Nhập Email">
                            <!--<button type="button" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-play"></span></button>-->
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

                        <p class="text-center azfoothills"></p>
                    </div>
                    <div class="col-md-5 col-md-offset-1 col-xs-11 col-xs-offset-1 edit-press-2">
                        <p>
                            “Tôi không làm ra thời trang, tôi chính là thời trang”
                        </p>
                        <p class="text-center stylefiles elles"></p>
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
            <p class="instagram-p">ANGELA NGO - SÁNG TẠO & PHONG CÁCH</p>

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
                    <img src="{{URL::asset('')}}images/product/pic-shop-1.png" class="img-responsive pic1">
                    <a class="pull-right text-shopnews" href="{{asset('/san-pham.html')}}">SẢN PHẨM</a>
                </div>

                <div class="col-md-6 edit-shopnews shop-contain">
                    <img src="{{URL::asset('')}}images/news/pic-shop-2.png" class="img-responsive pic1">
                    <a class="pull-right text-shopnews" href="{{asset('/tin-tuc.html')}}">TIN TỨC</a>
                </div>
            </div>
        </div>
    </section>

@endsection
