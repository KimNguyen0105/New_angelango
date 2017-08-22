@extends('master')
@section('main')
    <!--Header Banner-->
    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="{{URL::asset('')}}images/banner/{{$banner->image}}" class="img-responsive">

    </section>

    <!--Header content-->
    @if(Session::get('locale')=='vi')
        {{--set language--}}
    <section>
        <div class="container font-txt">
            <div class="row">
                <div class="text-center col-lg-12 all-about-title ">
                    <h2>{{$abouts[0]->title_vi}}</h2>
                    <p>{!! $abouts[0]->content_vi !!}</p>
                </div>
                <div class="col-md-12 img-about-a">
                    <img src="{{URL::asset('')}}images/about-us/{{$abouts[0]->avatar}}" class="img-responsive">
                </div>
                <div>
                    <div class="col-md-8 img-about-b">
                        <img src="{{URL::asset('')}}images/about-us/{{$abouts[1]->avatar}}" class="img-responsive">
                    </div>
                    <div class="col-md-4 txt-about-a">
                        <h2>{{$abouts[1]->title_vi}}</h2>
                        <p>{!! $abouts[1]->content_vi !!}</p>
                    </div>
                </div>
                <div class="col-md-12 txt-choose">
                    <h2 class="text-center">{{trans('home.we_different')}}</h2>
                    @foreach($about_different as $about)
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <img src="{{URL::asset('')}}images/about-us/{{$about->avatar}}" class="img-responsive">
                            <h4>{{$about->title_vi}}</h4>
                            <p>{!! $about->content_vi !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="row-story font-txt">
        <div class="container cont-about">
            <div class="row">
                <div class="col-md-12 txt-story">
                    <h2 class="text-center" style="color: gray;">{{$abouts[2]->title_vi}}</h2>
                </div>
                <div class="col-md-12 txt-story-p">
                    <p>{!! $abouts[2]->content_vi !!}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="font-txt">
        <div class="container cont-about">
            <div class="row">
                <div class="col-md-12 pic-about-1">
                    <img src="{{URL::asset('')}}images/about-us/{{$abouts[2]->avatar}}" class="img-responsive">
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12 txt-story-p">
                    <h2 style="color: gray;">{{$abouts[3]->title_vi}}</h2>
                    <p class="txt-story-p1">{!! $abouts[3]->content_vi !!}</p>
                </div>
            </div>

        </div>
    </section>
@else
        <section>
            <div class="container font-txt">
                <div class="row">
                    <div class="text-center col-lg-12 all-about-title ">
                        <h2>{{$abouts[0]->title_en}}</h2>
                        <p>{!! $abouts[0]->content_en !!}</p>
                    </div>
                    <div class="col-md-12 img-about-a">
                        <img src="{{URL::asset('')}}images/about-us/{{$abouts[0]->avatar}}" class="img-responsive">
                    </div>
                    <div>
                        <div class="col-md-8 img-about-b">
                            <img src="{{URL::asset('')}}images/about-us/{{$abouts[1]->avatar}}" class="img-responsive">
                        </div>
                        <div class="col-md-4 txt-about-a">
                            <h2>{{$abouts[1]->title_en}}</h2>
                            <p>{!! $abouts[1]->content_en !!}</p>
                        </div>
                    </div>
                    <div class="col-md-12 txt-choose">
                        <h2 class="text-center">{{trans('home.we_different')}}</h2>
                        @foreach($about_different as $about)
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <img src="{{URL::asset('')}}images/about-us/{{$about->avatar}}" class="img-responsive">
                                    <h4>{{$about->title_en}}</h4>
                                    <p>{!! $about->content_en !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="row-story font-txt">
            <div class="container cont-about">
                <div class="row">
                    <div class="col-md-12 txt-story">
                        <h2 class="text-center" style="color: gray;">{{$abouts[2]->title_en}}</h2>
                    </div>
                    <div class="col-md-12 txt-story-p">
                        <p>{!! $abouts[2]->content_en !!}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="font-txt">
            <div class="container cont-about">
                <div class="row">
                    <div class="col-md-12 pic-about-1">
                        <img src="{{URL::asset('')}}images/about-us/{{$abouts[2]->avatar}}" class="img-responsive">
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 txt-story-p">
                        <h2 style="color: gray;">{{$abouts[3]->title_en}}</h2>
                        <p class="txt-story-p1">{!! $abouts[3]->content_en !!}</p>
                    </div>
                </div>

            </div>
        </section>
        @endif
        {{--end set language--}}

    <section class="row-about">
        <div class="container ">
            <div class="col-md-12 img-about-c">
                <img src="{{URL::asset('')}}images/about-us/{{$abouts[3]->avatar}}" class="img-responsive">
            </div>
                <?php
                $hinh = explode(';',$abouts[3]->images_other);
                ?>
            <div class="img-fixed">
                <div class="col-md-4 img-about-c1">
                    <img src="{{URL::asset('')}}images/about-us/{{array_shift($hinh)}}" class="img-responsive">
                </div>
                <div class="col-md-8">
                    <img src="{{URL::asset('')}}images/about-us/{{array_shift($hinh)}}" class="img-responsive">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 img-about-d">
                <img src="{{URL::asset('')}}images/about-us/{{array_shift($hinh)}}" class="img-responsive">
            </div>
            <div class="clearfix"></div>

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
    <section class="container-fluid font-txt" style="padding-top: 35px; padding-bottom: 35px">
        <div class="icon-totop text-center " style="background: #f2f2f2;">
            <a href="#">TOP</a>
        </div>
    </section>
    @endsection