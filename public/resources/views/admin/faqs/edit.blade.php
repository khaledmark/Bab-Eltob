@extends('admin.layouts.master')

@section('title')
    تعديل السؤال
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
                <a href="{{ route('faqs.index') }}">الأسئلة الشائعة</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل سؤال </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الأسئلة الشائعة
        <small>تعديل سؤال </small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::model($faq, ['method' => 'PATCH', 'url' => route('faqs.update', $faq->id),'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <label for="ar_question" class="col-lg-3 control-label"> السؤال بالعربية  </label>
                        <div class="col-lg-9">
                            <input type="text" id="ar_question" name="ar_question"  value="{{ $faq->ar_question }}" class="form-control " placeholder="السؤال بالعربية" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ar_answer" class="col-lg-3 control-label"> الإجابة بالعربية </label>
                        <div class="col-lg-9">
                            <textarea id="ar_answer" name="ar_answer"   class="form-control autosizeme" rows="10" placeholder="الإجابة بالعربية "   required> {{ $faq->ar_answer ? $faq->ar_answer : old('ar_answer') }}  </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="en_question" class="col-lg-3 control-label">السؤال بالإنجليزية </label>
                        <div class="col-lg-9">
                            <input type="text" id="en_question" name="en_question"  value="{{ $faq->en_question }}" class="form-control autosizeme" rows="10" placeholder="السؤال بالإنجليزية" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="en_answer" class="col-lg-3 control-label">الإجابة بالانجليزية </label>
                        <div class="col-lg-9">
                            <textarea id="en_answer" name="en_answer"  value="{{ $faq->en_answer }}"  class="form-control autosizeme" rows="10" placeholder="الإجابة بالانجليزية" required> {{ $faq->en_answer ? $faq->en_answer : old('en_answer') }}  </textarea>
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

    <script>
        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('.city').on("change", function () {

                $(".neighborhood").prop("disabled", true);
                $(".street").prop("disabled", true);
                var city_id = $('.city').val();

                $.ajax({
                    url: "{{ url('/') }}" + "/dashboard/cities/change-city",
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'city_id': city_id}
                })
                    .done(function (reseived_data) {

                        var parsed_data = $.parseJSON(reseived_data);
                        $(".neighborhood").prop("disabled", false);
                        // $('.load').empty();

                        $(".neighborhood option[value]").remove();
                        $('.neighborhood').prepend("<option value='' selected='selected'></option>");
                        $('.neighborhood').select2({placeholder: 'اختر الحي', data: parsed_data, dir: 'rtl'});
                    });
            });

            $('.neighborhood').on("change", function () {

                $(".street").prop("disabled", true);
                var neighborhood_id = $('.neighborhood').val();

                $.ajax({
                    url: "{{ url('/') }}" + "/dashboard/neighborhoods/change-neighborhood",
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'neighborhood_id': neighborhood_id}
                })
                    .done(function (reseived_data) {

                        var parsed_data = $.parseJSON(reseived_data);
                        $(".street").prop("disabled", false);

                        $(".street option[value]").remove();
                        $('.street').prepend("<option value='' selected='selected'></option>");
                        $('.street').select2({placeholder: 'اختر الشارع', data: parsed_data, dir: 'rtl'});
                    });
            });
        });
    </script>
@endsection
