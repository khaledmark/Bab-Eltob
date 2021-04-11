@extends('admin.layouts.master')

@section('title')
    إضافة سؤال
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
                <a href="{{ route('faqs.index') }}">الأسئلة الشائعة</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>إضافة سؤال شائع</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الأسئلة الشائعة
        <small>إضافة سؤال جديد</small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open([ 'url' => route('faqs.store'), 'class' => 'form-horizontal' ]) !!}
                    <div class="form-group">
                        <label for="ar_question" class="col-lg-3 control-label"> السؤال بالعربية  </label>
                        <div class="col-lg-9">
                            <input type="text" id="ar_question" name="ar_question" class="form-control " placeholder="السؤال بالعربية" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ar_answer" class="col-lg-3 control-label"> الإجابة بالعربية </label>
                        <div class="col-lg-9">
                            <textarea id="ar_answer" name="ar_answer" class="form-control autosizeme" rows="10" placeholder="الإجابة بالعربية " required >  </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="en_question" class="col-lg-3 control-label">السؤال بالإنجليزية </label>
                        <div class="col-lg-9">
                            <input type="text" id="en_question" name="en_question" class="form-control autosizeme" rows="10" placeholder="السؤال بالإنجليزية" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="en_answer" class="col-lg-3 control-label">الإجابة بالانجليزية </label>
                        <div class="col-lg-9">
                            <textarea id="en_answer" name="en_answer" class="form-control autosizeme" rows="10" placeholder="الإجابة بالانجليزية" required>  </textarea>
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