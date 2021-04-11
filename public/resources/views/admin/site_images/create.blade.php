@extends('admin.layouts.master')

@section('title')
    {{ $type == 'slider' ? trans('admin.sliderAdd') : trans('admin.appImagesAdd') }}
@endsection

@section('styles')
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
                <a href="{{ route('site-images.index', $type) }}"> {{ $type == 'slider' ? trans('admin.sliderIndex') : trans('admin.appImagesIndex') }} </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ $type == 'slider' ? trans('admin.sliderAdd') : trans('admin.appImagesAdd') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ $type == 'slider' ? trans('admin.sliderAdd') : trans('admin.appImagesAdd') }}
        {{--<small>إضافة مدير جديد</small>--}}
    </h1>
@endsection

@section('content')
    {!! Form::open([ 'url' => route('site-images.store', $type), 'class' => 'form-horizontal', 'files' => 'true' ]) !!}

    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <div class="form-group ">
                        <label class="control-label col-lg-3">{{ trans('admin.adminsADAppPhoto') }}</label>
                        <div class="col-lg-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 330px; height: 150px;"> </div>
                                <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new"> اختر صورة </span>
                                        <span class="fileinput-exists"> تغيير </span>
                                        <input type="file" name="photo" accept="image/*">
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
                </div>
            </div>

        </div>
    </div>

    {!! Form::close() !!}
@endsection

@section('scripts')
    <script src="{{ URL::asset('public/admin/js/bootstrap-fileinput.js') }}"></script>
@endsection