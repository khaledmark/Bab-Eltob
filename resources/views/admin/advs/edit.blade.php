@extends('admin.layouts.master')

@section('title')
    تعديل الاعلان الخاص
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
                <a href="{{ route('advs.index') }}">الاعلان الخاص</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل الاعلان الخاص </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الاعلان الخاص
        <small>تعديل الاعلان الخاص </small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::model($adv, ['method' => 'PATCH', 'files' => 'true' ,'url' => route('advs.update', $adv->id),'class' => 'form-horizontal']) !!}
                    <div class="form-group ">
                        <label class="control-label col-lg-3">صورة الاعلان الخاص</label>
                        <div class="col-lg-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                @if( $adv->photo )
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 330px; height: 150px;">
                                        <img src="{{ URL::asset('public/uploads/advs/'.$adv->photo) }}">
                                    </div>
                                @endif
                                <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new"> تغيير الصورة </span>
                                        <span class="fileinput-exists"> تغيير </span>
                                        <input type="file" name="image" accept="image/*">
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-3 control-label">حالة الاعلان الخاص</label>
                        <div class="col-lg-9">
                            {!! Form::select('status',['' => '---','1' => 'مفعل', '0' => 'غير مفعل'] , null, ['class' => 'form-control autosizeme', 'required']) !!}
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
