@extends('layouts.site.app')
@section('site_content')
  <section class="hire">
    <div class="title-top">
      <div class="container">
        <div class="title-outer">
          <h1>{{trans('web.media_center')}}</h1>
          <ul class="page-breadcrumb">
            <li><a href="{{'index'}}">{{trans('web.home')}}</a></li>
            <li class="px-2"><i class="fal fa-arrow-left"></i></li>
            <li>{{trans('web.media_center')}} </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- TABS-1
			============================================= -->
    <section id="tabs-1" class="pt-5 tabs-section division">
      <div class="container">
        <!-- TABS NAVIGATION -->
        <div id="tabs-nav" class="list-group text-center">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <!-- TAB-1 LINK -->
            <li class="nav-item icon-xs mb-2">
              <a class="nav-link active" id="tab1-list" data-toggle="pill" href="#tab-1" role="tab"
                aria-controls="tab-1" aria-selected="true">
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
                    <div class="col-md-12 p-0 p-md-2 row">
                        @foreach($teb_images as $teb_image )
                            <div class="col-3 pic-col p-2  ">
                                <a href="">
                                    <img src="{{url($teb_image->image)}}" width="100%" height="250px" style="border-radius: 15px" alt="">
                                </a>
                            </div>
                        @endforeach
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
                                    <a href="{{$teb_video->link}}" data-title="عرض الولادة" data-vbtype="youtube"
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
                                                <img src="{{url( $teb_new->image)}}" alt="" class="img-responsive img-fullwidth">
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
  </section>
@endsection
