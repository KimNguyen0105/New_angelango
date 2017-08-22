@extends('master')
@section('main')
    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="images/banner-product.png" class="img-responsive">
    </section>

    <section class="products-form">
        <h2 class="text-center">VÁY ĐẦM ĐẸP</h2>
        <div class="container">
            <div class="row">
                @foreach($product as $item)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail edit-thumbnail">
                            <a href="{{URL::asset('')}}san-pham/{{$item->id}}-{{str_slug($item->title_vi)}}.html"><img src="{{URL::asset('')}}images/{{$item->avatar}}" alt="{{$item->title_vi}}"
                                                                                class="zoom-img"></a>
                            <div class="caption edit-caption">
                                <h3>@if(app()->getLocale()=='en') {{$item->title_en}} @else {{$item->title_vi}} @endif</h3>
                                <p>
                                    <span style="color: red; font-size: 12pt; font-weight: bold;">{{$item->price}} VNĐ</span>
                                    <a href="{{URL::asset('')}}san-pham/{{$item->id}}-{{str_slug($item->title_vi)}}.html" class="pull-right">Xem thêm</a>
                                </p>
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