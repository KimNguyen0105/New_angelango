@extends('master')
@section('main')
    {{--HEADER BANNER--}}

    <section class="banner-newsdetail">
        <img style="width: 100%; height: auto;" src="images/news/News_banner.jpg" class="img-responsive">

    </section>

    <section class="news-header">
        <div class="container news-contain font-txt">
            <div class="row">
                <div class="col-lg-12 txt-news-a">
                    <h1>SẮC THU</h1>
                    <p>Màu sắc là một trong nhiều yếu tố cấu thành nên thời trang. Biết được tông màu nào đang được ưa
                        chuộng sẽ giúp phái đẹp bắt kịp xu hướng cũng như sành điệu hơn trong phong cách thường ngày. Sau
                        đây là một số lời khuyên cho phong cách Thu nhẹ nhàng và đẹp.</p>
                </div>

                <div class="gfg">
                    <div class="col-md-6">
                        <img src="images/news/News_detail1.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-6" style="padding-top: 5%;">
                        <img src="images/news/News_detail2.jpg" class="img-responsive">
                    </div>
                </div>

                <div class="col-lg-12 txt-news-a txt-row">
                    <p>Chiều cao của đôi giày
                        Nhà tạo mẫu Kate Young nói: "Những sai lầm lớn nhất của phụ nữ là không chú ý đến viền của chiếc váy
                        so với đôi giày của họ”. Nói chung, viền của chiếc váy chỉ nên trên giày của bạn và từ 1/2 inch đến
                        3/4 inch cách sàn nhà.
                    </p>
                </div>

                <div class="">
                    <div class="col-md-6" style="padding-top: 5%;">
                        <img src="images/news/News_detail3.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <img src="images/news/News_detail4.jpg" class="img-responsive">
                    </div>
                </div>

                <div class="col-lg-12 txt-news-a txt-row">
                    <p>Chiều cao của đôi giày
                        Nhà tạo mẫu Kate Young nói: "Những sai lầm lớn nhất của phụ nữ là không chú ý đến viền của chiếc váy
                        so với đôi giày của họ”. Nói chung, viền của chiếc váy chỉ nên trên giày của bạn và từ 1/2 inch đến
                        3/4 inch cách sàn nhà.
                    </p>
                </div>
                <div class="col-md-12">
                    <h1 class="text-center">TIN LIÊN QUAN</h1>
                </div>
                <div class="">

                    <div class="col-md-6 txt-news-a txt-row">
                        <a href="{{asset('/chi-tiet-tin-tuc.html')}}">
                            <img src="images/news/News3.jpg" class="img-responsive">
                        </a>

                        <h3><a href="{{asset('/chi-tiet-tin-tuc.html')}}">KENDALL JENNER - BELLA HADID - "NỮ HOÀNG VÒNG 3" THỨ THIỆT!</a></h3>
                        <p class="txt-edit">Trên Instagram, Kendall Jenner và Bella Hadid vừa chứng minh vì sao họ là những
                            người mẫu hot nhất..</p>
                    </div>
                    <div class="col-md-6 txt-news-a txt-row">
                        <a href="{{asset('/chi-tiet-tin-tuc.html')}}">
                            <img src="images/news/News4.jpg" class="img-responsive">
                        </a>

                        <h3><a href="{{asset('/chi-tiet-tin-tuc.html')}}">LÀM THẾ NÀO ĐỂ NGỦ TRONG NGÀY NÓNG</a></h3>
                        <p class="txt-edit">Mùa hè đã đến và nhiệt độ đang tăng lên, nhưng nhược điểm lớn nhất của thời tiết
                            đẹp là những ngày..</p>
                    </div>
                </div>
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