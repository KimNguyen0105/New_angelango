<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ADMIN</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{URL::asset('')}}images/users/default.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Hi,{{Session::get('username')}}</span>

            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Danh mục Quản lý</h3>
                <ul class="nav side-menu">
                    {!! \App\Http\Controllers\Admin\UserController::getPermissionUserById() !!}

                    {{--<li><a><i class="fa fa-table"></i> Quản lý Trang chủ<span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{url('/admin/menu')}}"> Menu</a></li>--}}
                            {{--<li><a href="{{url('/admin/slide')}}">Slide</a></li>--}}
                            {{--<li><a href="{{url('/admin/style-life')}}">Thời trang và cuộc sống</a></li>--}}
                            {{--<li><a href="{{url('/admin/shop-news')}}">Sản phẩm - Tin tức</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="{{url('/admin/news')}}"><i class="fa fa-table"></i> Tin tức</a></li>--}}
                    {{--<li><a href="{{url('/admin/collection')}}"><i class="fa fa-table"></i> Bộ sưu tập</a></li>--}}
                    {{----}}
                    {{--<li><a><i class="fa fa-table"></i> Quản lý sản phẩm<span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{url('/admin/product')}}">Danh sách sản phẩm</a></li>--}}
                             {{--<li><a href="{{url('/admin/discount')}}">Sản phẩm khuyến mãi</a></li>--}}
                            {{--<li><a href="{{url('/admin/menu-product')}}">Danh mục sản phẩm</a></li>--}}

                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li><a><i class="fa fa-table"></i> Quản lý đơn hàng<span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{url('/admin/status')}}">Trạng thái đơn hàng</a></li>--}}
                            {{--<li><a href="{{url('/admin/order')}}">Đơn hàng</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a><i class="fa fa-table"></i> Quản lý phản hồi<span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{url('/admin/qa')}}">Hỏi đáp</a></li>--}}
                            {{--<li><a href="{{url('/admin/request')}}">Yêu cầu thiết kế lại</a></li>--}}
                            {{--<li><a href="{{url('/admin/contact')}}">Quản lý liên hệ</a></li>--}}
                            {{--<li><a href="{{url('/admin/subscribe')}}">Đăng ký nhận khuyến mãi</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a><i class="fa fa-table"></i> Quản lý Giới thiệu<span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{url('/admin/about-us')}}">Giới thiệu</a></li>--}}
                            {{--<li><a href="{{url('/admin/about-us-different')}}">Chúng tôi khác biệt</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a><i class="fa fa-table"></i> Quản lý user Admin<span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{url('/admin/user')}}">Tài khoản Admin</a></li>--}}
                            {{--<li><a href="{{url('/admin/permission')}}">Quản lý quyền Admin</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="{{url('/admin/account')}}"><i class="fa fa-table"></i>Tài khoản Người dùng</a></li>--}}
                    {{--<li><a><i class="fa fa-table"></i> Quản lý Chung<span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{url('/admin/config')}}">Config</a></li>--}}
                            {{--<li><a href="{{url('/admin/banner')}}">Banner</a></li>--}}
                            {{--<li><a href="{{url('/admin/guide')}}">Hướng dẫn</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{URL::asset('')}}admin/log-out">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>