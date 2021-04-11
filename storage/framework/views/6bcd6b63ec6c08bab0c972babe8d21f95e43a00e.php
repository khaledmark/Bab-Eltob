<?php $__env->startSection('title'); ?>
    إضافة مدينة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/select2-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/bootstrap-fileinput.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(route('cities.index')); ?>">المدن </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>إضافة مدينة </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> المدن
        <small>إضافة مدينة جديد</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <?php echo Form::open([ 'url' => route('cities.store'), 'class' => 'form-horizontal' ]); ?>

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم المدينة بالعربية  </label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name" class="form-control " placeholder="اسم المدينة بالعربية " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name_en" class="col-lg-3 control-label"> اسم المدينة بالإنجليزية </label>
                        <div class="col-lg-9">
                            <input type="text" id="name_en" name="name_en" class="form-control " placeholder="اسم المدينة بالإنجليزية  " required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-10">
                                <button type="submit" class="btn green btn-block">حفظ</button>
                            </div>
                        </div>
                    </div>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(URL::asset('public/admin/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/components-select2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/bootstrap-fileinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>