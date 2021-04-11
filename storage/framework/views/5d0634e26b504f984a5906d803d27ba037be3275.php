<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.loginPageTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form class="login-form" action="<?php echo e(route('admin.post.login')); ?>" method="post">
        <h3 class="form-title font-green"><?php echo e(trans('admin.loginPageTitle')); ?></h3>

        <?php echo $__env->make('admin.layouts.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="alert alert-danger hide">
            <button class="close" data-close="alert"></button>
            <span class="error_span"> أدخل البريد الإلكتروني أو كلمة المرور </span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">البريد الإلكتروني</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="email" placeholder="البريد الإلكتروني" name="email" value="<?php echo e(old('email')); ?>" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" placeholder="كلمة المرور" name="password" />
        </div>
        <div class="form-actions">
            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

            <button type="submit" class="btn green uppercase">تسجيل الدخول</button>
            <a href="<?php echo e(route('admin.get-forget-password')); ?>" class="forget-password">نسيت كلمة المرور ؟</a>
        </div>
        <div class="create-account">
            <p>
                
            </p>
        </div>
    </form>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.auth.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>