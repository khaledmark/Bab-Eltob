@extends('admin.auth.master')

@section('title')
    {{ trans('admin.loginPageTitle') }}
@endsection

@section('content')
    <form class="login-form" action="{{ route('admin.post.login') }}" method="post">
        <h3 class="form-title font-green">{{ trans('admin.loginPageTitle') }}</h3>

        @include('admin.layouts.alerts')

        <div class="alert alert-danger hide">
            <button class="close" data-close="alert"></button>
            <span class="error_span"> أدخل البريد الإلكتروني أو كلمة المرور </span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">البريد الإلكتروني</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="email" placeholder="البريد الإلكتروني" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" placeholder="كلمة المرور" name="password" />
        </div>
        <div class="form-actions">
            <input type="hidden" name="_token" value="{{ Session::token() }}">

            <button type="submit" class="btn green uppercase">تسجيل الدخول</button>
            <a href="{{ route('admin.get-forget-password') }}" class="forget-password">نسيت كلمة المرور ؟</a>
        </div>
        <div class="create-account">
            <p>
                {{-- <a href="#" class="uppercase">إنشاء حساب</a> --}}
            </p>
        </div>
    </form>
@endsection



