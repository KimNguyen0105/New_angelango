@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Quản lý Slide</h3>
            <a href="{{url('/admin/slide/0')}}" class="btn btn-sm btn-success addlink"><span
                        class="glyphicon glyphicon-new-window"></span> Create Slide</a>
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
                                <th width="15%">Hiển thị</th>
                                <th width="15%">Thứ tự</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slides as $slide)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('/images/slide')}}/{{$slide->avatar}}"
                                             style="height:150px; width:100%"/></td>
                                    <td>{{$slide->title_vi}}</td>
                                    <td>{{$slide->title_en}}</td>
                                    <td>
                                        @if($slide->is_show==1)
                                            <i style="color: green" class="fa fa-check-circle"></i>
                                        @else

                                        @endif
                                    </td>
                                    <td>{{$slide->sort_order}}</td>

                                    <td>
                                        <a href="{{url('/admin/slide')}}/{{$slide->id}}"
                                           class="btn btn-xs btn-primary editlink"><span
                                                    class="glyphicon glyphicon-pencil"></span>
                                            Edit</a>
                                        @if($loop->count > 2)
                                            <a onclick="ftDelete('{{url('admin/slide/delete-slide')}}/{{$slide->id}}')"
                                               class="btn btn-xs btn-danger deletelink"><span
                                                        class="glyphicon glyphicon-trash"></span> Delete</a>
                                        @else
                                            <i>Default 2 news, can't delete</i>
                                        @endif
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