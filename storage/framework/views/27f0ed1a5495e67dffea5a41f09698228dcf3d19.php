<!DOCTYPE html>
 <html lang="en" class="ie8 no-js">
 <html lang="en" class="ie9 no-js">

<html lang="<?php echo e(app()->getLocale()); ?>" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="X-CSRF-TOKEN" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/font-awesome/css/font-awesome.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/simple-line-icons/simple-line-icons.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/bootstrap-rtl.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/bootstrap-switch-rtl.min.css')); ?>"/>

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/components-rounded-rtl.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/plugins-rtl.min.css')); ?>"/>

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/layout-rtl.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/darkblue-rtl.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/custom-rtl.min.css')); ?>"/>

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/login-rtl.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/custom.css')); ?>"/>

    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>

    <?php echo $__env->yieldContent('styles'); ?>

   <?php echo Charts::assets(); ?> 

    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->

        <?php echo $__env->make('admin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="clearfix"> </div>
      
        
        <div class="page-container">
           

            <?php echo $__env->make('admin.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="page-content-wrapper">
                <div class="page-content">

                    <?php echo $__env->yieldContent('page_header'); ?>

                    <?php echo $__env->make('admin.layouts.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>

        </div>
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> <?php echo e(date('Y')); ?> &copy; تطوير بواسطة
                <a target="_blank" href="https://brand4it.com"> شركة براند. </a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/respond.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/excanvas.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/ie8.fix.min.js')); ?>"></script>

    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo e(URL::asset('public/admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/js.cookie.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/jquery.blockui.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/bootstrap-switch.min.js')); ?>"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo e(URL::asset('public/admin/js/app.min.js')); ?>"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo e(URL::asset('public/admin/js/layout.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/demo.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/quick-sidebar.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/quick-nav.min.js')); ?>"></script>

    <!-- END THEME LAYOUT SCRIPTS -->
    <script>
        $(document).ready(function()
        {
            $('#clickmewow').click(function()
            {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
