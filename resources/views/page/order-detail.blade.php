@extends('master')
@section('main')
    <section class="banner-paycart">
        <img style="width: 100%; height: auto;" src="images/banner_OrderDetails.png" class="img-responsive">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-lg-offset-2 col-md-offset-1 col-md-11 col-sm-11 col-xs-offset-1 col-xs-11">
                    <ul class="nav nav-wizard text-center">
                        <li class="active"><a id="shipping" href="order-detail.html">ACCOUNT DASHBOARD</a></li>
                        <li><a id="payment" href="shopguide.html">SHOPPING GUIDE</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="order-detail">
        <div class="container">
            <h2>ORDER DETAIL</h2>
            <div class="row">

                <div class="col-xs-4 tt-tb-r">
                    <p>Order #324758367</p>
                </div>
                <div class="col-xs-4 tt-tb-r">
                    <p class="text-center">Place on 07/08/2017</p>
                </div>
                <div class="col-xs-4 tt-tb-r">
                    <p class="pull-right">Total: 1500$</p>
                </div>
                <hr style="width: 100%">
                <p>Standart Shipping: Delivered on 09/08/2017</p>

                <!-- PROCESSING -->
                <div class="col-lg-12">
                    <section>
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">

                                    <li role="presentation" class="disabled">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Processing">
                                            <span class="round-tab">
                                                <i class="fa fa-gavel" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li role="presentation" class="disabled">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                            <span class="round-tab">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Shipped">
                                            <span class="round-tab">
                                                <i class="fa fa-share" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li role="presentation" class="active">
                                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Delivered">
                                            <span class="round-tab">
                                                <i class="glyphicon glyphicon-ok"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <form role="form">
                                <div class="tab-content edit-tab-ord">
                                    <div class="tab-pane" role="tabpanel" id="step1">
                                        <h3>Processing</h3>
                                        <p>This is step 1</p>

                                    </div>
                                    <div class="tab-pane " role="tabpanel" id="step2">
                                        <h3>Step 2</h3>
                                        <p>This is step 2</p>

                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <h3>Shipped</h3>
                                        <p>This is step 3</p>
                                    </div>
                                    <div class="tab-pane active" role="tabpanel" id="complete">
                                        <h3>Delivered</h3>
                                        <p>09/08/2017: Your order is delivered. Thanks for shopping at Angela Ngo and we look forward to seeing you in the next purchase</p>
                                    </div>

                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </section>
                </div>


                <div class="col-xs-2 col-md-1 ed-item">
                    <img src="images/pic1_OrderDetails.png" class="img-responsive">
                </div>
                <div class="col-xs-3 col-md-4 ed-item">
                    <p>Skirt - BY8010 A long, delicate purple gown, very tender Lifetime warranty</p><br>
                    <a href="#">RETURN ITEMS</a>
                </div>
                <div class="col-xs-3 col-md-4 ed-item ed-it-pr">
                    <p>1500$ x 1</p>
                </div>
                <div class="col-xs-4 col-md-3 ed-item ed-it-1">
                    <a href="# ">RETURN ITEMS</a>
                    <p>till 16 Aug 2017<br>FIX</p>
                </div>

            </div>
        </div>
    </section>



    <section class="contact-maps">

    </section>

    <!--TOP-->
    @endsection