@extends('master')
@section('main')

    <section class="banner-paycart">
        <img style="width: 100%; height: auto;" src="images/banner_OrderDetails.png" class="img-responsive">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>

    <section class="personal-info">
        <div class="container">
            <div class="row">
                <form class="form-horizontal custom-form">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  custom-tagp ed-tt-per">
                        <h2 class="text-center">THÔNG TIN CÁ NHÂN</h2>
                        <div class="billing-info ed-canhan">

                            <div class="row">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Tên">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputPassword3"
                                                   placeholder="Họ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="email" disabled="!edit" class="form-control" id="inputEmail3"
                                                   placeholder="Email" value="abc@gmail.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputPassword3"
                                                   placeholder="Số điện thoại">
                                        </div>
                                    </div>

                                    <div class='col-sm-12'>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker6'>
                                                <input type='text' placeholder="Ngày sinh" class="form-control"/>
                                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-12 edit-drop">
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle" type="button"
                                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="true">
                                                    Giới tính
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                    <li><a href="#">Nam</a></li>
                                                    <li><a href="#">Nữ</a></li>
                                                    <li><a href="#">Khác</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="" data-toggle="modal" data-target="#myModal">Thay đổi mật khẩu</a>
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Thay đổi mật khẩu</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input type="password" class="form-control"
                                                                       id="inputEmail3"
                                                                       placeholder="Nhập mật khẩu mới">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input type="password" class="form-control"
                                                                       id="inputPassword3"
                                                                       placeholder="Nhập lại mật khẩu mới">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Lưu
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="edit-btn-next">
                            <p></p>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button class="form-control">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </section>


@endsection