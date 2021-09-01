<!doctype html>
<html>

<head>

    @include('layouts.site.css')

</head>

<body>
<!-- ================ spinner ================= -->
<div id="loader-wrapper">
    <div id="loader">
        <div class="loader-inner"></div>
    </div>
</div>
<!-- ================ spinner ================= -->

<div class="container-fluid  mb-lg-0 topHeader">@include('layouts.site.top-header')</div>

<div id="Header" class="main-header sticky-top">@include('layouts.site.Header')</div>

@yield('site_content')

@include('layouts.site.Footer')
@include('layouts.site.js')


</body>

</html>
