@extends('admin.layouts.master')

@section('title')
    إضافة مدة
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
                <a href="{{ route('banks.index') }}">مدة الدفع  </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>إضافة مدة </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> مدة الدفع
        <small>إضافة مدة جديد</small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open([ 'url' => route('paymentDuration.store'), 'class' => 'form-horizontal' ]) !!}

                    <div class="form-group">
                        <label for="duration" class="col-lg-3 control-label"> المدة  </label>
                        <div class="col-lg-9">
                            <input type="text" id="duration" name="duration" class="form-control " placeholder="Ex:For Three months" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cost" class="col-lg-3 control-label"> التكلفة </label>
                        <div class="col-lg-9">
                            <input type="text" id="cost" name="cost" class="form-control autosizeme" rows="10" placeholder="التكلفة " required>
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
