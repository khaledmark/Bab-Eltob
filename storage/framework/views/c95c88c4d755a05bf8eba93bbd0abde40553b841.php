<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo e(app()->getLocale()); ?>" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>

        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/font-awesome/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/simple-line-icons/simple-line-icons.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/bootstrap-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/bootstrap-switch-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/components-rounded-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/plugins-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/layout-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/darkblue-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/custom-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/login-rtl.min.css')); ?>">

        <link rel="shortcut icon" href="favicon.ico" />
    </head>

    <body class=" login">
        <div class="logo">
            <a href="https://breamx.com">
                <img src="<?php echo e(URL::asset('public/images/logo.png')); ?>" alt="" />
            </a>
        </div>
        <div class="content">

            <?php echo $__env->yieldContent('content'); ?>

        </div>

        <div class="copyright"> <?php echo e(date('Y')); ?> ?? ?????????? ????????????
            <a href="https://breamx.com"> ???????? ????????????. </a>
        </div>

    </body>
</html>


