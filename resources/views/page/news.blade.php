@extends('master')
@section('main')
    <!--Header Banner-->
    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="{{URL::asset('')}}images/banner/{{$banner->image}}" class="img-responsive">

    </section>

    <!--Header content-->
    <section class=" font-txt">
        <div class="container-fluid top-news-a">
            <div class="text-center news-title">
                <h2>TIN TRONG NGÀY</h2>
                <p>Mang đến bạn mọi tin tức về thời trang và làm đẹp. Với các xu hướng thời trang mới nhất, kiểu tóc và
                    cách
                    thức làm đẹp, hãy khám phá nhiều điều tuyệt vời để có một cuộc sống tươi đẹp hơn.</p>
            </div>
        </div>
        <hr style="border: 1px solid gray; width: 30%;">
    </section>

    <!--Middle content-->
    <section class="font-txt">
        <div class="container">

            @foreach($news as $new)
                @if($loop->iteration%2!=0)
                    <div class="row row-a">
                        @if(Session::get('locale') == 'vi')
                        <div class="col-md-6 col-sm-6">
                            <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_vi}}.html">
                                <img src="{{URL::asset('')}}images/news/{{$new->avatar}}" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-6 row-a1 text-center">
                            <h2><a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_vi}}.html">
                                    {{$new->title_vi}}
                                </a></h2>
                            <p>{!! str_limit($new->content_vi,200) !!}</p>
                            <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_vi}}.html" class="read-more">{{trans('home.read_more')}} <span
                                        class="glyphicon glyphicon-play"
                                        style="font-size: 0.9em"></span></a>
                        </div>
                            @else
                            <div class="col-md-6 col-sm-6">
                                <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_en}}.html">
                                    <img src="{{URL::asset('')}}images/news/{{$new->avatar}}" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 row-a1 text-center">
                                <h2><a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_en}}.html">
                                        {{$new->title_en}}
                                    </a></h2>
                                <p>{!! str_limit($new->content_en,200) !!}</p>
                                <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_en}}.html" class="read-more">{{trans('home.read_more')}} <span
                                            class="glyphicon glyphicon-play"
                                            style="font-size: 0.9em"></span></a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="row row-a">
                        @if(Session::get('locale')=='vi')
                        <div class="col-md-6 col-sm-6 row-a1 text-center">
                            <h2><a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_vi}}.html">{{$new->title_vi}}</a></h2>
                            <p>{!! str_limit($new->content_vi,200) !!}</p>
                            <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_vi}}.html" class="read-more">{{trans('home.read_more')}} <span
                                        class="glyphicon glyphicon-play"
                                        style="font-size: 0.9em"></span></a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_vi}}.html">
                                <img src="{{URL::asset('')}}images/news/{{$new->avatar}}" class="img-responsive">
                            </a>
                        </div>
                            @else
                            <div class="col-md-6 col-sm-6 row-a1 text-center">
                                <h2><a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_en}}.html">{{$new->title_en}}</a></h2>
                                <p>{!! str_limit($new->content_en,200) !!}</p>
                                <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_en}}.html" class="read-more">{{trans('home.read_more')}} <span
                                            class="glyphicon glyphicon-play"
                                            style="font-size: 0.9em"></span></a>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_en}}.html">
                                    <img src="{{URL::asset('')}}images/news/{{$new->avatar}}" class="img-responsive">
                                </a>
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach

        </div>
    </section>

    <!--TOP-->
    <section class="container-fluid font-txt" style="padding-top: 35px; padding-bottom: 35px">
        <div class="icon-totop text-center " style="background: #f2f2f2;">
            <a href="#">TOP</a>
        </div>
    </section>
@endsection