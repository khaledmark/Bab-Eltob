@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.itemsEdit') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/bootstrap-fileinput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/basic.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/admin/css/select2-bootstrap.min.css') }}">
     <style>
        /*Copied from bootstrap to handle input file multiple*/
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        /*Also */
        .btn-success {
            border: 1px solid #c5dbec;
            background: #D0E5F5;
            font-weight: bold;
            color: #2e6e9e;
        }
        /* This is copied from https://github.com/blueimp/jQuery-File-Upload/blob/master/css/jquery.fileupload.css */
        .fileinput-button {
            position: relative;
            overflow: hidden;
        }

            .fileinput-button input {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                opacity: 0;
                -ms-filter: 'alpha(opacity=0)';
                font-size: 200px;
                direction: ltr;
                cursor: pointer;
            }

        .thumb {
            height: 80px;
            width: 100px;
            border: 1px solid #000;
        }

        ul.thumb-Images li {
            width: 120px;
            float: left;
            display: inline-block;
            vertical-align: top;
            height: 120px;
        }

        .img-wrap {
            position: relative;
            display: inline-block;
            font-size: 0;
        }

            .img-wrap .close {
                position: absolute;
                top: 2px;
                right: 2px;
                z-index: 100;
                background-color: #D0E5F5;
                padding: 5px 2px 2px;
                color: #000;
                font-weight: bolder;
                cursor: pointer;
                opacity: .5;
                font-size: 23px;
                line-height: 10px;
                border-radius: 50%;
            }

            .img-wrap:hover .close {
                opacity: 1;
                background-color: #ff0000;
            }

        .FileNameCaptionStyle {
            font-size: 12px;
        }
    </style>
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
                <span>{{ trans('admin.itemsEdit') }}</span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> {{ trans('admin.itemsIndex') }}
        <small>تعديل اعلان</small>
    </h1>
@endsection

