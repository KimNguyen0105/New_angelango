@extends('master')
@section('main')
    {{--HEADER BANNER--}}

    <section class="banner-newsdetail">
        <img style="width: 100%; height: auto;" src="{{URL::asset('')}}images/banner/{{$banner->image}}" class="img-responsive">

    </section>

    <section class="news-header">
        <div class="container news-contain font-txt">
            <div class="row">
                @if(Session::get('locale')=='vi')
                <div class="col-lg-12 txt-news-a">
                    <h1>{{$news->title_vi}}</h1>
                    <p>{!! $news->content_vi !!}</p>
                </div>
                <div class="col-md-12">
                    <h1 class="text-center">{{trans('home.read_next')}}</h1>
                </div>
                <div class="">
                    @foreach($news_update as $key=>$new)
                        @if($key < 2)
                            <div class="col-md-6 txt-news-a txt-row">
                                <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_vi}}.html">
                                    <img src="{{URL::asset('')}}images/news/{{$new->avatar}}" class="img-responsive">
                                </a>

                                <h3><a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_vi}}.html">{{$new->title_vi}}</a></h3>
                                <p class="txt-edit">{!! str_limit($new->content_vi,200) !!}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
                    @else
                    <div class="col-lg-12 txt-news-a">
                        <h1>{{$news->title_en}}</h1>
                        <p>{!! $news->content_en !!}</p>
                    </div>
                    <div class="col-md-12">
                        <h1 class="text-center">{{trans('home.read_next')}}</h1>
                    </div>
                    <div class="">
                        @foreach($news_update as $key=>$new)
                            @if($key < 2)
                                <div class="col-md-6 txt-news-a txt-row">
                                    <a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_en}}.html">
                                        <img src="{{URL::asset('')}}images/news/{{$new->avatar}}" class="img-responsive">
                                    </a>

                                    <h3><a href="{{asset('/')}}chi-tiet-tin-tuc-{{$new->id}}-{{$new->slug_en}}.html">{{$new->title_en}}</a></h3>
                                    <p class="txt-edit">{!! str_limit($new->content_en,200) !!}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @endif
            </div>

        </div>
    </section>
    <!--TOP-->
    <section class="container-fluid to-top font-txt edit-totop-contact">
        <div class="icon-totop text-center edit-icon-totop-contact totop-register">
            <a href="#">TOP</a>
        </div>
    </section>
@endsection