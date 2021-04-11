@extends('admin.layouts.master')

@section('title')
    إضافة دولة
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
                <a href="{{ route('countries.index') }}">الدول </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>إضافة دولة </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الدول
        <small>إضافة دولة جديد</small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open([ 'url' => route('countries.store'), 'class' => 'form-horizontal','files'=>true ]) !!}

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم الدولة   </label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name" class="form-control " placeholder="اسم الدولة" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="key" class="col-lg-3 control-label"> مفتاح الدولة</label>
                        <div class="col-lg-9">
                            <input type="text" id="key" name="key" class="form-control autosizeme" rows="10" placeholder="مثال: 966 ,2,965 بدون 0 او +" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="abbreviation" class="col-lg-3 control-label"> اختصار الدولة</label>
                        <div class="col-lg-9">
                            <input type="text" id="abbreviation" name="abbreviation" class="form-control autosizeme" rows="10" placeholder="مثال :EG,SAR" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="control-label col-lg-3">علم الدولة</label>
                        <div class="col-lg-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 330px; height: 150px;"> </div>
                                <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new"> اختر صورة </span>
                                        <span class="fileinput-exists"> تغيير </span>
                                        <input type="file" name="flag" accept="image/*" required>
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                </div>
                            </div>
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
