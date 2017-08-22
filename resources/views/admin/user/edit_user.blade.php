@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>Add User</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form id="frUser" data-parsley-validate action="{{url('admin/user')}}/{{$user->id}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/user')}}" class="btn btn-primary" type="button">Cancel</a>
                    <button type="submit" id="btnSave" class="btn btn-success">Save</button>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="introduce">
                            Tên người dùng
                        </label>
                        <input type="text" class="form-control" name="username" id="username" value="{{$user->username}}" required maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="introduce">
                            Email
                        </label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" required maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="introduce">
                            Password
                        </label>
                        <input type="password" class="form-control" value="{{$user->password}}" name="password" id="password"  required maxlength="255">
                    </div>
                    <div class="form-group">
                        <label>Quyền quản trị</label>
                        <div class="col-md-12">
                            @if($permission!=null)
                                @foreach($permission as $item)
                                    <div class="col-md-6">
                                        <label><input type="checkbox" value="1" name="permission_{{$item->id}}"> {{$item->name}}</label><br>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Hình ảnh(150 x 150)</label>
                        <input id="file" accept="image/*" name="file" type="file" style="padding-bottom: 20px" onchange="readURL(this);">
                        <img id="imgF" src="{{asset('images/users')}}/{{$user->avatar}}" class="img-responsive" style="height: 200px;">
                    </div>
                </div>
            </form>
            </div>
        </div>

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgF').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function() {
            jQuery('#frUser').validate({
                ignore: ".ignore",
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",
                rules: {
                    "email": {
                        required: true,
                        email: true
                    },
                    "password": {
                        required: true,
                        min: 6
                    },
                    "username": {
                        required: true,
                        min: 6
                    }
                },
                messages: {
                    email: {
                        required: 'Email không được trống.',
                        email: 'Email không đúng định dạng.'
                    },
                    password: {
                        required: 'Password không được trống.',
                        min: 'Password phải từ 6 ký tự trở lên.'
                    },
                    username: {
                        required: 'Username không được trống.',
                        min: 'Username phải từ 6 ký tự trở lên.'
                    }
                }
            });

            jQuery('#btnSave').click(function(evt) {
                evt.preventDefault();

                jQuery('#frUser').submit()

            });
        });

    </script>
@endsection