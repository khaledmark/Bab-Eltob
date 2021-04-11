@extends('admin.layouts.master')

@section('title')
    إضافة مدينة
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
                <a href="{{ route('cities.index') }}">المدن </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>إضافة مدينة </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> المدن
        <small>إضافة مدينة جديد</small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open([ 'url' => route('cities.store'), 'class' => 'form-horizontal' ]) !!}
                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم المدينة بالعربية  </label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name" class="form-control " placeholder="اسم المدينة بالعربية " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name_en" class="col-lg-3 control-label"> اسم المدينة بالإنجليزية </label>
                        <div class="col-lg-9">
                            <input type="text" id="name_en" name="name_en" class="form-control " placeholder="اسم المدينة بالإنجليزية  " required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-10">
                                <button type="submit" class="btn green btn-block">حفظ</button>
                            </div>
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('public/admin/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/components-select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/bootstrap-fileinput.js') }}"></script>
@endsection
