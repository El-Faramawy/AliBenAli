@extends('layouts.site.app')
@section('site_content')
<section class="contact-section ">
    <div class="container">
      <div class="row my-5">
        <div class="col-lg-4">
          <div class="contact-info-address">
            <h3>{{trans('web.quick_contact')}} </h3>
            <div class="info-contact">
              <i class="flaticon-pin"></i>
              <h3>{{trans('web.address')}}</h3>
              <span><p>
                        {{$settings['address_' .app()->getLocale()]}}
                    </p>
              </span>
            </div>
            <div class="info-contact">
              <i class="flaticon-call"></i>
              <h3>{{trans('web.phone')}}</h3>
              <span><a href="tel:{{$settings->phone1}}">{{$settings->phone1}}</a></span> <br>
              <span><a href="tel:{{$settings->phone2}}">{{$settings->phone2}}</a></span>
            </div>
            <div class="info-contact">
              <i class="flaticon-email"></i>
              <h3> {{trans('web.email')}} </h3>
              <!-- <span>
                <a href="/cdn-cgi/l/email-protection#a3cbc6cfcfcce3d3cfc2cec18dc0ccce">
                  <span class="__cf_email__"
                    data-cfemail="d9aaaca9a9b6abad99b1acabacb4b8f7bab6b4">[email&#160;protected]</span>
                </a>
              </span> -->
              <span>
                <a href="#">
                  <span>{{$settings->email}} </span>
                </a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-8 left-contact-col">
          <div class="contact-area">
            <div class="contact-content">
              <h3> {{trans('web.contact_us')}}</h3>
              <p>{{trans('web.form_text')}}</p>
            </div>
            <div class="contact-form">
              <form id="contactForm" action="{{route('contact_us')}}" method="post">
                  @csrf
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="name" id="name" class="form-control"
                        data-error="Please enter your name" placeholder="{{trans('web.name')}}">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="phone_number" id="phone_number"
                        data-error="Please enter your number" class="form-control" placeholder="{{trans('web.phone')}} ">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <input type="email" name="email" id="email" class="form-control"
                        data-error="Please enter your email" placeholder=" {{trans('web.email')}}">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <!-- <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="msg_website" id="msg_website" class="form-control" required
                        data-error="Please enter your website" placeholder="الموضوع">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div> -->
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      <textarea name="massage" class="form-control" id="message" cols="30" rows="6"
                        data-error="Write your message" placeholder="{{trans('web.massage')}}"></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="send-btn">
                        <a href="{{route('contact_us')}}">
                      <button type="submit" class="default-btn">
                          {{trans('web.send')}}
                        <i class="flaticon-right"></i>
                        <span></span>
                      </button>
                        </a>
                    </div>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="head-gps ">
        <iframe src="https://maps.google.com/maps?q={{$settings->latitude}}, {{$settings->longitude}}&z=15&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        <iframe
        src="https://www.google.com/maps/place/%D9%85%D8%B3%D8%AA%D8%B4%D9%81%D9%89+%D8%B9%D9%84%D9%8A+%D8%A8%D9%86+%D8%B9%D9%84%D9%8A%E2%80%AD/@24.5753738,46.7698651,17z/data=!3m1!4b1!4m5!3m4!1s0x3e2f09dada453e07:0x7739fa5dca216204!8m2!3d24.5753738!4d46.7676764"
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </section>
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
