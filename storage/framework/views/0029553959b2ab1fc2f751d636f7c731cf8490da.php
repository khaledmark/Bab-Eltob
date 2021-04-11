<?php $__env->startSection('title'); ?>
    لوحة التحكم
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span><?php echo e(trans('admin.statistics')); ?></span>
            </li>
        </ul>
    </div>

    <h1 class="page-title">  <?php echo e(trans('admin.statistics')); ?>

        <small><?php echo e(trans('admin.statisticsView')); ?></small>
    </h1>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($adminsCount); ?></span>
                    </div>
                    <div class="desc"> عدد المديرين النشطين </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($usersCount); ?></span>
                    </div>
                    <div class="desc"> عدد المستخدمين النشطين </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 grey-mint">
                <div class="visual">
                    <i class="fa fa-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span><?php echo e($itemsCount); ?></span>
                    </div>
                    <div class="desc">  عدد الإعلانات</div>
                </div>
            </a>
        </div>
        
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>