<!DOCTYPE html>
 <html lang="en" class="ie8 no-js">
 <html lang="en" class="ie9 no-js">

<html lang="{{ app()->getLocale() }}" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/simple-line-icons/simple-line-icons.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/bootstrap-rtl.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/bootstrap-switch-rtl.min.css') }}"/>

    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/components-rounded-rtl.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/plugins-rtl.min.css') }}"/>

    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/layout-rtl.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/darkblue-rtl.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/custom-rtl.min.css') }}"/>

    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/login-rtl.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/custom.css') }}"/>

    @yield('styles')

   {!! Charts::assets() !!} 

    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->

        @include('admin.layouts.header')

        <div class="clearfix"> </div>
      
        
        <div class="page-container">
           

            @include('admin.layouts.sidebar')

            <div class="page-content-wrapper">
                <div class="page-content">

                    @yield('page_header')

                    @include('admin.layouts.alerts')

                    @yield('content')

                </div>
            </div>

        </div>
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> {{ date('Y') }} &copy; تطوير بواسطة
                <a target="_blank" href=""> شركة بريمكس. </a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
    <script src="{{ URL::asset('public/admin/js/respond.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/excanvas.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/ie8.fix.min.js') }}"></script>

    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ URL::asset('public/admin/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/js.cookie.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/jquery.blockui.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/bootstrap-switch.min.js') }}"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ URL::asset('public/admin/js/app.min.js') }}"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ URL::asset('public/admin/js/layout.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/demo.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/quick-sidebar.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/quick-nav.min.js') }}"></script>

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
    @yield('scripts')

</body>

</html>
