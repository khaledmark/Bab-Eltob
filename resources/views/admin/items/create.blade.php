@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.itemsAdd') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/bootstrap-fileinput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/basic.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2-bootstrap.min.css') }}">
    
@endsection

@section('page_header')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('admin.dashboardTitle') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('items.index') }}">{{ trans('admin.itemsShow') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ trans('admin.itemsAdd') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.itemsIndex') }}
        <small>إضافة اعلان جديد</small>
    </h1>
@endsection

@section('content')
    {!! Form::open([ 'url' => route('items.store'), 'class' => 'form-horizontal', 'files' => 'true']) !!}

    <input id="imagesStr" name="images[]" type="hidden" value="">

        <div class="row">
            <div class="col-lg-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> البيانات الرئيسية</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        
                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label">اسم الاعلان</label>
                            <div class="col-lg-9">
                                <input id="name" name="name"  class="form-control" placeholder="اسم الاعلان" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-lg-3 control-label">سعر الاعلان</label>
                            <div class="col-lg-9">
                                <input id="price" name="price" type="number"  class="form-control" placeholder="سعر الاعلان" step="0.50" min="0.50">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city_id" class="col-lg-3 control-label">{{ trans('admin.adminsADCity') }}</label>
                            <div class="col-lg-9">
                                <div class=" input-group select2-bootstrap-append">
                                    <select id="city_id" name="city_id" class="city form-control select2-allow-clear">
                                        <option value ></option>
                                        @foreach( $cities as $city )
                                            <option value="{{ $city->id }}" >{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="region_id" class="col-lg-3 control-label">المنطقة</label>
                            <div class="col-lg-9">
                                <div class="input-group select2-bootstrap-append">
                                    <select id="region_id" name="region_id" class="region form-control select2-allow-clear">
                                        <option value ></option>

                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sub_section_id" class="col-lg-3 control-label">القسم الرئيسى</label>
                            <div class="col-lg-9">
                                <div class=" input-group select2-bootstrap-append">
                                    <select id="" name="" class="section form-control select2-allow-clear">
                                        <option value ></option>
                                        @foreach( $sections as $section )
                                            <option value="{{ $section->id }}" >{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sub_section_id" class="col-lg-3 control-label">القسم الفرعى</label>
                            <div class="col-lg-9">
                                <div class=" input-group select2-bootstrap-append">
                                    <select id="sub_section_id" name="sub_section_id" class="subsection form-control select2-allow-clear">
                                        <option value ></option>
                                        @foreach( $subSections as $section )
                                            <option value="{{ $section->id }}" >{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-lg-3 control-label">وصف الاعلان</label>
                            <div class="col-lg-9">
                                <textarea id="description" name="description" class="form-control autosizeme" rows="10" placeholder="وصف الاعلان"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="address" class="col-lg-3 control-label">العنوان بالتفصيل</label>
                        <div class="col-lg-9">
                            <input id="address" name="address"  class="form-control" placeholder="العنوان بالتفصيل" >
                        </div>
                    </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">الموقع على الخريطة</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-group">
                            <label for="lat" class="col-lg-3 control-label">{{ trans('admin.adminsADLat') }}</label>
                            <div class="col-lg-9">
                                <input id="lat" name="lat" type="text" value="{{ old('lat') }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="long" class="col-lg-3 control-label">{{ trans('admin.adminsADLong') }}</label>
                            <div class="col-lg-9">
                                <input id="long" name="lang" type="text" value="{{ old('long') }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <div id="div_map" style="width: 100%;height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="portlet light bordered">
                    <div class="input-group control-group increment" >
                        <input type="file" class="form-control" name="images[]" multiple />
                        <div class="input-group-btn"> 
                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                    </div>
                    <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" class="form-control" name="images[]" multiple />
                            <div class="input-group-btn"> 
                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <button type="submit" class="btn green btn-block">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJve7ZMt3PvwUzwmJlvHaItGO5uVhEUIg&v=3.exp&language=ar&amp;libraries=places"></script>
    <script src="{{ URL::asset('public/admin/js/map.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/components-select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/form-dropzone.min.js') }}"></script>

   <script>
        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');
            $(".region").prop("disabled", true);
            $(".subsection").prop("disabled", true);

            $('.city').on("change", function () {

                var city_id = $('.city').val();

                $.ajax({
                    url: "{{ url('/') }}" + "/dashboard/cities/change-regions",
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'city_id': city_id}
                })
                    .done(function (reseived_data) {
                        // console.log(reseived_data);
                        var parsed_data = $.parseJSON(reseived_data);
                        $(".region").prop("disabled", false);
                        // $('.load').empty();

                        $(".region option[value]").remove();
                        $('.region').prepend("<option value='' selected='selected'></option>");
                        $('.region').select2({placeholder: 'اختر المنطقة', data: parsed_data, dir: 'rtl'});
                    });
            });

            $(".btn-success").click(function(){ 
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });
            
            $('.section').on("change", function () {

                var section_id = $('.section').val();

                $.ajax({
                    url: "{{ url('/') }}" + "/dashboard/sections/change-subsections",
                    type: "POST",
                    data: {_token: CSRF_TOKEN, 'section_id': section_id}
                })
                    .done(function (reseived_data) {
                        // console.log(reseived_data);
                        var parsed_data = $.parseJSON(reseived_data);
                        $(".subsection").prop("disabled", false);
                        // $('.load').empty();

                        $(".subsection option[value]").remove();
                        $('.subsection').prepend("<option value='' selected='selected'></option>");
                        $('.subsection').select2({placeholder: 'اختر القسم الفرعى', data: parsed_data, dir: 'rtl'});
                    });
            });
        });
    </script>
@endsection

