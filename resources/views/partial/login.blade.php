@extends('master')
@section('main')
    <!--     <header id="myCarousel" class="carousel slide sua-header">

</header> -->

    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="images/banner-Login.png" class="img-responsive">
    </section>

    <section class="contact-form edit-login-form">
        <h2 class="text-center">ĐĂNG NHẬP</h2>
        <div class="container">
            <div class="row">
                <form class="form-horizontal custom-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="Password" class="form-control" id="inputPassword3" placeholder="Mật khẩu">
                            </div>
                        </div>

                        <div class="col-md-4 col-md-offset-3 fogetpsd">
                            <a href="#" data-toggle="modal" data-target="#myModal">Quên mật khẩu</a>
                        </div>

                        <div class="form-group edit-btn-signup">
                            <div class="col-md-3 col-md-offset-3">
                                <a class="form-control btn-signin" href="#">Đăng nhập</a>
                            </div>
                            <div class="col-md-3 ">
                                <a class="form-control btn-signin" href="{{asset('/dang-ky.html')}}">Đăng ký</a>
                            </div>
                        </div>

                        <div class="divider">
                            <span>Hoặc</span>
                        </div>

                        <div class="form-group edit-btn-signup">
                            <div class="col-xs-3 col-xs-offset-3 edit-login-fb">
                                <a class="login-fb" href="#"><i class="fa fa-facebook-square"
                                                                aria-hidden="true"></i></a>
                            </div>
                            <div class="col-xs-3 edit-login-fb">
                                <a class="login-gp" href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                            </div>
                        </div>


                    </div>

                </form>
            </div>
        </div>
    </section>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Khôi phục mật khẩu</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group edit-text-modal">
                        <p>Vui lòng cung cấp thông tin dưới đây để khôi phục mật khẩu của bạn.</p>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="inputEmail32" placeholder="Your email">
                        </div>

                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Gửi</button>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                </div>
                <!-- <div class="modal-footer"> -->

                <!-- </div> -->
            </div>

        </div>
    </div>
@endsection