<?php $__env->startSection('title'); ?>
    الأقسام الرئيسية
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/datatables.bootstrap-rtl.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(route('sections.index')); ?>">الأقسام الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>عرض الأقسام الرئيسية </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> عرض الأقسام الرئيسية
        <small>عرض الأقسام الرئيسية  </small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="btn-group">
                                    <a class="btn sbold green" href="<?php echo e(route('sections.create')); ?>"> إضافة جديد
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
                            <th> الصورة </th>
                            <th> اسم القسم بالعربية  </th>
                            <th> اسم القسم بالإنجليزية </th>
                            <th> الأقسام الفرعية</th>
                            <th> العمليات </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" value="1" />
                                        <span></span>
                                    </label>
                                </td>

                                <td> <img class="table_img img-preview img-responsive" src="<?php echo e(URL::asset('public/uploads/sections/'.$value->photo)); ?>"></td>
                                <td> <?php echo e($value->name); ?> </td>
                                <td> <?php echo e($value->translate('en')->name); ?> </td>
                                <td> <a href="<?php echo e(route('sections.subsections', $value->id)); ?>"><i class="icon-pencil"></i> عرض</a></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> العمليات
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                            <li>
                                                <a href="<?php echo e(route('sections.edit', $value->id)); ?>">
                                                    <i class="icon-pencil"></i> تعديل
                                                </a>
                                            </li>
                                            <li>
                                                <a class="delete_data" data="<?php echo e($value->id); ?>" data_name="<?php echo e($value->name); ?>">
                                                    <i class="fa fa-times"></i> حذف
                                                </a>
                                            </li>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(URL::asset('public/admin/js/datatable.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/datatables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/table-datatables-managed.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/ui-sweetalert.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('body').on('click', '.delete_data', function() {

                var id = $(this).attr('data');
                var swal_text = ' القسم الفرعى ' + $(this).attr('data_name');
                var swal_title = 'هل أنت متأكد من الحذف ؟';

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
                        url: "<?php echo e(url('/')); ?>" + "/dashboard/sections/destroy" ,
                        type: "POST",
                        data: {_token: CSRF_TOKEN, 'id' : id},
                    })
                        .done(function(reseived_data) {
                            var parsed_data = $.parseJSON(reseived_data);

                            if(parsed_data.code === '1'){
                                swal({
                                    type: 'success',
                                    title: 'تم الحذف بنجاح',
                                    confirmButtonClass: 'btn-success'
                                }, function() {
                                    window.location.href = parsed_data.url;
                                });
                            }
                            else{
                                swal(
                                    "عملية خاطئة",
                                    parsed_data.message ,
                                    "error"
                                );
                            }
                        });
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>