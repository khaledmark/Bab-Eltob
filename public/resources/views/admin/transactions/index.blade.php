@extends('admin.layouts.master')

@section('title')
    تحويلات الرصيد
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
                <a href="{{ route('transactions.index') }}">تحويلات الرصيد </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>عرض تحويلات الرصيد  </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> عرض تحويلات الرصيد
        <small>عرض تحويلات الرصيد   </small>
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
                            <th> رقم الطلب  </th>
                            <th> القيمة    </th>
                            <th> اسم المستخدم </th>
                            <th> الاسم الاول </th>
                            <th> الاسم الاخير  </th>
                            {{-- <th> رقم الحساب </th> --}}
                            <th> رقم الهاتف </th>
                            <th> نوع التحويل </th>
                            <th> حالة التحويل </th>
                            <th> تاريخ لتحويل  </th>
                            <th> العمليات </th>
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

                                <td> {{ $value->id_num }} </td>
                                <td> {{ $value->value }} ر.س</td>
                                <td>
                                    <a href="{{ route('users.show', $value->user->id) }}"> {{ $value->user->username }} </a>
                                </td>
                                <td> {{ $value->firstName }} </td>
                                <td> {{ $value->lastName }} </td>
                                {{-- <td> {{ $value->accountNum }} </td> --}}
                                <td> {{ $value->mobileNum }} </td>
                                <td> {{ $value->type?'اضافة رصيد':'سحب رصيد' }} </td>
                                <td> {{ $value->status?'تم التحويل':'فى انتظار الموافقة ' }} </td>
                                <td> {{ $value->created_at->format('Y-m-d g:i A') }} </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> العمليات
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                            @if($value->status == 0)
                                                <li>
                                                    <a class="changeStatus" data="{{ $value->id }}" data_name="{{ $value->id_num }}" status="1">
                                                        <i class="fa fa-key"></i> موافقة
                                                    </a>
                                                </li>

                                            <li>
                                                <a href="{{ route('transactions.index') }}">
                                                    <i class="icon-eye"></i> رفض
                                                </a>
                                            </li>
                                            @endif
                                            <li>
                                                <a href="transactions/{{$value->id}}">
                                                    <i class="icon-eye"></i> عرض
                                                </a>
                                            </li>
                                    </div>
                                </td>
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
    <script>
        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('body').on( "click", '.changeStatus', function( ) {

                var data_id = $(this).attr('data');
                var swal_text = 'للتحويل رقم  ' + $(this).attr('data_name');
                var swal_title = 'هل أنت متأكد من تحويل الرصيد لمزود الخدمة ؟';
                var status = $(this).attr('status');
                console.log(status);
                swal({
                    title: swal_title,
                    text: swal_text,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "تأكيد",
                    cancelButtonText: "إغلاق"
                }, function() {

                    $.ajax({
                        url: "{{ url('/') }}" + "/dashboard/approve-balance-request" ,
                        type: "POST",
                        data: {_token: CSRF_TOKEN, 'data_id': data_id, 'status': status, 'url': 'transactions'},
                    })
                    .done(function(reseived_data) {
                        var parsed_data = $.parseJSON(reseived_data);

                        if(parsed_data.code === true){
                            swal({
                                type: 'success',
                                title: 'تمت الموافقة على طلب سحب الرصيد ',
                                confirmButtonClass: 'btn-success'
                            }, function() {
                                window.location.href = parsed_data.url;
                            });
                        }
                        else{
                            swal(
                                "حدث خطأ ما",
                                "نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا",
                                "error"
                            );
                        }
                    });
                });
            });
        });
    </script>
@endsection
