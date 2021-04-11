<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>merta7</title>
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/aos.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/hover-min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/fonts/stylesheet.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('public/web/images/logo.png') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/web/css/style.css') }}">
</head>
<body>
<header>
    <div class="mertaz-head">
        <div class="container">
            <div class="main-haeder py-5">
                <div class="row">
                    <div class="col-lg-2  offset-lg-4 col-md-4">
                        <div class="logo-img text-center">
                            <a href="#"><img src="{{ URL::asset('public/web/images/logo.png') }}" alt="" class="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <ul class="nav list mt-4">
                            <li class="nav-item active">
                            <a class="nav-link px-4 py-3 features-head" href="index.php">الخصائص</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link px-4 py-3 about-header opinions-head" href="about.php">اراء العملاء </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link px-4 py-3 app-screens-head" href="our-work.php">الشاشات</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link px-4 py-3 blog-header support-head" href="details-cirtefied.php">الدعم</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="merta7-app">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-8">
                        <div class="to-down text-right px-5">
                            <h1 class="animated rollIn">منصه مرتاح</h1>
                            <p class="animated fadeInUp">تتيح لك المنصه الكثير من المميزات التى تسهل عملية التسديد والاستلام</p>
                            <div class="links animated fadeInUp">
                                <a href="#" class="link1 hvr-buzz-out"><img src="{{ URL::asset('public/web/images/android.png') }}" alt=""> حمله الان لأجهزة <br><span>الأندرويد</span> </a>
                                <a href="#" class="link2 hvr-buzz-out"><img src="{{ URL::asset('public/web/images/ios.png') }}" alt=""> حمله الان لأجهزة <br><span>الايفون</span></a>
                            </div>
                            <img class="model-img" src="{{ URL::asset('public/web/images/2030.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- side menu-->
<div class="side-menu" >
    <div class="container">
       <div class="side-menu-header">
          <a href="#side-list" class="open-menu">
             <i class="fas fa-align-justify"></i>
          </a>
          <a href="#" class="logo-img">
            <img src="{{ URL::asset('public/web/images/logo.png') }}">
          </a>
        </div>
        <div class="menu2 animated fadeInRight" id="side-list">
            <a href="#side-list" class="close-menu">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
            <ul class="nav list mt-4">
                <li class="nav-item active">
                    <a class="nav-link px-4 py-3 features-head" href="index.php">الخصائص</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-3 about-header opinions-head" href="about.php">اراء العملاء </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-3 app-screens-head" href="our-work.php">الشاشات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-3 blog-header support-head" href="details-cirtefied.php">الدعم</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</header>
