@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.adminsIndex') }}
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
                <a href="{{ route('admins.index') }}">{{ trans('admin.adminsIndex') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.sideAdminsShow') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.sideAdminsShow') }}
        <small>عرض جميع المديرين</small>
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
                                <div class="btn-group">
                                    <a class="btn sbold green" href="{{ route('admins.create') }}"> إضافة جديد
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
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
                            {{-- <th> {{ trans('admin.adminsADAppPhoto') }} </th> --}}
                            <th> {{ trans('admin.adminsADName') }} </th>
                            <th> {{ trans('admin.adminsADEmail') }} </th>
                            <th> {{ trans('admin.adminsADPhone') }} </th>
                            <th>{{ trans('admin.status') }}</th>
                            <th> {{ trans('admin.adminsADDate') }} </th>
{{--                            <th> {{ trans('admin.permissionsIndex') }} </th>--}}
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
                                {{-- <td>
                                    <img class="table_img img-preview img-responsive" src="{{ URL::asset('public/uploads/users/'.$value->image) }}">
                                </td> --}}
                                <td class="no_dec"> {{ $value->username }} </td>
                                <td><a href="mailto:{{ $value->email }}"> {{ $value->email }} </a></td>
                                <td><a href="del:{{ $value->phone }}"> {{ $value->phone }} </a></td>
                                <td> <span class="badge badge-roundless {{ $value->status ? "badge-success" : "label-default" }}"> {{ $value->status ? trans('admin.settingsOpen') : trans('admin.settingsClose') }} </span></td>
                                <td> {{ $value->created_at->format('Y-m-d g:i A') }} </td>
                                <td>
                                    @if( $value->id == 1 )
                                        ------
                                    @else
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> العمليات
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="{{ route('admins.edit', $value->id) }}">
                                                        <i class="icon-pencil"></i> تعديل
                                                    </a>
                                                </li>
                                                @if( auth()->user()->id != $value->id )
                                                    <li>
                                                        <a class="changeStatus" data="{{ $value->id }}" data_name="{{ $value->username }}" status="{{ $value->status ? '0' : '1' }}">
                                                            <i class="fa fa-key"></i> تغيير حالة التفعيل
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
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

                var user_id = $(this).attr('data');
                var swal_text = 'للمدير ' + $(this).attr('data_name');
                var swal_title = 'هل أنت متأكد من تغيير حالة التفعيل ؟';
                var status = $(this).attr('status');

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
                        url: "{{ url('/') }}" + "/dashboard/users-change-status" ,
                        type: "POST",
                        data: {_token: CSRF_TOKEN, 'user_id': user_id, 'status': status, 'url': 'admins'},
                    })
                    .done(function(reseived_data) {
                        var parsed_data = $.parseJSON(reseived_data);
                        // console.log(parsed_data);

                        if(parsed_data.code === true){
                            swal({
                                type: 'success',
                                title: 'تم تغيير حالة تفعيل مدير بنجاح',
//                                html: "لقد تم تغيير حالة تفعيل  " + swal_text + " " + "بنجاح",
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