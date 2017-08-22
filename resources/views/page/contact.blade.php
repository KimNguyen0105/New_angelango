@extends('master')
@section('main')

    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="images/banner-contactus.png" class="img-responsive">
        <h2>Gọi ngay: 0906 261 888 </h2>
    </section>

    <section class="contact-form">
        <h2 class="text-center">LIÊN HỆ NGAY VỚI CHÚNG TÔI</h2>
        <div class="container">
            <div class="row">
                <form class="form-horizontal custom-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Họ tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Địa chỉ Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Chủ đề">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="8" placeholder="Tin nhắn"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="form-control">Gửi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="contact-maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4949570162225!2d106.69445229835713!3d10.773352096373786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3931cf3b03%3A0xf1cce729011aa647!2zMTUyIEzDvSBU4buxIFRy4buNbmcsIELhur9uIFRow6BuaCwgUXXhuq1uIDEsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1502270488206" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>

    <!--TOP-->
    <section class="container-fluid font-txt" style="padding-top: 35px; padding-bottom: 35px">
        <div class="icon-totop text-center " style="background: #f2f2f2;">
            <a href="#">TOP</a>
        </div>
    </section>


@endsection