<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.showDetails')); ?> اعلان
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/admin/css/profile-rtl.min.css')); ?>">
    <style>
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: right;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.dashboardTitle')); ?></a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo e(route('items.index')); ?>">الإعلانات </a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> <?php echo e(trans('admin.showDetails')); ?> اعلان </span>
            </li>
        </ul>
    </div>

    <h1 class="page-title"> الإعلانات
        <small><?php echo e(trans('admin.showDetails')); ?> اعلان </small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

     <div class="row">
        <div class="col-lg-12">
            <div class="portlet light ">
                <h4 class="profile-desc-title">صور الاعلان </h4>
                    <?php $__currentLoopData = $item->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="gallery">
                        <a >
                            <img src="<?php echo e(URL::asset('public/uploads/items/'.$image->name)); ?>"  width="600" height="400">
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-4">
            <div class="portlet light ">
                <div>
                    <input id="map_lat" readonly type="hidden" name="lat" value="<?php echo e($item->lat); ?>" class="form-control" >
                    <input id="map_long" readonly type="hidden" name="lang" value="<?php echo e($item->lang); ?>" class="form-control" >

                    <h4 class="profile-desc-title"> اسم الاعلان  </h4>
                    <span class="profile-desc-text"> <?php echo e($item->name); ?> </span>

                    <h4 class="profile-desc-title"> اسم القسم الفرعى  </h4>
                    <span class="profile-desc-text">  <?php echo e($item->subSection->name); ?> </a> </span>

                    <h4 class="profile-desc-title"> المدينة </h4>
                    <span class="profile-desc-text">  <?php echo e($item->city->name); ?> </a> </span>

                    <h4 class="profile-desc-title"> الوصف </h4>
                    <span class="profile-desc-text"> <?php echo e($item->description); ?> </span>

                    <h4 class="profile-desc-title"> سعر الإعلان </h4>
                    <span class="profile-desc-text"> <?php echo e($item->price); ?> ر.س </span>

                     <h4 class="profile-desc-title">عنوان الإعلان </h4>
                    <span class="profile-desc-text"> <?php echo e($item->address); ?> </span>

                    <h4 class="profile-desc-title"> وقت الاضافة </h4>
                    <span class="profile-desc-text"> <?php echo e($item->created_at->format('Y-m-d g:i A')); ?> </span>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="portlet light ">
                <div>
                    <h4 class="profile-desc-title"> الموقع على الخريطة </h4>
                    <div id="map"></div>
                </div>
            </div>
        </div>
        
    </div>
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('body').addClass('page-container-bg-solid');
            $(function(){
                $('.carousel').carousel({
                interval: 2000
                });
            });
        });
    </script>

    <script>
    function initMap() {

        var lat = $('#map_lat').val();
        var long = $('#map_long').val();

        var myLatLng = {lat: +lat, lng: +long};
        
        // var myLatLng = {lat: 23.885942, lng: 45.079163};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
        });
      }
    </script>
   
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJve7ZMt3PvwUzwmJlvHaItGO5uVhEUIg&v&callback=initMap">
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>