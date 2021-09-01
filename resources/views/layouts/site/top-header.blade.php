<?php
use App\Models\Setting;
use App\Models\News;
$settings=Setting::all()->first();
$searched_doctores=News::all();

?>
<style>
    @font-face {
        /*font-family: Tajawal;*/
        src: url({{url('/')}}/website/fonts/Tajawal-Regular.ttf);
    }

    /** {*/
    /*    font-family: 'Tajawal';*/
    /*}*/

    .tag_price
    {
        background-color: #ffffff;
        text-align: center;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        min-height: 40px;
        padding: 6px;
        line-height: 40px;
        border: 1px solid #cc3b4b;
    }

    .ajax_delete_cart:hover
    {
        cursor: pointer;
        transform: scale(1.1,1.1);
    }
    .show_if_empty_cart
    {
        display: none;
    }


    .searchList {
        position: absolute;
        border: 1px solid #eeeeee;
        width: 100%;
        text-align: start;
        top: 44px;
        background-color: #ffff;
        z-index: 8;
        max-height: 300px;
        overflow: auto;
    }

    .searchList li {
        padding: 10px;
        border-bottom: 1px solid #eeeeee;
        transition: .3s ease;
    }

    .searchList li:hover {
        background-color: #C00B1E;
        color: #fff !important;
        cursor: pointer;
    }
    .searchList li:hover a{
        color: #fff !important;
    }
    /*.search_option{*/
    /*    padding: 10px;*/
    /*}*/
    /*.search_option:hover{*/
    /*    background-color: #be2b2e;*/
    /*    color: white;*/
    /*}*/
</style>
<div class="row">
    <div class=" col-md-4 col-12 TopLogo d-flex justify-content-center  align-items-center px-md-5">
        <!-- justify-content-md-end -->
        <a href="{{'index'}}">
            <img src="{{url('site/img/header-logo.png')}}">
        </a>
    </div>
    <div class=" col-md-4 col-12  my-2 d-flex justify-content-center align-items-center">
    <form class=" position-relative search">
      <input class="form-control" type="text" id="search_doctor" placeholder="{{trans('web.search_words')}}">
        <ul id="programs" class="searchList search_r" style="z-index: 99999;">

        </ul>
      <button type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
    </form>
    <a href="{{route('doctor-search')}}" class="book_head">{{trans('web.reserve')}}</a>
  </div>

  <div
    class=" col-md-4 col-12 d-flex my-2 justify-content-center justify-content-md-center align-items-center px-md-5 ">
    <!-- class socialIcons-->
    <!-- <a href="" style="color: rgb(90, 90, 90);"> english <img src="img/us.png" class="mx-1" alt=""> </a>
      <a href="" style="color: rgb(90, 90, 90);"> العربية <img src="img/sa.png" width="16px" height="11px"
          class="mx-1" alt=""> </a> -->
    <div class="last_tHead clearfix d-flex justify-content-between align-items-center">
        <ul class="head_info">
            <a href="tel:966123456456" target="_blank">
                <li>
                    <span><img src="https://dmf.med.sa/wp-content/themes/hospital/images/call-doctor.svg" alt=""></span>
                    {{$settings->phone2}}
                </li>
            </a>
            <a href="mailto:info@alibinali.sa" target="_blank">
                <li>
                    <span><img src="https://dmf.med.sa/wp-content/themes/hospital/images/letter.svg" alt=""></span>
                    {{$settings->email}}
                </li>
            </a>
        </ul>
      <div class="lang_social">
        <div class="btns_head_action d-flex align-items-center">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if(Lang::locale() != $localeCode)
                        <a class="btn_lang" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endif
                @endforeach
{{--          <a href="" class="btn_lang"> En</a>--}}
          <a href="tel:00966114560000" class="btn_call">
            <img src="https://dmf.med.sa/wp-content/themes/hospital/images/call-doctor.svg" alt="" class="icon_mn">
            <img src="https://dmf.med.sa/wp-content/themes/hospital/images/call-doctor-mn_hv.svg" alt=""
              class="icon_hv">
          </a>
          <a class="btn_menu_mobile">
            <img src="https://dmf.med.sa/wp-content/themes/hospital/images/menu.svg" alt="">
          </a>
        </div>
          <ul class="head_social clearfix">
              <li>
                  <a href=" {{$settings->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li>
                  <a href=" {{$settings->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                  <a href=" {{$settings->insta}}" target="_blank"><i class="fab fa-instagram"></i></a>
              </li>
              <li>
                  <a href=" {{$settings->linkedin}}" target="_blank"><i class="fab fa-youtube"></i></a>
              </li>
          </ul>
      </div>
    </div>
  </div>
</div>
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
