@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="{{url('/admin/menu-product/create-menu-product')}}" class="btn btn-sm btn-success addlink"><span
                        class="glyphicon glyphicon-new-window"></span> Create Menu Product</a>
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
                                <th width="15%">Email</th>
                                <th width="15%">Trạng thái</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribe as $item)
                                @php
                                    if ($item->status) {
                                        
                                        $updateReadStatusUrl = route('admin.chuadoc',$item->id);
                                        $updateReadStatusTilte = 'Đánh dấu là chưa gửi email';
                                        $readStatusFontAwesome = 'fa-envelope';
                                    } else {
                                      
                                        $updateReadStatusUrl = route('admin.doc', $item->id);
                                        $updateReadStatusTilte = 'Đánh dấu là đã gửi email';
                                        $readStatusFontAwesome = 'fa-envelope';
                                    }
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                    <a href="javascript:void(0);" class="update-read-status-button" data-id="{{ $item->id }}" title="{{ $updateReadStatusTilte }}" data-href="{{ $updateReadStatusUrl }}">
                                        <i class="fa {{ $readStatusFontAwesome }}" aria-hidden="true"></i>
                                        </a>
                                    @if($item->status ==0){{"Chưa gửi email"}}@else {{"Đã gửi email"}} @endif</td>
                                    <td>
                                        
                                        
                                            <a onclick="ftDelete('{{url('admin/subscribe/delete-subscribe')}}/{{$item->id}}')"
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
@section('scripts')
<script type="text/javascript">
    $('.update-read-status-button').click(function(e) {
        e.preventDefault();

        var button = $(this);
        var url = button.attr('data-href');
        var data = {
            'id': button.attr('data-id'),
            // '_token': Laravel.csrfToken
        };

        $.post(url, data, function(res) {
            if (res.state == 'success') {
                window.location.reload();
            } else if (res.state == 'error') {
                alert('Có lỗi xảy ra!');
            }
        });
    });
</script>
@endsection