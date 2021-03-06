<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ URL::asset('public/images/big_logo.png') }}"  height="30px" width="150px" alt="logo" class="logo-default" /> </a>
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
                {{--  <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> 3 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">3</span> ?????????????? ??????????
                            </h3>
                            <a href="#">???????????? ????????</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">????????</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-success">
                                            <i class="fa fa-plus"></i>
                                        </span> ?????????? ???????????? ???????? </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 ??????????</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                            <i class="fa fa-bolt"></i>
                                        </span> ?????? ?????? ???????? </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">2 ??????</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-warning">
                                            <i class="fa fa-bell-o"></i>
                                        </span> ?????? ?????? ???????? </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>????????
                                <span class="bold">4 ?????????? ??????????</span></h3>
                            <a href="#">???????????? ????????</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ URL::asset('public/admin/img/avatar3.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> ???????? ???????? </span>
                                            <span class="time">16 ?????????? </span>
                                        </span>
                                        <span class="message"> ?????????? ?????????????? ?????????? ?????????????? ?????????? ?????????????? ?????????? ?????????????? ... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ URL::asset('public/admin/img/avatar1.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> ?????? ???????? ?????????? </span>
                                            <span class="time">2 ????????  </span>
                                        </span>
                                        <span class="message"> ?????????? ?????????????? ?????????? ?????????????? ?????????? ?????????????? ?????????? ?????????????? .. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ URL::asset('public/admin/img/avatar3.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> ???????? ?????? </span>
                                            <span class="time">3 ????????</span>
                                        </span>
                                        <span class="message"> ?????????? ?????????????? ?????????? ?????????????? ?????????? ?????????????? ?????????? ?????????????? ... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ URL::asset('public/admin/img/avatar1.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> ???????? ?????? </span>
                                            <span class="time">5 ????????  </span>
                                        </span>
                                        <span class="message"> ?????????? ?????????????? ?????????? ?????????????? ?????????? ?????????????? ?????????? ?????????????? .. </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-default"> 3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li class="external">
                            <h3>????????
                                <span class="bold">3 ????????????????</span></h3>
                            <a href="app_todo.html">???????????? ????????</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">?????? ?????????? ?????????? ???????????????? </span>
                                            <span class="percent">70%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 70%;" class="progress-bar progress-bar-success" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">70% ??????????</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">?????? ?????????????? ?????? ????????????????</span>
                                            <span class="percent">25%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 25%;" class="progress-bar progress-bar-danger" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">25% ?????? ????????????????</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">?????? ?????????????? ????????????????</span>
                                            <span class="percent">5%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 5%;" class="progress-bar progress-bar-warning" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">5% ????????????</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>  --}}
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile"> {{ Auth::user()->username }} </span>

                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ route('admins.editProfile') }}">
                                <i class="icon-user"></i> ?????????? ?????????????? </a>
                        </li>
                        <li>
                            <a href="{{ route('admins.editPassword') }}">
                                <i class="icon-user"></i> ?????????? ???????? ???????????? </a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="app_calendar.html">--}}
                                {{--<i class="icon-calendar"></i> My Calendar </a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="app_inbox.html">--}}
                                {{--<i class="icon-envelope-open"></i> My Inbox--}}
                                {{--<span class="badge badge-danger"> 3 </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="app_todo.html">--}}
                                {{--<i class="icon-rocket"></i> My Tasks--}}
                                {{--<span class="badge badge-success"> 7 </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"> </li>--}}
                        {{--<li>--}}
                            {{--<a href="page_user_lock_1.html">--}}
                                {{--<i class="icon-lock"></i> Lock Screen </a>--}}
                        {{--</li>--}}
                        <li>
                            <a onclick="document.getElementById('logout_form').submit()">
                                <i class="icon-key"></i> ?????????? ????????????
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                {{--<li class="dropdown dropdown-quick-sidebar-toggler">--}}
                    {{--<a href="javascript:;" class="dropdown-toggle">--}}
                        {{--<i class="icon-logout"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>

        <form style="display: none;" id="logout_form" action="{{ route('logout') }}" method="post">
            {!! csrf_field() !!}
        </form>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>