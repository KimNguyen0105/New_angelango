@extends('admin.layout.master')
@section('content')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />--}}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Sản phẩm bán chạy nhất</h3>
            <div class="col-md-12">
                <div class="col-md-12" style="padding: 20px; border: 1px #ddd solid; margin-bottom: 30px; margin-top: 15px">
                    <form method="POST" action="{{url('admin/statistic/sellers/form-to')}}">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from">Từ ngày</label>
                                <input type="text" class="form-control" id="from" name="from" value="{{$from}}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">Đến ngày</label>
                                <input type="text" class="form-control" id="to" name="to" value="{{$to}}"/>
                            </div>
                        </div>
                        <input type="submit" class="btn" style="margin-top: 24px" value="Tìm kiếm"/>
                    </form>
                </div>
            </div>
            <div class="dashboard_graph">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('failed'))
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    <div class="col-md-12">
                        <h4>Danh sách sản phẩm bán chạy nhất từ {{$from}} đến {{$to}}</h4>
                    </div>
                <div class="row x_title">
                    <div class="col-md-12">
                        <table class="table table-bordered table-responsive projecttable">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Hình ảnh</th>
                                <th width="20%">Tên sản phẩm (vi)</th>
                                <th width="20%">Tên sản phẩm (en)</th>
                                <th width="5%">Số lượng mua</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('/images/product')}}/{{$product->avatar}}"
                                             style="height:150px; width:100%"/></td>
                                    <td>{{$product->title_vi}}</td>
                                    <td>{{$product->title_en}}</td>
                                    <td>{{$product->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')

<script>
    $("#from").datepicker({
        defaultDate: new Date('{{$from}}'),
        changeMonth: true,
        numberOfMonths: 1,
        maxDate: new Date('{{$to}}'),
        onSelect: function (selectedDate) {
            var option= "minDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            getDateFrom(date);
        }
    });
    $("#to").datepicker({
        defaultDate: new Date('{{$to}}'),
        changeMonth: true,
        numberOfMonths: 1,
        minDate: new Date('{{$from}}'),
        onSelect: function (selectedDate) {
            var option= "maxDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            getDateFrom1(date);
        }
    });
    function getDateFrom(date) {
        $("#to").datepicker("option","minDate", date);
    }
    function getDateFrom1(date) {
        $("#from").datepicker("option","maxDate", date);
    }
</script>
@endsection