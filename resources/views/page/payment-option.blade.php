@extends('master')
@section('main')
    {{--BANNER HEADER--}}

    <section class="banner-paycart">
        <img style="width: 100%; height: auto;" src="images/Banner_PayCart.png" class="img-responsive">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-lg-offset-2 col-md-offset-1 col-md-11 col-sm-11 col-xs-offset-1 col-xs-11">
                    <ul class="nav nav-wizard text-center">
                        <li ><a  id="shipping">1. GIAO HÀNG</a></li>
                        <li class="active"><a id="payment">2. THANH TOÁN</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <section class="contact-form paycart-form">
        <div class="container">
            <div class="row">
                <form class="form-horizontal custom-form" method="POST" action="{{asset('dat-hang.html')}}">
                    <input type="hidden" name="firstname" value="{{$customer['firstname']}}">
                    <input type="hidden" name="lastname" value="{{$customer['lastname']}}">
                    <input type="hidden" name="address" value="{{$customer['address']}}">
                    <input type="hidden" name="phone" value="{{$customer['phone']}}">
                    <div class="col-lg-6 custom-tagp edit-title-payopt">
                        <h2>LỰA CHỌN HÌNH THỨC THANH TOÁN</h2>
                        <div class="billing-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs edit-text-payopt">
                                        <li class="active col-md-6 col-xs-12">
                                            <a data-toggle="tab" href="#home">
                                                <center><img src="images/vitien.png" class="img-responsive" /></center><br>
                                                Thanh toán bằng tiền mặt
                                            </a>
                                        </li>

                                        <li class="col-md-6 col-xs-12">
                                            <a data-toggle="tab" href="#menu1" id="card-edit">
                                                <center><img src="images/card.png" class="img-responsive"  /></center><br>
                                                Thanh toán bằng  thẻ tín dụng hoặc thẻ ghi nợ
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <p>Sau khi quý khách đã đặt hàng thành công, đội ngũ Chăm sóc khách hàng của chúng tôi sẽ tiến hành xác minh đơn hàng, đồng thời gửi cập nhật sớm nhất đến quý khách qua email và tin nhắn SMS. Xin lưu ý Angela Ngo có thể giao hàng đến mọi tỉnh thành và khu vực trong nước. Angela Ngo sẽ hợp đồng với đơn vị vận chuyển uy tín nhằm cố gắng hết sức để quý khách nhận được đơn hàng trong thời gian sớm nhất.</p>
                                        </div>

                                        <div id="menu1" class="tab-pane fade">
                                            <p>Quý khách có thể sử dụng Thẻ tín dụng Visa để mua hàng qua mạng tại những trang web bán hàng chấp nhận thanh toán bằng Thẻ tín dụng Visa. Để giảm thiểu nguy cơ thông tin trên Thẻ bị sao chép trong quá trình mua hàng qua mạng, Quý khách có thể đăng ký Dịch Vụ Thanh Toán An Toàn Trực Tuyến thông qua các Dịch Vụ Ngân Hàng Trực Tuyến.</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="edit-btn-next">
                            <p></p>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="submit" class="form-control">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h2>ĐƠN HÀNG CỦA BẠN</h2>
                        <p>({{$tongso}} sản phẩm)</p>
                        <div class="table-responsive">
                            <table class="table table-hover edit-table-sum">
                                <thead>
                                <tr>
                                    <th>SP</th>
                                    <th></th>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">THÀNH TIỀN</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <? $total = 0 ?>
                                @foreach($cart as $item)
                                <tr id="{{$item['rowId']}}">
                                    <td style="width: 100px"><img style="width: 70px; height: 90px" src="{{asset($item["options"]["image"])}}"></td>
                                    <td>{{$item["name"]}}...</br>
                                        Kích cỡ: {{$item["options"]["size"]}}<br>
                                        Màu: <div style="vertical-align: middle;display: -webkit-inline-box;width: 20px;height: 20px;border-radius: 50%;background-color: {{$item["options"]["color"]}}"></div>
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="quantity" value="{{$item["qty"]}}" min="1" max="1000" class="text-center">
                                    </td>
                                    <td class="text-center">{{number_format($item["price"]*$item["qty"],0,",",'.')}} VNĐ</td>
                                    <td><center><button type="button" data-rowid="{{$item['rowId']}}" class="btn-remove-cart glyphicon glyphicon-remove"></button></center></td>
                                </tr>
                                <? $total += $item["price"]*$item["qty"] ?>
                                @endforeach

                                <tr id="edit-stotal">
                                    <td colspan="2">Tổng tiền</br><br> <span style="color: #ffccd5">Phí vận chuyển</span></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">{{number_format($total,0,",",'.')}} VNĐ</br> <span style="color: #ffccd5">Miễn phí</span></td>
                                    <td></td>
                                </tr>
                                <tr id="edit-total">
                                    <td colspan="2">Thành tiền</br> <span style="font-weight: normal;">(Tổng số tiền thanh toán)</span></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><span style="color: #ff0098;">{{number_format($total,0,",",'.')}} VNĐ</span></td>
                                    <td></td>
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

    <!--TOP-->
    <section class="container-fluid to-top font-txt edit-totop-contact">
        <div class="icon-totop text-center edit-icon-totop-contact totop-register">
            <a href="#">TOP</a>
        </div>
    </section>

@endsection