@section('content')

    {!! Form::model($item, ['method' => 'PATCH', 'url' => route('items.update', $item->id),'class' => 'form-horizontal', 'files' => 'true']) !!}

    <input id="oldImages" name="oldImages" type="hidden" value="{{ $imagesIds }}">
    <input id="newImages" name="newImages" type="hidden" value="{{ $imagesIds }}">
    {{-- <input id="imagesStr" name="images[]" type="hidden" value=""> --}}

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
                                <input id="name" name="name" value="{{ $item->name }}" class="form-control" placeholder="اسم الاعلان" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-lg-3 control-label">سعر الاعلان</label>
                            <div class="col-lg-9">
                                <input id="price" name="price" type="number"value="{{ $item->price }}"  class="form-control" placeholder="سعر الاعلان" step="0.50" min="0.50">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city_id" class="col-lg-3 control-label">{{ trans('admin.adminsADCity') }}</label>
                            <div class="col-lg-9">
                                <div class=" input-group select2-bootstrap-append">
                                    <select id="city_id" name="city_id" value="{{ $item->city_id }}" class="city form-control select2-allow-clear">
                                        <option value="{{ $item->city->id }}"selected>{{ $item->city->name }}</option>
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
                                    <select id="region_id" name="region_id" value="{{ $item->region_id }}" class="region form-control select2-allow-clear">
                                        <option value="{{ $item->region->id }}" selected>{{ $item->region->name }}</option>

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
                                    <select id="" name=""  class="section form-control select2-allow-clear">
                                        <option value="{{ $item->subSection->section->id }}" selected>{{ $item->subSection->section->name }}</option>
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
                                    <select id="sub_section_id" name="sub_section_id"  class="subsection form-control select2-allow-clear">
                                        <option value="{{ $item->subSection->id }}" selected>{{ $item->subSection->name }}</option>
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
                                <textarea id="description" name="description" class="form-control autosizeme" rows="10" placeholder="وصف الاعلان">{{ $item->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="address" class="col-lg-3 control-label">العنوان بالتفصيل</label>
                        <div class="col-lg-9">
                            <input id="address" name="address" value="{{ $item->address }}" class="form-control" placeholder="العنوان بالتفصيل" >
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
                                <input id="lat" name="lat" type="text" value="{{ $item->lat }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="long" class="col-lg-3 control-label">{{ trans('admin.adminsADLong') }}</label>
                            <div class="col-lg-9">
                                <input id="long" name="lang" type="text" value="{{ $item->lang }}" class="form-control">
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
            <div class="portlet-body form">
                <div class="portlet-body form">
                    <span class="btn btn-success fileinput-button">
                    <input type="file" name="files[]" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
                    </span>
                    <output id="Filelist"></output>
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
    <script src="{{ URL::asset('public/admin/js/editMap.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/components-select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/js/form-dropzone.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            var CSRF_TOKEN = $('meta[name="X-CSRF-TOKEN"]').attr('content');

            $('.remove_img').on('click', function () {

                var id = $(this).attr('data');

                var arr = $('#newImages').val().split(',');

                var index = arr.indexOf(id);

                arr.splice(index, 1);

                $('#newImages').val(arr.toString())

                $(this).parent().remove();
            })

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
            
            $('.section').on("change", function () {

                var section_id = $('.section').val();

                $.ajax({
                    url: "{{ url('/') }}" + "/dashboard/sections/change-sunsections",
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
     <script type="text/javascript">

        //I added event handler for the file upload control to access the files properties.
        document.addEventListener("DOMContentLoaded", init, false);

        //To save an array of attachments 
        var AttachmentArray = [];

        //counter for attachment array
        var arrCounter = 0;

        //to make sure the error message for number of files will be shown only one time.
        var filesCounterAlertStatus = false;

        //un ordered list to keep attachments thumbnails
        var ul = document.createElement('ul');
        ul.className = ("thumb-Images");
        ul.id = "imgList";

        function init() {
            //add javascript handlers for the file upload event
            document.querySelector('#files').addEventListener('change', handleFileSelect, false);
        }

        //the handler for file upload event
        function handleFileSelect(e) {
            //to make sure the user select file/files
            if (!e.target.files) return;

            //To obtaine a File reference
            var files = e.target.files;

            // Loop through the FileList and then to render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {

                //instantiate a FileReader object to read its contents into memory
                var fileReader = new FileReader();

                // Closure to capture the file information and apply validation.
                fileReader.onload = (function (readerEvt) {
                    return function (e) {
                        
                        //Apply the validation rules for attachments upload
                        ApplyFileValidationRules(readerEvt)

                        //Render attachments thumbnails.
                        RenderThumbnail(e, readerEvt);

                        //Fill the array of attachment
                        FillAttachmentArray(e, readerEvt)
                    };
                })(f);

                // Read in the image file as a data URL.
                // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
                // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
                fileReader.readAsDataURL(f);
            }
            document.getElementById('files').addEventListener('change', handleFileSelect, false);
        }

        //To remove attachment once user click on x button
        jQuery(function ($) {
            $('div').on('click', '.img-wrap .close', function () {
                var id = $(this).closest('.img-wrap').find('img').data('id');

                //to remove the deleted item from array
                var elementPos = AttachmentArray.map(function (x) { return x.FileName; }).indexOf(id);
                if (elementPos !== -1) {
                    AttachmentArray.splice(elementPos, 1);
                }

                //to remove image tag
                $(this).parent().find('img').not().remove();

                //to remove div tag that contain the image
                $(this).parent().find('div').not().remove();

                //to remove div tag that contain caption name
                $(this).parent().parent().find('div').not().remove();

                //to remove li tag
                var lis = document.querySelectorAll('#imgList li');
                for (var i = 0; li = lis[i]; i++) {
                    if (li.innerHTML == "") {
                        li.parentNode.removeChild(li);
                    }
                }

            });
        }
        )

        //Apply the validation rules for attachments upload
        function ApplyFileValidationRules(readerEvt)
        {
            //To check file type according to upload conditions
            if (CheckFileType(readerEvt.type) == false) {
                alert("The file (" + readerEvt.name + ") does not match the upload conditions, You can only upload jpg/png/gif files");
                e.preventDefault();
                return;
            }

            //To check file Size according to upload conditions
            if (CheckFileSize(readerEvt.size) == false) {
                alert("The file (" + readerEvt.name + ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB");
                e.preventDefault();
                return;
            }

            //To check files count according to upload conditions
            if (CheckFilesCount(AttachmentArray) == false) {
                if (!filesCounterAlertStatus) {
                    filesCounterAlertStatus = true;
                    alert("You have added more than 10 files. According to upload conditions you can upload 10 files maximum");
                }
                e.preventDefault();
                return;
            }
        }

        //To check file type according to upload conditions
        function CheckFileType(fileType) {
            if (fileType == "image/jpeg") {
                return true;
            }
            else if (fileType == "image/png") {
                return true;
            }
            else if (fileType == "image/gif") {
                return true;
            }
            else {
                return false;
            }
            return true;
        }

        //To check file Size according to upload conditions
        function CheckFileSize(fileSize) {
            if (fileSize < 30000000) {
                return true;
            }
            else {
                return false;
            }
            return true;
        }

        //To check files count according to upload conditions
        function CheckFilesCount(AttachmentArray) {
            //Since AttachmentArray.length return the next available index in the array, 
            //I have used the loop to get the real length
            var len = 0;
            for (var i = 0; i < AttachmentArray.length; i++) {
                if (AttachmentArray[i] !== undefined) {
                    len++;
                }
            }
            //To check the length does not exceed 10 files maximum
            if (len > 9) {
                return false;
            }
            else
            {
                return true;
            }
        }

        //Render attachments thumbnails.
        function RenderThumbnail(e, readerEvt)
        {
            var li = document.createElement('li');
            ul.appendChild(li);
            li.innerHTML = ['<div class="img-wrap"> <span class="close">&times;</span>' +
                '<img class="thumb" src="', e.target.result, '" title="', escape(readerEvt.name), '" data-id="',
                readerEvt.name, '"/>' + '</div>'].join('');

            var div = document.createElement('div');
            div.className = "FileNameCaptionStyle";
            li.appendChild(div);
            div.innerHTML = [readerEvt.name].join('');
            document.getElementById('Filelist').insertBefore(ul, null);
        }

        //Fill the array of attachment
        function FillAttachmentArray(e, readerEvt)
        {
            AttachmentArray[arrCounter] =
            {
                AttachmentType: 1,
                ObjectType: 1,
                FileName: readerEvt.name,
                FileDescription: "Attachment",
                NoteText: "",
                MimeType: readerEvt.type,
                Content: e.target.result.split("base64,")[1],
                FileSizeInBytes: readerEvt.size,
            };
            arrCounter = arrCounter + 1;
        }
    </script>
@endsection