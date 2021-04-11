@extends('admin.layouts.master')

@section('title')
    لوحة التحكم
@endsection

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>مخطط الإحصائيات</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> مخطط الإحصائيات
        <small>عرض مخطط الإحصائيات</small>
    </h1>

    <div class="row">

        <div class="card">
            <div class="card__header">
                <h3>المديرين النشطين  ({{ $adminsCount }})</h3>
                {!!  $adminsChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>المستخدمين النشطين  ({{ $usersCount }})</h3>
                {!! $usersChart->render() !!}
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h3>  الإعلانات ({{ $itemsCount }})</h3>
                {!! $itemsChart->render() !!}
            </div>
        </div>
        
    </div>
@endsection
