<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ADMIN PAGE </title>

    <!-- Bootstrap -->
    <link href="{{URL::asset('')}}css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
        {{-- <link href="{{URL::asset('')}}css/star-rating.css"> --}}
    <link href="{{URL::asset('')}}css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link rel="stylesheet" href="{{asset('fileinput/css/fileinput.min.css')}}">
    <link href="{{URL::asset('')}}css/nprogress.css" rel="stylesheet">
    <link href="{{URL::asset('')}}css/bootstrap-select.min.css" rel="stylesheet">

    {{-- <link href="{{URL::asset('')}}css/daterangepicker.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
{{--<!-- iCheck -->--}}
<link href="{{URL::asset('')}}css/bootstrap-colorpicker.min.css" rel="stylesheet">

{{--<!-- bootstrap-progressbar -->--}}
{{--<link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">--}}
{{--<!-- JQVMap -->--}}
{{--<link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>--}}
{{--<!-- bootstrap-daterangepicker -->--}}
{{--<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">--}}

<!-- Custom Theme Style -->
    <link href="{{URL::asset('')}}css/custom.min.css" rel="stylesheet">
	  <link href="{{URL::asset('')}}css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <link href="{{asset('css/MonthPicker.min.css')}}" rel="stylesheet" type="text/css" />
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />--}}
    <script src="{{URL::asset('')}}js/jquery.min.js"></script>
    {{-- <script src="{{URL::asset('')}}js/star-rating.js"></script> --}}
<!-- Bootstrap -->
    <script src="{{URL::asset('')}}js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.min.js"></script>
    <script src="{{asset('js/MonthPicker.min.js')}}"></script>
</head>

<body class="nav-md body-content">
<div class="container body">
    <div class="main_container">
    @include('admin.partial.sidebar')

    <!-- top navigation -->
    @include('admin.partial.header')
    <!-- /top navigation -->

        <!-- page content -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="right_col" role="main">
            @yield('content')
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
    <div id="myDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận xóa</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="#" id="btnXoa" class="btn btn-danger">Xóa</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- jQuery -->



<script src="{{URL::asset('')}}js/bootstrap-colorpicker.min.js"></script>


<script src="{{URL::asset('')}}js/bootstrap-select.min.js"></script>


<script src="{{URL::asset('')}}js/jquery.validate.js"></script>

<script src="{{URL::asset('')}}js/jquery.dataTables.min.js"></script>
<!-- FastClick -->

<!-- Custom Theme Scripts -->
<script src="{{URL::asset('')}}js/custom.min.js"></script>
<script type="text/javascript" src="{{asset('fileinput/js/fileinput.min.js')}}"></script>

<script>
    function ftDelete(link) {
        $("#btnXoa").attr("href", link);
        $("#myDelete").modal('show');
    }
</script>
<script>
        $(".projecttable").DataTable();
    </script>
@yield('scripts')
</body>
</html>
