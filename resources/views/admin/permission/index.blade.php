@extends('admin.layout.master')
@section('content')
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="{{url('/admin/permission/0')}}" class="btn btn-sm btn-success addlink"><span
                        class="glyphicon glyphicon-new-window"></span> Create Permission</a>
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-3">
                        <h3>System permission
                            {{--<small>Graph title sub-title</small>--}}
                        </h3>
                    </div>
                </div>
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
                <div class="col-md-12">
                    <table class="table table-bordered table-responsive projecttable">
                        <thead>
                        <tr>
                            <th>Quyền</th>
                            <th>Link</th>
                            <th>Công việc</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permission as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->link}}</td>
                                <td>{{$item->note}}</td>
                                <td>
                                    <a href="{{url('admin/permission')}}/{{$item->id}}"
                                       class="btn btn-xs btn-primary editlink"><span class="glyphicon glyphicon-pencil"></span>
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
    <div id="editPermission" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận xóa</h4>
                </div>
                <form method="POST" action="{{url('/admin/permission')}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Quyền</label>
                            <input name="id" id="id" hidden>
                            <input class="form-control" required name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <textarea class="form-control" name="link" required id="link" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Công việc</label>
                            <input class="form-control" name="note" id="note">
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
@endsection
@section('scripts')
    <script>
        function getPermission(id, name,link, note) {
            $('#id').val(id);
            $('#name').val(name);
            $('#link').val(link);
            $('#note').val(note);
            $('#editPermission').modal('show');
        }
        function createPermission() {
            $('#id').val(0);
            $('#name').val('');
            $('#link').val('');
            $('#note').val('');
            $('#editPermission').modal('show');
        }
    </script>
@endsection