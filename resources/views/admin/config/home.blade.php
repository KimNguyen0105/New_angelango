@extends('admin.layout.master')
@section('content')
    <div class="row">
        <form id="frConfig" data-parsley-validate action="{{url('admin/config')}}"
              method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="row" style="padding: 10px 30px; margin-bottom: 10px; border-bottom: 2px #9a9999 solid;">
                <a href="{{url('admin/config')}}" class="btn btn-primary" type="button">Cancel</a>
                <button type="submit" id="btnSave" class="btn btn-success">Save</button>
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
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" id="tabConfig" style="margin-bottom: 20px;">
                    <li class="active"><a href="#tab_vi" data-toggle="tab" aria-expanded="true">Thông tin công ty</a></li>
                    <li class=""><a href="#tab_en" data-toggle="tab" aria-expanded="true">Mạng xã hội</a></li>
                    <li class=""><a href="#tab_seo" data-toggle="tab" aria-expanded="true">Seo</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_vi">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="introduce">
                                    Hotline
                                </label>
                                <input type="text" class="form-control" name="hotline" id="hotline" value="{{$config->hotline}}" required maxlength="255">
                            </div>
                            <div class="form-group">
                                <label for="introduce">
                                    Số điện thoại
                                </label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{$config->phone_number}}"  required maxlength="255">
                            </div>
                            <div class="form-group">
                                <label for="introduce">
                                    Địa chỉ (Tiếng việt)
                                </label>
                                <input type="text" class="form-control" name="address_vi" id="address_vi" value="{{$config->address_vi}}"  required maxlength="255">
                            </div>
                            <div class="form-group">
                                <label for="introduce">
                                    Địa chỉ (Tiếng anh)
                                </label>
                                <input type="text" class="form-control" name="address_en" id="address_en" value="{{$config->address_en}}"  required maxlength="255">
                            </div>
                            <div class="form-group">
                                <label for="introduce">
                                    Google map
                                </label>
                                <textarea class="form-control editors" name="google_map" required id="google_map" rows="5">{{$config->google_map}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Logo (100 x 120)</label>
                                <input id="file" accept="image/*" name="file" type="file" style="padding-bottom: 20px" onchange="readURL(this);">
                                <img id="imgF" src="{{asset('images/config')}}/{{$config->logo}}" class="img-responsive" style="background-color: #000">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_en">
                        <div class="form-group">
                            <label for="introduce">
                                Link facebook
                            </label>
                            <input type="text" class="form-control" name="facebook_link" id="facebook_link" value="{{$config->facebook_link}}" required maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="introduce">
                                Link twitter
                            </label>
                            <input type="text" class="form-control" name="twitter_link" id="twitter_link" value="{{$config->twitter_link}}" required maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="introduce">
                                Link instagram
                            </label>
                            <input type="text" class="form-control" name="instagram_link" id="instagram_link" value="{{$config->hotline}}" required maxlength="255">
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_seo">
                        <div class="form-group">
                            <label for="introduce">
                                Seo Title
                            </label>
                            <input type="text" class="form-control" name="seo_title" id="seo_title" value="{{$config->seo_title}}" required maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="introduce">
                                Seo Keyword
                            </label>
                            <textarea class="form-control editors" name="seo_keyword" required id="seo_keyword" rows="3">{{$config->seo_keyword}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="introduce">
                                Seo Author
                            </label>
                            <textarea class="form-control editors" name="seo_author" required id="seo_author" rows="3">{{$config->seo_author}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="introduce">
                                Seo Description
                            </label>
                            <textarea class="form-control editors" name="seo_description" required id="seo_description" rows="3">{{$config->seo_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="introduce">
                                Google analytic
                            </label>
                            <textarea class="form-control editors" name="google_analytic" id="google_analytic" rows="3">{{$config->google_analytic}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
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
           jQuery('#frConfig').validate({
               ignore: ".ignore",
               errorClass: "state-error",
               validClass: "state-success",
               errorElement: "em",
               messages: {
                   hotline: {
                       required: 'Hotline không được trống.'
                   },
                   address_vi: {
                       required: 'Địa chỉ tiếng việt không được trống.'
                   },
                   address_en: {
                       required: 'Địa chỉ tiếng anh không được trống.'
                   },
                   google_map: {
                       required: 'Google map không được trống.'
                   },
                   file: {
                       required: 'Logo không được trống.'
                   },
                   phone_number:{
                       required: 'Sô điện thoại không được trống.'
                   },
                   facebook_link: {
                       required: 'Link facebook không được trống.'
                   },
                   twitter_link: {
                       required: 'Link Twitter không được trống.'
                   },
                   instagram_link: {
                       required: 'Link Instagram không được trống.'
                   },
                   seo_title: {
                       required: 'Seo Title không được trống.'
                   },
                   seo_keyword: {
                       required: 'Seo Keyword không được trống.'
                   },
                   seo_author: {
                       required: 'Seo Author không được trống.'
                   },
                   seo_description: {
                       required: 'Seo Description không được trống.'
                   },
                   google_analytic: {
                       required: 'Google Analytic không được trống.'
                   }
               },
               invalidHandler: function(e, validator){
                   if(validator.errorList.length)
                       $('#tabConfig a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show')
               }
           });

           jQuery('#btnSave').click(function(evt) {
               evt.preventDefault();

               jQuery('#frConfig').submit()

           });
       });
   </script>
@endsection