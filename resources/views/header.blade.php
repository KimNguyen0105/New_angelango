<!-- Navigation -->
<nav id="header" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div id="header-container" class="container navbar-container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="col-md-12">
            <div class="collapse navbar-collapse font-txt" id="bs-example-navbar-collapse-1">
                <div class="img-logo">
                    <img src="images/logo-150.png" class="img-responsive">
                </div>
                <div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
                    <ul class="nav navbar-nav navbar-right" id="">
                        <li @if (Session::get('active') == 'home') class="active" @endif >
                            <a class="cool-link" href="{{asset('/')}}">Trang chủ</a>
                        </li>
                        <li @if (Session::get('active') == 'collection') class="active" @endif >
                            <a class="cool-link" href="{{asset('/bo-suu-tap.html')}}">Bộ sưu tập</a>
                        </li>
                        <li @if (Session::get('active') == 'product') class="active" @endif>
                            <a class="cool-link " href="{{asset('/san-pham.html')}}">sản phẩm</a>
                        </li>
                        <li @if (Session::get('active') == 'news') class="active" @endif>
                            <a class="cool-link" href="{{asset('/tin-tuc.html')}}">Tin tức</a>
                        </li>
                        <li @if (Session::get('active') == 'about') class="active" @endif>
                            <a class="cool-link" href="{{asset('/gioi-thieu.html')}}">giới thiệu</a>
                        </li>
                        <li @if (Session::get('active') == 'contact') class="active" @endif>
                            <a class="cool-link" href="{{asset('/lien-he.html')}}">liên hệ</a>
                        </li>
                    </ul>

                </div>
                <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                    <div class="top_details">
                        <div class="search">
                            <form>
                                <input type="text" value="" placeholder="Tìm kiếm">
                                <input type="submit" value="">
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 icon-top">
                    <div class="col-md-3 col-sm-4 col-xs-3">
                        <a class="read-more font-txt" href="{{asset('/gio-hang.html')}}">
                            <span class="glyphicon glyphicon-shopping-cart"><span class="badge cart-icon">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span></span></a>
                    </div>
                    <div class="col-md-5 col-sm-4 col-xs-4 dropdown" style="padding: 0px">
                        <a class="read-more font-txt txt-login" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> Đăng nhập <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{asset('/thong-tin-ca-nhan.html')}}">Thông tin cá nhân</a>
                            </li>
                            <li>
                                <a href="{{asset('/hop-thu.html')}}">Hộp thư</a>
                            </li>
                            <li>
                                <a href="{{asset('/quan-ly-hoa-don.html')}}">Quản lý hóa đơn</a>
                            </li>
                            <li>
                                <a href="{{asset('huong-dan-mua-hang.html')}}">Hướng dẫn mua hàng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 dropdown txt-lang hidden-xs" style="padding: 0px 0px">
                        <a class="read-more font-txt dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-globe"></span> Ngôn ngữ <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a href="en/index.html"><img src="images/flag/USA.png"> English</a></li>
                            <li class="active"><a href="index.html"><img src="images/flag/Viet-Nam.png"> Tiếng Việt</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-5 visible-xs-block">
                        <ul class="list-inline ">
                            <li><a href="en/index.html"><img src="images/flag/USA.png"> </a></li>
                            <li><a href="index.html"><img src="images/flag/Viet-Nam.png"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- /.container -->
</nav>