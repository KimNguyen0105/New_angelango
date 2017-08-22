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
                    <div class="col-sm-2 mail_list_column">
                        <button id="compose" class="btn btn-sm btn-success btn-block" type="button">Khuyến mãi</button>
                        <a href="{{url('/admin/discount')}}">
                          <div class="mail_list" style="padding: 7px">
                            <div class="left">
                              <i class="fa fa-circle"></i>
                            </div>
                            <div class="right">
                              <h3>Tất cả<small>{{$dem_tat_ca}}</small></h3>
                             
                            </div>
                          </div>
                        </a>

                        <a href="{{url('/admin/discount/con-han-khuyen-mai')}}">
                          <div class="mail_list" style="padding: 7px">
                            <div class="left">
                              <i class="fa fa-circle"></i>
                            </div>
                            <div class="right">
                              <h3>Còn hạn<small>@if(isset($dem_con_han)){{$dem_con_han}}@else{{0}}@endif</small></h3>
                             
                            </div>
                          </div>
                        </a>

                        <a href="{{url('/admin/discount/het-han-khuyen-mai')}}">
                          <div class="mail_list" style="padding: 7px">
                            <div class="left">
                              <i class="fa fa-circle"></i>
                            </div>
                            <div class="right">
                              <h3>Hết hạn<small>@if(isset($dem_het_han)){{$dem_het_han}}@else{{0}}@endif</small></h3>
                             
                            </div>
                          </div>
                        </a>
                    </div>

                    <div class="col-md-10">
                        <table class="table table-bordered table-responsive projecttable">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="15%">Avatar</th>
                                <th width="15%">Tiêu đề</th>
                                <th width="15%">Danh mục</th>
                                <th width="15%">Hạn khuyến mãi</th>
                                <th width="15%">Giá khuyến mãi</th>
                                <th width="15%">Lượt xem</th>
                                <th width="15%">Đánh giá</th>
                                
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($discount as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                   
                                    <td><img src="{{asset('/images/product')}}/{{$item->avatar}}"
                                             style="height:100px;"/></td>
                                    <td>{{$item->title_vi}}</td>
                                    <td>{{App\Models\AglMenuProduct::find($item->menu_product_id)->title_vi}}</td>
                                    <td>{{date( "d-m-Y", strtotime($item->date) )
                                     }}</td>
                                    <td>{{number_format($item->price_discount,0,",",".")." VNĐ"}}</td>
                                    <td>{{$item->view}}</td>
                                    <td>{{$item->rating}}</td>
                                    <td>
                                        <a href="{{url('/admin/discount/edit-discount')}}/{{$item->discount_id}}"
                                           class="btn btn-xs btn-primary editlink"><span
                                                    class="glyphicon glyphicon-pencil"></span>
                                            Edit</a>
                                       
                                            <a onclick="ftDelete('{{url('admin/discount/delete-discount')}}/{{$item->discount_id}}')"
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