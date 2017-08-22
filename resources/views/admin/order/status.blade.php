@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a onclick="createStatusOrder()" class="btn btn-sm btn-success addlink"><span
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
                                <th width="15%">Tiêu đề (vi)</th>
                                <th width="15%">Tiêu đề (en)</th>
                                <th width="15%">Thứ tự</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($status as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->title_vi}}</td>
                                    <td>{{$item->title_en}}</td>
                                    <td>{{$item->sort_order}}</td>
                                    <td>
                                        <a onclick="getStatusOrder('{{$item->id}}','{{$item->title_vi}}','{{$item->title_en}}','{{$item->sort_order}}')"
                                           class="btn btn-xs btn-primary editlink"><span
                                                    class="glyphicon glyphicon-pencil"></span>
                                            Edit</a>
                                        @if($loop->count > 2)
                                            <a onclick="ftDelete('{{url('admin/status/delete-status')}}/{{$item->id}}')"
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
            <div id="editStatusOrder" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xác nhận xóa</h4>
                        </div>
                        <form method="POST" action="{{url('/admin/status')}}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Tiêu đề tiếng việt</label>
                                    <input name="id" id="id" hidden>
                                    <input class="form-control" name="title_vi" id="title_vi">
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề tiếng anh</label>
                                    <input class="form-control" name="title_en" id="title_en">
                                </div>
                                <div class="form-group">
                                    <label>Thứ tự</label>
                                    <input class="form-control" name="sort_order" id="sort_order">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function getStatusOrder(id, title_vi, title_en,sort_order) {
            $('#id').val(id);
            $('#title_vi').val(title_vi);
            $('#title_en').val(title_en);
            $('#sort_order').val(sort_order);
            $('#editStatusOrder').modal('show');
        }
        function createStatusOrder() {
            $('#id').val(0);
            $('#title_vi').val('');
            $('#title_en').val('');
            $('#sort_order').val('0');
            $('#editStatusOrder').modal('show');
        }
    </script>
@endsection