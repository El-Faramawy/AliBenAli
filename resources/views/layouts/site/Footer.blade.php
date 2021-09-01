<?php
use App\Models\Setting;
$settings=Setting::all()->first();
?>
<!-- Footer Start -->
<footer id="footer-section" class="footer-section">
    <div class="over-lay"></div>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-3">
                    <h4 class="footer-title">علي بن علي</h4>
                    <div class="about-widget white-bg d-flex align-items-center justify-content-center p-1"
                        style="border-radius: 6px;">
                        <p class="logo-p"> الابداع الثالث لتقنية المعلومات توفر عليك عناء ادارة الهوية الرقمية بدون الحاجة لعشرات الموظفين
                        </p>
                        <img src="img/logo.png" class="footer-logo" alt="">
                    </div>
                </div> -->
                <!-- <div class="col-md-3">
                    <h4 class="footer-title">علي بن علي</h4>
                    <div class="about-widget ">
                        <p class="logo-p">
                            للإجابة على أي إستفسارات لديكم حول حالتكم الصحية أو مانقدمه من خدمات,لاتترددوا فى التواصل مع ممثلي الرعاية الصحية بالمستشفى
                        </p>
                        <img src="img/logo1.png" class="footer-logo" alt="">
                    </div>
                </div> -->
                <div class="col-md-3 col-6">
                    <h4 class="footer-title">{{trans('web.short_links')}} </h4>
                    <ul class="sitemap-widget">
                        <li class="active"><a class="d-flex justify-content-between align-items-center"
                                              href="{{url('/')}}/about">
                                {{trans('web.about')}}
                            </a></li>
                        <li class="active"><a class="d-flex justify-content-between align-items-center"
                                              href="{{url('/')}}/doctor-search">
                                {{trans('web.find_doctor')}}
                            </a></li>
                        <li class="active"><a class="d-flex justify-content-between align-items-center"
                                              href="{{url('/')}}/Media-Center">
                                {{trans('web.media_center')}}
                            </a></li>
                        <li class="active"><a class="d-flex justify-content-between align-items-center"
                                              href="{{url('/')}}/contact">
                                {{trans('web.contact_us')}}
                            </a></li>

                    </ul>
                </div>
                <div class="col-md-3 col-6">
                    <h4 class="footer-title">{{trans('web.contact_info')}}</h4>
                    <div class="about-widget ">
                        <p class="logo-p">
                            <i class="fal fa-phone-alt pl-2"></i>
                            {{$settings->phone1}}
                        </p>
                        <p class="logo-p">
                            <i class="fal fa-envelope pl-2"></i>
                            {{$settings->email}}
                        </p>
                        <p class="logo-p mt-4">
                            <a href="{{$settings->facebook}}" class=" social-footer px-2"> <i class="fab fa-facebook-f"></i> </a>
                            <a href="{{$settings->twitter}}" class=" social-footer px-2"> <i class="fab fa-twitter"></i> </a>
                            <a href="{{$settings->insta}}" class=" social-footer px-2"> <i class="fab fa-instagram"></i> </a>
                            <a href="{{$settings->linkedin}}" class=" social-footer px-2"> <i class="fab fa-youtube"></i> </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <h4 class="footer-title"> {{trans('web.call_us')}} </h4>
                    <form action="{{route('footer_massage')}}" method="post">
                        @csrf
                        <input type="text" class="form-control footer-input mb-3" placeholder="{{trans('web.name')}}" name="footer_name" >
                        <input type="email" class="form-control footer-input mb-3" placeholder="{{trans('web.email')}}" name="footer_email" >
                        <div class="d-flex">
									<textarea name="footer_massage" class="form-control footer-textarea" id="" cols="30" rows="4"
                                              placeholder="{{trans('web.massage')}}" ></textarea>
                            <button class="btn footer-btn" type="submit"><a  href="{{route('footer_massage')}}" style="text-decoration:none;color:white"><i class="fal fa-paper-plane"></i></a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 d-flex align-items-center justify-content-start">
                    <div class="copyright ">
                        <p> {{trans('web.copy_right')}} <a href="#" target="_blank">{{trans('web.ali_bn_ali')}} </a>.
                        </p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="text-center ft-bottom-right ">
                        <div class="buttons ">
                            <!--Twitter-->
                            <!-- <a class="btn-floating m-0 btn-sm mx-1 btn-tw waves-effect waves-light" type="button"
                                role="button"><i class="fab fa-twitter"></i></a> -->
                            <!--Instagram-->
                            <!-- <a class="btn-floating m-0 mx-1 btn-sm btn-ins waves-effect waves-light" type="button"
                                role="button"><i class="fab fa-instagram"></i></a> -->
                            <!--Google +-->
                            <!-- <a class="btn-floating m-0 mx-1 btn-sm btn-gplus waves-effect waves-light" type="button"
                                role="button"><i class="fab fa-google-plus-g"></i></a> -->
                            <!--Facebook-->
                            <!-- <a class="btn-floating mx-1 m-0 btn-sm  btn-fb waves-effect waves-light" type="button"
                                role="button"><i class="fab fa-facebook-f"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
