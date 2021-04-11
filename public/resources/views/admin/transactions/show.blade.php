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
                <a href="{{ route('transactions.index') }}">الطلبات </a>
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
                    {{-- {{ dd($balanceRequest) }} --}}
                    <h4 class="profile-desc-title"> رقم الطلب  </h4>
                    <span class="profile-desc-text"> {{ $balanceRequest->id_num}}</span>

                    <h4 class="profile-desc-title"> القيمة </h4>
                    <span class="profile-desc-text"> {{ $balanceRequest->value }} ر.س </span>

                    <h4 class="profile-desc-title"> اسم  المستخدم  </h4>
                    <span class="profile-desc-text"> <a href="{{ route('users.show', $balanceRequest->user['id']) }}"> {{ $balanceRequest->user['username'] }} </a> </span>

                    <h4 class="profile-desc-title">  الاسم الاول  </h4>
                    <span class="profile-desc-text"> {{ $balanceRequest->firstName}}   </span>

                    <h4 class="profile-desc-title"> الاسم الاخير </h4>
                    <span class="profile-desc-text"> {{ $balanceRequest->lastName}}   </span>

                    <h4 class="profile-desc-title"> رقم الهاتف  </h4>
                    <span class="profile-desc-text"> {{ $balanceRequest->mobileNum}}  </span>

                    <h4 class="profile-desc-title"> نوع التحويل </h4>
                    <span class="profile-desc-text"> {{ $balanceRequest->type?'اضافة رصيد':'سحب رصيد' }}  </span>

                    <h4 class="profile-desc-title"> حالة التحويل </h4>
                    <span class="profile-desc-text"> {{ $balanceRequest->status?'تم السحب':'فى انتظار الموافقة ' }}  </span>

                    <h4 class="profile-desc-title"> تاريخ التحويل  </h4>
                    <span class="profile-desc-text"> {{ $balanceRequest->created_at }}  </span>


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
