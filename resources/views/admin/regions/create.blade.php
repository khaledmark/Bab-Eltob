@extends('admin.layouts.master')

@section('title')
    إضافة منطقة
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
                <a href="{{ route('regions.index') }}">المناطق </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>إضافة منطقة </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> المناطق
        <small>إضافة منطقة جديد</small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open([ 'url' => route('regions.store'), 'class' => 'form-horizontal' ]) !!}

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم الدولة   </label>
                        <div class="col-lg-9">
                            {{-- <input type="text" id="name" name="name" class="form-control " placeholder="اسم الدولة " required> --}}
                            {!!Form::select('city_id', $cities, null, ['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم المنطقة بالعربية  </label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name" class="form-control " placeholder="اسم المنطقة بالعربية " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name_en" class="col-lg-3 control-label"> اسم المنطقة بالإنجليزية </label>
                        <div class="col-lg-9">
                            <input type="text" id="name_en" name="name_en" class="form-control " placeholder="اسم المنطقة بالإنجليزية  " required>
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
