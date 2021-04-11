@include('web.header')
 
<div class="options text-center py-4" data-aos="fade-up"data-aos-easing="ease-out-cubic"  data-aos-duration="3000" id="options">
    <div class="container">
        <div class="row">   
            @foreach($screens as $screen)   
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="option px-4 py-5">
                        <img src="{{ URL::asset('public/uploads/screens/'.$screen->photo) }}" alt="">
                        <h4>{{ $screen->title}}</h4>
                        <p>{{ str_limit( $screen->content , 100)}}</p>
                    </div>
                </div>
            @endforeach    
        </div>
    </div>
</div>


<div class="features py-5" data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000" id="features">
    <div class="head-main text-center">
        <h2>الخصائص</h2>
        <p class="mb-3">هناك حقائق مثبته </p>
    </div>
  <div class="col-lg-4 col-md-6">
                <img src="{{ URL::asset('public/web/images/features.png') }}" alt=""  class="hvr-buzz"> 
            </div>
    <div class="container">
        <div class="row text-right">
            <div class="col-lg-4 mt-5  col-md-6">
                @foreach($properties1 as $property)   
                    <div class="one-feature px-2 py-2 mt-5">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5>{{ $property->title}}</h5>
                                <p>{{ str_limit( $property->content , 60)}} </p>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{ URL::asset('public/uploads/properties/'.$property->photo) }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-none d-sm-block col-sm-6 col-lg-4 col-md-6">
                <img src="{{ URL::asset('public/web/images/features.png') }}" alt=""  class="hvr-buzz"> 
            </div>
            <div class="col-lg-4 mt-5 col-md-6">
                @foreach($properties2 as $property)   
                    <div class="one-feature px-2 py-2 mt-5">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5>{{ $property->title}}</h5>
                                <p>{{ str_limit( $property->content , 60)}} </p>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{ URL::asset('public/uploads/properties/'.$property->photo) }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="opinions" data-aos="zoom-in-up" data-aos-easing="ease-out-cubic" data-aos-duration="3000" id="opinions">
    <div class="head-main text-center mb-4">
        <h2>اراء العملاء</h2>
        <p class="mb-3">ما يقوله العملاء عن المنصه </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-push-4 col-md-6 col-md-push-4">
                <div class="owl-carousel owl-theme">
                     @foreach($rates as $rate)
                        <div class="item text-center">
                            <img src="{{ URL::asset('public/uploads/rates/'.$rate->photo) }}" alt="">
                            <h4 class="mb-3">{{ $rate->username}} </h4>
                            <p>{{ str_limit( $rate->content , 100)}}</p>
                        </div>
                    @endforeach   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="app-screens py-5 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000" id="app-screens">
    <div class="head-main text-center">
        <h2>الخصائص</h2>
        <p class="mb-3">هناك حقائق مثبته </p>
    </div>
    <div class="container">
        <div class="owl-carousel owl-theme mt-5">
            @foreach($properties1 as $property)       
                <div class="item">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 hvr-pulse-grow">
                            <img src="{{ URL::asset('public/uploads/properties/'.$property->photo) }}" alt="">
                        </div>
                        <div class="col-md-8 col-sm-6 mt-5 pt-5">
                            <div class="carousle-details">
                                <h1>{{ $property->title}}</h1>
                                <p>{{ str_limit( $property->content , 500 ) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>
    </div>
</div>

<div class="support pt-5" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000" id="support">
    <div class="container">
        <div class="head-main text-center">
            <h2>الدعم</h2>
            <p class="mb-3">هناك حقائق مثبته مثبته </p>
        </div>
        <div class="form text-right mt-5">
            <div class="row">
                <div class="col-md-5">
                   {!! Form::open([ 'method' => 'POST','url' => route('contactUs.store')]) !!}
                    <!-- <form action=""> -->
                        <div class="form-controlle mb-3">
                            <input type="text"  name="name" placeholder=" الاسم ">
                        </div>
                        <div class="form-controlle mb-3">
                            <input type="text" name="email" placeholder=" البريد الإلكترونى  ">
                        </div>
                        <div class="form-controlle mb-3">
                            <textarea name="message" id=""  placeholder=" الرسالة  " rows="5"></textarea>
                        </div>
                        <div class="form-controlle mb-3">
                            <input type="submit">
                        </div>
                    <!--</form>-->
                    {!! Form::close() !!}
                </div>
                <div class="col-md-6 text-center">
                    <ul>
                        <li class="my-2"><img src="{{ URL::asset('public/web/images/mobile.png') }}" alt=""><div class="contact-li"><a href="#">{{$setting->phone}}</a></div></ >
                        <li class="my-2"><img src="{{ URL::asset('public/web/images/email.png') }}" alt=""><div class="contact-li"><a href="#">{{$setting->email}}</a></div></li>
                    </ul>
                        <img src="{{ URL::asset('public/web/images/support.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


 @include('web.footer')