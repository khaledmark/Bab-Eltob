@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.showDetails') }} عميل
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/profile-rtl.min.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('users.index') }}">العملاء</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> {{ trans('admin.showDetails') }} عميل </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> العملاء
        <small>{{ trans('admin.showDetails') }} عميل </small>
    </h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-4">
            <div class="portlet light profile-sidebar-portlet ">
                <div class="profile-userpic">
                    <img src="{{ URL::asset('public/images/unknown.png') }}" class="img-responsive" alt="{{ $user->username }}">
                </div>
                <div class="profile-usertitle" style="padding-bottom: 30px;">
                    <div class="profile-usertitle-name"> {{ $user->username }} </div>
                    <div class="profile-usertitle-job"> {{ $user->phone }} </div>
                    <div class="profile-usertitle-job" style="text-transform: none;"> {{ $user->email }} </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="portlet light ">
                <div>  
                    @if( $user->city_id )
                        <h4 class="profile-desc-title"> المدينة </h4>
                        <span class="profile-desc-text"> {{ $user->city->name }} </span>
                    @endif  
                </div>
                
                <div>  
                    @if( $user->region_id )
                        <h4 class="profile-desc-title"> المنطقة </h4>
                        <span class="profile-desc-text"> {{ $user->region->name }} </span>
                    @endif  
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="portlet light ">
                <div>
                    <h4 class="profile-desc-title"> {{ trans('admin.adminsADStatus') }} </h4>
                    <span class="btn-circle label label-sm {{ $user->status ? "label-success" : "label-default" }}">
                        {{ $user->status ? trans('admin.settingsOpen') : trans('admin.settingsClose') }}
                    </span>
                </div>
                <div class="margin-top-30">
                    <h4 class="profile-desc-title"> {{ trans('admin.adminsADDate') }} </h4>
                    <span class="btn-circle label label-sm label-default">
                        {{ $user->created_at->format('Y-m-d g:i A') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('body').addClass('page-container-bg-solid');
        });
    </script>
@endsection
