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
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!! Form::model($setting, ['method' => 'PATCH','files' => true, 'url' => route('settings.update', $setting->id),'class' => 'form-horizontal','style'=>'display:inline']) !!}
                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label">{{ trans('admin.ar_name') }}</label>
                            <div class="col-lg-9">
                                <input id="name" name="name" value="{{ $setting->name }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsAppEmail') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="en_name" class="col-lg-3 control-label">{{ trans('admin.en_name') }}</label>
                            <div class="col-lg-9">
                                    {!! Form::text('name_en', isset($setting) ? $setting->translate('en')->name : null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label">{{ trans('admin.settingsAppEmail') }}</label>
                            <div class="col-lg-9">
                                <input id="email" name="email" value="{{ $setting->email }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsAppEmail') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label">{{ trans('admin.settingsAppPhone') }}</label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone" value="{{ $setting->phone }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsAppPhone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label">{{ trans('admin.settingsAppPhone2') }}</label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone2" value="{{ $setting->phone2 }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsAppPhone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label">{{ trans('admin.settingsAppPhone3') }}</label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone3" value="{{ $setting->phone3 }}" type="text" class="form-control" placeholder="{{ trans('admin.settingsAppPhone') }}">
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

