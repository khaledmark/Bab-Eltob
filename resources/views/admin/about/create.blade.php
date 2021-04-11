@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.aboutTitleShow') }}
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.aboutTitleShow') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.aboutTitleShow') }}

    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    {!! Form::open([ 'url' => route('about.store'), 'class' => 'form-horizontal' ]) !!}

                    <div class="form-group">
                        <label for="ar_content" class="col-lg-3 control-label">{{ trans('admin.ar_content') }}</label>
                        <div class="col-lg-9">
                            <textarea id="content" name="content" class="form-control autosizeme" rows="10" placeholder="{{ trans('admin.ar_content') }}"> {{ $data->content ? $data->content : old('ar_content') }} </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-3 control-label">{{ trans('admin.en_content') }}</label>
                        <div class="col-lg-9">
                            {!! Form::textarea('content_en', isset($data) ? $data->translate('en')->content : null, ['class' => 'form-control autosizeme', 'rows' => '10', 'required']) !!}
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

