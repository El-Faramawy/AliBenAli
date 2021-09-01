@extends('layouts.site.app')
@section('site_content')
  <!--/////////////////////////////     hero       /////////////////////////////////////////-->
  <div class="hero-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 px-0">
          <section class="main">
            <!-- Swiper -->
            <div class="swiper-container  gallery-top">
              <div class="swiper-wrapper">
                   @foreach($show_sliders as $show_slider)
                      <div class="swiper-slide" style="background-image:url({{get_file( $show_slider->image)}})"></div>
                  @endforeach
              </div>
            </div>
            <div class="  gallery-thumbs">
            </div>
          </section>
        </div>
        <div class="col-md-6 px-0 row">
          <div style="cursor: pointer" onclick="location.href='#app-download'" class="col-6 p-3 hero-hov main-bg-light d-flex align-items-center justify-content-start ">
            <a href="#app-download" class="main-col">
              <i class="fas fa-info"></i>
              <span>  {{trans('web.download_app')}} </span>
            </a>
          </div>
          <div style="cursor: pointer" onclick="location.href='{{url('doctor-search')}}'" class="col-6 p-3 hero-hov main-bg-darker d-flex align-items-center justify-content-start ">
            <a href="{{url('doctor-search')}}" class="main-col">
              <i class="fal fa-user-nurse"></i>
              <span> {{trans('web.find_doctor')}} </span>
            </a>
          </div>
          <div style="cursor: pointer" onclick="location.href='{{url('offers')}}'" class="col-6 p-3 hero-hov main-bg-darker d-flex align-items-center justify-content-start ">
            <a href="{{url('offers')}}" class="main-col">
              <i class="fal fa-ruler-vertical"></i>
              <span> {{trans('web.services')}} </span>
            </a>
          </div>
          <div style="cursor: pointer" onclick="location.href='{{url('Join-Us')}}'" class="col-6 p-3 hero-hov main-bg-light d-flex align-items-center justify-content-start ">
            <a href="{{url('Join-Us')}}" class="main-col">
              <i class="fad fa-user-nurse"></i>
              <span>  {{trans('web.join_us')}} </span>
            </a>
          </div>
          <div style="cursor: pointer" data-target="blank" onclick="location.href='{{url('https://www.google.com/maps/place//data=!4m2!3m1!1s0x3e2f091632c12169:0x5d23ce32b0b841de?utm_source=mstt_1&entry=gps&lucs=swa')}}'" class="col-6 p-3 hero-hov main-bg-light d-flex align-items-center justify-content-start ">
            <a href="{{url('https://www.google.com/maps/place//data=!4m2!3m1!1s0x3e2f091632c12169:0x5d23ce32b0b841de?utm_source=mstt_1&entry=gps&lucs=swa')}}'" target="_blank" class="main-col">
              <i class="fal fa-map-marker-alt"></i>
              <span> {{trans('web.location')}} </span>
            </a>
          </div>
          <div style="cursor: pointer" onclick="location.href='{{url('Media-Center')}}'" class="col-6 p-3 hero-hov main-bg-darker d-flex align-items-center justify-content-start ">
            <a href="{{url('Media-Center')}}" class="main-col">
              <i class="fal fa-hospital-alt"></i>
              <span> {{trans('web.media_center')}} </span>
            </a>
          </div>
          <div style="cursor: pointer" onclick="location.href='{{url('about')}}'" class="col-6 p-3 hero-hov main-bg-darker d-flex align-items-center justify-content-start ">
            <a href="{{url('about')}}" class="main-col">
              <i class="fas fa-heart"></i>
              <span> {{trans('web.about')}} </span>
            </a>
          </div>
          <div style="cursor: pointer" onclick="location.href='{{url('contact')}}'" class="col-6 p-3 hero-hov main-bg-light d-flex align-items-center justify-content-start ">
            <a href="{{url('contact')}}" class="main-col">
              <i class="fal fa-phone"></i>
              <span> {{trans('web.contact_us')}} </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--/////////////////////////////     cloud       /////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <section class="cloud  py-5" id="about">
    <div class="container">
      <div class="row py-5">
        <div class="col-md-6 d-flex align-items-center">
          <div class="contents">
            <h4 class="cloud-heading "> {{$secound_section['title_' .app()->getLocale()]}}</h4>
            <div class="bar mb-4"></div>
            <p class="cloud-p" data-aos="zoom-in" data-aos-duration="1100">
                {{$secound_section['content_' .app()->getLocale()]}}
            </p>
          </div>
        </div>
        <div class="col-md-6 vv  d-flex align-items-center justify-content-center">
          <img class="cloud-img" src="{{get_file( $secound_section->image)}}" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////              //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!-- newslater-area -->
  <!-- <section class="newslater-area pb-5"
    style="background-image: url(img/an-bg06.png);background-position: center bottom; background-repeat: no-repeat;">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-xl-4 col-lg-4 col-lg-4">
          <div class="section-titlee">
            <span>علي بن علي لايف</span>
            <h2>إستشارات فيديو</h2>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4">
          <form id="contact-form4" class="contact-form newslater  ">
            <div class="form-group">
               <a href="doctor-search.html" class="btn btn-custom">طلب إستشارة <i class="fas fa-chevron-right"></i></a>
            </div>
           </form>
        </div>
        <div class="col-xl-4 col-lg-4 doc-div" style="display: flex;
          justify-content: flex-end;">
          <img class="doc-img" src="img/news-illustration.png">
        </div>
      </div>
    </div>
  </section> -->
  <!-- newslater-aread-end -->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////  مستشفى  صيدلية        //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!-- <div class="pharma-hosp">
    <div class="container">
      <div class="row py-5">
        <div class="col-lg-6 mb-2">
          <div class="contents p-2" data-aos="zoom-in-down">
            <div class="row py-2">
              <div class=" col-7 d-flex align-items-center">
                <div class="text">
                  <a class="font-weight-bold  ">مستشفى</a>
                  <p>احجز موعد في المستفي مع أطباء متخصصين في جميع المجالات</p>
                </div>
              </div>
              <div class="img d-flex justify-content-end p-0 col-5">
                <img width="auto" height="115px" src="img/hospital.png" alt="" srcset="">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-2">
          <div class="contents p-2" data-aos="zoom-in-down">
            <div class="row py-2">
              <div class=" col-7 d-flex align-items-center">
                <div class="text">
                  <a class="font-weight-bold my-3">صيدلية</a>
                  <p>اطلب الادوية من اقرب صيدلية</p>
                </div>
              </div>
              <div class="img d-flex justify-content-end p-0 col-5">
                <img width="auto" height="115px" src="img/pharma.png" alt="" srcset="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////     doctor-chose        //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->



  <section class="chose-doctor ">
      <div class="container py-4">
          <h2 class="py-5 mb-4 title text-white text-center">
              {{trans('web.find_doctor')}}
          </h2>
          <div class="row">
              <div class="col-md-8 mx-auto">
                  {{--          <form action="" id="myform">--}}
                  <div class="select-div p-4">
                      <div class="form-group w-100">
                          <label for="">
                              <i class="fal fa-bookmark"></i>
                              {{trans('web.choose_clinic')}}
                          </label>
                          <select name="" class="select2" id="">
                              <option value="" disabled selected> {{trans('web.please_choose_clinic')}} </option>
                              @foreach($clinics as $clinic)
                                  <option class="clinic_id" value="{{$clinic->id}}"> {{$clinic['name_' .app()->getLocale()]}} </option >
                              @endforeach
                          </select>
                      </div>
                      <button class="btn chose-doctor-search" id="search_clinic"> {{trans('web.search')}}</button>
                  </div>
                  {{--          </form>--}}
              </div>
          </div>
      </div>
  </section>
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////             //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!-- TABS-1
			============================================= -->
  <section id="tabs-1" class="py-5 tabs-section division">
    <div class="container">
      <!-- TABS NAVIGATION -->
      <div id="tabs-nav" class="list-group text-center">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <!-- TAB-1 LINK -->
          <li class="nav-item icon-xs mb-2">
            <a class="nav-link active" id="tab1-list" data-toggle="pill" href="#tab-1" role="tab" aria-controls="tab-1"
              aria-selected="true">
              <span class="flaticon-083-stethoscope"></span> {{trans('web.image')}}
            </a>
          </li>
          <!-- TAB-2 LINK -->
          <li class="nav-item icon-xs mb-2">
            <a class="nav-link" id="tab2-list" data-toggle="pill" href="#tab-2" role="tab" aria-controls="tab-2"
              aria-selected="false">
              <span class="flaticon-005-blood-donation-3"></span> {{trans('web.video')}}
            </a>
          </li>
          <!-- TAB-3 LINK -->
          <li class="nav-item icon-xs mb-2">
            <a class="nav-link" id="tab3-list" data-toggle="pill" href="#tab-3" role="tab" aria-controls="tab-3"
              aria-selected="false">
              <span class="flaticon-031-scanner"></span> {{trans('web.news')}}
            </a>
          </li>
        </ul>
      </div> <!-- END TABS NAVIGATION -->
      <!-- TABS CONTENT -->
      <div class="tab-content p-0" id="pills-tabContent">
        <!-- TAB-1 CONTENT -->
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1-list">
          <div class="row">
            <div class="col-md-6 p-0 p-md-2 row">
                @foreach($teb_images as $teb_image )
                    <div class="col-md-6 pic-col p-2   ">
                        <a href="">
                            <img src="{{ $teb_image->image}}" width="100%" height="100%" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6 pic-col p-2 ">
              <a href="">
                  <img src="{{ $teb_images->first()->image}}" width="100%" height="100%" alt="" style="border-radius:15px ">
              </a>
            </div>
          </div>
        </div> <!-- END TAB-1 CONTENT -->
        <!-- TAB-2 CONTENT -->
        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2-list">
          <div class="row d-flex align-items-center">
           @foreach($teb_videos as $teb_video)
                  <div class="col-lg-6 mb-2">
              <div class="youtube-promo-video-wrap">
                <div class="youtube-promo-video-img">
                    <img class="img-fluid" src="{{url($teb_video->image )}}" alt="">
                </div>
                <div class="youtube-promo-video">
                  <a href="{{$teb_video->link}}"  data-vbtype="youtube"
                    class="venobox info vbox-item" data-gall="gallu">
                    <i class="fad fa-play"></i></a>
                </div>
              </div>
            </div>
              @endforeach
          </div>
        </div> <!-- END TAB-2 CONTENT -->
        <!-- TAB-3 CONTENT -->
        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3-list">
          <!-- Section: blog -->
          <section id="blog">
            <div class="section-content">
              <div class="row">
                  @foreach($teb_news as $teb_new)
                    <div class="col-xs-12 col-sm-6 col-md-4   my-edit ">
                  <article class="post z-index-1 clearfix mb-sm-30">
                    <div class="entry-header">
                      <div class="post-thumb thumb">
                        <img src="{{ $teb_new->image}}" alt="" class="img-responsive img-fullwidth">
                      </div>
                    </div>
                    <div class="entry-content p-3 pl-2 bg-white">
                        <p class="text-left">
                            @if(app()->getLocale() == 'en')
                                @switch($teb_new->date)
                                    @case('يناير')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.' January' }}
                                    @break
                                    @case('فبراير')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.'February ' }}
                                    @break
                                    @case('مارس')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.'March ' }}
                                    @break
                                    @case('ابريل')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.'April ' }}
                                    @break
                                    @case('مايو')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.' May' }}
                                    @break
                                    @case('يونيو')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.'June ' }}
                                    @break
                                    @case('يوليو')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.'July ' }}
                                    @break
                                    @case('أغسطس')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.' August' }}
                                    @break
                                    @case('سبتمبر')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.'September ' }}
                                    @break
                                    @case('أكتوبر')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.' October' }}
                                    @break
                                    @case('نوفمبر')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.' November' }}
                                    @break
                                    @case('ديسمبر')
                                    <i class="fal fa-calendar-alt"></i>{{ ' ' . $teb_new->created_at->format('d') .' '.' December' }}
                                    @break
                                    @default
                                    <i class="fal fa-calendar-alt"></i>{{ ' '. $teb_new->created_at->format('d') . ' ' . $teb_new->date }}
                                    @break
                                @endswitch
                            @else
                                <i class="fal fa-calendar-alt"></i>{{ ' '.$teb_new->created_at->format('d') . ' ' . $teb_new->date }}
                            @endif

                        </p>
                      <div class="entry-meta media mt-0 no-bg no-border">
                        <div class="media-body pl-15">
                          <div class="event-content flip">
                            <h4 class="entry-title text-white text-uppercase m-0 mt-3"><a href="">
                                    {{$teb_new['title_' .app()->getLocale()]}}
                                </a>
                            </h4>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3">
                          {{$teb_new['content_' .app()->getLocale()]}}
                      </p>
                      <div class="clearfix"></div>
                    </div>
                  </article>
                </div>
                  @endforeach
              </div>
            </div>
          </section>
        </div> <!-- END TAB-3 CONTENT -->
      </div> <!-- END TABS CONTENT -->
    </div> <!-- End container -->
  </section> <!-- END TABS-1 -->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////          //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!-- Start Counter Area -->
  <section class="counter-area py-5" id="services" style="direction: ltr;">
    <div class="container">
      <div class="row">
         @foreach($counters as $counter )
              <div class="col-lg-3 col-6" data-aos="zoom-in" data-aos-duration="1100">
          <div class="single-counter">
            <h2>
              <i class="{{$counter->icon}} mr-1"></i> <br> <span class="odometer" data-count="{{$counter->number}}">00</span>
            </h2>
            <p>
                {{$counter['title_' .app()->getLocale()]}}
            </p>
            <div class="counter-shape">
              <!-- <img src="img/counter-shape.png" alt="Image"> -->
            </div>
          </div>
        </div>
          @endforeach
      </div>
    </div>
  </section>
  <!-- End Counter Area -->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////          //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////          //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////          //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!-- <section class="CarsSlider">
    <div class="container">
      <div class=" Title ">
        <h2> شركات التأمين </h2>
      </div>
      <div class="swiper-container cars">
        <div class="swiper-wrapper">
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance10.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance11.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance12.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance14.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance15.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance16.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance22.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance33.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance8.jpg"></a>
          <a href="#!" class="swiper-slide "><img src="img/charity-logos/insurance9.jpg"></a>
         </div>
      </div>
    </div>
  </section> -->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////          //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <div class="app--download" >
    <!-- Section -->
    <section class="app-download" id="app-download" data-aos="fade-up">
      <div class="over-lay"></div>
      <div class=" ">
        <div class="container my-5">
          <!-- Grid row -->
          <div class="row align-items-center  ">
            <!-- Grid column -->
            <div class="col-lg-6">
              <h3 class="font-weight-bold pb-2">
                  {{trans('web.download_app')}} <span class="px-3 mx-1 py-2 pb-3"> {{trans('web.ali_bn_ali')}}</span>
              </h3>
              <br />
              <div class="line">
                <img src="{{get_file('Site/img/linecoffe.png')}}" width="30%" alt="" />
              </div>
              <p class="lead pt-5 mb-5">
               {{trans('web.you_can_download_app')}}
              </p>
              <div class="store-btns">
                <a href="#" class="btn mybtn down-option"> {{trans('web.googel_play')}}
                  <i class="fab fa-2x pr-2 fa-google-play"></i></a>
                <a href="#" class="btn mybtn down-option">
                    {{trans('web.apple_store')}}
                    <i class="fab fa-apple fa-2x pr-2"></i></a>
              </div>
            </div>
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-lg-4 d-flex justify-content-center offset-lg-2 wow fadeInUpBig" data-wow-delay=".2s">
              <img src="{{url('site/img/iphone-admin.png')}}" alt="Sample image" class="img-fluid"

                   style="height: 400px !important;" />
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </div>
    </section>
    <!-- Section -->
  </div>
