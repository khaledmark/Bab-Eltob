
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('admin.dashboardTitle') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('dashboard') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.statistics') }}</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('dashboard-statistics') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.statisticsCharts') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ strpos(URL::current(), 'settings') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ trans('admin.sideSettingsTitle') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('settings.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.settings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
             <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bank"></i>
                    <span class="title">????????????</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('banks.index') }}" class="nav-link ">
                            <span class="title">?????? ???????????? </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('banks.create') }}" class="nav-link ">
                            <span class="title"> ?????????? ?????? </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ strpos(URL::current(), 'admins') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">{{ trans('admin.adminsIndex') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admins.index') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.adminsShow') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admins.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.adminsAdd') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ strpos(URL::current(), 'users') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">{{ trans('admin.usersIndex') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.usersShow') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ strpos(URL::current(), 'providers') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title"> ?????????? ??????????????  </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('providers.index') }}" class="nav-link ">
                            <span class="title"> ?????? ?????????? ?????????????? </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ strpos(URL::current(), 'vips') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title"> Vips </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('vips.index') }}" class="nav-link ">
                            <span class="title"> ?????? vips </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-flag"></i>
                    <span class="title">?????????? </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('countries.index') }}" class="nav-link ">
                            <span class="title">?????? ?????????? </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('countries.create') }}" class="nav-link ">
                            <span class="title">?????????? ???????? </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-flag"></i>
                    <span class="title">??????????</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('cities.index') }}" class="nav-link ">
                            <span class="title">?????? ?????????? </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('cities.create') }}" class="nav-link ">
                            <span class="title"> ?????????? ?????????? </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-institution"></i>
                    <span class="title">??????????????</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('sections.index') }}" class="nav-link ">
                            <span class="title">?????? ?????????????? </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('sections.create') }}" class="nav-link ">
                            <span class="title"> ?????????? ?????? </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">?????????????? ????????????</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('transactions.index') }}" class="nav-link ">
                            <span class="title">?????? ?????????????? ???????????? </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">?????? ??????????   </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('paymentDuration.index') }}" class="nav-link ">
                            <span class="title">?????? ??????????  </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('bankPayment.index') }}" class="nav-link ">
                            <span class="title">?????????? ???? ???????? ?????????? </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('creditPayment.index') }}" class="nav-link ">
                            <span class="title">?????????? ???? ???????? ?????????? ????????????????</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">????????????????  </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('invoices.index') }}" class="nav-link ">
                            <span class="title">?????? ????????????????  </span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">?????????? ?????? ????????????  </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('orders.index') }}" class="nav-link ">
                            <span class="title">?????? ?????????? ?????? ????????????  </span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bank"></i>
                    <span class="title">????????????????</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('parkings.index') }}" class="nav-link ">
                            <span class="title">?????? ???????????????? </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('reservations.index') }}" class="nav-link ">
                            <span class="title">?????? ???????????? ???????????????? </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-envelope"></i>
                    <span class="title">{{ trans('admin.contactUsIndex') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('contactUs.index') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.contactUsShow') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

             <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-envelope"></i>
                    <span class="title">???????????? ??????????????</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('reports.index') }}" class="nav-link ">
                            <span class="title">?????? ????????????????</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'notifications') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bell"></i>
                    <span class="title">{{ trans('admin.notificationsIndex') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('notifications.create', 'user') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.notificationsUserAdd') }}</span>
                        </a>
                    </li>
                    {{--  <li class="nav-item">
                        <a href="{{ route('notifications.create', 'company') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.notificationsCompAdd') }}</span>
                        </a>
                    </li>  --}}
                </ul>
            </li>

            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-question"></i>
                    <span class="title">?????????????? ?????????????? </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('faqs.index') }}" class="nav-link ">
                            <span class="title"> ?????? ?????????????? ??????????????</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faqs.create') }}" class="nav-link ">
                            <span class="title"> ?????????? ????????</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'about') !== false || strpos(URL::current(), 'terms') !== false || strpos(URL::current(), 'site-images') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">{{ trans('admin.sideSiteTitle') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('about.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.aboutTitleShow') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('terms.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.termsConditionsShow') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
