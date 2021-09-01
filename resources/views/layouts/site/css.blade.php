<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="csrf-token" content="{{csrf_token()}}" />
<title> {{app()->getLocale()=='ar'?'مستشفى علي بن علي':'Ali Ben Ali Hospital'}}</title>
<!-- icon -->
<link rel="icon" type="image/x-icon" href="{{url('site')}}/img/favico.ico">
<!-- Bootstrap -->
@if(app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{url('site')}}/css/bootstrap-rtl.css">
@else
    <link rel="stylesheet" href="{{url('site')}}/css/bootstrap.css">
@endif
    <!-- MDBootstrap -->
<link rel="stylesheet" href="{{url('site')}}/css/mdb.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{url('site')}}/css/all.css">
<!-- Font Awesome Stars-->
<link rel="stylesheet" href="{{url('site')}}/css/fontawesome-stars.css">
<!-- odometer -->
<link rel="stylesheet" href="{{url('site')}}/css/odometer.min.css">
<!-- flatIcon -->
<link rel="stylesheet" href="{{url('site')}}/css/flaticon.css">
<!-- venobox -->
<link rel="stylesheet" href="{{url('site')}}/css/venobox.css" />
<!-- dropify -->
<link rel="stylesheet" href="{{url('site')}}/css/dropify.min.css">
<!-- swiper -->
<link rel="stylesheet" href="{{url('site')}}/css/swiper.css">
<!-- select2 -->
<link rel="stylesheet" href="{{url('site')}}/css/select2.css">
<!-- animate -->
<link rel="stylesheet" href="{{url('site')}}/css/aos.css">
<link rel="stylesheet" href="{{url('site')}}/css/normalize.css">
<!-- img gallery -->
<link rel="stylesheet" href="{{url('site')}}/css/jquery.fancybox.min.css">
<!-- Custom style  -->
<link rel="stylesheet" href="{{url('site')}}/css/style.css">
@if(\Illuminate\Support\Facades\App::getLocale() == 'en')
    <link rel="stylesheet" href="{{url('site')}}/css/en.css">
@endif

<!-- fonts  -->
<link href="https://fonts.تصفحogleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css">
{{--=======================  tostar  ====================================--}}
<link rel="stylesheet" href="{{url('admin/css')}}/tostar.css">
