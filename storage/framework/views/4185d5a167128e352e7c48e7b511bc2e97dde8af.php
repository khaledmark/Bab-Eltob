<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span><?php echo e(trans('admin.settings')); ?></span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> <?php echo e(trans('admin.settings')); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <?php echo Form::model($setting, ['method' => 'PATCH','files' => true, 'url' => route('settings.update', $setting->id),'class' => 'form-horizontal','style'=>'display:inline']); ?>

                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label"><?php echo e(trans('admin.ar_name')); ?></label>
                            <div class="col-lg-9">
                                <input id="name" name="name" value="<?php echo e($setting->name); ?>" type="text" class="form-control" placeholder="<?php echo e(trans('admin.settingsAppEmail')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="en_name" class="col-lg-3 control-label"><?php echo e(trans('admin.en_name')); ?></label>
                            <div class="col-lg-9">
                                    <?php echo Form::text('name_en', isset($setting) ? $setting->translate('en')->name : null, ['class' => 'form-control', 'required']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label"><?php echo e(trans('admin.settingsAppEmail')); ?></label>
                            <div class="col-lg-9">
                                <input id="email" name="email" value="<?php echo e($setting->email); ?>" type="text" class="form-control" placeholder="<?php echo e(trans('admin.settingsAppEmail')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label"><?php echo e(trans('admin.settingsAppPhone')); ?></label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone" value="<?php echo e($setting->phone); ?>" type="text" class="form-control" placeholder="<?php echo e(trans('admin.settingsAppPhone')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label"><?php echo e(trans('admin.settingsAppPhone2')); ?></label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone2" value="<?php echo e($setting->phone2); ?>" type="text" class="form-control" placeholder="<?php echo e(trans('admin.settingsAppPhone')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label"><?php echo e(trans('admin.settingsAppPhone3')); ?></label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone3" value="<?php echo e($setting->phone3); ?>" type="text" class="form-control" placeholder="<?php echo e(trans('admin.settingsAppPhone')); ?>">
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


<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>