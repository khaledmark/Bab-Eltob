@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.termsConditionsShow') }}
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.termsConditionsShow') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.termsConditionsShow') }}
        {{--<small>إضافة مؤهل جديد</small>--}}
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    {!! Form::open([ 'url' => route('terms.store'), 'class' => 'form-horizontal' ]) !!}

                    <div class="form-group">
                        <label for="ar_content" class="col-lg-3 control-label">{{ trans('admin.ar_content') }}</label>
                        <div class="col-lg-9">
                            <textarea id="ar_content" name="ar_content" class="form-control autosizeme" rows="10" placeholder="{{ trans('admin.ar_content') }}"> {{ $data->ar_content ? $data->ar_content : old('ar_content') }} </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="en_content" class="col-lg-3 control-label">{{ trans('admin.en_content') }}</label>
                        <div class="col-lg-9">
                            <textarea id="en_content" name="en_content" class="form-control autosizeme" rows="10" placeholder="{{ trans('admin.en_content') }}"> {{ $data->en_content ? $data->en_content : old('en_content') }} </textarea>
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

