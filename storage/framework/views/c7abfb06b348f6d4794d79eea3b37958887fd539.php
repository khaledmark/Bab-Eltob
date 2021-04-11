<?php $__env->startSection('title'); ?>
    تعديل بيانات العميل
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
                <a href="<?php echo e(route('users.index')); ?>">العملاء</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل بيانات العميل</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> العملاء
        <small>تعديل بيانات العميل</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::model($user, ['method' => 'PATCH', 'url' => route('users.update', $user->id),'class' => 'form-horizontal', 'files' => 'true']); ?>


        <div class="row">
            <div class="col-lg-8">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> البيانات الرئيسية</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                    <input type="hidden" id="user_type" name="user_type" value="user">
                        <div class="form-group">
                            <label for="username" class="col-lg-3 control-label"> اسم العميل</label>
                            <div class="col-lg-9">
                                <input id="username" name="username" type="text" value="<?php echo e($user->username); ?>" class="form-control" placeholder=" اسم العميل">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label"><?php echo e(trans('admin.adminsADEmail')); ?></label>
                            <div class="col-lg-9">
                                <input id="email" name="email" type="email" value="<?php echo e($user->email); ?>" class="form-control" placeholder="<?php echo e(trans('admin.adminsADEmail')); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label"><?php echo e(trans('admin.adminsADPhone')); ?></label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone" type="text" value="<?php echo e($user->phone); ?>" class="form-control" placeholder="<?php echo e(trans('admin.adminsADPhone')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label"> اسم المدينة   </label>
                            <div class="col-lg-9">
                                <?php echo Form::select('city_id', $cities, null, ['class' => 'form-control city '] ); ?>

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
    <script src="<?php echo e(URL::asset('public/admin/js/bootstrap-fileinput.js')); ?>"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>