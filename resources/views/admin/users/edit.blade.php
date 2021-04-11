@extends('admin.layouts.master')

@section('title')
    تعديل بيانات العميل
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
                <a href="{{ route('users.index') }}">العملاء</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل بيانات العميل</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> العملاء
        <small>تعديل بيانات العميل</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($user, ['method' => 'PATCH', 'url' => route('users.update', $user->id),'class' => 'form-horizontal', 'files' => 'true']) !!}

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
                    <input type="hidden" id="user_type" name="user_type" value="user">
                        <div class="form-group">
                            <label for="username" class="col-lg-3 control-label"> اسم العميل</label>
                            <div class="col-lg-9">
                                <input id="username" name="username" type="text" value="{{ $user->username }}" class="form-control" placeholder=" اسم العميل">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label">{{ trans('admin.adminsADEmail') }}</label>
                            <div class="col-lg-9">
                                <input id="email" name="email" type="email" value="{{ $user->email }}" class="form-control" placeholder="{{ trans('admin.adminsADEmail') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label">{{ trans('admin.adminsADPhone') }}</label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone" type="text" value="{{ $user->phone }}" class="form-control" placeholder="{{ trans('admin.adminsADPhone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label"> اسم المدينة   </label>
                            <div class="col-lg-9">
                                {!!Form::select('city_id', $cities, null, ['class' => 'form-control city '] ) !!}
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
    
@endsection