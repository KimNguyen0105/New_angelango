@extends('master')
@section('main')
    <!--Header Banner-->
    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="images/news/News_banner.jpg" class="img-responsive">

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
                        <div class="col-md-6 col-sm-6">
                            <a href="{{asset('/chi-tiet-tin-tuc.html')}}">
                                <img src="images/news/News1.jpg" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-6 row-a1 text-center">
                            <h2><a href="{{asset('/chi-tiet-tin-tuc.html')}}">CELINE DION – BIỂU TƯỢNG THỜI TRANG Ở TUỔI
                                    49</a></h2>
                            <p>Trước kia, Celine rất hiếm khi được nhắc về thời trang. Nhưng giờ đây, ở tuổi 49, nữ ca
                                sĩ bắt đầu
                                thử nghiệm với thời trang. Hình ảnh của Celine Dion đã xuất hiện trên khắp các mặt báo
                                như ngày
                                nay.</p>
                            <a href="{{asset('/chi-tiet-tin-tuc.html')}}" class="read-more">XEM THÊM <span
                                        class="glyphicon glyphicon-play"
                                        style="font-size: 0.9em"></span></a>
                        </div>
                    </div>
                @else
                    <div class="row row-a">
                        <div class="col-md-6 col-sm-6 row-a1 text-center">
                            <h2><a href="{{asset('/chi-tiet-tin-tuc.html')}}">SẮC THU</a></h2>
                            <p>Màu sắc là một trong nhiều yếu tố cấu thành nên thời trang. Biết được tông màu nào đang
                                được ưa
                                chuộng sẽ giúp phái đẹp bắt kịp xu hướng cũng như sành điệu hơn trong phong cách thường
                                ngày.</p>
                            <a href="{{asset('/chi-tiet-tin-tuc.html')}}" class="read-more">XEM THÊM <span
                                        class="glyphicon glyphicon-play"
                                        style="font-size: 0.9em"></span></a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{asset('/chi-tiet-tin-tuc.html')}}">
                                <img src="images/news/News2.jpg" class="img-responsive">
                            </a>
                        </div>
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