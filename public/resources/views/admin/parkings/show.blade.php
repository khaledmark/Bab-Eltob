@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.showDetails') }} طلب
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
                <a href="{{ route('parkings.index') }}">الطلبات </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> {{ trans('admin.showDetails') }} طلب </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الطلبات
        <small>{{ trans('admin.showDetails') }} طلب </small>
    </h1>
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-4">
            <div class="portlet light ">
                <div>
                    <h4 class="profile-desc-title"> اسم الجراج </h4>
                    <span class="profile-desc-text"> {{ $parking->name}}</span>

                    <h4 class="profile-desc-title"> سعر الساعة  </h4>
                    <span class="profile-desc-text"> {{ $parking->hour_price }} ر.س </span>

                    <h4 class="profile-desc-title"> اسم  مزود الخدمة   </h4>
                    <span class="profile-desc-text"> <a href="{{ route('users.show', $parking->provider['id']) }}"> {{ $parking->provider['username'] }} </a> </span>

                    <h4 class="profile-desc-title">  الموقع </h4>
                    <span class="profile-desc-text"> {{ $parking->location}}   </span>

                    <h4 class="profile-desc-title"> تاريخ الاضافة   </h4>
                    <span class="profile-desc-text"> {{ $parking->created_at }}  </span>


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
