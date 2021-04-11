@extends('admin.layouts.master')

@section('title')
    الدفع عن طريق البنك
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/datatables.bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/sweetalert.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('bankPayment.index') }}">الدفع عن طريق البنك</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>عرض المدفوع عن طريق البنك </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> عرض المدفوع عن طريق البنك
        <small>عرض المدفوع عن طريق البنك  </small>
    </h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-lg-6">
                                {{-- <div class="btn-group">
                                    <a class="btn sbold green" href="{{ route('banks.create') }}"> إضافة جديد
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="btn-group pull-right">
                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false">أدوات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> طباعة
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> صورة التحويل </th>
                            <th> اسم العميل </th>
                            <th> اسم المستخدم   </th>
                            <th> رقم الحساب </th>
                            <th> ايبان</th>
                            <th> مدة الدفع</th>
                            {{-- <th> العمليات </th> --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $data as $value )
                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" value="1" />
                                        <span></span>
                                    </label>
                                </td>
                                <td> <img class="table_img img-preview img-responsive" src="{{ URL::asset('public/uploads/bankPayments/'.$value->transfer_recipt) }}"></td>
                                <td> {{ $value->client_name }} </td>
                                <td> <a href="{{ route('users.show', $value->user->id) }}"> {{ $value->user->username }} </a> </td>
                                <td> {{ $value->client_accountNum }} </td>
                                <td> {{ $value->iban }}  </td>
                                <td> {{ $value->paymentDuration->duration }}  </td>
                                {{-- <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> العمليات
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ URL::asset('public/admin/js/datatable.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/datatables.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/table-datatables-managed.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/ui-sweetalert.min.js') }}"></script>


@endsection
