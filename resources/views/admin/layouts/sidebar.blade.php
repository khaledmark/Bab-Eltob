
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item">
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
                        <a href="{{ route('settings.edit') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.settings') }}</span>
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
                    <span class="title"> العملاء </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link ">
                            <span class="title">عرض العملاء</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('users.create') }}" class="nav-link ">
                            <span class="title">اضافة عميل </span>
                        </a>
                    </li>
                </ul>
            </li>
    
            <li class="nav-item {{ strpos(URL::current(), 'cities') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-flag"></i>
                    <span class="title">المدن</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('cities.index') }}" class="nav-link ">
                            <span class="title">عرض المدن </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('cities.create') }}" class="nav-link ">
                            <span class="title"> إضافة مدينة </span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item {{ strpos(URL::current(), 'regions') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-flag-checkered"></i>
                    <span class="title">المناطق</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('regions.index') }}" class="nav-link ">
                            <span class="title">عرض المناطق </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('regions.create') }}" class="nav-link ">
                            <span class="title"> إضافة منطقة </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'sections') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-sitemap"></i>
                    <span class="title">الاقسام الرئيسية</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('sections.index') }}" class="nav-link ">
                            <span class="title">عرض الاقسام الرئيسية </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('sections.create') }}" class="nav-link ">
                            <span class="title"> إضافة قسم رئيسى </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'sub-sections') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-sitemap "></i>
                    <span class="title">الأقسام الفرعية</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('sub-sections.index') }}" class="nav-link ">
                            <span class="title">عرض الأقسام الفرعية </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('sub-sections.create') }}" class="nav-link ">
                            <span class="title"> إضافة قسم </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'items') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bullhorn "></i>
                    <span class="title">الإعلانات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('items.index') }}" class="nav-link ">
                            <span class="title">عرض الإعلانات </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('items.create') }}" class="nav-link ">
                            <span class="title"> إضافة اعلان </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'contact') !== false ? 'active' : '' }}">
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
                </ul>
            </li>
            
            <li class="nav-item {{ strpos(URL::current(), 'advs') !== false ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bullhorn "></i>
                    <span class="title">الإعلانات الخاصة</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('advs.index') }}" class="nav-link ">
                            <span class="title">عرض الإعلانات </span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('advs.create') }}" class="nav-link ">
                            <span class="title"> إضافة اعلان </span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item {{ strpos(URL::current(), 'about') ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">{{ trans('admin.aboutTitleShow') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('about.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.aboutTitleShow') }}</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
        </ul>
    </div>
</div>
