@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.adminsEdit') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/bootstrap-fileinput.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('admins.index') }}">{{ trans('admin.adminsIndex') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.adminsEdit') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.adminsIndex') }}
        <small>{{ trans('admin.adminsEdit') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($admin, ['method' => 'POST', 'url' => route('admins.changePassword', $admin->id),'class' => 'form-horizontal', 'files' => 'true']) !!}

        <div class="row">
            <div class="col-lg-8">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> البيانات الرئيسية</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-group">
                            <label for="current_password" class="col-lg-3 control-label">كلمة المرور الحالية</label>
                            <div class="col-lg-9">
                                <input id="current_password" name="current_password" type="password" class="form-control" placeholder="كلمة المرور الحالية ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="col-lg-3 control-label">{{ trans('admin.adminsADPassword') }}</label>
                            <div class="col-lg-9">
                                <input id="new_password" name="new_password" type="password" class="form-control" placeholder="{{ trans('admin.adminsADPassword') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-lg-3 control-label">{{ trans('admin.adminsADRePassword') }}</label>
                            <div class="col-lg-9">
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="{{ trans('admin.adminsADRePassword') }}">
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-2 col-lg-offset-10">
                                    <button type="submit" class="btn green btn-block">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    {!! Form::close() !!}
@endsection

@section('scripts')
    <script src="{{ URL::asset('public/admin/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/components-select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/bootstrap-fileinput.js') }}"></script>

    <script>
        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('.city').on("change", function () {

                $(".neighborhood").prop("disabled", true);
                $(".street").prop("disabled", true);
                var city_id = $('.city').val();

                $.ajax({
                    url: "{{ url('/') }}" + "/dashboard/cities/change-city",
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'city_id': city_id}
                })
                    .done(function (reseived_data) {

                        var parsed_data = $.parseJSON(reseived_data);
                        $(".neighborhood").prop("disabled", false);
                        // $('.load').empty();

                        $(".neighborhood option[value]").remove();
                        $('.neighborhood').prepend("<option value='' selected='selected'></option>");
                        $('.neighborhood').select2({placeholder: 'اختر الحي', data: parsed_data, dir: 'rtl'});
                    });
            });

            $('.neighborhood').on("change", function () {

                $(".street").prop("disabled", true);
                var neighborhood_id = $('.neighborhood').val();

                $.ajax({
                    url: "{{ url('/') }}" + "/dashboard/neighborhoods/change-neighborhood",
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'neighborhood_id': neighborhood_id}
                })
                    .done(function (reseived_data) {

                        var parsed_data = $.parseJSON(reseived_data);
                        $(".street").prop("disabled", false);

                        $(".street option[value]").remove();
                        $('.street').prepend("<option value='' selected='selected'></option>");
                        $('.street').select2({placeholder: 'اختر الشارع', data: parsed_data, dir: 'rtl'});
                    });
            });
        });
    </script>
@endsection
