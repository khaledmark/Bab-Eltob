@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.settings') }}
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.settings') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.settings') }}
        {{--<small>إضافة مؤهل جديد</small>--}}
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    {!! Form::open([ 'url' => route('settings.store'), 'class' => 'form-horizontal' ]) !!}

                    <div class="form-group">
                        <label for="en_name" class="col-lg-3 control-label">{{ trans('admin.ar_name') }}</label>
                        <div class="col-lg-9">
                            <input id="ar_name" name="ar_name" value="{{ $data->ar_name }}" type="text" class="form-control" placeholder="{{ trans('admin.ar_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="en_name" class="col-lg-3 control-label">{{ trans('admin.en_name') }}</label>
                        <div class="col-lg-9">
                            <input id="en_name" name="en_name" value="{{ $data->en_name }}" type="text" class="form-control" placeholder="{{ trans('admin.en_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-3 control-label">{{ trans('admin.settingsAppEmail') }}</label>
                        <div class="col-lg-9">
                            <input id="email" name="email" value="{{ $data->email }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsAppEmail') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-lg-3 control-label">{{ trans('admin.settingsAppPhone') }}</label>
                        <div class="col-lg-9">
                            <input id="phone" name="phone" value="{{ $data->phone }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsAppPhone') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="facebook" class="col-lg-3 control-label">{{ trans('admin.settingsFb') }}</label>
                        <div class="col-lg-9">
                            <input id="facebook" name="facebook" value="{{ $data->facebook }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsFb') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="col-lg-3 control-label">{{ trans('admin.settingsTw') }}</label>
                        <div class="col-lg-9">
                            <input id="twitter" name="twitter" value="{{ $data->twitter }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsTw') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="linked" class="col-lg-3 control-label">{{ trans('admin.settingsLin') }}</label>
                        <div class="col-lg-9">
                            <input id="linked" name="linked" value="{{ $data->linked }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsLin') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="google_play_link" class="col-lg-3 control-label">{{ trans('admin.settingsGooglePlay') }}</label>
                        <div class="col-lg-9">
                            <input id="google_play_link" name="google_play_link" value="{{ $data->google_play_link }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsGooglePlay') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_store_link" class="col-lg-3 control-label">{{ trans('admin.settingsAppStore') }}</label>
                        <div class="col-lg-9">
                            <input id="app_store_link" name="app_store_link" value="{{ $data->app_store_link }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsAppStore') }}">
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

