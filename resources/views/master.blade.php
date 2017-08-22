<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Angela Ngo | Trang Chủ</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/modern-business.css')}}" rel="stylesheet">
    <link href="{{asset('css/thang.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/swiper.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/contactus.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link href="{{asset('css/star-rating.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/navwizard.css')}}" rel="stylesheet">
    <link href="{{asset('css/chatbox.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/wizard_orderdetail.css')}}" rel="stylesheet">


    {{--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>--}}

    <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">

    @yield('css')

    <!--Favicon-->
    <link rel="icon" href="{{asset('images/icon/Angela_icon.png')}}">

    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
        }
    </style>
</head>

<body>

<!-- Header Carousel -->
@include('header')
@yield('main')
@include('footer')
<!-- Footer -->

<!---END FOOTER-- >

<!--Navbar script-->

<!-- Swiper JS -->
<script type="text/javascript" src="js/swiper.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });
</script>

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
</script>
<script type="text/javascript" src="hadesker/js/hadesker.cart.js"></script>

@yield('js')

<script type="text/javascript" src="js/jquery.montage.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#showcode').toggle(
            function () {
                $(this).addClass('up').removeClass('down').next().slideDown();
            },
            function () {
                $(this).addClass('down').removeClass('up').next().slideUp();
            }
        );
        $('#panel').toggle(
            function () {
                $(this).addClass('show').removeClass('hide');
                $('#overlay').stop().animate({left: -$('#overlay').width() + 20 + 'px'}, 300);
            },
            function () {
                $(this).addClass('hide').removeClass('show');
                $('#overlay').stop().animate({left: '0px'}, 300);
            }
        );

        var $container = $('#am-container'),
            $imgs = $container.find('img').hide(),
            totalImgs = $imgs.length,
            cnt = 0;

        $imgs.each(function (i) {
            var $img = $(this);
            $('<img/>').load(function () {
                ++cnt;
                if (cnt === totalImgs) {
                    $imgs.show();
                    $container.montage({
                        fillLastRow: true,
                        alternateHeight: true,
                        alternateHeightRange: {
                            min: 490,
                            max: 640
                        }
                    });

                    /*
                     * just for this demo:
                     */
                    $('#overlay').fadeIn(500);
                }
            }).attr('src', $img.attr('src'));
        });

    });
</script>
<script src="{{asset('js/guide.js')}}"></script>
<script src="{{asset('js/navbar_scrolling.js')}}"></script>
<script src="{{asset('js/star-rating.js')}}" type="text/javascript"></script>
<script src="{{asset('js/wizard_order.js')}}"></script>

<!--animate-->
<script src="{{asset('js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<!--end animate-->

<!--swiper carousel-->
<script type="text/javascript" src="{{asset('js/swiper.js')}}"></script>
<!--end swiper carousel-->
<!--chatbox-->
<script src="{{asset('js/chatbox.js')}}"></script>


<script>
    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>





</body>

</html>
