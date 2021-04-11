<?php $__env->startSection('title'); ?>
    إضافة قسم فرعي
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
                <a href="<?php echo e(route('sub-sections.index')); ?>">الأقسام الفرعية </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>إضافة قسم فرعي </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الأقسام الفرعية
        <small>إضافة قسم فرعي جديد</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <?php echo Form::open([ 'url' => route('sub-sections.store'), 'class' => 'form-horizontal','files'=>true ]); ?>

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم القسم الرئيسى   </label>
                        <div class="col-lg-9">
                            
                            <?php echo Form::select('section_id', $sections, null, ['class' => 'form-control'] ); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label"> اسم القسم الفرعي بالعربية </label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name" class="form-control " placeholder="اسم القسم الفرعي بالعربية" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name_en" class="col-lg-3 control-label"> اسم القسم الفرعي بالانجليزية </label>
                        <div class="col-lg-9">
                            <input type="text" id="name_en" name="name_en"  class="form-control " placeholder="اسم القسم الفرعي بالانجليزية" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="control-label col-lg-3">صورة القسم </label>
                        <div class="col-lg-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 330px; height: 150px;"> </div>
                                <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new"> اختر صورة </span>
                                        <span class="fileinput-exists"> تغيير </span>
                                        <input type="file" name="photo" accept="image/*" required>
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