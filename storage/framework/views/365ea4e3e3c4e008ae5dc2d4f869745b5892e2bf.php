<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.adminsEdit')); ?>

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
                <a href="<?php echo e(route('admins.index')); ?>"><?php echo e(trans('admin.adminsIndex')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span><?php echo e(trans('admin.adminsEdit')); ?></span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> <?php echo e(trans('admin.adminsIndex')); ?>

        <small><?php echo e(trans('admin.adminsEdit')); ?></small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::model($admin, ['method' => 'PATCH', 'url' => route('admins.updateProfile', $admin->id),'class' => 'form-horizontal', 'files' => 'true']); ?>


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

                        

                        <div class="form-group">
                            <label for="username" class="col-lg-3 control-label"><?php echo e(trans('admin.userName')); ?></label>
                            <div class="col-lg-9">
                                <input id="username" name="username" type="text" value="<?php echo e($admin->username); ?>" class="form-control" placeholder="<?php echo e(trans('admin.userName')); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label"><?php echo e(trans('admin.adminsADEmail')); ?></label>
                            <div class="col-lg-9">
                                <input id="email" name="email" type="email" value="<?php echo e($admin->email); ?>" class="form-control" placeholder="<?php echo e(trans('admin.adminsADEmail')); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-lg-3 control-label"><?php echo e(trans('admin.adminsADPhone')); ?></label>
                            <div class="col-lg-9">
                                <input id="phone" name="phone" type="text" value="<?php echo e($admin->phone); ?>" class="form-control" placeholder="<?php echo e(trans('admin.adminsADPhone')); ?>">
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

    <script>
        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('.city').on("change", function () {

                $(".neighborhood").prop("disabled", true);
                $(".street").prop("disabled", true);
                var city_id = $('.city').val();

                $.ajax({
                    url: "<?php echo e(url('/')); ?>" + "/dashboard/cities/change-city",
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'city_id': city_id}
                })
                    .done(function (reseived_data) {

                        var parsed_data = $.parseJSON(reseived_data);
                        $(".neighborhood").prop("disabled", false);
                        // $('.load').empty();

                        $(".neighborhood option[value]").remove();
                        $('.neighborhood').prepend("<option value='' selected='selected'></option>");
                        $('.neighborhood').select2({placeholder: 'اختر الحي', data: parsed_data, dir: 'rtl'});
                    });
            });

            $('.neighborhood').on("change", function () {

                $(".street").prop("disabled", true);
                var neighborhood_id = $('.neighborhood').val();

                $.ajax({
                    url: "<?php echo e(url('/')); ?>" + "/dashboard/neighborhoods/change-neighborhood",
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'neighborhood_id': neighborhood_id}
                })
                    .done(function (reseived_data) {

                        var parsed_data = $.parseJSON(reseived_data);
                        $(".street").prop("disabled", false);

                        $(".street option[value]").remove();
                        $('.street').prepend("<option value='' selected='selected'></option>");
                        $('.street').select2({placeholder: 'اختر الشارع', data: parsed_data, dir: 'rtl'});
                    });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>