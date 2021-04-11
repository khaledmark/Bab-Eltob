<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.showDetails')); ?> عميل
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/profile-rtl.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(route('users.index')); ?>">العملاء</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> <?php echo e(trans('admin.showDetails')); ?> عميل </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> العملاء
        <small><?php echo e(trans('admin.showDetails')); ?> عميل </small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-4">
            <div class="portlet light profile-sidebar-portlet ">
                <div class="profile-userpic">
                    <img src="<?php echo e(URL::asset('public/images/unknown.png')); ?>" class="img-responsive" alt="<?php echo e($user->username); ?>">
                </div>
                <div class="profile-usertitle" style="padding-bottom: 30px;">
                    <div class="profile-usertitle-name"> <?php echo e($user->username); ?> </div>
                    <div class="profile-usertitle-job"> <?php echo e($user->phone); ?> </div>
                    <div class="profile-usertitle-job" style="text-transform: none;"> <?php echo e($user->email); ?> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="portlet light ">
                <div>  
                    <?php if( $user->city_id ): ?>
                        <h4 class="profile-desc-title"> المدينة </h4>
                        <span class="profile-desc-text"> <?php echo e($user->city->name); ?> </span>
                    <?php endif; ?>  
                </div>
                
                <div>  
                    <?php if( $user->region_id ): ?>
                        <h4 class="profile-desc-title"> المنطقة </h4>
                        <span class="profile-desc-text"> <?php echo e($user->region->name); ?> </span>
                    <?php endif; ?>  
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="portlet light ">
                <div>
                    <h4 class="profile-desc-title"> <?php echo e(trans('admin.adminsADStatus')); ?> </h4>
                    <span class="btn-circle label label-sm <?php echo e($user->status ? "label-success" : "label-default"); ?>">
                        <?php echo e($user->status ? trans('admin.settingsOpen') : trans('admin.settingsClose')); ?>

                    </span>
                </div>
                <div class="margin-top-30">
                    <h4 class="profile-desc-title"> <?php echo e(trans('admin.adminsADDate')); ?> </h4>
                    <span class="btn-circle label label-sm label-default">
                        <?php echo e($user->created_at->format('Y-m-d g:i A')); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('body').addClass('page-container-bg-solid');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>