<?php $__env->startSection('title'); ?>
    تعديل القسم
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
                <a href="<?php echo e(route('sections.index')); ?>">الأقسام الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل قسم رئيسى </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الأقسام الرئيسية
        <small>تعديل قسم رئيسى </small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <?php echo Form::model($section, ['method' => 'PATCH', 'files' => 'true' ,'url' => route('sections.update', $section->id),'class' => 'form-horizontal']); ?>

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم القسم بالعربية </label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name" value="<?php echo e($section->name); ?>" class="form-control " placeholder="اسم القسم بالعربية" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم القسم بالانجليزية </label>
                        <div class="col-lg-9">
                            <?php echo Form::text('name_en', isset($section) ? $section->translate('en')->name : null, ['class' => 'form-control', 'required']); ?>

                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="control-label col-lg-3">صورة القسم</label>
                        <div class="col-lg-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <?php if( $section->photo ): ?>
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 330px; height: 150px;">
                                        <img src="<?php echo e(URL::asset('public/uploads/sections/'.$section->photo)); ?>">
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new"> تغيير الصورة </span>
                                        <span class="fileinput-exists"> تغيير </span>
                                        <input type="file" name="image" accept="image/*">
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                </div>
                            </div>
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