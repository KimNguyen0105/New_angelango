@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" style="background-color: #fff; padding: 10px 30px; margin-bottom: 10px">
                        <h3>Thêm account</h3>
                </div>
            @if ($message = Session::get('failed'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            @include('admin.account.error')
            <form id="demo-form2" data-parsley-validate action="{{url('admin/account/create-account')}}"
                  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                    <a href="{{url('admin/account')}}" class="btn btn-primary" type="button">Hủy bỏ</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
                <div class="col-md-8">

                    <div class="form-group">
                        <label for="introduce">
                            Email
                        </label>
                        <input type="email" class="form-control" name="email" id="email" value="{!! old('email') !!}" required maxlength="255">
                    </div>

                    <div class="form-group">
                        <label for="introduce">
                            Name
                        </label>
                        <input type="text" class="form-control" name="name" id="name" value="{!! old('name') !!}" required maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="introduce">
                            Số điện thoại
                        </label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{!! old('phone_number') !!}" required maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="introduce">
                            Ngày sinh
                        </label>
                        <input type="date" class="form-control" name="birthday" id="birthday" value="{!! old('birthday') !!}" required maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="introduce">
                           Giới tính
                        </label>
                         <div class="radio">
                            <label>
                              <input type="radio" checked="" value="1" id="optionsRadios1" name="gender"> Nam
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" checked="" value="0" id="optionsRadios1" name="gender"> Nữ
                            </label>
                          </div>
                         
                    </div>

                    <div class="form-group">
                        <label for="introduce">
                            Password
                        </label>
                        <input type="password" required class="form-control" name="password" id="password" value="" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="introduce">
                            Re-Password
                        </label>
                        <input type="password" required class="form-control" name="txtRePass" id="txtRePass" value="" maxlength="255">
                    </div>
                </div>

                <div class="col-md-4">
                    
                </div>
            </form>
            </div>
        </div>

    
@endsection
