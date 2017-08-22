@extends('master')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <style>
        .paycart-form .container .row .btn-next{
            padding-bottom: 15px;
            padding-left: 15px;
            color: #454545;
        }
        .paycart-form .container .row .btn-next{
            text-decoration: underline;
            font-weight: normal;
        }
        .edit-btnnext .btn-next{
            background-color: #efefef !important;
            border: none !important;
            font-size: 12pt !important;
            height: 50px !important;
            padding: 15px 50px;
            text-decoration: none !important;
            border-radius: 5px;
            -webkit-box-shadow: 3px 3px 6px -2px rgba(0,0,0,0.75) !important;
        }
        .edit-btnnext .btn-next:hover{
            background-color: #a2a2a2 !important;
            color: white !important;
            -webkit-box-shadow: none !important;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
@endsection

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
                <form class="form-horizontal custom-form" method="POST" action="{{asset('thanh-toan.html')}}">
                    <div class="col-lg-6 custom-tagp">
                        <h2>ĐỊA CHỈ GIAO HÀNG</h2>
                        <a href="#"><p>Đăng nhập để thanh toán nhanh chóng</p></a>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="firstname" required id="inputEmail3" placeholder="Tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="lastname" required id="inputPassword3" placeholder="Họ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 edit-drop">
                                <select class="selectpicker" id="province_id" required name="province_id" data-width="100%" data-live-search="true">
                                    @foreach($provinces as $value)
                                        <option value="{{$value->provinceid}}">{{$value->type}} {{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 edit-drop">
                                <select class="selectpicker" data-width="100%" required name="district_id"  id="district_id" data-live-search="true">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 edit-drop">
                                <select class="selectpicker" data-width="100%" required name="ward_id" id="ward_id" data-live-search="true">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control" id="address" name="address" required rows="4" placeholder="Địa chỉ (Vui lòng ghi rõ số nhà, tên đường)"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="phone" required id="inputPassword3" placeholder="Số điện thoại (Để giao hàng)">
                            </div>
                        </div>

                        <div class="edit-btn-next">
                            <p id="stardard">Phí giao hàng: Miễn phí</p>
                            <p>Ngày nhận dự kiến: {{\Carbon\Carbon::now()->addDays(10)->format('d/m/Y')}}</p>
                            <div class="form-group">
                                <div class="col-sm-5 edit-btnnext" id="">
                                    <button type="submit" class="btn-next">Tiếp</button>
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
                                <tbody >
                                <? $total = 0 ?>
                                @foreach($cart as $item)
                                <tr>
                                    <td style="width: 100px"><img style="width: 70px; height: 90px" src="{{asset($item["options"]["image"])}}"></td>
                                    <td>{{$item["name"]}}...</br>
                                        Kích cỡ: {{$item["options"]["size"]}}<br>
                                        Màu: <div style="vertical-align: middle;display: -webkit-inline-box;width: 20px;height: 20px;border-radius: 50%;background-color: {{$item["options"]["color"]}}"></div>
                                    </td>
                                    <td class="text-center">{{$item["qty"]}}</td>
                                    <td class="text-center">{{number_format($item["price"]*$item["qty"],0,",",'.')}} VNĐ</td>
                                </tr>
                                <? $total += $item["price"]*$item["qty"] ?>
                                @endforeach
                                <tr id="edit-stotal">
                                    <td colspan="2">Thành tiền</br> <span style="color: #ffccd5">Phí vận chuyển</span></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">{{number_format($total,0,",",'.')}} VNĐ</br> <span style="color: #ffccd5">Miễn phí</span></td>
                                </tr>
                                <tr id="edit-total">
                                    <td colspan="2">Tổng tiền</br> <span style="font-weight: normal;">(Tổng số tiền thanh toán)</span></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><span style="color: #ff0098;">{{number_format($total,0,",",'.')}} VNĐ</span></td>
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