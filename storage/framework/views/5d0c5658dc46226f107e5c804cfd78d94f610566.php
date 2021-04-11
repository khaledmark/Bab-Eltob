<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo e(route('dashboard')); ?>">
                <img src="<?php echo e(URL::asset('public/images/big_logo.png')); ?>"  height="30px" width="150px" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile"> <?php echo e(Auth::user()->username); ?> </span>

                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo e(route('admins.editProfile')); ?>">
                                <i class="icon-user"></i> صفحتي الشخصية </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admins.editPassword')); ?>">
                                <i class="icon-user"></i> تغيير كلمة المرور </a>
                        </li>
                        
                            
                                
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                        
                            
                                
                        
                        <li>
                            <a onclick="document.getElementById('logout_form').submit()">
                                <i class="icon-key"></i> تسجيل الخروج
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                
                    
                        
                    
                
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>

        <form style="display: none;" id="logout_form" action="<?php echo e(route('logout')); ?>" method="post">
            <?php echo csrf_field(); ?>

        </form>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>