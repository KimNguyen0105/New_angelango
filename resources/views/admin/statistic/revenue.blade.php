@extends('admin.layout.master')
@section('content')
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />--}}
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>Thống kê doanh thu</h2>
            <div class="col-md-12" style="padding: 20px; border: 1px #ddd solid; margin-bottom: 30px">
                <div class="col-md-6">
                    <form method="POST" action="{{url('admin/statistic/revenue/month')}}">
                        <div class="form-group">
                            <label style="width: 100%">Chọn tháng</label>
                            <input id="month" value="{{$month}}/{{$year}}" name="month" disabled class='Default form-control' style="width:60%; float:left;" type="text" />
                            <input type="submit" value="Thống kê" class="btn" style="margin-bottom: 0px;">
                        </div>
                    </form>
                </div>
                <div class="col-md-6" style="margin-top: 15px;">
                    <h3>Tổng doanh thu {{$month}}/{{$year}}: <span style="font-weight: bold">{{number_format($total)}} VNĐ</span></h3>
                </div>
            </div>
            <div class="col-md-12">
                <h4>Danh sách sản phẩm bán chạy nhất tháng {{$month}} năm {{$year}}</h4>
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
    $('.Default').MonthPicker();
</script>
@endsection