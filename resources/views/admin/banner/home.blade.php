@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
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
                                <th width="15%">Hình ảnh</th>
                                <th width="15%">Loại banner</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banner as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('/images/banner')}}/{{$item->image}}"
                                             style="height:150px; width:100%" /></td>
                                    <td>@if($item->type==1){{"Banner sản phẩm"}}@elseif($item->type==2){{"Banner tin tức"}}@elseif($item->type==3){{"Banner giới thiệu"}}@elseif($item->type==4){{"Banner liên hệ"}}@endif</td>
                                    <td>
                                        <a href="{{url('/admin/banner/edit-banner')}}/{{$item->id}}"
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