@extends('master')
@section('main')
    {{--BANNER HEADER--}}

    <section class="banner-paycart">
        <img style="width: 100%; height: auto;" src="images/Banner_PayCart.png" class="img-responsive">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-lg-offset-2 col-md-offset-1 col-md-11 col-sm-11 col-xs-offset-1 col-xs-11">
                    <ul class="nav nav-wizard text-center">
                        <li class="active"><a id="shipping">1. GIAO HÀNG</a></li>
                        <li><a id="payment">2. THANH TOÁN</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <section class="contact-form paycart-form">
        <div class="container">
            <div class="row">

                <form class="form-horizontal custom-form">
                    <div class="col-lg-6 custom-tagp">
                        <h2>ĐỊA CHỈ GIAO HÀNG</h2>
                        <a href="#"><p>Đăng nhập để thanh toán nhanh chóng</p></a>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Họ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 edit-drop">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Tỉnh thành
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Hà Nội</a></li>
                                        <li><a href="#">Hồ Chí Minh</a></li>
                                        <li><a href="#">Đà Nẵng</a></li>
                                        <li><a href="#">Lâm Đồng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 edit-drop">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Quận/Huyện
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Quận 1</a></li>
                                        <li><a href="#">Quận 2</a></li>
                                        <li><a href="#">Quận Tân Bình</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 edit-drop">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Phường/Xã
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Phường 1</a></li>
                                        <li><a href="#">Phường 2</a></li>
                                        <li><a href="#">Phường 3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="4" placeholder="Địa chỉ"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Số điện thoại (Để giao hàng)">
                            </div>
                        </div>

                        <div class="edit-btn-next">
                            <p id="stardard">Phí giao hàng: Miễn phí</p>
                            <p>Ngày nhận: Thứ Sáu, 11.9.2017</p>
                            <div class="form-group">
                                <div class="col-sm-5 edit-btnnext" id="">
                                    <a href="{{asset('/thanh-toan.html')}}">Tiếp</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <h2>ĐƠN HÀNG CỦA BẠN</h2>
                        <p>(3 sản phẩm)</p>
                        <div class="table-responsive">
                            <table class="table table-hover edit-table-sum">
                                <thead>
                                <tr>
                                    <th>SP</th>
                                    <th></th>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">THÀNH TIỀN</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="width: 100px"><img style="width: 70px; height: 90px" src="images/detail-product-full.png"></td>
                                    <td>Set áo ren... - BY8010</br>
                                        Kích cỡ: S
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">2.000.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td style="width: 100px"><img style="width: 70px; height: 90px" src="images/product3.png"></td>
                                    <td>Đầm suông cổ... - BY8010</br>
                                        Kích cỡ: M
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">2.000.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td style="width: 100px"><img style="width: 70px; height: 90px" src="images/product1.png"></td>
                                    <td>Set áo thun... - BY8010</br>
                                        Kích cỡ: S
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">2.000.000 VNĐ</td>
                                </tr>

                                <tr id="edit-stotal">
                                    <td colspan="2">Thành tiền</br> <span style="color: #ffccd5">Phí vận chuyển</span></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">6.000.000 VNĐ</br> <span style="color: #ffccd5">Miễn phí</span></td>
                                </tr>
                                <tr id="edit-total">
                                    <td colspan="2">Tổng tiền</br> <span style="font-weight: normal;">(Tổng số tiền thanh toán)</span></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><span style="color: #ff0098;">6.000.000 VNĐ</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <section class="contact-maps">

    </section>

@endsection