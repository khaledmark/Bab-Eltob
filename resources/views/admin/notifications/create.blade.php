@extends('admin.layouts.master')

@section('title')
    {{ $type == 'user' ? trans('admin.notificationsUserAdd') : trans('admin.notificationsCompAdd') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2-bootstrap.min.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ $type == 'user' ? trans('admin.notificationsUserAdd') : trans('admin.notificationsCompAdd') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ $type == 'user' ? trans('admin.notificationsUserAdd') : trans('admin.notificationsCompAdd') }}
        <small>إرسال إشعارات جديدة</small>
    </h1>
@endsection

@section('content')
    {!! Form::open([ 'url' => route('notifications.store', $type), 'class' => 'form-horizontal']) !!}

    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <div class="form-group">
                        <label for="user" class="col-lg-3 control-label">{{ $type == 'user' ? trans('admin.userName') : trans('admin.companyName') }}</label>
                        <div class="col-lg-9">
                            <div class="input-group select2-bootstrap-append">
                                <select id="user" name="user" class="form-control select2-allow-clear">
                                    <option value ></option>
                                        <option value="user">جميع العملاء</option>
                                        @foreach( $users as $id => $name)
                                            <option value="{{ $id }}" >{{ $name }}</option>
                                        @endforeach
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-lg-3 control-label">{{ trans('admin.message') }}</label>
                        <div class="col-lg-9">
                            <textarea id="message" name="message" class="form-control autosizeme" rows="10" placeholder="{{ trans('admin.message') }}"></textarea>
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
    <script src="{{ URL::asset('public/admin/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/components-select2.min.js') }}"></script>
@endsection
