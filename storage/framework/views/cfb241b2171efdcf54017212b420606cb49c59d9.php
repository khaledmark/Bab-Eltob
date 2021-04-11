<?php $__env->startSection('title'); ?>
    <?php echo e($type == 'user' ? trans('admin.notificationsUserAdd') : trans('admin.notificationsCompAdd')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/select2-bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span><?php echo e($type == 'user' ? trans('admin.notificationsUserAdd') : trans('admin.notificationsCompAdd')); ?></span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> <?php echo e($type == 'user' ? trans('admin.notificationsUserAdd') : trans('admin.notificationsCompAdd')); ?>

        <small>إرسال إشعارات جديدة</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open([ 'url' => route('notifications.store', $type), 'class' => 'form-horizontal']); ?>


    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <div class="form-group">
                        <label for="user" class="col-lg-3 control-label"><?php echo e($type == 'user' ? trans('admin.userName') : trans('admin.companyName')); ?></label>
                        <div class="col-lg-9">
                            <div class="input-group select2-bootstrap-append">
                                <select id="user" name="user" class="form-control select2-allow-clear">
                                    <option value ></option>
                                        <option value="user">جميع العملاء</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id); ?>" ><?php echo e($name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-lg-3 control-label"><?php echo e(trans('admin.message')); ?></label>
                        <div class="col-lg-9">
                            <textarea id="message" name="message" class="form-control autosizeme" rows="10" placeholder="<?php echo e(trans('admin.message')); ?>"></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-10">
                                <button type="submit" class="btn green btn-block">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(URL::asset('public/admin/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/components-select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>