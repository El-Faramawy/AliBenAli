@extends('layouts.site.app')
@section('site_content')
  <div class="fields-page">
    <div class="title-top">
      <div class="container">
        <div class="title-outer">
          <h1> {{trans('web.clinic')}} </h1>
          <ul class="page-breadcrumb">
            <li><a href="{{url('/')}}">{{trans('web.home')}}</a></li>
            <li class="px-2"><i class="fal fa-arrow-left"></i></li>
            <li>{{trans('web.clinic')}}</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="fields mt-5">
      <div class="container">
          <div class="row">
              @foreach($clinics as $clinic)
                  <div class="col-md-3  col-6 mb-3">
                      <a href="{{url('doctor-search',$clinic->id)}}">
                          <div class="contents z-depth-1">
                              <div class="img d-flex justify-content-center">
                                  <img src="{{get_file($clinic->image)}}" style="width:200px; height:200px;border-radius:13px  " alt="" srcset="">
                              </div>
                              <div class="text ">
                                  <a href="{{url('doctor-search',$clinic->id)}}" class="text-dark py-2 font-weight-bold text-center">{{$clinic['name_'.app()->getLocale()]}}</a>
                              </div>
                          </div>
                      </a>
                  </div>
              @endforeach
          </div>
      </div>
    </div>
  </div>
@endsection
