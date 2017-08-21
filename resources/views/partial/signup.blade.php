@extends('master')
@section('main')

    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="images/banner-Login.png" class="img-responsive">
    </section>

    <section class="contact-form edit-login-form">
        <h2 class="text-center">ĐĂNG KÝ</h2>
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
                                <input type="text" class="form-control" id="inputName" placeholder="Tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="Password" class="form-control" id="inputPassword3" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <button class="form-control btn-signin">Đăng Ký</button>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-3 fogetpsd">
                            <a href="#"></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>


@endsection