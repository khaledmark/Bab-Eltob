@extends('admin.layouts.master')

@section('title')
    تعديل البنك
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/bootstrap-fileinput.css') }}">
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('banks.index') }}">البنوك</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل بنك </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> البنوك
        <small>تعديل بنك </small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::model($bank, ['method' => 'PATCH', 'url' => route('banks.update', $bank->id),'class' => 'form-horizontal', 'files'=>true]) !!}
                <div class="form-group">
                    <label for="name" class="col-lg-3 control-label"> اسم البنك   </label>
                    <div class="col-lg-9">
                        <input type="text" id="name" name="name" value="{{ $bank->name }}" class="form-control " placeholder="اسم البنك" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="accountNum" class="col-lg-3 control-label"> رقم الحساب</label>
                    <div class="col-lg-9">
                        <input type="text" id="accountNum" name="accountNum"  value="{{ $bank->accountNum }}" class="form-control autosizeme" rows="10" placeholder="رقم الحساب" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="iban" class="col-lg-3 control-label"> ايبان</label>
                    <div class="col-lg-9">
                        <input type="text" id="iban" name="iban" value="{{ $bank->iban }}" class="form-control autosizeme" rows="10" placeholder="ايبان" required>
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label col-lg-3"> صورة البنك</label>
                    <div class="col-lg-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            @if( $bank->photo )
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 330px; height: 150px;">
                                    <img src="{{ URL::asset('public/uploads/banks/'.$bank->photo) }}">
                                </div>
                            @endif
                            <div>
                                <span class="btn red btn-outline btn-file">
                                    <span class="fileinput-new"> تغيير الصورة </span>
                                    <span class="fileinput-exists"> تغيير </span>
                                    <input type="file" name="photo" accept="image/*">
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <div class="row">
                        <div class="col-lg-2 col-lg-offset-10">
                            <button type="submit" class="btn green btn-block">حفظ</button>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('public/admin/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/components-select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/bootstrap-fileinput.js') }}"></script>

   
@endsection
