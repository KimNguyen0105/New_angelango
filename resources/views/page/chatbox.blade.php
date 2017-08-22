@extends('master')
@section('main')
    <!--Header Banner-->
    <section class="banner-contactus">
        <img style="width: 100%; height: auto;" src="images/banner_OrderDetails.png" class="img-responsive">

    </section>

    <!--Header content-->


    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6">
                    <h2>INBOX DETAIL</h2>
                    <div class="col-lg-12 col-md-12 chat-box">
                        <div class="chat_window">
                            <ul class="messages"></ul>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" style="margin-left: 20px;">Xem chi tiết phản hồi</button>
                            <div class="bottom_wrapper clearfix">
                                <div class="message_input_wrapper"><input class="message_input"
                                                                          placeholder="Type your message here..."/></div>
                                <div class="send_message" style="width: 50px; margin-left: 10px">
                                    <div class="icon"></div>
                                    <div class="text"><span class="glyphicon glyphicon-plus"></span></div>
                                </div>
                                <div class="send_message">
                                    <div class="icon"></div>
                                    <div class="text">Send</div>
                                </div>
                            </div>
                        </div>
                        <div class="message_template">
                            <li class="message">
                                <div class="avatar" >
                                </div>
                                <div class="text_wrapper">
                                    <div class="text"></div>
                                </div>
                            </li>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">ORDER FIX</h4>
                            </div>
                            <div class="modal-body">
                                <!--Nội dung-->

                                <div class="col-lg-12 col-md-12">
                                    <div class="col-md-4">
                                        <p><span>Mã hóa đơn:</span> 23LTD</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><span>Đặt hàng:</span> 18/08/2017</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><span>Tổng:</span> 2,000,000 VNĐ</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Nhập thông tin chi tiết phản hồi</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p>+ Hình ảnh :</p>

                                        <div class="col-md-3">
                                            <img src="images/colection/colection1.1.png" class="img-responsive" style="width: 100px;height: 100px">
                                        </div>
                                        <div class="col-md-3">
                                            <img src="images/colection/colection1.1.png" class="img-responsive" style="width: 100px;height: 100px">
                                        </div>
                                        <div class="col-md-3">
                                            <img src="images/colection/colection1.1.png" class="img-responsive" style="width: 100px;height: 100px">
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <p>+ Ghi chú</p>
                                        <textarea class="form-control" rows="8" placeholder="Tin nhắn" style="background-color: #e8e8e8"></textarea>
                                    </div>
                                    <div class="col-md-12" >

                                    </div>
                                </div>


                                <!--End nội dung-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <h2>INBOX LIST</h2>
                    <div class="col-lg-12 col-md-12 chat-box-2">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Title</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="#">John Nguyễn</a></td>
                                <td>15/8/2017</td>
                                <td>Áo này giá bao nhiêu?</td>
                            </tr>
                            <tr>
                                <td><a href="#">Thang An</a></td>
                                <td>16/8/2017</td>
                                <td>Váy này giá bao nhiêu?</td>
                            </tr>
                            <tr>
                                <td><a href="#">Julu Kim</a></td>
                                <td>17/8/2017</td>
                                <td>Cần thợ may đến tận nhà</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--TOP-->
    <section class="container-fluid font-txt" style="padding-top: 35px; padding-bottom: 35px">
        <div class="icon-totop text-center " style="background: #f2f2f2;">
            <a href="#">TOP</a>
        </div>
    </section>
    @endsection