@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="{{url('/admin/news/create-news')}}" class="btn btn-sm btn-success addlink"><span
                        class="glyphicon glyphicon-new-window"></span> Create News</a>
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
                                    <th width="10%">Tên sản phẩm</th>
                                    <th width="10%">Tên người hỏi</th>
                                    <th width="30%">Nội dung</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($qas as $qa)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img src="{{asset('/images/product')}}/{{$qa->avatar}}"
                                                 style="height:150px; width:100%"/></td>
                                        <td>{{$qa->title_vi}}</td>
                                        <td>{{$qa->name}}</td>
                                        <td>{{$qa->content}}</td>
                                        <td>
                                            {{--<a href="{{url('/admin/qa/edit-news')}}/{{$qa->id}}"--}}
                                               {{--class="btn btn-xs btn-primary editlink"><span--}}
                                                        {{--class="glyphicon glyphicon-pencil"></span>--}}
                                                {{--Edit</a>--}}

                                                <a onclick="ftDelete('{{url('admin/qa')}}/{{$qa->id}}')"
                                                   class="btn btn-xs btn-danger deletelink"><span
                                                            class="glyphicon glyphicon-trash"></span> Delete</a>
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