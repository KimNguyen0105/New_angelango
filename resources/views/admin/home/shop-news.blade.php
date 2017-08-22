@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Quản lý Shop News</h3>
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
                                <th width="15%">Avatar</th>
                                <th width="15%">Tiêu đề (vi)</th>
                                <th width="15%">Tiêu đề (en)</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shops as $shop)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('/images/home')}}/{{$shop->avatar}}"
                                             style="height:150px; width:100%"/></td>
                                    <td>{{$shop->title_vi}}</td>
                                    <td>{{$shop->title_en}}</td>
                                    <td>
                                        <a href="{{url('/admin/shop-news')}}/{{$shop->id}}"
                                           class="btn btn-xs btn-primary editlink"><span
                                                    class="glyphicon glyphicon-pencil"></span>
                                            Edit</a>
                                    </td>
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