@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.showDetails') }} فاتورة
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
                <a href="{{ route('invoices.index') }}">الفواتير </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> {{ trans('admin.showDetails') }} فاتورة </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الفواتير
        <small>{{ trans('admin.showDetails') }} فاتورة </small>
    </h1>
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-4">
            <div class="portlet light ">
                <div>
                    <h4 class="profile-desc-title"> رقم الفاتورة  </h4>
                    <span class="profile-desc-text"> {{ $invoice->id_num}}  ر.س</span>

                    <h4 class="profile-desc-title"> اسم مزود الخدمة  </h4>
                    <span class="profile-desc-text"> <a href="{{ route('users.show', $invoice->provider->id) }}"> {{ $invoice->provider->username }} </a> </span>

                    <h4 class="profile-desc-title"> اسم الزبون </h4>
                    <span class="profile-desc-text"> <a href="{{ route('users.show', $invoice->user->id) }}"> {{ $invoice->user->username }} </a> </span>

                    <h4 class="profile-desc-title"> الوصف </h4>
                    <span class="profile-desc-text"> {{ $invoice->description }} </span>

                    <h4 class="profile-desc-title"> قيمة الضريبة  </h4>
                    <span class="profile-desc-text"> {{ $invoice->tax}} ر.س </span>

                    <h4 class="profile-desc-title"> اجمالى الفاتورة  </h4>
                    <span class="profile-desc-text"> {{ $invoice->totalCost}} ر.س </span>

                    <h4 class="profile-desc-title"> حالة الفاتورة  </h4>
                    <span class="profile-desc-text"> {{ $invoice->status?'معلق':'مرفوض'}} </span>

                    <h4 class="profile-desc-title"> وقت الاضافة </h4>
                    <span class="profile-desc-text"> {{ $invoice->created_at->format('Y-m-d g:i A')}} </span>
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
