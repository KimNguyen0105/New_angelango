@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="{{url('/admin/product/create-product')}}" class="btn btn-sm btn-success addlink"><span
                        class="glyphicon glyphicon-new-window"></span> Create Product</a>
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
                        <table  class="table table-bordered table-responsive projecttable">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="15%">Avatar</th>
                                <th width="15%">Tiêu đề</th>
                                <th width="15%">Danh mục</th>
                                <th width="15%">Khuyến mãi</th>
                                <th width="15%">Giá</th>
                                <th width="15%">Lượt xem</th>
                                <th width="15%">Dánh giá</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $item)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('/images/product')}}/{{$item->avatar}}" style="height:100px;"/></td>
                                    <td>{{$item->title_vi}}</td>
                                    <td>{{App\Models\AglMenuProduct::find($item->menu_product_id)->title_vi}}</td>
                                    <td>@if($item->is_discount==1){{"Có"}}@else{{"Không"}}@endif</td>
                                    <td>{{number_format($item->price,0,",",".")." VNĐ"}}</td>
                                    <td>{{$item->view}}</td>
                                    <td> {{$item->rating}}{{-- <input value="{{$item->rating}}" disabled="true" type="number" class="rating" data-min=0 data-max=5 data-step=0.5 data-size="xs"> --}}</td>
                                    <td>
                                        <a href="{{url('/admin/product/edit-product')}}/{{$item->id}}"
                                           class="btn btn-xs btn-primary editlink"><span
                                                    class="glyphicon glyphicon-pencil"></span>
                                            Edit</a>
                                       
                                            <a onclick="ftDelete('{{url('admin/product/delete-product')}}/{{$item->id}}')"
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
