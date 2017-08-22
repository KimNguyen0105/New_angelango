@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Quản lý Menu</h3>
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
                                <th width="10%">Thứ tự</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$menu->title_vi}}</td>
                                    <td>{{$menu->title_en}}</td>
                                    <td>{{$menu->sort_order}}</td>

                                    <td>
                                        <a onclick="getMenu('{{$menu->id}}','{{$menu->title_vi}}','{{$menu->title_en}}','{{$menu->sort_order}}')"
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
            <div id="editMenu" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xác nhận xóa</h4>
                        </div>
                        <form method="POST" id="frMenu" action="{{url('/admin/menu')}}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Tiêu đề tiếng việt</label>
                                    <input name="id" id="id" hidden>
                                    <input class="form-control" required name="title_vi" id="title_vi">
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề tiếng anh</label>
                                    <input class="form-control" required name="title_en" id="title_en">
                                </div>
                                <div class="form-group">
                                    <label>Thứ tự</label>
                                    <input class="form-control" required name="sort_order" id="sort_order">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" id="btnSave" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function getMenu(id, title_vi, title_en,sort_order) {
            $('#id').val(id);
            $('#title_vi').val(title_vi);
            $('#title_en').val(title_en);
            $('#sort_order').val(sort_order);
            $('#editMenu').modal('show');
        }
        function createStatusOrder() {
            $('#id').val(0);
            $('#title_vi').val('');
            $('#title_en').val('');
            $('#sort_order').val('0');
            $('#editMenu').modal('show');
        }
    </script>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function() {
            jQuery('#frMenu').validate({
                ignore: ".ignore",
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",
                rules: {
                    "sort_order": {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    title_vi: {
                        required: 'Tiêu đề không được trống.'
                    },
                    title_en: {
                        required: 'Title không được trống.'
                    },
                    sort_order:{
                        required: 'Thứ tự không được trống.',
                        number: 'Thứ tự phải là số'
                    }
                }
            });

            jQuery('#btnSave').click(function(evt) {
                evt.preventDefault();

                jQuery('#frMenu').submit()

            });
        });
    </script>
@endsection
