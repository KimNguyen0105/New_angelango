@extends('master')
@section('main')
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
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Thông báo!</strong> {{$result or "OK"}}
                </div>
            </div>
        </div>
    </div>
@endsection