@endsection
@push('site_js')
    {{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
    @if (Session::has('massage'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{trans('web.sweet_alert_success')}}',
                showConfirmButton: false,
                timer: 3000,
                footer:'{{trans('web.sweet_waiting')}}',
            })
        </script>
    @endif
    @if($errors->any('Success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{trans('web.sweet_alert_danger')}}',
                showConfirmButton: false,
                timer: 3000,
                footer:'{{trans('web.sweet_alert_again')}}',
            })
        </script>
    @endif

@endpush
@push('site_js')
    <script>
        $(document).ready(function (){
            $('#programs').css('display','none');
        })
        $(document).on('keyup','#search_doctor',function (){
            var word = $('#search_doctor').val()
            var routeAction = "{{url('search_all')}}"
            if (word){
                $('#programs').css('display','inline-block');
                $.ajax({
                    type: 'GET',
                    url: routeAction,
                    data: {'word':word},
                    success:function(data){
                        $('#programs').html(data);
                    }
                });
            }
            else{
                $('#programs').css('display','none');
            }

        })
    </script>
@endpush
@push('site_js')
    <script>
        $(document).on('click','#search_clinic',function (e) {
            var clinic_id = $('#clinic_id').val()
            var routeAction = "{{url('doctor-search')}}"
            $.ajax({
                type: 'GET',
                url: routeAction,
                data: {'clinic_id':clinic_id},
                success:function(data){
                    // console.log(data.html_here)
                    $('#returned_doctors').html(data.html_here);
                    // $('.contents').attr('data-aos','flip-down');
                }
            });
        });

    </script>
@endpush
@push('site_js')
    <script>
        $(document).on('click','#search_clinic',function (e){
            var clinic_id = $('.select2 option:selected').val()
            $(location).attr('href','doctor-search/'+clinic_id);
        });
        $(document).ready(function() {
            $("[data-link]").click(function() {
                window.location.href = $(this).attr("data-link");
                return false;
            });
        });
    </script>
@endpush


