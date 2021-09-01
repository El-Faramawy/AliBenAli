<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>علي بن علي | تسجيل الدخول</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
        .toast-container{
            float: left!important;
        }
    </style>
    <!--end::Web font -->
    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    {{--    <link href="../../../assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />--}}

    <link href="{{url('admin/auth')}}/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />

    {{--    <link href="../../../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />--}}

    <link href="{{url('admin/auth')}}/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{url('site')}}/img/logo.png" />







    {{--=======================  tostar  ====================================--}}
    <link rel="stylesheet" href="{{url('admin/css')}}/tostar.css">

    <link href="{{url('admin')}}/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />


    <link href="{{url('admin')}}/assets/demo/demo6/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />


    <link href="{{url('admin')}}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->
    {{--==============================================    end  css   ====================================--}}


    {{--    end css--}}








</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({{url('admin/auth')}}/bg-5.jpg);">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper" style="padding-top: 10px;">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{{url('site')}}/img/logowhite.png" width="100px" height="90px">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">تسجيل</h3>
                    </div>
                    <form class="m-login__form m-form" action="{{route('do-log')}}" enctype="application/x-www-form-urlencoded" method="post">
                        @csrf
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="email" placeholder="البريد الإلكترونى" name="email"  required>
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمة السر" name="password" required>
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--focus">
                                    <input type="checkbox" name="remember"> تذكرنى
                                    <span></span>
                                </label>
                            </div>

                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" class="btn" style="border-radius:30px;color:white;font-family: 'Cairo';width: 150px;background-color: #E404A6">دخول</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!--begin::Global Theme Bundle -->
<script src="{{url('admin/auth')}}/vendors.bundle.js" type="text/javascript"></script>
<script src="{{url('admin/auth')}}/scripts.bundle.js" type="text/javascript"></script>
{{--===================  toster ==============================--}}
<script src="{{url('admin/js')}}/tostar.js"></script>

<script>

    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch(type){
        case 'info':

            toastr.options.timeOut = 10000;
            toastr.info("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':

            toastr.options.timeOut = 10000;
            toastr.success("{{Session::get('message')}}");
            var audio = new Audio('music/Success 12.mp3');
            audio.play();

            break;
        case 'warning':

            toastr.options.timeOut = 10000;
            toastr.warning("{{Session::get('message')}}");
            var audio = new Audio('music/error2.mp3');
            audio.play();

            break;
        case 'error':

            toastr.options.timeOut = 10000;
            toastr.error("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
    }
    @endif
</script>


<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
{{--<script src="../../../assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>--}}

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
